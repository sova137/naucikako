
var telephone = function($telephoneString){

    $telephone = $telephoneString.replace(/[^0-9\s]/gi, '').replace(/[_\s]/g,'');

    return $telephone;
}