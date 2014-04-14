<?php
/**
 * Elgg pageshell
 * The standard HTML page shell that everything else fits into
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['title']       The page title
 * @uses $vars['body']        The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 */
// backward compatability support for plugins that are not using the new approach
// of routing through admin. See reportedcontent plugin for a simple example.
if (elgg_get_context() == 'admin') {
    if (get_input('handler') != 'admin') {
        elgg_deprecated_notice("admin plugins should route through 'admin'.", 1.8);
    }
    elgg_admin_add_plugin_settings_menu();
    elgg_unregister_css('elgg');
    echo elgg_view('page/admin', $vars);
    return true;
}

// render content before head so that JavaScript and CSS can be loaded. See #4032

	$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
	$header = elgg_view('page/elements/header', $vars);
	$body = elgg_view('page/elements/body', $vars);
	$footer = elgg_view('page/elements/footer', $vars);

// Set the content type
header("Content-type: text/html; charset=UTF-8");

$lang = get_current_language();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
    <head>
		<?php echo elgg_view('page/elements/head', $vars); ?>
    </head>
	
    <body>

    <div id="sociaLogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sociaLoginLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="sociaLoginLabel"><?php echo elgg_echo("Ingresar"); ?></h3>
        </div>
        <div class="modal-body">
            <?php echo elgg_view_form("login"); ?>
        </div>
        <div class="modal-footer">
            <button class="btn btn-info socia_register" data-dismiss="modal">Registrarse</button>
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </div>
	<div id="sociaRegister" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sociaRegisterLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="sociaRegisterLabel"><?php echo elgg_echo("Registro - EduFolium"); ?></h3>
        </div>
        <div class="modal-body">
            <?php echo elgg_view_form("register"); ?>
        </div>
        <div class="modal-footer" style="display:none">
            <button class="btn btn-info socia_login" data-dismiss="modal">Login</button>
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
	
	<header>
		<div id="ib_head">
			<div id="logo"><a href="/intl" class="ascensorLink ascensorLink0"><img src="_graphics/logo.png"></a></div>
			
			<div id="topforma">
				<div id="logvalidate">
					<a class="socia_register" href="<?php echo $CONFIG->url; ?>register">Registro</a>
				</div>
				<div class="logvalidateB">
					<a class="socia_login" href="<?php /*echo $CONFIG->url; */?>login"><spam class="azul">Ingresar +</spam></a>
				</div>
			</div>
		</div>
	</header>

		<nav id="navigationMap">
			<ul style="padding:0px;">
				<li><a class="ascensorLink ascensorLink0"></a></li>
				<li><a class="ascensorLink ascensorLink1"></a></li>
				<li><a class="ascensorLink ascensorLink2"></a></li>
				<li><a class="ascensorLink ascensorLink3"></a></li>
			</ul>
			<div class="ib_butContact"><a href="/intl/mod/contact/">Contáctenos</a></div>
		</nav>

		<div id="ascensorBuilding">
			<section>
				<article class="container">
				<div id="ib_home">
					<section class="ib_sectionB" style="width: 100%;">
					<h1 class="ib_signupT">Acerca de EduFolium</h1>
					<span>
							Somos un grupo de educadores trabajando con <a href="http://www.inncubated.com">InncubatED</a> , una inncubadora de tecnologías educativas, para contribuir a hacer más equitativo el acceso a ofertas educativas de calidad. Esto se logra mediante la implementación de modelos educativos innovadores que mejoren los procesos de enseñanza-aprendizaje, así como con el desarrollo de mecanismos de oferta de servicios que apalanquen el uso de tecnología para reducir costos, ampliar cobertura y garantizar sostenibilidad. <br>
							</br></br>
							<a href="http://edufolium.com">Empleo para Docentes en EduFolium</a>
							</br>
								Los 80 millones de docentes que existen hoy son el grupo de profesionales más grande del mundo. 
								</br>A pesar de esto, los procesos de contratación de este grupo de profesionales presentan problemas de eficiencia y asimetría de información. 
								</br>Los servicios de contratación y caza talentos son pocos o no son asequibles para muchas instituciones educativas. 
								</br>EduFolium hace posible tener acceso a información laboral y portafolio de miles de docentes y procesarla de manera eficiente. 
								</br>A través de la plataforma se le permite a los docentes crear su portafolio y aumentar su visibilidad profesional y exposición a ofertas laborales.
								</br> De otro lado, la plataforma brinda a las instituciones educativas acceso a una base de datos de docentes ampliamente segmentada que permite encontrar información relevante del candidato que va más allá de su CV.
							</br>
							</br>
							</br>
							<a target="_blank" href="http://www.appstictoc.com">Juegos Educativos para niños en Tic-Toc Apps</a>
							</br>
							<img align="left" src="/intl/_graphics/juegos-educativos-para-ninos.jpg" alt="Juegos Educativos para Niños" style="height: 250px;" >
							</br>Tic Toc busca desarrollar apps y juegos educativos para niños que aporten verdaderamente a su desarrollo y bienestar.
 							</br></br>
							Solo ahora, con la aparición de las pantallas táctiles en las tabletas y dispositivos móviles, estamos por primera vez siendo testigos del surgimiento de una tecnología para primera infancia asequible y   apropiada desde el punto de vista de su etapa de desarrollo.
 							</br></br>
							Es sin embargo preocupante ver cientos de apps que no contribuyen al desarrollo de los niños, y que literalmente solo ayuda a que pierdan su tiempo frente a una celular. Tic Toc apps solo desarrolla aplicativos que aporten al desarrollo de los niños.							
							</br>
							</br>
							</br></br></br>
							<a target="_blank" href="http://www.arukay.com/">Cursos y Actividades para niños en Arukay</a>
							</br>
							<img align="left" src="http://www.arukay.com/images/arukay%20horizontal259x73.png" alt="Cursos y Actividades para niños en Arukay" style="margin-right: 30px;margin-top: 50px; margin-bottom: 50px;" ></br>							
							Trabajamos con los mejores colegios del país para llevar la enseñanza de habilidades de Siglo XXI de la teoría a la práctica.
							</br>Usando las últimas versiones de software educativo, nuestras actividades están enfocadas al desarrollo de los siguientes habilidades en los estudiantes: </br>
							- Uso de la tecnología como una herramienta de creación y no sólo como un medio para el consumo. </br>
							- Uso de la tecnología como forma de expresión, de conexión, y de colaboración.</br>
							- Capacidad tanto analítica como creativa para la solución de problemas.
						</br></br>
						</br>
					</span>
					</section>
				
				</div>
				</article>
			</section>




		</div>


    </body>
</html>

