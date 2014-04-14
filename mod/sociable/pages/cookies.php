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
					</br></br>Para información sobre nuestras políticas de privacidad, haga click en el siguiente enlace:
                                        <a href="http://edufolium.com/intl/politica-de-privacidad">Política de Privacidad</a>
                                        </br></br>Para saber más sobre EduFolium, haga click en el siguiente enlace:
                                        <a href="http://edufolium.com/intl/acerca-de-edufolium">Acerca de EduFolium</a>				
					<h1 class="ib_signupT">Política sobre uso de cookies</h1>
					</br></br>
					Vigente a partir de:<b> 1 de junio  de 2013</b>
					<br><br>
					<span>
						Al utilizar o acceder al sitio web, usted acepta de manera predeterminada que EduFolium utilizará las "cookies" de la siguiente manera:
						</br></br>
						Esta política explica cuándo y por qué se pueden enviar cookies a las personas que visitan los sitios web de EduFolium (a estas personas se les denomina "nosotros" y "nuestro" en esta política). Las "cookies" son archivos de información en formato de texto que las páginas web envían al disco duro u otro equipo de navegación de Internet del usuario para llevar a cabo operaciones de seguimiento. Las cookies permiten al sitio web recordar información importante, lo que facilita la navegación del usuario. Una cookie normalmente contiene el nombre del dominio de donde procede la cookie, la duración de la cookie, y un número u otro valor de identificación único.
						</br></br>
						Como la mayoría de los sitios web, utilizamos "cookies" para varios fines como son mejorar su experiencia online, llevar a cabo análisis, marketing, etc. pero, en nuestro caso, fundamentalmente utilizamos cookies para:
						</br></br>
						<b>Fines analíticos:</b> Utilizamos cookies para analizar la actividad de los usuarios con el fin de mejorar el sitio web. Por ejemplo, las cookies nos permiten ver patrones agregados, como son el número medio de búsquedas de trabajos que realizan los usuarios. Podemos utilizar este análisis para obtener información sobre cómo mejorar la experiencia del usuario y la funcionalidad del sitio web.
						</br></br>
						<b>Sus preferencias:</b> Utilizamos cookies para almacenar ciertas preferencias del usuario en nuestro sitio web. Por ejemplo, podemos almacenar las búsquedas que ha realizado recientemente en una cookie para permitirle repetir dichas búsquedas de forma más fácil cuando regrese a nuestro sitio web.
						</br></br>
						<b>Marketing:</b> Utilizamos cookies de terceros con los que estamos asociados como Google para llevar a cabo actividades de marketing. Estas cookies nos permiten mostrarle material promocional de EduFolium en otros sitios web que pueda visitar a través de Internet.
						</br></br>
						<b>Referencia de seguimiento:</b> Utilizamos cookies para asociar la actividad del usuario con el sitio web de terceros desde el cual el usuario llegó a nuestro sitio web. Estos sitios web de terceros reciben crédito por la actividad de los usuarios que visitan nuestro sitio web. No compartimos ninguna información personal o información sobre las actividades de usuarios individuales con estas entidades asociadas.
						</br></br>
						Las cookies de sesión son cookies temporales que permanecen en el archivo de cookies de su navegador web hasta que sale del sitio web.
						</br></br>
						Las cookies persistentes permanecen en el archivo de cookies de su navegador durante más tiempo (aunque la duración depende de la duración de la cookie específica). Cuando usamos cookies de sesión para realizar un seguimiento del número de visitantes a nuestro sitio, lo hacemos de manera anónima (ya que las cookies en sí no contienen datos personales). También podremos usar las cookies para identificar su ordenador cada vez que regrese a nuestro sitio para personalizar su experiencia en EduFolium. En esos casos, podemos asociar información personal con esa cookie. Use las opciones de su navegador si no desea recibir una cookie o si desea que su navegador le notifique cuando reciba una cookie. Puede eliminar fácilmente cualquier cookie que haya sido guardada en la carpeta de cookies de su navegador.
						</br></br>
						Por ejemplo, si está usando Microsoft Windows Explorer:
						</br>
						- Abra 'Windows Explorer'.
						</br>
						- Haga clic en el botón "Buscar" en la barra de herramientas.
						</br>
						- Introduzca "cookie" en el cuadro de búsqueda "Carpetas y archivos".
						</br>
						- Escoja "Mi PC" en el campo "Buscar".
						</br>
						- Haga clic en "Buscar".
						</br>
						- Haga doble clic en las carpetas encontradas.
						</br>
						- Seleccione las cookies.
						</br>
						- Presione el botón "Supr" de su teclado para eliminar las cookies.
						</br>
						- Si no utiliza Microsoft Windows Explorer, debe seleccionar "cookies" en la función "Ayuda" para obtener información sobre dónde encontrar la carpeta de cookies. Si deshabilita todas las cookies, no podrá aprovechar todas las características de este sitio web.
						</br>
						</br>
						EduFolium usa las funciones de AdWords y las listas de remarketing de Google Analytics para los anunciantes destacados. EduFolium y Google combinan cookies de origen (como la cookie de Google Analytics) y cookies de terceros (como la cookie de DoubleClick) para informar, optimizar y publicar anuncios en función de las visitas anteriores a nuestro sitio web. Esto significa que los proveedores, incluido Google, mostrarán material promocional de EduFolium en otros sitios web que visite en Internet.
						</br>
						Puede deshabilitar Google Analytics para anunciantes destacados, incluido AdWords, y deshabilitar los anuncios personalizados de la Red Google Display visitando la página del Administrador de preferencias de anuncios de Google. Para proporcionar a los usuarios de Internet más control sobre cómo Google Analytics recopila su información, Google ha creado un complemento de deshabilitación para navegadores, el cual se encuentra disponible en la página web del complemento de deshabilitación para navegadores de Google Analytics. De esta manera, puede optar por no participar en los programas de Google.
						</br>
						</br>
						<b>Cambios en nuestra política sobre cookies</b>
						</br>
						De vez en cuando, consideraremos necesario cambiar esta política sobre cookies. Le sugerimos que visite esta página para informarse de cualquier cambio.
						</br>
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
