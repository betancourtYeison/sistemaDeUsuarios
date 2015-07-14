<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<title>MODULO EDITAR PERFIL</title>	
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />	
		<script src="../../js/jquery-1.8.2.js"></script>		
		<script src="../../js/bootstrap-modal.js"></script>
		<script src="../../js/bootstrap-transition.js"></script>
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />			
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
		
		
		<link rel="stylesheet" href="../../css/colorpicker.css" type="text/css" />
    	<link rel="stylesheet" media="screen" type="text/css" href="../../css/layout.css" />
		<script type="text/javascript" src="../../js/colorpicker.js"></script>
	    <script type="text/javascript" src="../../js/eye.js"></script>
	    <script type="text/javascript" src="../../js/utils.js"></script>
	    <script type="text/javascript" src="../../js/layout.js?ver=1.0.2"></script>
	    
	</head>	
	
	<body>	
	<div class="container">		
			<div class ="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='cabecera'>
				<?php
					include('../lib/barraUsuario.php');
				?>
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='menu'>
				<?php
					include('../lib/menu.php');
				?>	
			</div>	
			<div id='content'>
				<div class="page-header" align = "center">
					<image src='../../img/configuracion.png'>				
					<h2>MODULO ESTILOS</h2>			
				</div>
				
				<form action="cambiaEstilo.php" method="POST">
				
				<fieldset class="modificar">

					<legend >Cabecera</legend>	
						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Texto" id="co1" name="co1" onfocus="cambiar(this);" />
									
						<select name="tamCabecera" id="tamCabecera">
							<option value ='' selected>Tama&ntilde;o</option>
							<?php  
								for($i = 30; $i<= 50; $i++)
								{
									echo "<option value='".$i."'>".$i."</option>";
								}

							?>
						</select>

						<select name="tipoCabecera" id="tipoCabecera">
							<option value ='' selected>Tipo de Letra</option>
							<option value ='Arial'>Arial</option>
							<option value ='Comic Sans MS'>Comic Sans MS</option>
							<option value ='Blackadder ITC'>Blackadder ITC</option>
							<option value ='Bradley Hand ITC'>Bradley Hand ITC</option>
							<option value ='Tempus Sans ITC'>Tempus Sans ITC</option>
							<option value ='Times New Roman'>Times New Roman</option>
							<option value ='Verdana'>Verdana</option>
													
						</select>

						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Fondo" id="fo1" name="fo1" onfocus="cambiar(this);" />
				</fieldset >

				<fieldset class="modificar">
					
					<legend >Menu</legend>	
						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Texto" id="co2" name="co2" onfocus="cambiar(this);" />

						<select name="tamMenu" id="tamMenu">
							<option value ='' selected>Tama&ntilde;o</option>
							<?php  
								for($i = 15; $i<= 25; $i++)
								{
									echo "<option value='".$i."'>".$i."</option>";
								}

							?>
						</select>

						<select name="tipoMenu" id="tipoMenu">
							<option value ='' selected>Tipo de Letra</option>
							<option value ='Arial'>Arial</option>
							<option value ='Comic Sans MS'>Comic Sans MS</option>
							<option value ='Blackadder ITC'>Blackadder ITC</option>
							<option value ='Bradley Hand ITC'>Bradley Hand ITC</option>
							<option value ='Tempus Sans ITC'>Tempus Sans ITC</option>
							<option value ='Times New Roman'>Times New Roman</option>
							<option value ='Verdana'>Verdana</option>
													
						</select>

						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Fondo" id="fo2" name="fo2" onfocus="cambiar(this);" />
				</fieldset >

				<fieldset class="modificar">
					<legend>Titulo</legend>	
						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Texto" id="co5" name="co5" onfocus="cambiar(this);" />

						<select name="tamTitCuerpo" id="tamTitCuerpo">
							<option value ='' selected>Tama&ntilde;o</option>
							<?php  
								for($i = 55; $i<= 75; $i++)
								{
									echo "<option value='".$i."'>".$i."</option>";
								}

							?>
						</select>

						<select name="tipoTitCuerpo" id="tipoTitCuerpo">
							<option value ='' selected>Tipo de Letra</option>
							<option value ='Arial'>Arial</option>
							<option value ='Comic Sans MS'>Comic Sans MS</option>
							<option value ='Blackadder ITC'>Blackadder ITC</option>
							<option value ='Bradley Hand ITC'>Bradley Hand ITC</option>
							<option value ='Tempus Sans ITC'>Tempus Sans ITC</option>
							<option value ='Times New Roman'>Times New Roman</option>
							<option value ='Verdana'>Verdana</option>
													
						</select>

						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Fondo" id="fo5" name="fo5" onfocus="cambiar(this);" />
				</fieldset >

				<fieldset class="modificar">
					
					<legend >Cuerpo</legend>	
						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Texto" id="co3" name="co3" onfocus="cambiar(this);" />

						<select name="tamCuerpo" id="tamCuerpo">
							<option value ='' selected>Tama&ntilde;o</option>
							<?php  
								for($i = 30; $i<= 50; $i++)
								{
									echo "<option value='".$i."'>".$i."</option>";
								}

							?>
						</select>

						<select name="tipoCuerpo" id="tipoCuerpo">
							<option value ='' selected>Tipo de Letra</option>
							<option value ='Arial'>Arial</option>
							<option value ='Comic Sans MS'>Comic Sans MS</option>
							<option value ='Blackadder ITC'>Blackadder ITC</option>
							<option value ='Bradley Hand ITC'>Bradley Hand ITC</option>
							<option value ='Tempus Sans ITC'>Tempus Sans ITC</option>
							<option value ='Times New Roman'>Times New Roman</option>
							<option value ='Verdana'>Verdana</option>
													
						</select>

						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Fondo" id="fo3" name="fo3" onfocus="cambiar(this);" />
				</fieldset >
				
				<fieldset class="modificar">
					
					<legend >Pie</legend>	
						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Texto" id="co4" name="co4" onfocus="cambiar(this);" />

						<select name="tamPie" id="tamPie">
							<option value ='' selected>Tama&ntilde;o</option>
							<?php  
								for($i = 9; $i<= 14; $i++)
								{
									echo "<option value='".$i."'>".$i."</option>";
								}

							?>
						</select>

						<select name="tipoPie" id="tipoPie">
							<option value ='' selected>Tipo de Letra</option>
							<option value ='Arial'>Arial</option>
							<option value ='Comic Sans MS'>Comic Sans MS</option>
							<option value ='Blackadder ITC'>Blackadder ITC</option>
							<option value ='Bradley Hand ITC'>Bradley Hand ITC</option>
							<option value ='Tempus Sans ITC'>Tempus Sans ITC</option>
							<option value ='Times New Roman'>Times New Roman</option>
							<option value ='Verdana'>Verdana</option>
													
						</select>

						<input type="text" maxlength="6" size="6" class="cambia" placeholder="Color Fondo" id="fo4" name="fo4" onfocus="cambiar(this);" />
				</fieldset >

					<input type="submit" class = 'btn mibutton' value="Cambiar"/>
				</form>
		</div>
	</div>	
		<div id = "footer">
			<?php
				include('../lib/footer.php');
			?>	
		</div>	


		<script type="text/javascript">
		function cambiar(evento)
		{
			var id = evento.id;
			$("#"+id).ColorPicker({
		    	color: '#ffffff',
				onShow: function (colpkr) {
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$("#"+id).val('#' + hex);
					$("#"+id).css({background : '#' + hex});
				}			
		    });	
		}
	    
	    </script>

	<body>	
</html>
