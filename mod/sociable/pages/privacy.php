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

    <div id="sociaLogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sociaLoginLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="sociaLoginLabel"><?php echo elgg_echo("Ingresar"); ?></h3>
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
					<section class="ib_sectionB" style="width: 100%;">
					<h1 class="ib_signupT">Política de Privacidad</h1>
					<span>

Vigente a partir de:<b> 1 de junio  de 2013</b>
<br><br>
EduFolium, ha creado esta Política de privacidad para explicar el uso de la información personal que se obtiene sobre usted cuando accede o utiliza servicios online o móviles, sitios web y software de EduFolium proporcionado en relación con los servicios o sitios web (colectivamente, el "sitio web"). Esta política de privacidad entrará en vigor a partir del 1 de junio  de 2013. Puede ponerse en contacto con EduFolium, en la siguiente dirección: Carrera 18B No 18-96 Oficina 507, Bogotá, Colombia. Asimismo, puede ponerse en contacto con cualquiera de nuestras empresas a través de nuestro formulario de contacto de nuestro sitio web.
<br><br>
Esta Política de privacidad cubre solo los datos obtenidos a través del sitio web y no cualquier otra recopilación o procesamiento de datos, incluyendo, pero sin limitarse a, las prácticas de recogida de datos de otras páginas web con las que nos vinculamos o datos que nosotros o nuestras filiales obtienen no online o a través de sitios web, productos o servicios que no están vinculados directamente con esta Política de privacidad. De forma periódica, podemos hacer referencia a esta Política de privacidad en avisos y solicitudes de consentimiento relacionadas con páginas web con fines específicos. Por ejemplo, si le invitamos a presentar ideas para mejorar el sitio web. En estos casos, esta Política de privacidad se aplica según lo estipulado en ese aviso o solicitud de consentimiento en particular (por ejemplo, con respecto a los tipos o los fines de los datos obtenidos).
<br><br>
1. Información obtenida y utilizada
<br><br>
Cuando usted solicita información, se suscribe a un servicio, se registra como usuario, participa en una encuesta, publica una evaluación o comentario, publica una pregunta o respuesta, publica un currículum, carga contenido o envía datos en general en nuestro sitio web, normalmente obtenemos información que incluye, pero no se limita a, su nombre de usuario, contraseña, nombre y apellido, dirección de correo electrónico, dirección postal, sexo, ocupación, intereses, mensajes mandados por usted a otros usuarios, y cualquier otra información incluida en un perfil o currículum que nos haya enviado. En materia de servicios de pago, también recopilaremos información de pago (por ejemplo, número de tarjeta de crédito y la información de verificación correspondiente). En cada situación, sabrá los datos que obtuvimos a través del sitio, puesto que será usted quien los envíe.
<br><br>
Como parte del funcionamiento normal del sitio web, EduFolium automáticamente recopilará información de su ordenador o dispositivo móvil, incluyendo, sin limitarse a, tipo de navegador, sistema operativo, dirección IP y el nombre del dominio desde el que ha tenido acceso al sitio, y si accede a nuestro sitio con su dispositivo móvil, el tipo de dispositivo móvil. Además podemos registrar las acciones realizadas en el sitio web, incluyendo, sin limitarse a, la fecha y hora de uso, clics, páginas vistas, la cantidad de tiempo que dedicó a cada página y las consultas de búsqueda. EduFolium se reserva el derecho de hacer coincidir su dirección IP u otra información con cualquier otra información suya siempre que la ley lo permita. EduFolium puede guardar esta información en sus equipos o en los equipos de terceros con los cuales se relaciona para ese fin.
<br><br>
Si accede o utiliza el sitio web desde su teléfono móvil u otro dispositivo móvil, incluidas las tablets, obtendremos los identificadores del dispositivo móvil, incluyendo las direcciones IP y MAC. EduFolium puede crear y asignar a su dispositivo un identificador similar a un número de cuenta. Podemos obtener el nombre que se ha asociado a su dispositivo, el tipo de dispositivo, número de teléfono, país y cualquier otra información que usted decida proporcionar, como nombre de usuario, ubicación geográfica o dirección de correo electrónico. También podemos acceder a sus contactos para que pueda invitar a amigos a visitar junto a usted el sitio web.
<br><br>
2. Usos de la información
<br><br>
Cuando envíe información a EduFolium, ésta se utilizará para los fines descritos en los apartados 2 y 3 de esta Política de privacidad. EduFolium utiliza esta información y la información generada al utilizar nuestro sitio web, incluyendo pero sin limitarse a, su currículum, comentarios publicados, búsquedas, clics, toques, sitios web y páginas web que visita a través de nuestro software móvil (incluyendo sitios web y páginas web de terceros), solicitudes de empleo, mensajes y anuncios para ofrecerle nuestros servicios y recursos, para proporcionar su información a los empresarios que puedan estar interesados en ponerse en contacto con usted, para proporcionarle información del empleador, para medir y mejorar los servicios y funciones, y para proporcionarle servicio al cliente. Si se encuentra en los Estados Unidos, EduFolium también puede compartir su información personal, como su dirección de correo electrónico, con sitios web o sitios de redes sociales de terceros para mostrarle anuncios que puedan resultar de su interés y otros contenidos personalizados. Si no desea recibir anuncios, por favor envíe un correo electrónico a info@edufolium.com (retire los espacios al enviar un email).
<br><br>
EduFolium también puede usar esta información para prevenir actos ilegales y actividades perjudiciales para usted u otros usuarios. EduFolium puede obtener y divulgar información sobre usted o su forma de utilizar EduFolium si creemos de buena fe que tal obtención y divulgación: (a) es razonablemente necesaria para cumplir con la ley o las normativas e instrucciones legales; (b) ayuda a prevenir, investigar, o identificar posibles hechos ilícitos en conexión con el uso del sitio web; o (c) protege nuestros derechos, nuestra reputación, propiedad, seguridad o la del público. EduFolium puede usar varios métodos para detectar y enfrentarse a actividades sospechosas y filtrar contenido para prevenir abusos tales como el spam. Estos esfuerzos pueden de vez en cuando conllevar una suspensión o finalización temporal o permanente de algunas funciones para algunos usuarios.
<br><br>
Podemos solicitar a otras empresas, incluidos otros miembros del grupo corporativo EduFolium y terceros, que realicen los servicios necesarios para nuestro funcionamiento. Al proporcionar estos servicios, dichas empresas podrán tener acceso a su información personal, la cual puede transferirse al exterior. Por acuerdo contractual, esas empresas deben tratar su información personal de acuerdo con esta Política de privacidad. Sin embargo, EduFolium no será responsable (en la medida que lo permita la ley) de ningún daño que se pueda ocasionar a causa del mal uso de su información personal por parte de estas empresas. EduFolium puede usar la dirección IP e información de su dispositivo móvil para ayudar a detectar problemas con el servicio de EduFolium y para fines administrativos. Su dirección IP y la información de su dispositivo móvil también se pueden usar para identificarle a usted, su ubicación y su perfil online, así como para obtener información demográfica general (como es el caso de su país de origen). EduFolium podrá conservar sus datos (en la medida que lo permita la ley) después de la finalización de su relación con EduFolium. EduFolium puede eliminar sus datos de usuario en la medida que lo permita la ley. Si realiza un pago con una tarjeta de crédito, débito o algún otro tipo de tarjeta, EduFolium solamente usará los datos e información de dichas tarjetas para procesar su pago. EduFolium también puede agregar sus datos con otros datos, para los fines establecidos anteriormente.
<br><br>
3. Información de contacto y currículum
<br><br>
Cuando proporciona información (como su nombre y correo electrónico) e información demográfica a EduFolium, usted acepta que EduFolium puede utilizar esta información como se especifica en el presente documento. Usted acepta que como parte de los servicios que EduFolium ofrece, EduFolium, o un tercero, puede comunicarse con usted a través de su cuenta de EduFolium o mediante cualquier otro medio disponible utilizando sus datos de contacto, por ejemplo, dirección de correo electrónico, teléfono o por correo postal. En la medida que lo permita la ley aplicable, EduFolium o sus socios terceros designados, pueden también usar su información de contacto para (i) enviarle alertas de trabajo; (ii) crear una cuenta; (iii) enviarle información sobre EduFolium; y, (iv) si usted se encuentra en los Estados Unidos, enviarle material promocional de algunos de los socios de EduFolium. EduFolium puede usar la información de su perfil y/o información demográfica para personalizar su experiencia en el sitio web de EduFolium, mostrarle contenido que EduFolium piense que le puede resultar interesante, y también para mostrarle contenido de acuerdo con sus preferencias. Su información es adoptada en el sitio web de EduFolium cuando usted sube o edita un currículum. Si usted sube o edita un currículum en EduFolium, y siempre y cuando lo permitan sus preferencias de privacidad, su currículum, su nombre y cualquier otra información personal que usted incluya en el currículum estará disponible para terceros interesados en contratarle, en los motores de búsqueda, o para el público general, ya que esta información queda publicada en Internet. Esta información puede ser rastreada y mostrada por motores de búsqueda cuando alguien realiza una búsqueda de su nombre. Esto significa que terceros podrán ver la información incluida en su currículum y es posible que personas no asociadas a EduFolium, y, por tanto, de las que EduFolium no se hace responsable, se pongan en contacto con usted sin que usted lo haya solicitado. Si no quiere que su información personal aparezca en el sitio web, no debe cargarla. Puede optar por excluir su currículum de los motores de búsqueda mediante sus preferencias de Seguridad; sin embargo, EduFolium no puede garantizar con qué frecuencia los motores de búsqueda de terceros actualizarán sus memorias caché, las cuales pueden incluir información anterior sobre su currículum público. EduFolium se reserva el derecho de cobrar a terceros una tarifa para acceder a su información como parte de los servicios de EduFolium. Si lo desea, EduFolium también puede enviar su currículum vitae a terceros, si usted decide contestar a una oferta de trabajo.
<br><br>
4. Consentimiento
<br><br>
EduFolium ofrece a cualquier usuario la opción de utilizar el sitio web de EduFolium. Si crea o sube un currículum en EduFolium, si solicita un empleo a través de EduFolium, o si, en general, usa los servicios y el sitio web de EduFolium, está dando explícitamente su consentimiento a que EduFolium utilice la información personal que ha proporcionado tal y como se establece en el presente documento y en las Condiciones del servicio.
<br><br>
5. Seguridad
<br><br>
Este sitio web utiliza medidas de seguridad para evitar la pérdida, el mal uso o la modificación de la información en poder de EduFolium. EduFolium utiliza cifrado SSL, políticas de control de acceso, programas antivirus y cortafuegos para proteger la información en nuestro poder. Sin embargo, ningún método de transmisión por Internet, o método de almacenamiento electrónico, es 100% seguro. Por favor, tenga en cuenta que los correos electrónicos, los mensajes enviados a través de su navegador y otros métodos de comunicación similares con otros usuarios no están cifrados. Le aconsejamos que no proporcione ningún tipo de información confidencial a través de estos medios. Por lo tanto, si bien nos esforzamos por proteger su información, no podemos garantizar su seguridad.
<br><br>
6. Cookies
<br><br>
Las "cookies" son pequeños archivos de información que su navegador guarda en su ordenador. Consulte nuestra Política de cookies para obtener más información acerca del uso que EduFolium hace de las cookies.
<br><br>
7. Enlaces
<br><br>
EduFolium puede crear enlaces a otros sitios web. Al hacer clic en un enlace en EduFolium, puede que ello suponga abandonar nuestro sitio web. EduFolium no se responsabiliza de las políticas de privacidad de otros sitios web. Le aconsejamos que lea estas declaraciones de privacidad.
<br><br>
8. Modificaciones
<br><br>
EduFolium puede modificar esta política de privacidad en cualquier momento. Si EduFolium decide usar su información personal, la cual se obtuvo a través del sitio web de EduFolium de una manera diferente de la descrita en el momento de obtención de la misma, EduFolium notificará a los usuarios mediante correo electrónico, a través de un anuncio en la página de EduFolium o cualquier otro medio que exija la ley, 30 días antes de tal uso.
<br><br>
9. Transferencia de derechos
<br><br>
Si hay un cambio de dueño o de control del negocio de EduFolium (ya sea por fusión, venta u otra causa) o si se produce alguna liquidación, la información del usuario, incluyendo su información personal, podrá ser compartida como parte de tal proceso y/o vendida como parte de esa transacción, y su información personal podrá ser usada por el comprador. Sin embargo, si ese negocio cambia de manera sustancial este documento o la política de tratamiento de información descrita en esta Política de privacidad, se le notificará por correo electrónico o a través de un anuncio publicado en este sitio web, y usted podrá solicitar que su información no se utilice de esta nueva manera. Esta Política de privacidad redundará en beneficio de cualquier sucesor, cesionario o activo de EduFolium.
<br><br>
10. Principios Safe Harbor para los residentes de la UE
<br><br>
EduFolium Inc. cumple los principios que regulan la obtención, el uso y el almacenamiento de información personal en países de la Unión Europea y Suiza de acuerdo con los programas Safe Harbor entre Estados Unidos y la Unión Europea y Suiza, tal como lo estipula el Departamento de Comercio de los Estados Unidos. Si usted se encuentra en el Espacio Económico Europeo o en Suiza, EduFolium Irlanda es la empresa responsable del tratamiento de su información. EduFolium Inc. recibe los datos de EduFolium Irlanda como responsable de procesar los datos, y ha certificado que se ciñe a los Principios de privacidad de Safe Harbor en lo referente a la notificación, a la selección, a las transferencias posteriores, a la seguridad, a la integridad de los datos, al acceso y a la aplicación de las normas. Para obtener más información sobre el programa Safe Harbor y para ver nuestra página de certificación, visite http://www.export.gov/safeharbor/ y consulte nuestros principios generales Safe Harbor.
<br><br>
11. Acceso a datos personales de los residentes de la UE
<br><br>
Los residentes del Espacio Económico Europeo y Suiza tienen derecho de acceso a sus datos. Si desea acceder a tales datos, envíe una carta certificada a la dirección mencionada anteriormente con una copia de su pasaporte o tarjeta nacional de identificación para comprobar su identidad y le proporcionaremos dicha información. Es posible que se aplique una tarifa para procesar tal solicitud, que no excederá lo que dicte la ley. Los ciudadanos del Espacio Económico Europeo y Suiza también tienen derecho a corregir, eliminar o bloquear cualquier información personal incorrecta. Puede corregir cualquier información incorrecta de su currículum siguiendo los pasos descritos en el sitio web de EduFolium. Si su información personal es incorrecta, también puede pedir que EduFolium corrija, elimine o bloquee tal información. Para ello, debe enviar una carta certificada a la dirección mencionada anteriormente con una copia de su pasaporte o tarjeta nacional de identificación para comprobar su identidad con la descripción exacta del cambio que desea.
<br><br>
						</br>
						</br></br>
						</br>
					</span>
					</section>
				
				</div>
				</article>
			</section>




		</div>


    </body>
</html>