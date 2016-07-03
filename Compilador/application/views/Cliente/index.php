<body>
	<script src="<?php echo base_url();?>Librerias/JavaScript/Validaciones.js"></script>
	<script src="<?php echo base_url();?>Librerias/JavaScript/ValidarCliente.js"></script>

	<div class="container" style="width:100%;">
		<center><h5 style="font-size:20px">Clientes</h5></center>
		<div style="width:100%; height:1px; background-color: #D8D8D8;"></div> <br>

		<form class="form-horizontal" id="ForCliente">
			<div class="tab-content">
				<input type="hidden" class="form-control" name="codcliente" id="codcliente" disabled="disabled">
				<div class="form-group">
                    <label class="col-sm-2 control-label">Nro DNI</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dni" id="dni" disabled="disabled" onkeypress="return Numeros(event)"
								maxlength="8" data-toggle="popover" data-placement="bottom" data-content="Ingrese DNI">				
					</div>
					<label class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-2">
						<select id="sexo" name="sexo" disabled="disabled" class="form-control" data-toggle="popover" 
						data-placement="bottom" data-content="Seleccione Sexo">
							<option value="sexo">Elegir...</option>
							<option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option>
						</select>
					</div>
					<label class="col-sm-1 control-label">Celular</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="celular" id="celular" disabled="disabled" onkeypress="return Numeros(event)"
							maxlength="9" data-toggle="popover" data-placement="bottom" data-content="Ingrese # Celular">
					</div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="nombre" id="nombre" disabled="disabled" onkeypress="return Letras(event)"
							maxlength="30" data-toggle="pomaxlength="8" over" data-placement="bottom" data-content="Ingrese Nombre">
					</div>
					<label class="col-sm-2 control-label">Ap. Paterno</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="apellidop" id="apellidop" disabled="disabled" onkeypress="return Letras(event)"
							maxlength="30" data-toggle="popover" data-placement="bottom" data-content="Ingrese Apellido">				
					</div>
					<label class="col-sm-1 control-label">Materno</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="apellidom" id="apellidom" disabled="disabled" onkeypress="return Letras(event)"
							maxlength="30" data-toggle="popover" data-placement="bottom" data-content="Ingrese Apellido">
					</div>
                </div>	

				<div class="form-group">
					<label class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="direccion" id="direccion" disabled="disabled" onkeypress="return NumerosLetras(event)"
							maxlength="35" data-toggle="popover" data-placement="bottom" data-content="Ingrese direccion">
					</div>
					<!--<label class="col-sm-1 control-label">Empresa</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="db" id="db" disabled="disabled" onkeypress="return Letras(event)"
							maxlength="35" data-toggle="popover" data-placement="bottom" data-content="Ingrese Empresa">
					</div> -->
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="email" id="email" disabled="disabled" onkeypress="return ValidarEmail(event)"
							maxlength="35" data-toggle="popover" data-placement="bottom" data-content="Ingrese Email Valido">		
					</div>
				</div>
                <div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div> <br>
			</div>
		
			<div class="row">
					<center>
						<button type="button" class="btn btn-success btn-xs" id="NuevoE" onclick="Nuevo();">
				    	<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo </button> 

						<button type="button" class="btn btn-info btn-xs" id="GuardarE" disabled="disabled" onclick="return Guardar(this.form);">
					   	<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button> 

						<button type="button" class="btn btn-warning btn-xs" id="ModificarE" disabled="disabled" onclick="return Modificar(this.form);">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar</button>	

						<button type="button" class="btn btn-danger btn-xs" id="CancelarE" disabled="disabled" onclick="Cancelar();">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>			    	
					</center>
				</div>
			</div>
		</form> 	

	<div id="BuscarPersona">
			<table class="table table-hover table-condensed" id="tablaclientes">
				<thead>
					<tr>
						<th bgcolor="#0C9DB7"><center> DNI </center></th>
						<th bgcolor="#0C9DB7"><center> Nombre </center></th>
						<th bgcolor="#0C9DB7"><center> Apellidos </center></th>
						<th bgcolor="#0C9DB7"><center> Celular </center></th>
						<th bgcolor="#0C9DB7"><center> Direccion </center></th>
						<th bgcolor="#0C9DB7"><center> Accion </center></th>
					</tr>
				</thead>
				<tbody>
				 
					<?php 
					foreach ($Clientes as $value): ?>
						<tr>
							<td><center> <?php echo $value->dnicliente; ?></center></td>
							<td><center> <?php echo $value->nombre; ?></center></td>
							<td><center> <?php echo $value->appaterno." ".$value->apmaterno; ?> </center></td>
							<td><center> <?php echo $value->celular; ?></center></td>
							<td><center> <?php echo $value->direccion; ?></center></td>
							<td><center> 
								<a onclick='Modifica(<?php echo $value->codcliente; ?>);'> <span class='glyphicon glyphicon-pencil'></span>
								</a> &nbsp;
								<a onclick='Eliminar(<?php echo $value->codcliente; ?>)'><span class='glyphicon glyphicon-trash' style="color:red"></span>
								</a>
							</center></td>
						</tr>
					<?php endforeach ?>   
				</tbody>
			</table> <br>
		</div>

		<script language="javascript">
			$(function() {
				$('#tablaclientes').DataTable({
					"language": {
						"sProcessing":     "Procesando...",
					    "sLengthMenu":     "Mostrar _MENU_ registros",
					    "sZeroRecords":    "No se encontraron resultados",
					    "sEmptyTable":     "Ningún dato disponible en esta tabla",
					    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					    "sInfoPostFix":    "",
					    "sSearch":         "Buscar:",
					    "sUrl":            "",
					    "sInfoThousands":  ",",
					    "sLoadingRecords": "Cargando...",
					    "oPaginate": {
					        "sFirst":    "Primero",
					        "sLast":     "Último",
					        "sNext":     "Siguiente",
					        "sPrevious": "Anterior"
					    },
					    "oAria": {
					        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
					    }
			        }
				});
			});
		</script>
	</div>	
</body>

<style type="text/css">
	#tablaclientes{
		width: 97%;
		border:1px solid #0C9DB7
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
		padding:5px 10px;
		font-size: 13px;
		text-align: center; 
	}
	label{
		font-size: 13px;
	}
</style>
