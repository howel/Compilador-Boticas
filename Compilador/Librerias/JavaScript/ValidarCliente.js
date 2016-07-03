$(function(){
	$('[data-toggle="popover"]').popover();

	$('#codcliente').on('click',function(){
		$('#codcliente').popover('hide');
	});
	$('#dni').on('click',function(){
		$('#dni').popover('hide');
	});	
	$('#direccion').on('click',function(){
		$('#direccion').popover('hide');
	});	
	$('#nombre').on('click',function(){
		$('#nombre').popover('hide');
	});	
	$('#apellidop').on('click',function(){
		$('#apellidop').popover('hide');
	});	
	$('#apellidom').on('click',function(){
		$('#apellidom').popover('hide');
	});	
	$('#email').on('click',function(){
		$('#email').popover('hide');
	});	
	$('#celular').on('click',function(){
		$('#celular').popover('hide');
	});	
	$('#sexo').on('click',function(){
		$('#sexo').popover('hide');
	});
	/*$('#db').on('click',function(){
		$('#db').popover('hide');
	});*/
});

function actualiza_contenido(){
	$("#ContenidoPrincipal").load(BASEURL+"Cliente");
}

function Actualizando(){
	$('#Alerta').modal('hide');
	setTimeout("actualiza_contenido()", 200);
}

function Nuevo(){
	$.ajax({
		url:BASEURL+'Cliente/Nuevo',
		type:'POST',
	}).done(function(resp){
		var codigo = eval(resp);
		if(codigo[0]['CODCLIENTE'] == null){
			if (codigo[0]['codcliente']==null) {
				codigo=0;
			}else{
				codigo=parseInt(codigo[0]['codcliente']);
			}
		}else{
			if (codigo[0]['CODCLIENTE']==null) {
				codigo=0;
			}else{
				codigo=parseInt(codigo[0]['CODCLIENTE']);
			}
		}
		$("#codcliente").val(codigo+1);
		$("#dni").removeAttr("disabled");
		$("#sexo").removeAttr("disabled");
		$("#celular").removeAttr("disabled");
		$("#nombre").removeAttr("disabled");
		$("#apellidop").removeAttr("disabled");
		$("#apellidom").removeAttr("disabled");
		$("#direccion").removeAttr("disabled");
		$("#email").removeAttr("disabled");

		$("#GuardarE").removeAttr("disabled");
		$("#CancelarE").removeAttr("disabled");
		$("#NuevoE").attr("disabled","disabled");			
	});
}

function Cancelar(){
	$("#codcliente").val('');
	$("#dni").val('');
	$("#sexo").val('');
	$("#celular").val('');
	$("#nombre").val('');
	$("#apellidop").val('');
	$("#apellidom").val('');
	$("#direccion").val('');
	$("#email").val('');

	$("#codcliente").attr("disabled","disabled");
	$("#dni").attr("disabled","disabled");
	$("#sexo").attr("disabled","disabled");
	$("#celular").attr("disabled","disabled");
	$("#nombre").attr("disabled","disabled");
	$("#apellidop").attr("disabled","disabled");
	$("#apellidom").attr("disabled","disabled");
	$("#direccion").attr("disabled","disabled");
	$("#email").attr("disabled","disabled");

	$("#GuardarE").attr("disabled","disabled");
	$("#ModificarE").attr("disabled","disabled");
	$("#CancelarE").attr("disabled","disabled");
	$("#NuevoE").removeAttr("disabled");
}

