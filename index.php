<?php

require_once './lib/lib.php';

function main(){
	
	$content = <<<__end__
			<div class="album py-5 ">
				<div class="row">
					<div class="col-12 col-lg-4">						
						<div id="treeview_container" class="hummingbird-treeview well h-scroll-large">          
							<ul id="treeview" class="hummingbird-base">
								<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Lavorazioni Meccaniche
									<ul class="list-group">
										<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Taglio/Foratura</a></li>
										<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Taglio/Piegatura</a></li>
										<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Taglio/Saldatura</a></li>
									</ul>	
								</li>			
								<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Componenti
									<ul class="list-group">
										<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Cuscinetti
											<ul class="list-group">
												<li id="figlio" class="list-group-item">&emsp;SKF</li>
												<li id="figlio" class="list-group-item">&emsp;Brigs</li>
											</ul>
										</li>
										<li class="list-group-item">&emsp;Relle</li>
										<li class="list-group-item">&emsp;Pistoni</li>
										<li class="list-group-item">&emsp;Tubi idraulici</li>
									</ul>
								</li>
								<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Accessori
									<ul class="list-group">
										<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Elettrici
											<ul class="list-group">
												<li id="figlio" class="list-group-item">&emsp;Fari</li>
												<li id="figlio" class="list-group-item">&emsp;Spinotti</li>
											</ul>
										</li>	
										<li class="list-group-item">&emsp;Chimici</li>
										<li class="list-group-item">&emsp;Pulizia</li>	
									</ul>
								</li>
							</ul>
						</div>							
						</div>
						<div class="col-12 col-lg-8">
							<div class="container">						
								<div id="card_item" class="row">
                                    
								</div>
							</div>
						</div>	
				</div>
                <nav id="pages" aria-label="Page navigation">
                    
                </nav>
			</div>
            
            <script>  
                var page_now=1
                var numPage=10;
                
                function page(){                  
                    item_page(page_now,print_item);
                    var content = ''
                    content += '<ul  class="pagination justify-content-center">'
                        content +='<li class="page-item"><a class="page-link" href="#fine_page" tabindex="-1" onclick="load_item_page_prec()">Precedente</a></li>';
                            for(var i=1;i<=numPage;i++){
                                content +='<li class="page-item"><a class="page-link" href="#fine_page" onclick="load_item_page('+i+')">'+i+'</a></li>'
                            }
                        content +='<li class="page-item"><a class="page-link" href="#fine_page" onclick="load_item_page_succ()">Successiva</a></li>'
                    content +='</ul>'
                    content +='<a name="fine_page">'
                    document.getElementById("pages").innerHTML += content;
                }
                page();
                
                function load_item_page(page){
                    page_now=page;
                    console.log('pagina '+page_now);
                    item_page(page,print_item);
                    
                }
                
                function load_item_page_prec(){
                    if(page_now != 1){
                        page_now=page_now-1;
                        console.log('pagina '+page_now);
                        item_page(page_now,print_item);
                    }
                }
                
                function load_item_page_succ(){
                    if(page_now != numPage){
                        page_now=page_now+1;
                        console.log('pagina '+page_now);
                        item_page(page_now,print_item);
                    }
                }
                  
                    
                $("#treeview").hummingbird();
                $( "#checkAll" ).click(function() {
                  $("#treeview").hummingbird("checkAll");
                });
                $( "#uncheckAll" ).click(function() {
                  $("#treeview").hummingbird("uncheckAll");
                });
                $( "#collapseAll" ).click(function() {
                  $("#treeview").hummingbird("collapseAll");
                });
   
                function print_item(msg,data){ 
                    console.log(msg);
                    console.log(data);
                    console.log(data.items.length);
                    content="";
                    for(index=0;index<data.items.length;index++){
                            
                        var id= data.items[index].codice;            
                        var nome= data.items[index].nome;
                        var descrizione= data.items[index].descrizione;                           
                        var immagine= data.items[index].imgs[0];
                        var quantita= data.items[index].binner;
                        if(quantita==0){
                            quantita=1;
                        }      
                        
                        content +='<div class="col-6 col-lg-4">'
                            content +='<div class="card mb-4 shadow-sm">'
                                content +='<div class="IE_div_card">'
                                    content +='<a class="img_card" href="item_detail.php?Id='+id+'"><img  class="card-img-top" src="'+immagine+'"></a>'
                                content +='</div>'
                                content +='<div class="card-body">'
                                    content +='<p id="'+id+'"></p>';
                                    content +='<p id="title" class="card-text"><b>'+nome+'</b></p>'
                                    content +='<div class="d-flex justify-content-between align-items-center">'
                                        content +='<div class="btn-group">'
                                            content +='<span>Quantità:&emsp; </span>'
                                            content +='<input class="quantita" type="number" name="quantita'+id+'" value="'+quantita+'" step="1" min="'+quantita+'" style="width:50%">'
                                        content +='</div>'
                                        content +='<div class="btn-group">'
                                            content +='<button id="add_'+id+'" type="button" class="btn btn-light" onclick="add(&quot;'+id+'&quot;)"><i class="fas fa-cart-plus" ></i></button>'
                                            content +='<button id="remove_'+id+'" type="button" class="btn btn-danger btn-sm" onclick="remove(&quot;'+id+'&quot;)"><i class="far fa-trash-alt"></i></button>'
                                        content +='</div>'
                                    content +='</div>'
                                content +='</div>'
                            content +='</div>'
                        content +='</div>'                                                    
                    }  
                    document.getElementById("card_item").innerHTML = content;
                }               
            </script>
__end__;
	return layout($content, $title="", "Vendita mezzi agricoli e lavorazioni di carpenteria meccanica.");
}			
echo main();