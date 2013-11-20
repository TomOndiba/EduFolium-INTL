<?php
    // Load Elgg engine
    //include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
 
    // make sure only logged in users can see this page	
    gatekeeper();
 
    // set the title
    $title = "Colombia - EduFolium - Profesores - Compartir!";
	$user = elgg_get_logged_in_user_entity();	
	$linkedIN_warning='<div id="ib_bannerButs" style="height:50px; padding:20px;min-height: 50px;width: 400px;">
							<section class="ib_sectionA" style="width:70px">
								<img src="/intl/_graphics/warning-64.png" style="margin-top:-10px">			

							</section>
							<section class="ib_sectionB" style="width:200px">
								Aún no tienes perfil de LinkedIN <br>					
								<a href="/intl//profile/'.$user->username.'/edit">Click aquí para actualizar</a>
							</section>		
						</div>';
	
	if(strcmp($user->website,""))
		$linkedIN_warning="";
						
  	$body = '
			<div id="ib_butsNavigate" style="width:270px">
				<div id="edufolium_butchat" style="display:none">
					<a href="/intl/thewire/all">
						<span>
							<img src="/intl/_graphics/edufolium_microchat-icon.png">
						</span>
					</a>
				</div>					
				<div id="edufolium_butGallery" style="display:none">
					<a href="/intl/gallery/owner">
						<span>
							<img src="/intl/_graphics/edufolium-iconGallery.png">
						</span>
					</a>
				</div>
				<div id="edufolium_butFolium" style="display:none">
					<a href="/intl/portfolio/owner/'.$user->username.'" >
						<span>
							<img src="/intl/_graphics/edufolium-icon.png">
						</span>
					</a>
				</div>
			</div>	
			<div id="ib_bannerButs">
				<section>
					<article class="container">
					<div id="ib_share">
						<section class="ib_sectionA">
							<div class="ib_cajafoto">
								<figure>
									<img src="/intl/_graphics/share.png" style="width: 300px;">
								</figure>
							</div>
						</section>
						<section class="ib_sectionB">
							<h1>Compartir . . .</h1>
							<h2>
								Construye tu <a href="/intl/portfolio/owner/'.$user->username.'">portafolio de docente</a> 
								e incrementa tu visibilidad ante la comunidad de educadores y colegios. <br>
								Al mismo tiempo, comparte información valiosa con tus colegas, 
								incluyendo <a href="/intl/gallery/owner">fotos</a> y tweets usando el <a href="/intl/thewire/all" >MicroBlog</a>. 
							</h2>
						</section>
					</div>
					</article>
				</section>
			</div>
			<script>
				$("document").ready(function(){
							$("#edufolium_butFolium").show("fast",function(){
								$("#edufolium_butGallery").show("fast",function(){
									$("#edufolium_butchat").show("fast")
									});
								});
					});
			</script>			
			';
	
	
	

    // draw the page

	echo  elgg_view_page($title, $body);

?>