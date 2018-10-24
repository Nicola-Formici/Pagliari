<?php
include_once './lib/lib.php';
function main(){
	return layout(content(), $title="", "" );
}

function content(){
    $content = <<<__END__
        <div id="check_body" class="container" style="margin-bottom:5%;">
            <div class="py-5 text-center">
                Logo
                <h2>Invio dell'ordine </h2>
                <p>Gentile cliente, ti chiediamo di controllare che i tuoi dati siano inseriti correttamente e di specificare l'indirizzo alla quale inviare l'ordine. Una volta ricevuto il bonifico la merce verrà spedita all'indirizzo indicato.<p>
            </div>
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Il tuo carrello</span>
                    </h4>
                    <ul id="cart" class="list-group mb-3">
                        
                    </ul>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Indirizzo Di Fatturazione</h4>
                    <hr class="mb-4">
                    <form class="needs-validation" id="review" action="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h6>Nome</h6>
                                <p class="info"> Mario </p>
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
                        <input id="checkout" class="btn btn-primary btn-lg btn-block" type="submit" value="Invia l'ordine">
                    </form>
                </div>
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
            
            function check() {
                var validator = $("#review").validate();
                return validator.form();        
            }
            
            cart_page(page=1, print_cart);
                                                   
            function print_cart(msg,data){ 
                console.log(msg);
                console.log(data);
                console.log(data.rows.length);
                
                content="";
                    
                for(index=0;index<data.rows.length;index++){    
                    var id= data.rows[index].codice;
                    var nome= data.rows[index].nome;                             
                    var sub= 0;
                       
                    content +='<li class="list-group-item d-flex justify-content-between lh-condensed">'
                        content +='<div>'
                            content +='<h6 class="my-0">'+nome+'</h6>'
                        content +='</div>'
                        content +=' <span class="text-muted">'+sub+'€</span>'
                    content +='</li>'                                              
                }
                content +='<li class="list-group-item d-flex justify-content-between">'
                    content +='<span>Totale:</span>'
                    content +='<strong>'+data.total+'€</strong>'       
                content +='</li>'                

                document.getElementById("cart").innerHTML = content;              
            }  
            
            var check_success="";
            var check_fail="";    
           
            $("#checkout").click(function(){
                    if(check()){  
                        var dati = $("#review").serialize(); //recupera tutti i valori del form automaticamente
                        $.ajax({
                            type: "POST",
                            url: "http://test07.dmsweb.it/__ajax__.php?action=form_checkout",
                            data: dati,
                            dataType: "html",
                            success: function(msg){
                                console.log(msg);
                                show_div('add','success','Ordine inviato con successo');
                                check_success = document.getElementById('success');
                                check_success.style.display ='block';    
                            },
                            error: function(){
                                show_div('remove','fail','Invio ordine fallito <br> Le consigliamo di riprovare');
                                check_fail = document.getElementById('fail');
                                check_fail.style.display = "block";   
                            }
                        });//ajax
                        event.preventDefault();
                    }
            });//bottone click
            
            function show_div(p_class , div_id , msg){
                str='';
                str+='<div id="'+div_id+'" class="modal">';
                    str+='<div class="modal-content">';
                        str+='<center class="popup">';
                            str+='<p class="'+p_class+'">'+msg+'</p>';
                            if(div_id== 'success'){
                                str+='<a id="button_acces" class="btn btn-primary btn-lg btn-block" href="./index.php">Torna alla pagina <br> acquisti</a>';
                            }
                        str+='</center>';
                    str+='</div>';
                str+='</div>';

                document.getElementById("check_body").innerHTML = str;
            }             

            window.onclick = function(event) {
                console.log("CLICK");
                if (event.target == check_success) {
                    check_success.style.display = "none";
                }
            }
            
            window.onclick = function(event) {
                if (event.target == check_fail) {
                    check_fail.style.display = "none";
                }
            }
        </script>  
__END__;
  return  ($content);
}
echo main();