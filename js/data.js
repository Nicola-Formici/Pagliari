/*
on_success = function(msg,data){ 
            console.log(msg);console.log(data); 
};
*/

function cart_add(item_id, quantity, on_success){
    return ajax_get('__ajax__.php?a=cart_add&article_id='+item_id+'&qta='+quantity, 
        function(err){console.log(err)}, 
        function(msg,data){ console.log(msg);console.log(data);}
    );    
}

function cart_remove(item_id, on_success){
    return ajax_get('__ajax__.php?action=cart_remove&article_id='+item_id, 
        function(err){console.log(err)}, 
        function(msg,data){ console.log(msg);console.log(data); }
    );
}

function cart_page(page, on_success) {
    return ajax_get('__ajax__.php?a=cart_page', 
        function(err){console.log(err)},
        on_success
    );
}

function registration(name,surname,email,tel,psw,address,prov,city,cap,cod_fiscale,on_success) {
    return ajax_get('__ajax__.php?a=form_registrazione', /*da finire*/
        function(err){console.log(err)},
        function(msg,data){ console.log(msg);console.log(data); }
    );
}

function item_page(page, on_success) {
    return ajax_get('__ajax__.php?a=item_page&page='+page,
        function(err){console.log(err)},
        on_success
    );
}

function item_details(id, on_success) {
    return ajax_get('__ajax__.php?action=item_detail&code='+id,
        function(err){console.log(err)},
        on_success
    );
}