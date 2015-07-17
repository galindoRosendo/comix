<?php include('com/head.php');?>
<div id="container">
	<div id="content">
		
			<form action="">
			<select name="operacion" id="cmbOperacion" onChange="ubicacion()">
				<option value="query">Consultar</option>
				<option value="insert">Pedir</option>
				<option value="update">Actualizar</option>
				<option value="delete">Eliminar</option>

			</select>
			</form>
		


		<form action="" id="consultar">
			<input type="text" placeholder="Nombre">
			<input type="text" placeholder="Comic">
			<input type="submit" value="Enviar">
		</form>
		<form action="" id="insert">
			<input type="text" placeholder="Nombre">
			<input type="text" placeholder="Comic">
			<input type="text" pleceholder="Cantidad">
			<input type="submit" value="Enviar">
		</form>
		<form action="" id="update">
			<input type="text" placeholder="Id del Pedido">
			<input type="text" placeholder="Nombre">
			<input type="text" placeholder="Comic">
			<input type="text" pleceholder="Cantidad">
			<input type="submit" value="Enviar">
		</form>
		<form action="" id="delete">
			<input type="text" placeholder="Id del pedido">
			<input type="text" placeholder="Nombre">
			<input type="submit" value="Enviar">
			
		</form>
	</div>
	<div id="panel">
		
	</div><!--panel-->
</div><!--container-->
<script>
		//$('#insert').hide();
		//$('#update').hide();
		//$('#delete').hide();

		function ubicacion(){
			   var opt = document.getElementById('cmbOperacion').value;
			if(opt=="query"){
				$('#query').slideUp(1000);
				$('#insert').hide();
				$('#updatea').hide();
				$('#delete').hide();

			}else if(opt=="insert"){
				$('#insert').slideUp(1000);
				$('#query').hide();
				$('#delete').hide();
				$('#update').hide();

			}else if(opt=="update"){
				$('#update').slideUp(1000);
				$('#insert').hide();
				$('#delete').hide();
				$('#query').hide();

			}else{
				$('#delete').slideUp(1000);
				$('#insert').hide();
				$('#update').hide();
				$('#query').hide();

			}

		}
</script>
<?php include('com/foot.php'); ?>