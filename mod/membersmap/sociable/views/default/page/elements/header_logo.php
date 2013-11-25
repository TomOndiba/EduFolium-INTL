<?php
/*
 * Project Name:            Sociable Theme
 * Project Description:     Theme for Elgg 1.8
 * Author:                  Shane Barron - SocialApparatus
 * License:                 GNU General Public License (GPL) version 2
 * Website:                 http://socia.us
 * Contact:                 sales@socia.us
 * 
 * File Version:            1.0
 * Last Updated:            5/11/2013
 */
$last = substr(elgg_get_site_entity()->name, 1);
$first = elgg_get_site_entity()->name[0];
$url = $CONFIG->url;
$username = elgg_get_logged_in_user_entity()->username;
$context = elgg_get_context();
$messages = messages_count_unread();
if (!elgg_is_logged_in()) {
    ?>
 	<header>
		<div id="ib_head">
			<div id="butSchools"><a href="/intl/colegios" class="transition">Colegios</a></div>
			<div id="logo"><a class="ascensorLink ascensorLink0"><img src="_graphics/logo.png" ></a></div>
			<div id="nav">			
				<ul class="navigation" style="padding: 0px 0px 0px 0px">
					<li><a class="ascensorLink ascensorLink1">Conectar</a></li>
					<li><a class="ascensorLink ascensorLink2">Compartir</a></</li>
					<li><a class="ascensorLink ascensorLink3">Crear</a></li>
				</ul>			
			</div>
			<div id="topforma">
				<div id="logvalidate">
					<a class="socia_register" href="<?php echo $CONFIG->url; ?>register" onClick="_gaq.push(['_trackEvent','SignUP-Teachers','OpenForm','T1 - Top Menu']);">Regístrese</a>
				</div>
				<div class="logvalidateB">
					<a class="socia_login" href="<?php /*echo $CONFIG->url; */?>login"><spam class="azul">Ingresar +</spam></a>
				</div>
			</div>
		</div>
	</header>
	   
<?php } ?>


<?php
if (elgg_is_logged_in()) {
    ?>
<div class="row">
    <div class="span5">
        <div class="elgg-heading-site">
            <div class="elgg-heading-site-logo">
			<img src="/intl/_graphics/logo.png" style="height: 60px;">
			<?php
			/*
                <div class="logo-first"><?php echo $first; ?></div>
                <div class="logo-last"><?php echo $last; ?><br/>
                    <div class="elgg-heading-site-description">
                        <?php echo elgg_get_site_entity()->description; ?>
                    </div>
                </div>
			*/
			?>			
            </div>

        </div>
    </div>
    <div class="span7 pull-right">
        <ul class="nav nav-pills pull-right">
            <?php if (elgg_is_logged_in()) { ?>
                <?php if (elgg_is_admin_logged_in()) { ?>
                    <li class="active"><a href="<?php echo $CONFIG->url; ?>admin">Administración</a></li>
                <?php } ?>
                <li <?php if ($context == "profile") echo "class='active'"; ?>><a href="<?php echo $url; ?>profile/<?php echo $username; ?>">Perfil</a></li>
                <li <?php if ($context == "messages") echo "class='active'"; ?>><a href="<?php echo $url; ?>messages/inbox/<?php echo $username; ?>"><b style="color:#DC1010;"><?php echo $messages; ?></b> Mensajes</a></li>
                <li <?php if ($context == "settings") echo "class='active'"; ?>><a href="<?php echo $url; ?>settings/user/<?php echo $username; ?>">Configuración</a></li>
                <li><a href="<?php echo $url; ?>action/logout">Salir</a></li>
            <?php } else { ?>
                <li><a class="socia_login" href="<?php echo $CONFIG->url; ?>login">Ingresar</a></li>
                <li><a class="socia_register" href="<?php echo $CONFIG->url; ?>register">Registrarse</a></li>
                <?php } ?>
        </ul>
    </div>

</div>
<?php } ?>


<script>
    (function() {
        $(".elgg-heading-site").click(function() {
            window.location = elgg.config.wwwroot;
        });
    })();
</script>