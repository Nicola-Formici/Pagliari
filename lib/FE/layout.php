<?php
function layout($content, $title= "Al.Pa.car", $description="" ) {
	return <<<__end__
 
<!doctype html>
<html lang="en">
  <head>

    <title>$title</title>
        <meta name="description" content="$description">
    
		<!--script navbar -->
		
		<script src="./js/jquery-3.3.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Detect.js/2.2.2/detect.js"></script>
        
        <script>
        var ua = detect.parse(navigator.userAgent);
        if( ua.browser.family == "IE" ){
            $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', 'css/browser/IE.css') );
        }
        
        </script>
		
        <!--link popup-->
		
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
		
		<!--script generali-->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />

		
		<!--script per registrazione --> 
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
		<script src="./js/additional-methods.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		
		<!--librerie treeview -->

		<link href="./css/hummingbird-treeview.css" rel="stylesheet" type="text/css">
		<script src="./js/hummingbird-treeview.js"></script>
		
		<!--link icone-->
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		<!-- link font -->
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

		<script src="./js/json.js"></script>
		<script src="./js/cart.js"></script>
		
		<!--miei stili -->
		
		<link rel="stylesheet" type="text/css" href="css/stile.css">
		
		
        
		<meta name="google-site-verification" content="3MeieJGuelWy8CWBgfApj8LguEj8dFnrdzMrxAk9nKE" />
  </head>

	<body>

		<header>
		
			<div class="navbar navbar-dark bg-light shadow-sm " >
				<nav class="navbar navbar-light">
					<a class="navbar-brand" href="./index.php">
						<img src="./immagini/logo_pagliari.png" width="220" height="">
					</a>
					<ul class="nav dropdown">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
							<div class="dropdown-menu">
							  <a class="dropdown-item" href="./login.php">Accedi</a>
							  <a class="dropdown-item" href="./registration.php">Iscriviti</a>
							</div>  
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cart.php">Carrello</a>
						</li>
					</ul>
					
				</nav>	
			</div>
		</header>

		<main role="main">
            $content
    </main>

    <footer class="text-muted bg-light">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md" style="margin-top:3%;">
					<img class="mb-2" src=".\immagini\pagliari.png" width="50" height="50">
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

  </body>
</html>																								
__end__;
}