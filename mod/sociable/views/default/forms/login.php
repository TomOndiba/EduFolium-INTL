<?php
/**
 * Elgg login form
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<div id="contenedor" >
    <section id="formulario" class="sectionForm">

        <input type="text" name="username" id="inputUsername" placeholder="<?php echo elgg_echo('loginusername'); ?>" required>
			
        <input type="password" name="password" id="inputPassword" placeholder="<?php echo elgg_echo('password'); ?>" required>
			
		<?php echo elgg_view('login/extend', $vars); ?>

            <label class="checkbox">
                <input type="checkbox" name="persistent" value="true"> <?php echo elgg_echo('user:persistent'); ?>
            </label>
			
            <button type="submit" class="ib_butLogin"><?php echo elgg_echo('login'); ?></button>
            <a rel="nofollow" class="ib_butLostpass" href="<?php echo elgg_get_site_url(); ?>forgotpassword"><?php echo elgg_echo('user:password:lost'); ?></a>

	</section>


</div>


<?php
if (isset($vars['returntoreferer'])) {
    echo elgg_view('input/hidden', array('name' => 'returntoreferer', 'value' => 'true'));
}
?>
