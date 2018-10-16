<?php

require_once './lib/lib.php';
//
function main(){
	// wrapping con contentuto rimanente
	$content = <<<__end__
 	
			<div class="album py-5">
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
                                <div class="row" id="IE_img_lavorazioni">
                            
                                    <h4> Lavorazioni Meccaniche > Taglio/Piegatura </h4>
                                    
                                    <div class="w-100"></div>
                                    
                                    <div class="col-sm">
                                        <a href="./immagini/carribotte-B350.jpg" class="without-caption image-link">
                                            <img class="img_mechanical" src="./immagini/carribotte-B350.jpg"/>  
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="./immagini/carribotte-B350.jpg" class="without-caption image-link">
                                            <img class="img_mechanical" src="./immagini/carribotte-B350.jpg"/>  
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="./immagini/carribotte-B350.jpg" class="without-caption image-link">
                                            <img class="img_mechanical" src="./immagini/carribotte-B350.jpg"/>  
                                        </a>
                                    </div>
                                </div>                            
								
								<div class="row">									
									<p class="decriprion">		
										Al.Pa.Car srl offre ai propri clienti esclusivamente servizi 
										di altissima qualità, rispettando le norme di sicurezza imposte dalla legge. 
										Impieghiamo lavoratori specializzati con anni di esperienza ed utilizziamo macchinari di ultima generazione.
										La nostra azienda offre un rapporto qualità-prezzo incomparabile non solo negli 
										interventi di piegatura delle lamiere ma anche in tutti gli altri tipi di lavorazione.
									</p>
                                   
                                    <h5>Per un preventivo:</h5>	
                                    <div class="w-100"></div>
                                    <div class="col" >
                                    	<p style="text-align:center;">Se sei già iscritto:</p>
                                    </div>
                                    <div class="col">
                                        <p style="text-align:center;">Se non sei ancora iscritto:</p>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col">
                                        <a id="button_acces" class="btn btn-primary btn-lg btn-block" href="./login.php">Login</a>
                                    </div>
                                    <div class="col" >
                                        <a id="button_acces" class="btn btn-primary btn-lg btn-block" href="./registration.php">Iscriviti</a>
                                    </div>
                                
									<form  class="needs-validation" id="work-data" method="get" action="" style="width:100%;">						
										<p><br>Inserisci una descrizione:</p>
										<div class="w-100"></div>
										<textarea class="textarea-description" id="description" name="description" style="width:100%;" rows="5" cols="100"></textarea>
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label>Materiale</label>
                                                <select class="custom-select d-block w-100" id="materiale" name="materiale" required="">
                                                    <option>Acciaio</option>
                                                    <option>Acciaio inox</option>
                                                </select>                                    
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label>Spessore</label>
                                                <select class="custom-select d-block w-100" id="spessore" name="spessore" required="">
                                                    <option>10mm</option>
                                                    <option>20mm</option>
                                                    <option>30mm</option>
                                                </select>                                    
                                            </div>
                                        </div>
										<fieldset id="upload">
											<br><p>Inserisci file (.dwg,.dxf,.igs):</p><br>
											<div>
												<label for="drawing">Percorso file:</label>
												<input type="file" id="drawing" name="drawing" />
											</div>
										</fieldset>
										<div class="w-100"></div>
										<br><br>
										<input id="invia" class="btn btn-primary btn-lg btn-block" type="submit" value="Invia" >
									</form>	
								</div>
							</div>
						</div>
				</div>
			</div>
			
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
				
				function form_Ability(){
					$(document).ready(function(){
						$("#work-data :input").prop("disabled", false);
					});	
				}
				
				function form_Disability(){
					$(document).ready(function(){
						$("#work-data :input").prop("disabled", true);
					});	
				}		
						
                $.validator.setDefaults({
                    submitHandler: function() {
                        alert("submitted!");
                    }
                });
                
                $().ready(function() {
                    // validate signup form on keyup and submit
                    $("#work-data").validate({
                        rules: {
                            description: "required",
                            materiale: "required",
                            spessore: "required",
                            drawing:{
                                required: true,
                                extension: "dwg|dxf|igs|txt"
                            },
                        },
                        messages: {
                            description: "Inserisci una descrizione",
                            materiale: "Scegli il materiale",
                            spessore: "Scegli lo spessore",
                            drawing:{
                                required: "Scegli il file da inserire",
                                extension: "Estensione non supportata"
                            }
                        }
                    });	
                });		
			</script>
__end__;
	return layout($content, $title="", "Lavorazioni di carpenteria meccanica (foratura, piegatura, saldatura).");
}
			
echo main();