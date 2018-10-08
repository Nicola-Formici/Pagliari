// TS client
// cd /var/www/pagliari/js
// tsc json.ts
//
//------------------------------------------------------------------------------
// DEPS
//------------------------------------------------------------------------------
var UI = /** @class */ (function () {
    function UI() {
    }
    UI.alert = function (msg) {
        alert(msg);
    };
    return UI;
}());
function coalesce() {
    var rest = [];
    for (var _i = 0; _i < arguments.length; _i++) {
        rest[_i] = arguments[_i];
    }
    if (rest.length) {
        for (var _a = 0, rest_1 = rest; _a < rest_1.length; _a++) {
            var v = rest_1[_a];
            if (0 === v || v) {
                return v;
            }
        }
    }
    return null;
}
// sprintf('{1} {2}', 'a', 'b');
function sprintf(fmt) {
    var args = [];
    for (var _i = 1; _i < arguments.length; _i++) {
        args[_i - 1] = arguments[_i];
    }
    var formatted = fmt;
    for (var i = 1; i < arguments.length; i++) {
        var regexp = new RegExp('\\{' + i + '\\}', 'gi');
        formatted = formatted.replace(regexp, arguments[i]);
    }
    return formatted;
}
function tmpl(fmt, args) {
    var formatted = fmt;
    for (var _i = 0, _a = Object.keys(args); _i < _a.length; _i++) {
        var key = _a[_i];
        var val = args[key];
        // console.log(key+'='+val);
        var regexp = new RegExp('\\{' + key + '\\}', 'gi');
        formatted = formatted.replace(regexp, val);
    }
    return formatted;
}
function empty(mixedVar) {
    var undef;
    var key;
    var i;
    var len;
    var emptyValues = [undef, null, false, 0, '', '0'];
    for (i = 0, len = emptyValues.length; i < len; i++) {
        if (mixedVar === emptyValues[i]) {
            return true;
        }
    }
    if (typeof mixedVar === 'object') {
        for (key in mixedVar) {
            if (mixedVar.hasOwnProperty(key)) {
                return false;
            }
        }
        return true;
    }
    return false;
}
//------------------------------------------------------------------------------
// gestione unificata del formato di risposta del server
// @see DMS_JSON::respond()
//------------------------------------------------------------------------------
var RR_OK = "ok";
var RR_KO = "ko";
// handle ajax parse error
function ajax_on_error(req, status, err) {
    console.log('ajax error:', status, err);
    if (status == 'parsererror') {
        UI.alert('Richiesta terminata con errore di parsing. Provare a riloggarsi.');
    }
    else {
        UI.alert('Errore:' + err + ' status:' + status);
    }
}
var AJAX_DEBUG = false;
// funzione globale per stabilire se la risposta del server è andata in errore
function ajax_is_error(response) {
    if (typeof response == 'undefined' || empty(response)) {
        console.log(sprintf('AJAX response empty: {1}', JSON.stringify(response)));
        return true; // è errata
    }
    if (typeof response.response === 'undefined' || response.response == RR_KO) {
        console.log(sprintf('AJAX response error: {1}', JSON.stringify(response)));
        return true; // è errata
    }
    if (AJAX_DEBUG) {
        console.log(sprintf('AJAX OK: {1}', JSON.stringify(response)));
    }
    return false; // è corretta
}
function ajax_is_ok(response) {
    return !ajax_is_error(response);
}
// uso:
// ajax_get( url,
//     // server error
//     function (msg:string){
//         UI.alert( ' errore:' + msg );
//     },
//     // sever success, got data
//     function(msg:string, data:Object){
//         // ... do with data
//     });
//
function ajax_get(url, on_req_error, on_req_success, cb_context) {
    if (cb_context === void 0) { cb_context = null; }
    var settings = {
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (resp) {
            var msg = coalesce(resp.msg, '');
            if (ajax_is_error(resp)) {
                on_req_error.call(null, msg);
            }
            else {
                var data = coalesce(resp.data, null);
                on_req_success.call(null, msg, data);
            }
        },
        error: ajax_on_error
    };
    return $.ajax(settings);
}
//uso:
// ajax_post( url,
//     param_data,
//     // server error
//     function (msg:string){
//         UI.alert( ' errore:' + msg );
//     },
//     // sever success, got data
//     function(msg:string, data:Object){
//         // ... do with data
//     });
function ajax_post(url, prams_data, on_req_error, on_req_success, cb_context) {
    if (cb_context === void 0) { cb_context = null; }
    return $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: prams_data,
        success: function (resp) {
            var msg = coalesce(resp.msg, '');
            if (ajax_is_error(resp)) {
                on_req_error.call(null, msg);
            }
            else {
                var data = coalesce(resp.data, null);
                on_req_success.call(null, msg, data);
            }
        },
        error: ajax_on_error
    });
}
