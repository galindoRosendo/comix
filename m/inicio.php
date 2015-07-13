<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="panel" id="myPanel"> 
  <ul data-role="listview" >
  	<li><a href="comix.php" rel="external">Favoritos</a></li>
  	<li><a href="recom.php" rel="external">Recomendados</a></li>
    <li><a href="index.html" rel="external">Cerrar Sesion</a></li>
  </ul>
  </div> 
  <div data-role="header" data-theme="b" data-position="fixed">
    <h1>Comix</h1>
     <a href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">+</a>
 
  </div>

  <div data-role="main" class="ui-content">
     <?php
     session_start();
include("lib/nusoap.php");
$objClienteSOAP = new soapclient('http://portalcomix.somee.com/webservice.asmx?WSDL');
$objRespuesta = $objClienteSOAP->comics();
$result = obj2array($objRespuesta);


$noticias=$result['comicsResult']['comic'];
$n=count($noticias);


//procesamos el resultado como con cualquier otro array
for($i=0; $i<$n; $i++){
    $noticia=$noticias[$i];
    $j=$i+1;
echo "<table style='width:100%' >
    <tr>
    <td width=100 HEIGHT=100>
    <a href='ind.php?id=$j'><img src='".$noticia['portada']."' WIDTH=100% HEIGHT=100% /></a>
    </td>
    <td>
    <table style='width:100%' >
    <tr> <td>Titulo: ".$noticia['nombre']."</td></tr>
    <tr><td>Editorial: ".$noticia['editorial']."</td></tr>
    <tr><td>Paginas: ".$noticia['num_pagina']."</td></tr>
    </table>
</td>
    </tr>
    </table><br>";

   
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
   
  </div>

  <div data-theme="b" data-role="footer" data-position="fixed">
    <h1><?php echo $_SESSION["usuario"]; ?></h1>
  </div> 
</div> 

</body>
</html>