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

function add(item_id){  
    console.log(item_id);
    var nameValue= 'quantita'+item_id;
    console.log(nameValue);
    var quantity = $("input[type=number][name="+nameValue+"]").val();
    console.log(quantity);
    cart_add(item_id, quantity, null);
                        
    show_message('success',"Aggiunto al carrello.");
    
    document.getElementById('add_'+item_id).disabled = true;
    document.getElementById('remove_'+item_id).disabled = false;
}

function remove(item_id){
    console.log(item_id);
    cart_remove(item_id, null );
 
    show_message('warning',"Rimosso dal carrello.");
    
    document.getElementById('add_'+item_id).disabled = false;                          
    document.getElementById('remove_'+item_id).disabled = true;
}

function show_message(type, msg){
    $.notify(msg,type,"center");
}

