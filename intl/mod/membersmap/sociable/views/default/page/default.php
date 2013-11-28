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
$user = elgg_get_logged_in_user_entity();

$connect_menu = '
				<div id="ib_butsNavigate" style="margin-left: 140px; margin-bottom: -20px;">
				
					<div id="edufolium_butchat" style="display:none">
						<a href="/intl/thewire/all">
							<span>
								<img src="/intl/_graphics/edufolium_microchat-icon.png">
							</span>
						</a>
					</div>					
					<div id="ib_butGroup" style="display:none">
						<a href="/intl/groups">
							<span><img src="/intl/_graphics/group.png"></span>
						</a>
					</div>				
					<div id="ib_butMap" style="display:none">
						<a href="/intl/membersmap">
							<span>
								<img src="/intl/_graphics/map.png">
							</span>
						</a>
					</div>
					<div id="ib_butMember" style="display:none">
						<a href="/intl/members">
							<span>
								<img src="/intl/_graphics/member.png">
							</span>
						</a>
					</div>
					<div id="edufolium_butRecursos" style="display:none">
						<a href="/intl/file" >
							<span>
								<img src="/intl/_graphics/edufolium-icon.png">
							</span>
						</a>
					</div>					
												
				</div>
				<br>
			<script>
				$("document").ready(function(){
					$("#ib_butMember").show("fast",function(){
						$("#ib_butMap").show("fast",function(){
								$("#ib_butGroup").show("fast");
								
								$("#edufolium_butchat").show("fast");
								
								$("#edufolium_butRecursos").show("fast");
								
						});
					});					
					$(".elgg-menu-item-ibpals-connect").addClass("active");
				});
			</script>	
				';


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
		
		if($profile_type_guid = $user->custom_profile_type)
		{
			if(($profile_type = get_entity($profile_type_guid)) && ($profile_type instanceof ProfileManagerCustomProfileType))
			{
				$profile_name=$profile_type->getTitle();
			}
		}
		else
		{
			$profile_name='Docente';		
		}		
	
		if (!elgg_is_logged_in()){ 
			if(( stristr($_SERVER['SCRIPT_NAME'], 'mod/contact')=== FALSE ) and ( stristr($_SERVER['SCRIPT_NAME'], 'page_handler')=== FALSE ))
			{		?>
					<div class="loader" style="display:none" ></div>
					<div class="elgg-page elgg-page-default" >
						<div class="elgg-page-messages">
							<?php echo $messages; ?>
						</div>

						<div class="elgg-inner">
							<?php echo $header; ?>
						</div>
						<nav id="navigationMap">
							<ul style="padding:0px;">
								<li><a class="ascensorLink ascensorLink0" onClick="_gaq.push(['_trackEvent','Nav-CSC','Home','T1 - Home']);"></a></li>
								<li><a class="ascensorLink ascensorLink1" onClick="_gaq.push(['_trackEvent','Nav-CSC','Connect','T1 - Connect']);"></a></li>
								<li><a class="ascensorLink ascensorLink2" onClick="_gaq.push(['_trackEvent','Nav-CSC','Share','T1 - Share']);"></a></li>
								<li><a class="ascensorLink ascensorLink3" onClick="_gaq.push(['_trackEvent','Nav-CSC','Create','T1 - Create']);"></a></li>
							</ul>
							<div class="ib_butContact"><a href="/intl/mod/contact/">Contáctenos</a></div>
						</nav>
							<div id="ascensorBuilding">
							<section>
								<article class="container">
								<div id="ib_home">
									<section class="ib_sectionB">
									<h1>La nueva forma de conectarse con educadores y colegios!</h1>
									</section>								
									<section class="ib_sectionA">
										<div class="ib_cajafoto">
											<figure>
												<img src="/intl/_graphics/edufolium-123.png" alt="Empleo para Docentes - EduFolium Colombia">
											</figure>
										</div>
										<div class="ib_butEntrar">
											<a class="socia_register transition" href="<?php echo $CONFIG->url; ?>register" onClick="_gaq.push(['_trackEvent','SignUP-Teachers','OpenForm','T2 - Page']);">Registrarse</a>
										</div>											
									</section>
								</div>
								</article>
							</section>

								<section>
									<article class="container">
									<div id="ib_connect">
									<section class="ib_sectionA">
										<div class="ib_cajafoto"><figure><img src="_graphics/connect.png"></figure></div>
										</section>
										<section class="ib_sectionB">
										<h1>Conectar . . .</h1>
										<h2>Encuentre a los mejores docentes y colegios de Colombia y aumente su visibilidad en la comunidad educativa. Expanda su red de contactos profesionales y explore nuevas posibilidades de trabajo..</h2>
										<div id="ib_butsNavigate">
											<a class="ascensorLink ascensorLink3" onClick="_gaq.push(['_trackEvent','Nav-CSC','Create','T1 - Create']);">							
												<div id="ib_butCreate">
													<span><img src="/intl/_graphics/cr.png"></span>
												</div>
											</a>									
											<a class="ascensorLink ascensorLink2" onClick="_gaq.push(['_trackEvent','Nav-CSC','Share','T1 - Share']);">								
												<div id="ib_butShare">
													<span><img src="/intl/_graphics/sh.png"></span>
												</div>
											</a>								
											<a class="ascensorLink ascensorLink0" onClick="_gaq.push(['_trackEvent','Nav-CSC','Home','T1 - Home']);">								
												<div id="ib_butHome">
													<span><img src="/intl/_graphics/home.png"></span>
												</div>
											</a>
										</div>
										
										</section>
									</div>
									</article>
								</section>

								<section>
									<article class="container">
									<div id="ib_share">
									<section class="ib_sectionA">
										<div class="ib_cajafoto"><figure><img src="_graphics/share.png"></figure></div>
										</section>
										<section class="ib_sectionB">
										<h1>Compartir . . .</h1>
										<h2>Contribuya a crear una verdadera comunidad de práctica entre los profesionales de la educación en Colombia. Comparta con otros docentes los recursos educativos y experiencias de aprendizaje que ha diseñado, y aumente así su visibilidad profesional dentro de la comunidad EduFolium.</h2>
										<div id="ib_butsNavigate">
											<a class="ascensorLink ascensorLink3" onClick="_gaq.push(['_trackEvent','Nav-CSC','Create','T1 - Create']);">							
												<div id="ib_butCreate">
													<span><img src="/intl/_graphics/cr.png"></span>
												</div>
											</a>									
											<a class="ascensorLink ascensorLink1" onClick="_gaq.push(['_trackEvent','Nav-CSC','Connect','T1 - Connect']);">								
												<div id="ib_butConnect">
													<span><img src="/intl/_graphics/cn.png" ></span>
												</div>
											</a>								
											<a class="ascensorLink ascensorLink0" onClick="_gaq.push(['_trackEvent','Nav-CSC','Home','T1 - Home']);">								
												<div id="ib_butHome">
													<span><img src="/intl/_graphics/home.png" ></span>
												</div>
											</a>							
										</div>							
										</section>
									</div>
									</article>
								</section>


								<section>
									<article class="container">
									<div id="ib_create">
									<section class="ib_sectionA">
										<div class="ib_cajafoto"><figure><img src="_graphics/create.png"></figure></div>
										</section>
										<section class="ib_sectionB">
										<h1>Crear . . .</h1>
										<h2>Todos sabemos que la práctica docente se mejora si se hace colaborativa.  En EduFolium encuentra un espacio para generar ideas y trabajar en nuevos proyectos.</h2>							
										<div id="ib_butsNavigate">
											<a class="ascensorLink ascensorLink1" onClick="_gaq.push(['_trackEvent','Nav-CSC','Connect','T1 - Connect']);">								
												<div id="ib_butConnect">
													<span><img src="/intl/_graphics/cn.png"></span>
												</div>
											</a>										
											<a class="ascensorLink ascensorLink2" onClick="_gaq.push(['_trackEvent','Nav-CSC','Share','T1 - Share']);">								
												<div id="ib_butShare">
													<span><img src="/intl/_graphics/sh.png"></span>
												</div>
											</a>								
											<a class="ascensorLink ascensorLink0" onClick="_gaq.push(['_trackEvent','Nav-CSC','Home','T1 - Home']);">								
												<div id="ib_butHome">
													<span><img src="/intl/_graphics/home.png"></span>
												</div>
											</a>							
										</div>							
									</div>
										</section>						
									</article>
								</section>
								<div class="elgg-page-body">
									<div class="elgg-inner">
										<?php// echo $body; ?>
									</div>
								</div>	
	
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
								<script>
									$(".elgg-search").css("display","none");
								</script>
							</div>
					</div>
				<?php 
					echo elgg_view('page/elements/foot'); 
			}else{
					?>
						<header class="IB_school_header">
								<div id="ib_head">
									<div id="IBPals_logo"><a href="/" class="transition"><img src="/intl/_graphics/logo.png"></a></div>
								</div>	
						</header>
				
						<div class="container">
							<div class="ib_Contact">
									<?php echo $body; ?>
							</div>		
						</div>
				
				<?php 
					}
			}		
	if (elgg_is_logged_in()) {
		if($profile_name=='Docente')
		{		
	?>
		<script type="text/javascript">
		  _kmq.push(['identify', '<?php echo $user->username;?>']);
		</script>
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
		               <?php
		               		               
		               	if(	(elgg_get_context() == 'activity') || 
		               		(elgg_get_context() == 'file') || 
		               		(elgg_get_context() == 'members')|| 
		               		(elgg_get_context() == 'membersmap')||
		               		(elgg_get_context() == 'groups')||
		               		(elgg_get_context() == 'thewire')
		               		
		               		){
		               		echo $connect_menu;
		               	}
		               ?>	 
					<?php echo $body; ?>
                </div>
            </div>
            <div class="elgg-page-footer" style="display:none">
                <div class="elgg-inner">
					<?php echo $footer; ?>
                </div>
            </div>
        </div>
		<script>
		
		$(document).ready(function() {
		
			$(".elgg-menu-item-activity").css("display","none");

			//CREAR CV
			$(".elgg-menu-item-ibpals-cv").css("background-color","rgb(22, 126, 186)");
			$(".elgg-menu-item-ibpals-cv").css("margin-left","400px");							
			$('.elgg-menu-item-ibpals-cv').children().css('color', 'white');	
			$('.elgg-menu-item-ibpals-cv').children().css('text-shadow', 'none');
			$('.elgg-menu-item-ibpals-cv').children().hover().css("background-color","rgb(22, 126, 186)");		

			//OFERTAS LABORALES
			$(".elgg-menu-item-ibpals-jp").css("background-color","rgb(22, 126, 186)");
			$(".elgg-menu-item-ibpals-jp").css("margin-left","10px");							
			$('.elgg-menu-item-ibpals-jp').children().css('color', 'white');	
			$('.elgg-menu-item-ibpals-jp').children().css('text-shadow', 'none');
			$('.elgg-menu-item-ibpals-jp').children().hover().css("background-color","rgb(22, 126, 186)");	

			//SHARE THIS
			$(".at4-follow").css("top","50px").delay(800);
	  
		});
			
		
		</script>
		<?php echo elgg_view('page/elements/foot');  ?>
	<?php
		}
		else		
		{
		?>

		<?php	
			forward("home_schools");
		}
	}
	?>	
	<?php
	if (!elgg_is_logged_in()) {	
	?>	
		<?php 
			if( stristr($_SERVER['SCRIPT_NAME'], 'page_handler') )
				{
					echo $_SERVER['SCRIPT_NAME'];
					echo '<div class="modal-backdrop fade in"></div>';
					echo '<div id="sociaLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="sociaLoginLabel" aria-hidden="true">';
					
				}
			else				
				echo '	<div id="sociaLogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sociaLoginLabel" aria-hidden="true">';
		?>		
	

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="sociaLogin"><?php echo elgg_echo("Ingreso - EduFolium"); ?></h3>
        </div>
        <div class="modal-body">
            <?php echo elgg_view_form("login"); ?>
        </div>

    </div>
	
	<div id="sociaRegister" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sociaRegisterLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="sociaRegisterLabel"><?php echo elgg_echo("Registro - Profesor"); ?></h3>
        </div>
        <div class="modal-body">
            <?php echo elgg_view_form("register"); ?>
        </div>
        <div class="modal-footer" style="display:none">
            <button class="btn btn-info socia_login" data-dismiss="modal">Login</button>
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>	
		<?php
		
	}
	//echo elgg_get_context();
	?>
		<!-- EduFolium Smart Layers BEGIN -->
		<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid="></script>
		<script type="text/javascript">
		  addthis.layers({
			'theme' : 'transparent',
			'share' : {
			  'position' : 'left',
			  'services' : 'facebook,twitter,email',			  
			  'numPreferredServices' : 3,
			  'postShareTitle' : 'Gracias por Compartir!',
			  'postShareFollowMsg' : 'Siguenos en:',
			  'postShareRecommendedMsg' : 'Recomendamos:',			  
			}, 
			'follow' : {
			  'services' : [
				{'service': 'facebook', 'id': 'edufolium'},
				{'service': 'twitter', 'id': 'EduFolium'},
				{'service': 'google_follow', 'id': '114645522359538105807'}
			  ],
			'postFollowTitle' : 'Gracias por seguir a EduFolium - intl!',
			'postFollowRecommendedMsg' : 'Recomendado para ti',
			}   
		  });
		</script>
		<!-- EduFolium Smart Layers END -->	

    </body>
</html>