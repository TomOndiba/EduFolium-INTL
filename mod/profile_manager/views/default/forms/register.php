<?php
/**
 * Elgg register form
 *
 * @package Elgg
 * @subpackage Core
 */

$password = $password2 = '';
$username = get_input('u');
$email = get_input('e');
$name = get_input('n');

if (elgg_is_sticky_form('register')) {
	extract(elgg_get_sticky_values('register'));
	elgg_clear_sticky_form('register');
}

// must accept terms
if($accept_terms = elgg_get_plugin_setting("registration_terms", "profile_manager")){
	$link_begin = "<a target='_blank' href='" . $accept_terms . "'>";
	$link_end = "</a>";
	$terms = "<div class='mandatory'>";
	$terms .= "<input id='register-accept_terms' type='checkbox' name='accept_terms' value='yes' /> ";
	$terms .= "<label for='register-accept_terms'>" . elgg_echo("profile_manager:registration:accept_terms", array($link_begin, $link_end)) . "</label>";
	$terms .= "</div>";
}

echo "<section id='formulario' class='sectionForm'>";
echo "<div id='profile_manager_register_left'>";
		

echo elgg_view("register/extend_side");

?>
	
			<div class="mtm mandatory">
				<?php
				echo elgg_view('input/text', array(
					'id' => 'register-name',
					'name' => 'name',
					'value' => $name,
					'class' => 'elgg-autofocus',
					'autocomplete' => 'off',
					'placeholder' => 'Nombre para mostrar *',
					'required'  => ''
				));
				?>
			</div>
			<div class="mandatory">

				<div class='profile_manager_register_input_container'>

					<?php
					echo elgg_view('input/email', array(
						'id' => 'register-email',
						'name' => 'email',
						'value' => $email,
						'class' => 'elgg-autofocus',				
						'autocomplete' => 'off',
						'placeholder' => 'Correo Electrónico *',
						'required'  => ''
					));
					?>
				<span class='elgg-icon profile_manager_validate_icon'>														
				</span>
				</div>
			</div>
			<div class="mandatory">
				<div class='profile_manager_register_input_container'>
					<?php
					echo elgg_view('input/text', array(
						'id' => 'register-username',
						'name' => 'username',
						'value' => $username,
						'class' => 'elgg-autofocus',				
						'autocomplete' => 'off',
						'placeholder' => 'Nombre de Usuario *',
						'required'  => ''				
					));
					?>
					<div class='elgg-icon profile_manager_validate_icon'></div>
				</div>
			</div>
			<div class="mandatory">
				<div class='profile_manager_register_input_container'>
					<?php
					echo elgg_view('input/password', array(
						'id' => 'register-password',
						'name' => 'password',
						'value' => $password,
						'class' => 'elgg-autofocus',				
						'autocomplete' => 'off',
						'placeholder' => 'Contraseña *',
						'pattern'	=>'.{6,20}',
						'title' => '6 caracteres mínimo',
						'required'  => ''					
					));
					?>
					<span class='elgg-icon profile_manager_validate_icon'></span>
				</div>
			</div>
			<div class="mandatory">
				<div class='profile_manager_register_input_container'>
					<?php
					echo elgg_view('input/password', array(

						'id' => 'register-password2',
						'name' => 'password2',
						'value' => $password2,
						'class' => 'elgg-autofocus',				
						'autocomplete' => 'off',
						'placeholder' => 'Contraseña * (Para verificación)',
						'pattern'	=>'.{6,20}',
						'title' => '6 caracteres mínimo',
						'required'  => ''					
					));
					?>
					<span class='elgg-icon profile_manager_validate_icon'></span>
				</div>
			</div>
			<?php 
				echo $terms;
			?>
<?php
// view to extend to add more fields to the registration form
echo elgg_view('register/extend');
// Add captcha hook
echo elgg_view('input/captcha');

echo "</div>";



//echo "<div class='clearfloat'></div>";
echo "<div class='elgg-foot'>";

echo "<div class='elgg-subtext mtm'>" . elgg_echo("profile_manager:register:mandatory") . "</div>";
echo elgg_view('input/hidden', array('name' => 'friend_guid', 'value' => $vars['friend_guid']));
echo elgg_view('input/hidden', array('name' => 'invitecode', 'value' => $vars['invitecode']));
echo elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('Registrarse')));

echo "</div>";
echo "</br>";
echo "<div class='privacy'>";
echo "	<a href='http://edufolium.com/intl/politica-de-privacidad' target='_blank'>Política de Privacidad</a>";
echo "</div>";
echo "</section>";
?>

<script>

		$('[name="submit"]').attr('onclick', "_gaq.push(['_trackEvent','SignUP-Teachers','SendForm','T1 - SignUPButton']);")
		
		$('#custom_profile_fields_custom_profile_type').css( "display", "none" );
		$('#custom_profile_fields_custom_profile_type').val($("#custom_profile_fields_custom_profile_type option:contains('Docente')"));

		$("#custom_profile_fields_custom_profile_type option:contains('Docente')").attr("selected",true) ;
		$("#custom_profile_fields_custom_profile_type option:contains('Colegio')").attr("selected",false) ;	

		$('[name="custom_profile_fields_location"]').attr("placeholder","Ciudad, Departamento *");
		$('[name="custom_profile_fields_location"]').attr("required",true);
		
		$('[name="custom_profile_fields_Colegio"]').attr("placeholder","Colegio Actual o Anterior *");
		$('[name="custom_profile_fields_Colegio"]').attr("required",true);
		$('[name="custom_profile_fields_Colegio"]').attr("autocomplete","off");
		
		$('[name="custom_profile_fields_Materias"]').attr("placeholder","Materia(s)(Separadas por Coma)");		
		

		$('[name="custom_profile_fields_School_Email"]').attr("placeholder","Correo del Colegio ");
		$('[name="custom_profile_fields_School_Email"]').attr("autocomplete","off");

		$('[name="custom_profile_fields_LinkedIn"]').attr("placeholder","Perfil LinkedIn  ");
		$('[name="custom_profile_fields_website"]').attr("placeholder","Perfil LinkedIn  ");

		
		$('.custom_profile_type_description').html("Información Adicional");
		$('.custom_profile_type_description').css( "display", "block" );
		
		$('.chzn-select').chosen();	
		$('[name="custom_profile_fields_country"]').chosen();
		
		$('#custom_profile_fields_Areas2_chzn :input[value="Nivel(es) *"]').val("Area(s) ");
		$('[name="custom_profile_fields_country"]').attr("placeholder","País *");				

		

  </script>
