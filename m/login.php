<?php 
include("lib/nusoap.php");
session_start();

$usr=$_POST['usr'];
$pwd=$_POST['pwd'];

$param = array('usr' => $usr,'pwd'=>$pwd);
$objClienteSOAP = new nusoap_client('http://portalcomix.somee.com/webservice.asmx?WSDL','wsdl');
$objRespuesta = $objClienteSOAP->call('login',$param);
$result = obj2array($objRespuesta);
$noticias=$result['loginResult'];

$_SESSION["usuario"]=$noticias;
if($noticias=="false"){
header('Location: m/index.html');
}else{
	header('Location: m/inicio.php');
}

function obj2array($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array($val);
         break;
      case is_array($val):
         $out[$key] = obj2array($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}

?>