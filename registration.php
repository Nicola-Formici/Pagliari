<?php
include_once './lib/lib.php';

function main(){	
	// wrapping con contentuto rimanente
	$content = <<<__end__
	
	<div class="container" id="div_registration">
			<div class="row">
				<div class="col-12 col-lg-04 ">
					<h2> Registrazione </h2>
					<hr class="mb-4">
					<form  class="needs-validation" id="registration" method="get" action=""> 
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="firstname">Nome</label>
										<input class="form-control" id="firstname" name="firstname" type="text">
									</div>
									<div class="col-md-6 mb-3">
										<label for="lastname">Cognome</label>
										<input class="form-control" id="lastname" name="lastname" type="text">
									</div>
								</div>
								<div class="mb-3">
									<label for="username">Indirizzo Email</label>
									<div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text">@</span>
										</div>
										<input class="form-control" id="email" name="email" type="email">
									</div>
								</div>
								<div class="mb-3">
									<label for="username">Telefono</label>
									<div class="input-group">
										<input class="form-control" id="telephone" name="telephone" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="password">Password</label>
										<input class="form-control" id="password" name="password" type="password">
									</div>
									<div class="col-md-6 mb-3">
										<label for="confirm_password">Conferma password</label>
										<input class="form-control" id="confirm_password" name="confirm_password" type="password">
									</div>
								</div>
								<div class="mb-3">
									<label for="indirizzo">Indirizzo</label>
									<input class="form-control" id="indirizzo" name="indirizzo" type="text">
								</div>
								<div class="row">
									<div class="col-md-4 mb-3">
										<label for="state">Provincia:&emsp;</label>
										<select id="provincia" name="provincia" required>
											<option value="">Seleziona</option>
											<option>Mantova</option>
										</select>
									</div>
									<div class="col-md-5 mb-3">
										<label for="country">Citta:&emsp;</label>
										<select id="citta" name="citta" required>
											<option value="">Seleziona</option>
											<option>Casaletto</option>
										</select>
									</div>
									<div class="col-md-3 mb-3">
										<label for="cap">CAP</label>
										<input class="form-control" type="text" id="cap" name="cap" placeholder="" required>
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
									<div class="custom-control custom-radio">
										<input id="choose-piva" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" onclick="ability_disability()" >
										<label class="custom-control-label" for="choose-piva">Inserisci p.iva</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="choose-cod-fiscale" name="paymentMethod" type="radio" class="custom-control-input" required="" onclick="ability_disability()">
										<label class="custom-control-label" for="choose-cod-fiscale">Inserisci codice fiscale</label>
									</div>
								</div>
								<div class="row">	
									<div class="col-md-6 mb-3">
										<label for="username">P.IVA</label>
										<div class="input-group">
											<input class="form-control" type="text"  id="piva" name="piva" placeholder="" required>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="username">Codice fiscale </label>
										<div class="input-group">
											<input class="form-control" type="text"  id="cod_fiscale" name="cod_fiscale" placeholder="" required disabled>
										</div>
									</div>
								</div>
								<input id="button_registration" class="btn btn-primary btn-lg btn-block" type="submit" value="Iscriviti" onclick="data_registration()">
					</form>
				</div>
			</div>
		</div>		

		<script>
            function check() {
                var validator = $( "#registration" ).validate();
                return validator.form();        
            }
            
            
			function ability_disability(){
				if(document.getElementById('choose-piva').checked){
					document.getElementById('piva').disabled = false;
					document.getElementById('cod_fiscale').disabled = true;					
				}
				else{
					document.getElementById('piva').disabled = true;
					document.getElementById('cod_fiscale').disabled = false;		
				}
			}
                
            function data_registration(){
                if(check()){
                    var name= document.getElementById("firstname").value;
                    console.log(name);
                    var surname= document.getElementById("lastname").value;
                    console.log(surname);
                    var email= document.getElementById("email").value;
                    console.log(email);
                    var tel= document.getElementById("telephone").value;
                    console.log(tel);
                    var psw= document.getElementById("password").value;
                    console.log(psw);
                    var address= document.getElementById("indirizzo").value;
                    console.log(address);
                    var prov= document.getElementById("provincia").value;
                    console.log(prov);
                    var city= document.getElementById("citta").value;
                    console.log(city);
                    var cap= document.getElementById("cap").value;
                    console.log(cap);
                    if(document.getElementById('choose-piva').checked){
                        var piva= document.getElementById("piva").value;
                        console.log(piva);
                        registration(name,surname,email,tel,psw,address,prov,city,cap,piva,null);
                    }
                    else{
                        var cod_fiscale= document.getElementById("cod_fiscale").value;
                        console.log(cod_fiscale);
                        registration(name,surname,email,tel,psw,address,prov,city,cap,cod_fiscale,null);
                    }  
                }           
            }            
                
			$.validator.setDefaults({
				submitHandler: function() {
					console.log("Registrazione avvenuta con successo")
				}
			});

			$().ready(function() {
				// validate signup form on keyup and submit
				$("#registration").validate({
					rules: {
						firstname: {
							required: true,
							lettersonly: true
						},
						lastname: {
							required: true,
							lettersonly: true
						},
						indirizzo: "required",
						password: {
							required: true,
							minlength: 5
						},
						confirm_password: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						email: {
							required: true,
							email: true
						},
						cod_fiscale: "required",
						telephone: {
							required: true,
							digits: true
						},
						provincia: "required",
						citta: "required",
						cap: {
							required: true,
							digits: true
						},
						piva:{
							required: true,
							digits: true
						}
					},
					messages: {
						firstname:{
							required: "Inserisci nome",
							lettersonly: "Puoi usare solo lettere",
						},
						lastname:{
							required: "Inserisci cognome",
							lettersonly: "Puoi usare solo lettere",
						},
						indirizzo: "Inserisci indirizzo",
						password: {
							required: "Inserisci password",
							minlength: "La password deve essere almeno di 5 caratteri"
						},
						confirm_password: {
							required: "Reinserisci password",
							minlength: "La password deve essere almeno di 5 caratteri",
							equalTo: "Inserisci la stessa password"
						},
						cod_fiscale: "Inserisci il codice fiscale",
						email: "inserisci email",
						telephone:{
							required: "Inserisci numero di telefono",
							digits: "Inserisci solo numeri"
						},
						provincia: "Scegli provincia",
						citta: "Scegli città",
						cap:{
							required: "Inserisci cap",
							digits: "inserisci solo numeri"
						},
						piva: {
							required: "Inserisci p.iva",
							digits: "inserisci solo numeri"
						}
					}
				});	
			});
			
		</script>
__end__;
	return layout($content, $title="", "");
}
			
echo main();		
?>