<?php
    // Load Elgg engine
    //include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
 
    // make sure only logged in users can see this page	
    gatekeeper();
 
    // set the title
    $title = "Docentes - EduFolium ";
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
			<div id="ib_bannerButs" style="min-height:450px;width:530px">
					<div>
						<p>
						<span class="ib_homeTitle">
							Bienvenido '.$user->name.'!!<br><br>
						</span>	
							Conéctate con Docentes y Colegios de América Latina!<br>  
						</p>
					</div>

					<div class="ib_ShareBut" style="display:none">
						<div class="ib_buts">
							<a href="/intl/edujobs/jobs">Explora Oportunidades Laborales</a>
						</div>
				
					</div>

					<div class="ib_ConnectBut" style="display:none">
						<div class="ib_buts">
							<a href="/intl/activity">Comunidad de<br>Docentes</a>
						</div>
						
					
					</div>
					<div class="ib_CreateBut" style="display:none">
						<div class="ib_buts">
							<a href="/intl/teachers/create">Crear</a>
						</div>
					</div>										
			</div>
			<script>
					$("document").ready(function(){
						$(".ib_ConnectBut").show("slow",function(){
							$(".ib_ShareBut").show("slow",function(){
								//$(".ib_CreateBut").show("fast");
							});
						});
					});					

			</script>			
	
			';
	
	
	

    // draw the page

	echo  elgg_view_page($title, $body);

?>