function Guardar(obj) {
	if(obj.codcliente.value==""){
		$('#codcliente').focus();
		$('#codcliente').popover('show'); return 0;
	}
    if(obj.dni.value=="" || obj.dni.value.length<8){
		$('#dni').focus();
		$('#dni').popover('show'); return 0;
	}	
	if(obj.nombre.value==""){
		$('#nombre').focus();
		$('#nombre').popover('show'); return 0;
	}
	if(obj.apellidop.value==""){
		$('#apellidop').focus();
		$('#apellidop').popover('show'); return 0;
	}
	if(obj.apellidom.value==""){
		$('#apellidom').popover('show'); return 0;
	}
	if(obj.direccion.value==""){
		$('#direccion').focus();
		$('#direccion').popover('show'); return 0;
	}
	if(obj.email.value==""){
		$('#email').popover('show'); return 0;
	}else{
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if(!regex.test($('#email').val().trim())) {
            $('#email').popover('show'); return 0;
        }
	}
	if(obj.celular.value=="" || obj.celular.value.length<9){
		$('#celular').focus();
		$('#celular').popover('show'); return 0;

	}
	if(obj.sexo.value=="sexo"){
		$('#sexo').focus();
		$('#sexo').popover('show'); return 0;
	}

    $("#codcliente").removeAttr("disabled");
    $.ajax({
        type:"POST",
        data:$("#ForCliente").serialize(),
        url:BASEURL+"Cliente/Guardar",
        success: function(data){
        	alert(data);
			$("#Mensaje").html(data);
			$('#Alerta').modal({
				show:true,
				backdrop:'static'
			});
		}
    });
}

function Modifica(codigo){
	$.ajax({
		url:BASEURL+'Cliente/Modificando',
		type:"POST",
		data:'modificar='+codigo,
		success: function(data){
			var datos = eval(data);
			$("#codcliente").val(datos[0]['codcliente']);
			$("#dni").val(datos[0]['dnicliente']);
			$("#nombre").val(datos[0]['nombre']);
			$("#apellidop").val(datos[0]['appaterno']);
			$("#apellidom").val(datos[0]['apmaterno']);
			$("#email").val(datos[0]['email']);
			$("#direccion").val(datos[0]['direccion']);
			$("#celular").val(datos[0]['celular']);
			$("#sexo > option[value='"+datos[0]['sexo']+"']").attr('selected', 'selected');
			
			$("#dni").removeAttr("disabled");
			$("#sexo").removeAttr("disabled");
			$("#celular").removeAttr("disabled");
			$("#nombre").removeAttr("disabled");
			$("#apellidop").removeAttr("disabled");
			$("#apellidom").removeAttr("disabled");
			$("#direccion").removeAttr("disabled");
			$("#email").removeAttr("disabled");

			$("#ModificarE").removeAttr("disabled");
			$("#CancelarE").removeAttr("disabled");

			$("#NuevoE").attr("disabled","disabled");
			$("#GuardarE").attr("disabled","disabled");
		}
	});
}

function Modificar(obj){
	if(obj.codcliente.value==""){
		$('#codcliente').focus();
		$('#codcliente').popover('show'); return 0;
	}
    if(obj.dni.value=="" || obj.dni.value.length<8){
		$('#dni').focus();
		$('#dni').popover('show'); return 0;
	}	
	if(obj.nombre.value==""){
		$('#nombre').focus();
		$('#nombre').popover('show'); return 0;
	}
	if(obj.apellidop.value==""){
		$('#apellidop').focus();
		$('#apellidop').popover('show'); return 0;
	}
	if(obj.apellidom.value==""){
		$('#apellidom').popover('show'); return 0;
	}
	if(obj.sexo.value=="sexo"){
		$('#sexo').focus();
		$('#sexo').popover('show'); return 0;
	}
	if(obj.celular.value=="" || obj.celular.value.length<9){
		$('#celular').focus();
		$('#celular').popover('show'); return 0;

	}
	if(obj.email.value==""){
		$('#email').popover('show'); return 0;
	}else{
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if(!regex.test($('#email').val().trim())) {
            $('#email').popover('show'); return 0;
        }
	}
	if(obj.direccion.value==""){
		$('#direccion').focus();
		$('#direccion').popover('show'); return 0;
	}
	
	$("#codcliente").removeAttr("disabled");
	$.ajax({
		type:"POST",
		data:$('#ForCliente').serialize(),
		url:BASEURL+'Cliente/Modificar',
		success: function(data){
			$("#Mensaje").html(data);
			$('#Alerta').modal({
				show:true,
				backdrop:'static'
			});	
		}
	});
}

function Eliminar(codigo){
	if (confirm('Seguro Que Desea Eliminar')==true) {
		$.ajax({
			url:BASEURL+'Cliente/Eliminar',
			type:"POST",
			data:'eliminar='+codigo,		
			success: function(data){
				$("#Mensaje").html(data);
				$('#Alerta').modal({
					show:true,
					backdrop:'static'
				});	
			}
		});
	}
}