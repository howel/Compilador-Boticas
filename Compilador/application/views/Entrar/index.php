<html>
	<head>
		<meta charset="UTF-8">
		<title>Compilador</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0 ">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Librerias/plugins/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Pagina/css/estilos.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Pagina/css/ejemplo1.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Pagina/css/stylelogin.css">

		<script type="text/javascript">
			function Validar(obj){
				if(obj.nombre.value==""){
					$('#nombre').focus();
					alert("Ingrese Nombre Usuario"); return 0;
				}
				if(obj.contra.value==""){
					$('#contra').focus();
					alert("Ingrese Contraseña Usuario"); return 0;
				}
				obj.submit();
			}
		</script>
	</head>
	<body background="<?php echo base_url();?>imagenes/fondo.png">
		<div class="container" id="Contenedor-1">
			<div style="height:5px;"></div>

			<!-- Para Logearse-->
		    <div class="modal-dialog modal-sm">
		    		<br><br><br><br><br>
		            <div class="modal-content">
		                <div class="modal-header">
		                    <h4 class="modal-title"><center><b> Login Usuario </b></center></h4>                       
		                </div>
		                <div class="modal-body">
		                    <form method="POST" class="form-horizontal" action="<?php echo base_url();?>Entrar/login" id="loginadmin">
								<div class="form-group">
								    <label class="col-md-4 control-label"><span class="glyphicon glyphicon-user" style="font-size:13px;"></span> User</label>
								    <div class="col-md-8">
									    <input type="text" class="form-control" name="nombre" id="nombre">
									</div>
								</div> 
								<div class="form-group">
								    <label class="col-md-4 control-label"><span class="glyphicon glyphicon-lock" style="font-size:13px;"></span> Clave</label>
								    <div class="col-md-8">
								       <input type="password" class="form-control" name="contra" id="contra">
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-md-12">
								        <center>
								       		<button type="button" class="btn btn-success" onclick="Validar(this.form);">
								    		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
								    		<button type="button" data-dismiss="modal" class="btn btn-danger">
								    		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cancelar</button>
								    	</center>
								    </div>
								</div> 
							</form>
		                </div>
		            </div>
		    </div>
		</div>
		<script src="<?php base_url();?>Librerias/plugins/jquery/jquery.js"></script>
		<script src="<?php base_url();?>Librerias/plugins/bootstrap/bootstrap.min.js"></script>
		
		<script src="<?php base_url();?>Pagina/js/Hover.js"></script>
		<script src="<?php base_url();?>Pagina/js/Validar.js"></script>
	</body>
</htm>