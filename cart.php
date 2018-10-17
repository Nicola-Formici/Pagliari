<?php
include_once './lib/lib.php';
function main(){
	return layout(content(), $title="", "");
}

function content(){
	return <<<__END__
                    <div class="container" id="div_cart">
                        <table id="rows_contairen" class="table table-hover table-condensed">
   
                        </table>
                    </div>
                   
                   <script>                    
                        cart_page(page=1, print_cart);
                                               
                        function print_cart(msg,data){ 
                            console.log(msg);
                            console.log(data);
                            console.log(data.rows.length);
                            
                            if(data.rows.length==0){
                                document.getElementById("rows_contairen").innerHTML = '<p>Nessun articolo presente</p>';
                            }
                            else{
                                content="";
                                    content +='<thead>'
                                        content +='<tr >'
                                            content +='<td></td>'
                                            content +='<td colspan="2"> <b>Prodotto</b></td>'
                                            content +='<td> <b>Prezzo</b></td>'
                                            content +='<td><b> <b>Quantità</b></td>'
                                            content +='<td class="text-center"> <b>Subtotal</b></td>'
                                            content +='<td></td>'
                                        content +='</tr>'
                                    content +='</thead>'
                                    content +='<tbody>'
                                    for(index=0;index<data.rows.length;index++){
                                           
                                        var id= data.rows[index].codice;
                                        var nome= data.rows[index].nome;            
                                        var immagine= data.rows[index].imgs[0];
                                        var prezzo= 0;
                                        var quantita= data.rows[index].binner;
                                        var sub= 0;
                                        
                                            content +='<tr>'
                                                content +='<td  data-th="Product">'
                                                    content +='<a class="img_card" href="item_detail.php?Id='+id+'"><img  class="img-responsive" src="'+immagine+'"></a>'
                                                content +='</td>'
                                                content +='<td colspan="2">'
                                                    content +='<h4 class="nomargin">'+nome+'</h4>'  
                                                content +='</td>'
                                                content +='<td data-th="Price">'+prezzo+'€</td>'
                                                content +='<td data-th="Quantity">'
                                                    content +='<div>'
                                                        content +='<input  type="number" name="quantita'+id+'" value="'+quantita+'" step="1" min="1" style="width:100%;">'
                                                    content +='</div>'
                                                content +='</td>'
                                                content +='<td data-th="Subtotal" class="text-center">'+sub+'€</td>'
                                                content +='<td class="actions" data-th="">'
                                                    content +='<button class="btn btn btn-sm" onclick="add(&quot;'+id+'&quot;)"><i class="far fa-edit"></i></button>&emsp;'
                                                    content +='<button class="btn btn-danger btn-sm" onclick="remuve(&quot;'+id+'&quot;)"><i class="far fa-trash-alt"></i></button>'
                                                content +='</td>'
                                            content +='</tr>' 
                                    }
                                    content +='</tbody>'
                                    content +='<tfoot>'
                                        content +='<tr>'    
                                            content +='<td style="padding-top:3%;"><a href="./index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continua ad acquistare</a></td>'
                                            content +='<td colspan="4" class="hidden-xs"></td>'
                                            content +='<td class="hidden-x text-center" style="padding-top:3%;"><strong>Total:'+data.total+'€</strong></td>'
                                            content +='<td style="padding-top:3%;"><a href="checkout.php" class="btn btn-success btn-block">Procedi al pagamento <i class="fa fa-angle-right"></i></a></td>'
                                        content +='</tr>'
                                    content +='</tfoot>'
                                    
                                    document.getElementById("rows_contairen").innerHTML = content;
                            }
                        }

                        function remuve(item_id){
                            console.log(item_id);
                            cart_remove(item_id, null);
                            location.reload();
                        }

                        function add(item_id){
                            var nameValue= "quantita"+item_id;   
                            console.log(nameValue);
                            var quantity = $("input[type=number][name="+nameValue+"]").val();

                            console.log(quantity);
                            cart_add(item_id, quantity, null);                    
                        }
                    </script>
__END__;
}
echo main();