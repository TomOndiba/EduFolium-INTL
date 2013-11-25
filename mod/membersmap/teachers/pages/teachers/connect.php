<?php
    // Load Elgg engine
    //include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
 
    // make sure only logged in users can see this page	
    gatekeeper();
	$user = elgg_get_logged_in_user_entity();
 
    // set the title
    $title = "Colombia - EduFolium - Profesores - Conectar!";
    // layout the page
	
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
			<div id="ib_butsNavigate" >
				<div id="ib_butGroup" style="display:none">
					<a href="/intl/groups">
						<span><img src="/intl/_graphics/group.png"></span>
					</a>
				</div>
				<div id="ib_butActivity" style="display:none">
					<a href="/intl/activity" >
						<span>
							<img src="/intl/_graphics/activity.png">
						</span>
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
			</div>
	
			<div id="ib_bannerButs">
			<section>
				<article class="container">
				<div id="ib_connect">
				<section class="ib_sectionA">
					<div class="ib_cajafoto"><figure>
						<img src="/intl/_graphics/bigman.png" style="width: 300px;">
					</figure></div>
					</section>
					<section class="ib_sectionB">
						<h1>Conectar . . .</h1>
						<h2>
						Ya te has conectado con otros educadores?<br>
						<a href="/intl/members">Encuentra otros docentes</a>  y <a href="/intl/membersmap">mira donde enseñan.</a> <br>
						 Inicia <a href="/intl/groups">grupos de discusión</a>, has preguntas o encuentra respuestas. 
						</h2>
					</section>
				</div>
				</article>
			</section>
			</div>
			<script>
				$("document").ready(function(){
					$("#ib_butMember").show("fast",function(){
						$("#ib_butMap").show("fast",function(){
							$("#ib_butActivity").show("fast",function(){
								$("#ib_butGroup").show("fast");
							});
						});
					});					

				
				});
			</script>
			';
	
    // draw the page

	echo  elgg_view_page($title, $body);

?>