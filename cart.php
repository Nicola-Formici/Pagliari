<?php
include_once './lib/lib.php';
function main(){
	return layout(content(), $title="", "");
}

function content(){
	return <<<__END__
                    <div class="container" id="div_cart">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr >
                                    <td></td>
                                    <td colspan="2"> <b>Prodotto</b></td>
                                    <td> <b>Prezzo</b></td>
                                    <td><b> <b>Quantità</b></td>
                                    <td class="text-center"> <b>Subtotal</b></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody id="rows_contairen">
                             
                            </tbody>
                            <tfoot >
                                <tr>    
                                    <td style="padding-top:3%;"><a href="./index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continua ad acquistare</a></td>
                                    <td colspan="4" class="hidden-xs"></td>
                                    <td class="hidden-x text-center" style="padding-top:3%;"><strong id="totale">Total: </strong></td>
                                    <td style="padding-top:3%;"><a href="checkout.php" class="btn btn-success btn-block">Procedi al pagamento <i class="fa fa-angle-right"></i></a></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                   
                   <script>
                        
                        cart_page(page=1, print_cart);
                                               
                        function print_cart(msg,data){ 
                            console.log(msg);
                            console.log(data);
                            console.log(data.rows.length);
                            
                            for(index=0;index<data.rows.length;index++){
                            
                                var linea= data.rows[index].row_id;
                                var id= data.rows[index].article_id;
                                var nome= data.rows[index].name;
                                var descrizione= data.rows[index].description;              
                                var immagine= data.rows[index].img;
                                var prezzo= data.rows[index].price;
                                var quantita= data.rows[index].qta;
                                var sub= data.rows[index].subtotal;
                           
                                content="";
                                content +='<tr>'
                                    content +='<td  data-th="Product">'
                                        content +='<a href="item_detail.php"><img src="'+immagine+'" alt="" class="img-responsive"/></a>'
                                    content +='</td>'
                                    content +='<td colspan="2">'
                                        content +='<h4 class="nomargin">'+nome+'</h4>'
                                        content +='<p>'+descrizione+'</p>'
                                    content +='</td>'
                                    content +='<td data-th="Price">'+prezzo+'€</td>'
                                    content +='<td data-th="Quantity">'
                                        content +='<div>'
                                            content +='<input  type="number" name="quantita'+id+'" value="'+quantita+'" step="1" min="1" onchange="add('+id+')" style="width:100%;">'
                                        content +='</div>'
                                    content +='</td>'
                                    content +='<td data-th="Subtotal" class="text-center">'+sub+'€</td>'
                                    content +='<td class="actions" data-th="">'
                                        content +='<button class="btn btn-danger btn-sm" onclick="remuve('+id+')"><i class="far fa-trash-alt"></i></button>'
                                    content +='</td>'
                                content +='</tr>'
                                
                                document.getElementById("rows_contairen").innerHTML += content;
                                
                            }
                                document.getElementById("totale").innerHTML +=data.total ;
                        }

                        function remuve(item_id){
                            cart_remove(item_id, null );
                            window.location.reload();
                        }
                        
                        function add(item_id){
                            var nameValue= "quantita"+item_id;   
                            console.log(nameValue);
                            var quantity = $("input[type=number][name="+nameValue+"]").val();

                            console.log(quantity);
                            cart_add(item_id, quantity, null);
                            window.location.reload();
                        }
                    </script>
__END__;
}
echo main();