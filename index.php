<?php

require_once './lib/lib.php';


function card_item($item_id){
	return 	 <<<__end__
					<div class="col-6 col-lg-4">
						<div class="card mb-4 shadow-sm">
                            <div class="IE_div_card">
                                <a class="img_card" href="item_detail.php"><img  class="card-img-top" src="./immagini/carribotte-B350.jpg" alt="Card image cap"></a>
                            </div>
                           
							<div class="card-body">
								<p class="card-text">
									This is a wider card with supporting text below as a natural lead-in to additional content. 
									This content is a little bit longer.
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<span>Quantità:&emsp; </span>
										<input class="quantita" type="number" name="quantita$item_id" value="1" step="1" min="1" style="width:50%">
									</div >
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light" onclick="add_button($item_id)"><i class="fas fa-cart-plus" ></i></button>
                                        <button class="btn btn-danger btn-sm" onclick="remove_button($item_id)"><i class="far fa-trash-alt"></i></button>	
                                    </div>
								</div>
							</div>
						</div>
					</div>           
__end__;
}


//
function main(){
	// calcola le cards
	$number = rand(1,20);
	$html_cards = '';
	for($i=0; $i<$number; $i++){
		$html_cards .= card_item($i+1);
	}
	// wrapping con contentuto rimanente
	$content = <<<__end__
			<section class="jumbotron text-center bg-dark" >
				<div class="container" >
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img  src="./immagini/immagine1.jpg" width="700" height="400" alt="First slide">
							</div>
							<div class="carousel-item">
								<img  src="./immagini/immagine2.jpg" width="700" height="400" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img  src="./immagini/immagine3.jpg" width="700" height="400" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</section>
		 	
			<div class="album py-5 ">
				<div class="row">
					<div class="col-12 col-lg-4">						
						<div id="treeview_container" class="hummingbird-treeview well h-scroll-large">          
							<ul id="treeview" class="hummingbird-base">
								<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Lavorazioni Meccaniche
									<ul class="list-group">
										<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Taglio/Foratura
											<ul class="list-group">
												<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Acciaio
													<ul class="list-group">
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 10mm </a></li>
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 20mm</a></li>
													</ul>
												</li>
												<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Acciaio Inox
													<ul class="list-group">
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 10mm </a></li>
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 20mm</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Taglio/Piegatura
											<ul class="list-group">
												<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Acciaio
													<ul class="list-group">
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 10mm </a></li>
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 20mm</a></li>
													</ul>
												</li>
												<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Acciaio Inox
													<ul class="list-group">
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 10mm </a></li>
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 20mm</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Taglio/Saldatura
											<ul class="list-group">
												<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Acciaio
													<ul class="list-group">
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 10mm </a></li>
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 20mm</a></li>
													</ul>
												</li>
												<li class="list-group-item"> <i class="fa fa-plus"></i>&emsp;Acciaio Inox
													<ul class="list-group">
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 10mm </a></li>
														<li id="figlio" class="list-group-item"> &emsp;<a href="./mechanical_machining.php">Spessore 20mm</a></li>
													</ul>
												</li>
											</ul>
										</li>
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
								<div class="row">
								    $html_cards									
								</div>
							</div>
						</div>	
				</div>
				<nav aria-label="Page navigation">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Precedente</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Successiva</a></li>
					</ul>
				</nav>
			</div>
            
            
            <!-- script treeview -->
            
            <script>

                function add_button(item_id){
                    var nameValue= "quantita"+item_id;   
                    console.log(nameValue);
                    var quantity = $("input[type=number][name="+nameValue+"]").val();

                    console.log(quantity);
                    cart_add(item_id, quantity, null);
                }
                
                function remove_button(item_id){
                    console.log(item_id);
                    cart_remove(item_id, null );
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
            </script>
__end__;
	return layout($content);
}			
echo main();