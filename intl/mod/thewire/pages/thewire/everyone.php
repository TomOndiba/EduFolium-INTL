<?php
/**
 * All wire posts
 * 
 */

elgg_push_breadcrumb(elgg_echo('thewire'));
$user = elgg_get_logged_in_user_entity();	
$title = elgg_echo('thewire:everyone');
$share ='
			<div id="ib_butsNavigate" style="width:180px;margin-top:-10px;margin-bottom:10px">
				<div id="edufolium_butGallery" style="display:none">
					<a href="/intl/gallery/owner">
						<span>
							<img src="/intl/_graphics/edufolium-iconGallery.png">
						</span>
					</a>
				</div>
				<div id="edufolium_butRecursos" style="display:none">
					<a href="/intl/portfolio/owner/'.$user->username.'" >
						<span>
							<img src="/intl/_graphics/edufolium-icon.png">
						</span>
					</a>
				</div>
			</div>	
			<script>
				$("document").ready(function(){
							$("#edufolium_butRecursos").show("fast",function(){
								$("#edufolium_butGallery").show("fast")
									});
					});
				$(".elgg-menu-item-ibpals-share").addClass("active");					
			</script>				
		';
//$title =$share.$title;
		
$content = '';
if (elgg_is_logged_in()) {
	$form_vars = array('class' => 'thewire-form');
	$content .= elgg_view_form('thewire/add', $form_vars);
	$content .= elgg_view('input/urlshortener');
}

$content .= elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'thewire',
	'limit' => 15,
));

$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('thewire/sidebar'),
));

echo elgg_view_page($title, $body);
