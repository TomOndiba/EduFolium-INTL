<?php
    // Load Elgg engine
    //include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
 
    // make sure only logged in users can see this page	
    gatekeeper();
 
    // set the title
    $title = "Colombia - EduFolium - Profesores - Crear!";
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
			<div id="ib_bannerButs">
			<section>
				<article class="container">
				<div id="ib_create">
				<section class="ib_sectionA" style="display:none">
					<div class="ib_cajafoto">
						<figure>
							<img src="/intl/_graphics/create_comingsoon.png" style="width: 280px;">
						</figure>
					</div>
				</section>
				<section class="ib_sectionB" style="display:none">
						<h1>Crear . . .</h1>
						<h2>
							Todavía no tenemos funcionalidad en este módulo . . . pero estamos trabajando en esto. <br>
							<a href="/intl/discussion/view/177/sugerencias-para-el-modulo-de-crear">Déjanos saber, que te gustaría ver aca!</a> Queremos saber que piensas.						
						</h2>							
				</section>
				</div>
				</article>
			</section>
			</div>
			<script>
					$("document").ready(function(){
						$(".ib_sectionA").show("normal",function(){
							$(".ib_sectionB").show("normal");
						});
					});					

			</script>				
	
			';
	
	
	

    // draw the page

	echo  elgg_view_page($title, $body);

?>