$(document).ready(function(){
	$("#enviar").on("click",function(){
		var criterio = $("#tipobusqueda").val();
		var parametro = $("#parametro").val();

		$.post(BASEURL+'Reportes/buscar',{c:criterio,p:parametro},function (response){
				
				var html = "";

				var count = 0;
				$.each(response, function (key, data) {
					count = count+1;
					html = html+"<tr>";
					html = html+"<td>"+count+"</td>";
					html = html+"<td>"+data.dnicliente+"</td>";
					html = html+"<td>"+data.nombre+" "+data.appaterno+" "+data.apmaterno+"</td>";
					html = html+"<td>"+data.direccion+"</td>";
					html = html+"<td>"+data.celular+"</td>";
					html = html+"<td>"+data.sexo+"</td>";
					html = html+"<td>"+data.db+"</td>";
					html = html+"</tr>";
				});

				$("#tbodyusuarios").html(html)
		},"json");

	})

	$("#reporte").on("click",function(){

		var criterio = $("#tipobusqueda").val();
		var parametro = $("#parametro").val();

		var hrf = BASEURL+"Reportes/ImprimirClientes/"+criterio+"/"+parametro;
		window.open(hrf);
	})
})