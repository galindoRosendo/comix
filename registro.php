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
  <form id="login" action="reg.php" method="post">
    <p>Usuario:</p></label><input type="text" id="usr" name='usr' required="true">
    <p>Contraseña:</p></label><input type="password" id="pwd" name="pwd" required="true">
    <p>Edad:</p></label><input type="text" id="edad" name='edad' required="true">
    
    <input type="submit" value="Enviar">
  </form>
  </div>

  <div data-role="footer" data-theme="b" data-position="fixed">
    <h1>¡Ya casi!</h1>
  </div> 
</div> 

</body>
</html>