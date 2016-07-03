<?php
    session_start();
    function getmodulos(){
        $CI =& get_instance();
        $CI->load->database('default');
        $id = $_SESSION['codcargo'];

        $modulos = $CI->db->get_where("modulos",array("estado"=> "A","mod_padre"=>0))->result_array();
        $permisos = $CI->db->get_where("permisos",array("codcargo" => $id ))->result_array();

        $arrp = array();
        foreach ($permisos as $key => $value) {
            $arrp[] = $value["modulo_id"];
        }
        $html = ' <ul class="nav main-menu" style="background-color:#636E7B">';
        foreach ($modulos as $key => $value) {
            if(in_array($value["id"],$arrp)){
                $html.= "<li class='dropdown'><a href='#' class='dropdown-toggle'>";
                $html .= '<span class="glyphicon '.$value["mod_icono"].'" aria-hidden="true"></span>';
                $html .= '<span class="hidden-xs"><b> '.$value["mod_descripcion"]."</b></span>".cargapadre($value["id"],$arrp,$CI);
                $html.=  "</a></li>";
            }
        }
        $html .= "</ul>";
        print $html;
    }

    function cargapadre($idpadre,$arrp,$CI){
        $CI->load->database('default');
        $modulos = $CI->db->get_where("modulos",array("estado"=> "A","mod_padre"=>$idpadre))->result_array();

        $html = '<ul class="dropdown-menu" style="background-color:#C9CBCB">';
        foreach ($modulos as $key => $value) {
            if(in_array($value["id"],$arrp)){
                $html .= "<li><a href='#' id='".$value["mod_url"]."' >".$value["mod_descripcion"]."</a></li>";
            }
        }
        $html .= "</ul>";
        return  $html;
    }
    if (isset($_SESSION['usuario'])){ ?>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>Compilador</title>
			<meta name="description" content="description">

			<link href="<?php echo base_url();?>Librerias/plugins/bootstrap/bootstrap.css" rel="stylesheet">  
			<link href="<?php echo base_url();?>Librerias/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
			<link href="<?php echo base_url();?>Librerias/CSS/style_v2.css" rel="stylesheet">

			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Librerias/CSS/DataTable.css">
			<script type="text/javascript">
				var BASEURL="<?php echo base_url(); ?>";
			</script>
			<style type="text/css">
				#contenidoge{
					width: 100%;
					margin: auto;
				}
				#barra{
					width: 100%;
					margin: auto;
					background: #F8BC07;
				}
			</style>
		</head>
		<body>
		<div id="contenidoge">
			<header class="navbar" id="barra" >
				<div class="container-fluid expanded-panel">
					<div class="row">
						<div id="logo" class="col-xs-12 col-sm-7">
							<a href="#" style="font-family: fantasy;">COMPILADOR BOTICAS "INKAFARMA" Y "ARCANGEL"</a>
						</div>
						<div id="top-panel" class="col-xs-12 col-sm-5">
							<div class="row">
								<div class="col-xs-4 col-sm-12 top-panel-right">
									<ul class="nav navbar-nav pull-right panel-menu">
										<li class="hidden-xs">
											<a href="#" data-toggle="modal" class="modal-link">
												<span class="glyphicon glyphicon-globe" aria-hidden="true" style="color:#fff; font-size:18px;"></span>
												<span class="badge" style="color:orange;">
												</span>
											</a>
										</li>
										<li class="hidden-xs">
											<a href="#" data-toggle="modal" class="modal-link">
												<span class="glyphicon glyphicon-envelope" aria-hidden="true" style="color:#fff; font-size:18px;"></span>
												<span class="badge" style="color:orange;">
												</span>
											</a>
										</li>
										<li class="hidden-xs">
											<a data-toggle="modal" class="modal-link">
												<span class="glyphicon glyphicon-qrcode" aria-hidden="true" style="color:#fff; font-size:18px;"></span>
												<span class="badge" style="color:orange;">
												</span>
											</a>
										</li>
										<li class="hidden-xs">
											<a href="#" data-toggle="modal" class="modal-link">
												<span class="glyphicon glyphicon-picture" aria-hidden="true" style="color:#fff; font-size:18px;"></span>
												<span class="badge" style="color:orange;">
												</span>
											</a>
										</li>
										<li><a href="#" style="color:#0B6FA5;"> <b> <?php echo $_SESSION['usuario']; ?></b> </a></li>
										<li class="dropdown">
										    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
									       	aria-expanded="false"> <span class="glyphicon glyphicon-lock" aria-hidden="true" style="color:#0B6FA5;"></span> &nbsp;</a>
											<ul class="dropdown-menu">
										        <li><a href="<?php echo base_url();?>Entrar/cerrarsession"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar Sesion</a></li>
										    </ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div id="main" class="container-fluid">
				<div class="row">
					<div id="sidebar-left" class="col-xs-2 col-sm-2">
	                <?php  echo getmodulos(); ?>
					</div>

					<div id="content" class="col-xs-12 col-sm-9">
						<div id="ContenidoPrincipal">
							<div style="height:100px;"></div>
							<center>
								<h2>Bienvenidos </h2> <br><br>
								<img src="<?php echo base_url();?>imagenes/logo.png" width="400" height="200">
							</center>
							<div style="height:100px;"></div>
						</div>
					</div>

					<!-- Mensaje De Alerta-->
					<div class="modal fade" id="Alerta" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">
										<center> <div id="Mensaje"></div> </center>
									</h5>
								</div>
								<div class="modal-body">
									<center>
										<button type="button" class="btn btn-info btn-xs"onclick="Actualizando()">
										<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Aceptar</button>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="<?php echo base_url();?>Librerias/plugins/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url();?>Librerias/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="<?php echo base_url();?>Librerias/plugins/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>Librerias/plugins/tinymce/tinymce.min.js"></script>
		<script src="<?php echo base_url();?>Librerias/plugins/tinymce/jquery.tinymce.min.js"></script>
		<script src="<?php echo base_url();?>Librerias/js/devoops.js"></script>
		<script src="<?php echo base_url();?>Librerias/JavaScript/DataTable.js"></script>

		<script type="text/javascript">
				var baseurl="<?php echo base_url();?>";
				$(function(){
					$('#Cargo').on('click',function(){
						$("#ContenidoPrincipal").load(baseurl+"Cargo");
					});
					$('#Empleado').on('click',function(){
						$("#ContenidoPrincipal").load(baseurl+"Empleado");
					});
					$('#Cliente').on('click',function(){
						$("#ContenidoPrincipal").load(baseurl+"Cliente");
					});
					$('#DatosMaestros').on('click',function(){
						$("#ContenidoPrincipal").load(baseurl+"DatosMaestros");
					});
					$('#reporclientes').on('click',function(){
						$("#ContenidoPrincipal").load(baseurl+"Reportes/clientes");
					});
                    $('#Permisos').on('click',function(){
                        $("#ContenidoPrincipal").load(baseurl+"Permisos");
                    });

				});
			</script>
		</body>
	</html>
    <?php } 
    	else {
        	header("location: ./");
    	}
	?>
