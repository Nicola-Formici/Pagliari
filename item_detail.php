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
                            <center class="title-item"> Prodotto </center>					
                            <table class="tab-img-details">
                                <tr>
                                    <td colspan="3">
                                        <a href="./immagini/carribotte-B350.jpg" class="without-caption image-link">
                                            <img id="img_prodotto" src="./immagini/carribotte-B350.jpg"/>  
                                        </a>
                                    </td>
                                </tr>
                                <tr>	
                                    <td>
                                        <a href="./immagini/carribotte-B350.jpg" class="without-caption image-link">
                                            <img class="img_secondarie" src="./immagini/carribotte-B350.jpg" />  
                                        </a>
                                    </td>
                                    <td>
                                        <a href="./immagini/carribotte-B350.jpg" class="without-caption image-link">
                                            <img class="img_secondarie" src="./immagini/carribotte-B350.jpg"/>  
                                        </a>
                                    </td>
                                    <td>
                                        <a href="./immagini/carribotte-B350.jpg" class="without-caption image-link">
                                            <img class="img_secondarie" src="./immagini/carribotte-B350.jpg" />  
                                        </a>
                                    </td>
                                </tr>
                             </table>
                            <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	
                            <p class="item-description">Prezzo: 5€</p>
                            <div class="option-item">
                                <div class="btn-group">
                                    <span>Quantità:&emsp; </span><input class="quantita" type="number" id="quantita" name="quantita" value="1" step="1" min="1">
                                </div>
                                <button type="button" class="btn btn-light"><i class="fas fa-cart-plus"></i></button>&emsp;
                                <button type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>	
                            </div>
                        </div>
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
        </script>	
__end__;
	return layout($content, $title="", "");
}
		
echo main();
?>