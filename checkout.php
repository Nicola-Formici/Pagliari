<?php
include_once './lib/lib.php';
function main(){
	return layout(content());
}

function product_row($num){
	
	return <<<__END__
	<li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0">Product $num</h6>
            <small class="text-muted">Brief description</small>
        </div>
        <span class="text-muted">$12</span>
    </li>
__END__;
}
function content(){
	// calcola le cards
	$number = rand(1,20);
	$html_rows = '';
	for($i=0; $i<$number; $i++){
		$html_rows .= product_row($i+1);
	}
	
    $content = <<<__END__
    <div class="container" style="margin-bottom:5%;">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src=".\immagini\pagliari.png" alt="" width="72" height="72">
        <h2>Invio dell'ordine </h2>
        <p>Gentile cliente, ti chiediamo di controllare che i tuoi dati siano inseriti correttamente e di specificare l'indirizzo alla quale inviare l'ordine. Una volta ricevuto il bonifico la merce verrà spedita all'indirizzo indicato.<p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Il tuo carrello</span>
            <span class="badge badge-secondary badge-pill">$number</span>
          </h4>
          <ul class="list-group mb-3">
			$html_rows
            <li class="list-group-item d-flex justify-content-between">
              <span>Totale:</span>
              <strong>$20</strong>
            </li>
          </ul>
        </div>

        <div class="col-md-8 order-md-1">
			<h4 class="mb-3">Indirizzo Di Fatturazione</h4>
			<hr class="mb-4">
			<form id="review">
				<div class="row">
					<div class="col-md-6 mb-3">
						<h6>Nome</h6>
						<p  class="info" > Mario </p>
					</div>
					<div class="col-md-6 mb-3">
						<h6>Cognome</h6>
						<p class="info" > Rossi </p>
					</div>
				</div>
				<div class="mb-3">
					<h6>Indirizzo Email</h6>
					<div class="input-group">
						<p class="info"> Mail@gmail.com </p>
					</div>
				</div>
				<div class="mb-3">
					<h6>Telefono</h6>
					<div class="input-group">
						<p class="info"> 0123456789 </p>
					</div>
				</div>
				<div class="mb-3">
					<h6>Indirizzo</h6>
					<p class="info"> Via abc 12 </p>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3">
						<h6>Provincia</h6>
						<p class="info"> Mantova </p>
					</div>
					<div class="col-md-5 mb-3">
						<h6>Citta</h6>
						<p class="info"> Dosolo </p>
					</div>
					<div class="col-md-3 mb-3">
						<h6>CAP</h6>
						<p class="info"> 46030 </p>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-6 mb-3">
						<h6>P.IVA</h6>
						<p class="info"> 012345678923344 </p>
					</div>
					<div class="col-md-6 mb-3">
						<h6>Codice fiscale </h6>
						<p class="info"> MRRSS76H23P </p>
					</div>
				</div>
            
                <hr class="mb-4">
                <div class="custom-control custom-radio">
                    <input id="same-address" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" onclick="ability_disability()" >
                    <label class="custom-control-label" for="same-address">Spedizione all'indirizzo di fatturazione</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="other-address" name="paymentMethod" type="radio" class="custom-control-input" required="" onclick="ability_disability()">
                    <label class="custom-control-label" for="other-address">Spedizione ad un altro indirizzo</label>
                </div>
                <div class="mb-3">
                    <label for="indirizzo">Indirizzo destinatario:</label>
                    <input class="form-control" id="other-destination" name="other-destination" required="true" type="text" disabled>
                </div>  
                <hr class="mb-4">

                <h4 class="mb-3">Pagamento</h4>

                <div class="d-block my-3">
                    <p class="info" >Bonifico bancario: <br>IBAN: IT 12 T	12345 12345	123456789012</p>
                </div>
                <hr class="mb-4">
                <button id="checkout" class="btn btn-primary btn-lg btn-block" type="submit">Invia l'ordine</button>
            </form>
        </div>
    </div>
	  
	<script>
		function ability_disability(){
			if(document.getElementById('other-address').checked){
				document.getElementById('other-destination').disabled = false;	
			}
			else{
				document.getElementById('other-destination').disabled = true;	
			}
		}
        
	</script>  
__END__;
  return  ($content);
}
echo main();
