<?php
include_once './lib/lib.php';

function main(){
	// wrapping con contentuto rimanente
	$content = <<<__end__
		<form class="form-signin">
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
                    <div id="details" class="col-12 col-lg-8">
                        
                    </div>
                 </div>
            </div>
        </form>
        <script>
            //script treeview
            
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
            
            //popup
            
            function popup(){
                $('.without-caption').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                    image: {
                        verticalFit: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300 // don't foget to change the duration also in CSS
                    }
                });
            }
            popup();

            $('.with-caption').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                    titleSrc: function(item) {
                        return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                    }
                },
                zoom: {
                    enabled: true
                }
            });
            
            function add_button(item_id){
                var nameValue= "quantita"+item_id;   
                console.log(nameValue);
                var quantity = $("input[type=number][name="+nameValue+"]").val();
                console.log(quantity);
                cart_add(item_id, quantity, null);
                $('#'+item_id).html("<p class='add'>&emsp;Aggiunto al carrello</p>"); 
            }
            
            function remove_button(item_id){
                console.log(item_id);
                cart_remove(item_id, null );
                $('#'+item_id).html("<p class='remove'>&emsp;Rimosso dal carrello</p>");
            }
            
            function modify_description(descrizione){
                var true_description='';
                for(var i=0; i< descrizione.length; i++){
                    var car = descrizione.charAt(i);
                    if(car=='\u000A'){                 /* \u000A= '\n' */
                        true_description += '<br>';
                    }
                    else{
                        true_description += car;
                    }
                }
                return true_description;  
            }
            
            /*funzione jQuary per estrarre i parametri dall'URL*/
            (function($) {
                $.urlParams = function(name){
                    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
                    if (!results) { 
                        return 0; 
                    }
                    return results[1] || 0;
                };
            })(jQuery);
            
            var id = $.urlParams('Id');
            console.log(id);
            
            function print_details(msg,data){ 
                console.log(msg);
                console.log(data);
            
                var nome= data.nome;
                var descrizione= data.descrizione; 
                var immagine= data.imgs[0];
                var numImg=data.imgs.length -1;
                var otherImg= new Array();
                for(var i=1; i<data.imgs.length;i++){
                    otherImg[i-1]=data.imgs[i];
                }
                var quantita= data.binner;
                if(quantita==0){
                    quantita=1;
                }
                 
                var dimensione= data.dimensione;
                var omologazione= data.omologazione;  
                var bmaster=data.bmaster;   
                var ean= data.ean;        
                var peso= data.peso;                 
                var confezione= data.confezione;               
                var lunghezza=data.lunghezza;               
                var larghezza=data.larghezza;              
                var altezza=data.altezza;              
                var volume_imb=data.volume_imb;             
                var peso_imb=data.peso_imb;
                
                //modifica sintattica della descrizione
                var descrizione_html= modify_description(descrizione);
                
                var imgSize=5;
                content="";
                    content +='<div class="container">'
                        content +='<center class="title-item">'+nome+'</center>'
                        content +='<table class="tab_img_details">'
                            content +='<tr>'
                                if(otherImg.length<=imgSize){
                                    content +='<td colspan="'+imgSize+'">'
                                }
                                else{
                                    content +='<td colspan="'+otherImg.length+'">'
                                    
                                }
                                    content +=' <a href="'+immagine+'" class="without-caption image-link">';
                                        content +='<img id="img_prodotto" src="'+immagine+'"/>  '
                                    content +='</a>'
                                content +='</td>'
                            content +='</tr>'
                            content +='<tr>'
                            var i=0;
                            for(; i<otherImg.length;i++){
                                content +='<td style="width:20%">'
                                    content +='<a href="'+otherImg[i]+'" class="without-caption image-link">'
                                        content +='<img class="img_secondarie" src="'+otherImg[i]+'"/>'
                                    content +='</a>'
                                content +='</td>'
                            }
                            if(i<imgSize){
                                while(i<imgSize){
                                    content +='<td></td>'
                                    i++;
                                }
                            }
                            content +='<tr>'
                        content +='</table>'
                        content +='<p class="item-description"><h4>Descrizione</h4> '+descrizione_html+'</p>'
                        content +='<div class="btn-group">'
                            content +='<span>Quantità:&emsp; </span><input class="quantita" type="number" name="quantita'+id+'" value="'+quantita+'" step="1" min="'+quantita+'" style="width:50%">'
                        content +='</div>'
                        content +='<button type="button" class="btn btn-light" onclick="add_button(&quot;'+id+'&quot;)"><i class="fas fa-cart-plus"></i></button>'
                        content +='<button type="button" class="btn btn-danger btn-sm" onclick="remove_button(&quot;'+id+'&quot;)"><i class="far fa-trash-alt"></i></button>'
                        content +='<p class="notifica" id="'+id+'"></p>';
                        
                        content +='<table class="specifiche">'
                            content +='<tr class="specifiche"><td colspan="2" class="specifiche"><h5 class="title_specifiche"><center>Specifiche</center></h5></td></tr>'
                            if( dimensione!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Dimensione: </p></td>'
                                    content +='<td class="specifiche"><p>'+dimensione+'</p></td>'
                                content +='</tr>'
                            }
                            if( omologazione!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Omologazione: </p></td>'
                                    content +='<td class="specifiche"><p>'+omologazione+'</p></td>'
                                content +='</tr>'
                            }
                            if( bmaster!=""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Numero pacchi: </p></td>'
                                    content +='<td class="specifiche"><p>'+bmaster+'</p></td>'
                                content +='</tr>'
                            }
                            if( ean!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Codice prodotto: </p></td>'
                                    content +='<td class="specifiche"><p>'+ean+'</p></td>'
                                content +='</tr>'
                            }                            
                            if( peso!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td  class="detail"><p>Peso: </p></td>'
                                    content +='<td class="specifiche"><p>'+peso+'</p></td>'
                                content +='</tr>'
                            }
                            if( confezione!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td  class="detail"><p>Confezione: </p></td>'
                                    content +='<td class="specifiche"><p>'+confezione+'</p></td>'
                                content +='</tr>'
                            }
                            if( lunghezza!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Lunghezza: </p></td>'
                                    content +='<td class="specifiche"><p>'+lunghezza+'</p></td>'
                                content +='</tr>'
                            }
                            if( larghezza!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Larghezza: </p></td>'
                                    content +='<td class="specifiche"><p>'+larghezza+'</p></td>'
                                content +='</tr>'
                            }                            
                            if( altezza!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Altezza: </p></td>'
                                    content +='<td class="specifiche"><p>'+altezza+'</p></td>'
                                content +='</tr>'
                            }
                            if( volume_imb!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Volume imballaggio: </p></td>'
                                    content +='<td class="specifiche"><p>'+volume_imb+'</p></td>'
                                content +='</tr>'
                            }
                            if( peso_imb!= ""){
                                content +='<tr class="specifiche">'
                                    content +='<td class="detail"><p>Peso imballaggio: </p></td>'
                                    content +='<td class="specifiche"><p>'+peso_imb+'</p></td>'
                                content +='</tr>'
                            }
                        content +='</table>'
                    content +='</div>'

                 document.getElementById("details").innerHTML += content;
                 popup();
            }       
            item_details(id,print_details);          
        </script>	
__end__;
	return layout($content, $title="", "");
}		
echo main();
?>