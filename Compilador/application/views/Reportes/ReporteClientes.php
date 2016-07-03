<body>
	<script src="<?php echo base_url();?>Librerias/JavaScript/ValidarReporte.js"></script>
	<div class="container" style="width:100%;"> <br>
		<div class="row">
			<div class="col-md-3">
				<img src="<?php echo base_url();?>imagenes/unsm.png" height="80" width="100">
			</div>
			<div class="col-md-7">
				<br><center><h5 style="font-size:15px;"><b> Buscar Cliente </b></h5></center>
			</div>
			<div class="col-md-2">
				<img src="<?php echo base_url();?>imagenes/fisi.png" height="80" width="100">
			</div>
		</div><br>
		<div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div> <br>

		<div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div> <br>
			<div class="form-group">
				<label class="col-md-1 control-label"></label>
				<label class="col-md-2 control-label">Tipo de Busqueda</label>
				<div class="col-sm-2">
					<select id="tipobusqueda" name="tipobusqueda" class="form-control" data-toggle="popover" 
						data-placement="bottom" data-content="Seleccione Tipo">
						<option value="tipobusqueda">Buscar por</option>
						<option value="nombre">Nombre</option>
						<option value="dnicliente">DNI</option>
					</select>
				</div>

				<div class="col-sm-3">
					<input type="text" class="form-control"  id="parametro" 
						 data-toggle="popover" data-placement="bottom" data-content="Ingrese Parametro" maxlength="8">				
				</div>

				<div class="col-md-1">
					<button type="button"  id="enviar" class="btn btn-success btn-xs" >
				   	<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar </button> 
				</div>
			</div>

		<table class="table table-hover table-condensed" id="tablaclientes">
			<thead>
				<tr>
					<th bgcolor="#0C9DB7"><center> Nro </center></th>
					<th bgcolor="#0C9DB7"><center> DNI </center></th>
					<th bgcolor="#0C9DB7"><center> Cliente </center></th>
					<th bgcolor="#0C9DB7"><center> Direccion </center></th>
					<th bgcolor="#0C9DB7"><center> Celular </center></th>
					<th bgcolor="#0C9DB7"><center> Sexo </center></th>
					<th bgcolor="#0C9DB7"><center> Empresa </center></th>
				</tr>
			</thead>
			<tbody id="tbodyusuarios" >

			</tbody>
		</table><br><br>
		<div class="row">
			<div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div> <br>
			<div class="col-md-12">
				<center><button  id="reporte"  target="_blank" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-print"></span> Imprimir</button></center>
			</div>
		</div>
	</div>

<style type="text/css">
	#tablaclientes{
		width: 100%;
		border:1px solid #D8D8D8;
		border-collapse: collapse;
		margin:auto;
	}
	#tablaclientes th{
		border:1px solid #000000;
		padding:5px 10px;
		font-size: 13px;
		text-align: center; 
	}
	#tablaclientes td{
		border:1px solid #0C9DB7;
		padding-top:2px;
		padding-bottom: 0px!important;
		font-size: 13px;
		text-align: center; 
	}
	label{
		font-size: 13px;
	}
</style>