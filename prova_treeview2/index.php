
<html lang="en">
    <head>
        <meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
        <title>Prova</title>
     
		<script src="jquery-3.3.1.js"></script>
        
		<!--script generali-->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Detect.js/2.2.2/detect.js"></script>
		<script>
            var ua = detect.parse(navigator.userAgent);
            if( ua.browser.family == "IE" ){
                $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '../css/browser/IE.css') );
            }
        </script>
		<!--librerie treeview -->
            <link rel="stylesheet" type="text/css" href="treeview-style.css">
            <link rel="stylesheet" type="text/css" href="jquery.mmenu.css">
            <script type="text/javascript" src="jquery.mmenu.js"></script>
		
            <script type="text/javascript">
                $(function() {
                    $('nav#menu').mmenu();
                });
            </script>
            
		<!--link icone-->
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		<!-- link font -->
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

		<!--miei stili -->
		
		<link rel="stylesheet" type="text/css" href="../css/stile.css">
        
    </head>
    <body>
<?php
    $number = rand(1,20);
    $html_cards = '';
    for($i=0; $i<$number; $i++){
        $html_cards .= card_item($i+1);
    }
    
    function card_item($item_id){
        return 	 <<<__end__
                        <div class="col-6 col-lg-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="IE_div_card">
                                    <a class="img_card" href="item_detail.php"><img  class="card-img-top" src="../immagini/carribotte-B350.jpg" alt="Card image cap"></a>
                                </div>
                               
                                <div  class="card-body">
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
?>

        <div id="page">
            <header>
                <div class="header">
                    <a style="width:3%;" href="#menu"><span></span></a>   
                </div>
            </header>
            <div class="content">
                <div class="col-12">
                    <div class="container">	
                        <h1> I nostri prodotti </h1>
                        <div id="IE_body_card" class="row">
                            <?php echo $html_cards;	?>
                		</div>
                    </div>
                </div>
            </div>
            <nav id="menu">
                <ul id="treeview">
                    <li><a class="navbar-brand" href="./index.php"><span>Logo</span></a></li>
                    <li><span>Accedi</span>
                        <ul>
                            <li><a class="dropdown-item" href="../login.php"><span>Login</span></a></li>
                            <li><a class="dropdown-item" href="../registration.php"><span>Registrati</span></a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="../cart.php"><span>Carrello</span></a></li>
                    <li><span></span></li>
                    <li><span>Lavorazioni Meccaniche</span>
                        <ul>
                            <li><span>Taglio/Foratura</span>
                                <ul>
                                    <li><span>Acciaio</span>
                                        <ul>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 10mm</span></a></li>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 20mm</span></a></li>
                                        </ul>
                                    </li>
                                    <li><span>Acciaio Inox</span>
                                        <ul>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 10mm</span></a></li>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 20mm</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><span>Taglio/Piegatura</span>
                                <ul>
                                    <li><span>Acciaio</span>
                                        <ul>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 10mm</span></a></li>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 20mm</span></a></li>
                                        </ul>
                                    </li>
                                    <li><span>Acciaio Inox</span>
                                        <ul>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 10mm</span></a></li>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 20mm</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><span>Taglio/Saldatura</span>
                                <ul>
                                    <li><span>Acciaio</span>
                                        <ul>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 10mm</span></a></li>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 20mm</span></a></li>
                                        </ul>
                                    </li>
                                    <li><span>Acciaio Inox</span>
                                        <ul>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 10mm</span></a></li>
                                            <li><a href="../mechanical_machining.php"><span>Spessore 20mm</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>	
                    </li>			
                    <li><span>Componenti</span>
                        <ul>
                            <li><span>Cuscinetti</span>
                                <ul>
                                    <li><span>SKF</span></li>
                                    <li><span>Brigs</span></li>
                                </ul>
                            </li>
                            <li><span>Relle</span></li>
                            <li><span>Pistoni</span></li>
                            <li><span>Tubi idraulici</span></li>
                        </ul>
                    </li>
                    <li><span>Accessori</span>
                        <ul>
                            <li><span>Elettrici</span>
                                <ul>
                                    <li><span>Fari</span></li>
                                    <li><span>Spinotti</span></li>
                                </ul>
                            </li>	
                            <li><span>Chimici</span></li>
                            <li><span>Pulizia</span></li>	
                        </ul>
                    </li>
                </ul>
            </nav>
            
            <footer class="text-muted bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md" style="margin-top:3%;">
                            Logo
                        </div>
                        <div class="col-6 col-md" style="margin-top:3%;">
                            <h5>Contatti</h5>
                            <ul class="list-unstyled text-small">
                                <li><a class="text-muted" href="#">Mail: info@alpacarweb.it</a></li>
                                <li><a class="text-muted" href="#">Telefono: +39 0375.80122</a></li>
                                <li><a class="text-muted" href="#">Fax: 0375.808882</a></li>
                                <li><a class="text-muted" href="#">P.I. 02397760204</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md" style="margin-top:3%;">
                            <h5>Dove siamo</h5>
                            <ul class="list-unstyled text-small">
                                <li><a class="text-muted" href="#"> Via Corriera, 23 46019  <br> Squarzanella di Viadana (MN)</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md" style="margin-top:3%;">
                            <h5>Altre info</h5>
                            <ul class="list-unstyled text-small">
                                copyright © 2013 Al.Pa.Car - <a class="text-muted" href="./immagini/pdf/PAGLIARI-privacy.pdf" >Privacy Policy </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
  </body>
  
  
</html>			                       								  