<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

</head>
<body>

<div data-role="page" id="pageone" >
  
  <div data-role="header" data-theme="b" data-position="fixed">
    <h1>Comix</h1>
  </div>
  <div data-role="main" class="ui-content">
  
   <?php 
include("lib/nusoap.php");
session_start();

$usr=$_POST['usr'];
$pwd=$_POST['pwd'];
$edad=$_POST['edad'];

$param = array('usr' => $usr,'pwd'=>$pwd,'edad'=>$edad);
$objClienteSOAP = new nusoap_client('http://portalcomix.somee.com/webservice.asmx?WSDL','wsdl');
$objRespuesta = $objClienteSOAP->call('registro',$param);
$result = obj2array($objRespuesta);
$noticias=$result['registroResult'];

echo "<br>";
echo $noticias;
echo "<br><br> <a href='index.html'>Iniciar Sesion</a>";


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

  </div>

  <div data-role="footer" data-theme="b" data-position="fixed">
    <h1>¡Bienvenido!</h1>
  </div> 
</div> 

</body>
</html>
