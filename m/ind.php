<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>

</head>
<body>

<div data-role="page" id="pageone">
  
  <div data-role="header" data-theme="b" data-position="fixed">
    <h1>Comix</h1>
     <a href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">+</a>
  </div>
  
 <?php
 session_start();
include("lib/nusoap.php");
$id= $_GET['id'];
$param = array('idcomic' => $id);
$objClienteSOAP = new nusoap_client('http://portalcomix.somee.com/webservice.asmx?WSDL','wsdl');
$objRespuesta = $objClienteSOAP->call('paginas',$param);

$result = obj2array($objRespuesta);


$noticias=$result['paginasResult']['comic_paginas'];
$n=count($noticias);

echo "<div data-role='panel' id='myPanel'> 
  <ul data-role='listview' >
  <li><a href='inicio.php' rel='external'>Inicio</a></li>";

for($i=0; $i<$n; $i++){
    $noticia=$noticias[$i];
    $j=$i+1;
echo "<li><a href='".$noticia['pagina']."' rel='external'>Pagina:".$j."</a></li>";

}

echo "</ul>
  </div> ";

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
<div data-role="main" class="ui-content">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

<?php 
for($i=0; $i<$n; $i++){
    $noticia=$noticias[$i];

if($i==0){
echo "<div class='item active'>
        <img src='".$noticia['pagina']."'  width='460' height='345'>
      </div>";
}else{

    echo "<div class='item'>
        <img src='".$noticia['pagina']."'  width='460' height='345'>
      </div>";
}
}

?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>

  <div data-role="footer" data-theme="b" data-position="fixed">
        <h1><?php echo $_SESSION["usuario"]; ?></h1>
  </div> 
</div> 

</body>
</html>

