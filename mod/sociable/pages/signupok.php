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

	<?php 
	if (!elgg_is_logged_in()) {
	?>
	
    <div id="sociaLogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sociaLoginLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="sociaLoginLabel"><?php echo elgg_echo("IB Teacher - Login"); ?></h3>
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
					<section class="ib_sectionB" style="width: 400px;">
					<h1 class="ib_signupT">Felicitaciones!</h1>
						<h2 class="ib_signupP">
							Se ha registrado satisfactoriamente en EduFolium.</br></br>
							Ahora, solo necesita activar su cuenta. </br>
							Por favor haga click al enlace que se le envió a su correo electrónico. </br></br>
							Algunas veces este correo llega a la carpeta de "correo no deseado" (SPAM/JUNK), si aún no ha recibido el correo, no olvide verificar dicha carpeta.  
						</h2>
					</section>
				
					<section class="ib_sectionA" style="margin-top: 50px;">
						<div class="ib_cajafoto"><figure><img src="/intl/_graphics/bigman.png"></figure></div>
					</section>
				</div>
				</article>
			</section>

			<section>
				<article class="container">
				<div id="ib_connect">
				<section class="ib_sectionA">
					<div class="ib_cajafoto"><figure><img src="/intl/_graphics/connect.png"></figure></div>
					</section>
					<section class="ib_sectionB">
						<h1>Connect . . .</h1>
						<h2>Find IB teachers and schools around the world. Increase the value of your professional network and become more visible for potential job opportunities with renowned IB Schools. </h2>
						<div id="ib_butsNavigate">
						<div id="ib_butCreate"><a class="ascensorLink ascensorLink3"><span><img src="/intl/_graphics/cr.png"></span></a></div>
						<div id="ib_butShare"><a class="ascensorLink ascensorLink2"><span><img src="/intl/_graphics/sh.png"></span></a></div>
						<div id="ib_butHome"><a class="ascensorLink ascensorLink0"><span><img src="/intl/_graphics/home.png"></span></a></div>
					</div>
					
					</section>
				</div>
				</article>
			</section>

			<section>
				<article class="container">
				<div id="ib_share">
				<section class="ib_sectionA">
					<div class="ib_cajafoto"><figure><img src="/intl/_graphics/share.png"></figure></div>
				</section>
				<section class="ib_sectionB">
					<h1>Share . . .</h1>
					<h2>Contribute to build a true IB community of practice. Share with your colleagues the learning experiences you've created. You'll find how your own teaching practice will improve by sharing what you know and learning from what others have created.</h2>
					<div id="ib_butsNavigate">
						<div id="ib_butCreate"><a class="ascensorLink ascensorLink3"><span><img src="/intl/_graphics/cr.png"></span></a></div>
						<div id="ib_butConnect"><a class="ascensorLink ascensorLink1"><span><img src="/intl/_graphics/cn.png"></span></a></div>
						<div id="ib_butHome"><a class="ascensorLink ascensorLink0"><span><img src="/intl/_graphics/home.png"></span></a></div>
					</div>
				</section>
				</div>
				</article>
			</section>


			<section>
				<article class="container">
				<div id="ib_create">
				<section class="ib_sectionA">
					<div class="ib_cajafoto"><figure><img src="/intl/_graphics/create.png"></figure></div>
					</section>
					<section class="ib_sectionB">
						<h1>Create . . .</h1>
						<h2>Finding it difficult to find a colleague at your school that understands the intricacies of your DP course or your Unit of Inquiry? Collaborate with other subject matter experts and create high quality learning experiences for your students. Gain professional visibility by sharing the results with the IB Pals community. </h2>							
						<div id="ib_butsNavigate">
							<div id="ib_butShare"><a class="ascensorLink ascensorLink2"><span><img src="/intl/_graphics/sh.png"></span></a></div>
							<div id="ib_butConnect"><a class="ascensorLink ascensorLink1"><span><img src="/intl/_graphics/cn.png"></span></a></div>
							<div id="ib_butHome"><a class="ascensorLink ascensorLink0"><span><img src="/intl/_graphics/home.png"></span></a></div>
						</div>
					</section>
				</div>
				</article>
			</section>
			<script>
				prettyPrint();

				$('#ascensorBuilding').ascensor({
					ascensorName: 'ascensor',
					childType: 'section',
					ascensorFloorName: ['Home','Connect','Share','Create'],
					time: 1000,
					windowsOn: 0,
					direction: "chocolate",
					ascensorMap: [[1,0],[1,1],[2,1],[2,2],[2,3],[1,3]],
					easing: 'easeInOutQuad',
					keyNavigation: true,
					queued: false,
					queuedDirection: "y",
					overflow:"hidden"
				})
			</script>
		</div>



        
	<?php 
		echo elgg_view('page/elements/foot'); 
	}
	?>


	<?php 
	if (elgg_is_logged_in()) {

	?>
        <div class="loader" style="display:none"></div>
        <div class="elgg-page elgg-page-default">
            <div class="elgg-page-messages">
				<?php echo $messages; ?>
            </div>
            <div class="elgg-page-header">
                <div class="elgg-inner">
					<?php echo $header; ?>
                </div>
            </div>
            <div class="elgg-page-body">
                <div class="elgg-inner">
					<?php echo $body; ?>
                </div>
            </div>
            <div class="elgg-page-footer" style="display:none">
                <div class="elgg-inner">
					<?php echo $footer; ?>
                </div>
            </div>
        </div>
	<?php 
		echo elgg_view('page/elements/foot'); 
	}
	?>	

    </body>
</html>