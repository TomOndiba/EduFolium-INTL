<?php

$spanish = array(
    /**
     *  Admin menu elements
     */
    'admin:hj' => 'Manage hJ',
    'admin:hj:approve' => 'Approve',
    'admin:hj:categories' => 'Categorías',
    'admin:hj:comments' => 'Comentarios',
    'admin:hj:companies' => 'Empresas',
    'admin:hj:connections' => 'Conexiones',
    'admin:hj:formbuilder' => 'Constructor de Formularios',
    'admin:hj:framework' => 'Framework',
    'admin:hj:jobs' => 'Trabajos',
    'admin:hj:linkedinservice' => 'LinkedInService',
    'admin:hj:livesearch' => 'LiveSearch',
    'admin:hj:portfolio' => 'EduFolium',
    'admin:hj:styler' => 'Styler',
    /**
     * Subtype names
     */
    'item:object:hjform' => 'Formulario',
	'items:object:hjform' => 'Formularios',

    'item:object:hjfield' => 'Form Field',
	'items:object:hjfield' => 'Form Fields',

    'item:object:hjformsubmission' => 'Form Submission',
	'items:object:hjformsubmission' => 'Form Submissions',

    'item:object:hjfile' => 'Archivo',
	'items:object:hjfile' => 'Archivos',

	'item:object:hjfilefolder' => 'Carpeta de Archivo',
	'items:object:hjfilefolder' => 'Carpetas de Archivo',

    'item:object:hjportfolio' => 'EduFolium',
	'items:object:hjportfolio' => 'EduFoliums',

    'item:object:hjexperience' => 'Experiencia Laboral',
	'items:object:hjexperience' => 'Experiencias Laborales',

    'item:object:hjeducation' => 'Educación',
	'items:object:hjeducation' => 'Educación',

    'item:object:hjskill' => 'Skill',
	'items:object:hjskill' => 'Skills',

    'item:object:hjlanguage' => 'Language',
	'items:object:hjlanguage' => 'Languages',

	'item:object:hjannotation' => 'Interaction',
	'items:object:hjannotation' => 'Interactions',
    /**
     * River Items
     */
    'river:create:object:hjfile' => '%s agregó un nuevo archivo %s',
    'river:update:object:hjfile' => '%s actualizó un archivo %s',
    /**
     * Form Builder Actions
     */
    'hj:formbuilder:form:savesuccess' => 'Your form was successfully saved',
    'hj:formbuilder:form:saveerror' => 'Your form could not be saved',
    'hj:formbuilder:form:delete:success' => 'Form was successfully deleted',
    'hj:formbuilder:form:delete:error' => 'Form could not be deleted',
    'hf:formcheck:fieldmissing' => 'One or more of the mandatory fields is missing',
    'hj:formbuilder:field:savesuccess' => 'Field was successfully saved',
    'hj:formbuilder:field:delete:success' => 'Field was successfully deleted',
    'hj:formbuilder:field:delete:error' => 'There was a problem deleting this form',
    'hj:formbuilder:field:save:success' => 'Field was successfully saved',
    'hj:formbuilder:field:save:error' => 'This field can not be saved',
    'hj:formbuilder:submit:success' => 'Changes submitted',
    'hj:formbuilder:submit:error' => 'This form could not be submitted',
    'hj:formbuilder:formsubmission:subject' => 'New form submission: %s',
    'hj:formbuilder:formsubmission:body' => 'The submission contained the following details: <br /><br /> %s <br /><br />View all submissions for this form at: %s',
    'hj:formbuilder:field:protected' => 'This field is protected and can not be deleted',
    'hj:framework:formcheck:fieldmissing' => 'At least one mandatory field is missing. Please complete all the required fields marked with a red star',
    /**
     * AJAX interface
     */
    'hj:framework:denied' => 'Access Denied',
    'hj:framework:ajax:noentity' => 'There is currently nothing to show',
    'hj:framework:ajax:empty' => 'Sorry, we could not find the information you are looking for',
    /**
     * Actions
     */
    'hj:framework:entity:delete:success' => 'Finalizado Satisfactoriamente',
    'hj:framework:entity:delete:error' => 'Ocurrió un error ',
    'hj:framework:widget:add:success' => 'Sección agregada. Por favor actualice la información en configuraciones',
    'hj:framework:widget:add:failure' => "No se pudo agregar la sección",

    /**
     * UI
     */
    'hj:framework:fullview' => 'Ver más',
    'hj:framework:download' => 'Descargar',
    'hj:framework:addnew' => 'Agregar',
    'hj:framework:refresh' => 'Actualizar',
    'hj:framework:gallery' => 'Ver Galería',
    'hj:framework:gallerytitle' => "Detalles para %s",
    'hj:framework:addwidget' => 'Agregar Sección',
    'hj:framework:download' => 'Descargar',
    'hj:framework:edit' => 'Editar',
    'hj:framework:delete' => 'Eliminar',
    'hj:framework:email' => 'Enviar por correo',
    'hj:framework:print' => 'Versión para impresora',
    'hj:framework:pdf' => 'Guardar como PDF',
    /**
     * Page Handlers
     */
    'hj:framework:denied' => 'Sorry, we can\'t show you this page',
    'hj:framework:print:title' => 'Print: %s',
    'hj:framework:pdf:title' => 'PDF export of %s',
    /**
     * Files
     */
    'hj:framework:newfolder' => 'Nueva Carpeta',
    'hj:framework:filefolder' => '<b>Carpeta:</b> %s',
    'hj:framework:filename' => '<b>Nombre de Archivo:</b>  %s',
    'hj:framework:simpletype' => '<b>Tipo:</b> %s',
    'hj:framework:filesize' => '<b>Tamaño:</b> %s',

    /**
     * hypeJunction
     */
    'hj:framework:disabled' => '%s was disabled to avoid inconsistencies in site operations. Please enable hypeFramework before activating %s',

    /**
     * Forms
     */
    'hj:label:hjportfoliofile:title' => 'Titulo del Recurso Educativo',
    'hj:label:hjportfoliofile:description' => 'Descripción',
    'hj:label:hjportfoliofile:tags' => 'Etiquetas',
    'hj:label:hjportfoliofile:filefolder' => 'Carpeta del archivo',
    'hj:label:hjportfoliofile:newfilefolder' => 'Nueva Carpeta',
    'hj:label:hjportfoliofile:fileupload' => 'Archivo a subir',
    'hj:label:hjportfoliofile:access_id' => 'Visibilidad',
    'hj:label:hjportfoliofile:Course' => 'Materia',
	'hj:label:hjportfoliofile:Syllabus' => 'Sección',
	'hj:label:hjportfoliofile:Type' => 'Tipo de Recurso',
	'hj:label:hjportfoliofile:Programme' => 'Nivel',
	'hj:label:hjportfoliofile:IB_moderated'	=> 'Which IB-moderated assessment task is this resource designed to support?',
	'hj:label:hjportfoliofile:Recommend'	=> 'Por que recomienda este recurso a otros docentes? En que circunstancias podría otro educador encontrar este recursos útil?',

    'hj:label:hjlanguage:language' => 'Idioma',
    'hj:label:hjlanguage:proficiency' => 'Language Proficiency',
    'hj:label:hjlanguage:access_id' => 'Visibilidad',

    'hj:label:hjskill:title' => 'Skill',
    'hj:label:hjskill:access_id' => 'Visibility',

    'hj:label:hjeducation:title' => 'Degree',
    'hj:label:hjeducation:schoolname' => 'School',
    'hj:label:hjeducation:fieldofstudy' => 'Field of Study',
    'hj:label:hjeducation:startdate' => 'Enrollment Date',
    'hj:label:hjeducation:enddate' => 'Graduation Date',
    'hj:label:hjeducation:activities' => 'Activities/Clubs',
    'hj:label:hjeducation:description' => 'Additional Notes',
    'hj:label:hjeducation:access_id' => 'Visibility',

    'hj:label:hjexperience:title' => 'Job Title',
    'hj:label:hjexperience:companyname' => 'Company Name',
    'hj:label:hjexperience:industries' => 'Industry(ies)',
    'hj:label:hjexperience:location' => 'City',
    'hj:label:hjexperience:startdate' => 'Start Date',
    'hj:label:hjexperience:enddate' => 'End Date',
    'hj:label:hjexperience:description' => 'Job Description',
    'hj:label:hjexperience:access_id' => 'Visibility',

    'hj:label:hjsegment:title' => 'Título',
    'hj:label:hjsegment:description' => 'Descripción',
    'hj:label:hjsegment:access_id' => 'Visibilidad',

    'hj:framework:embed:options' => 'Embed Options',
    'hj:framework:embed:type' => 'Type:  ',
    'hj:framework:embed:float' => 'Float:  ',
    'hj:framework:embed:float' => 'Link to attach:  ',
    'hj:framework:embed:url' => 'Link to follow:  ',

    'hj:embed:link' => 'Inline Link',
    'hj:embed:small' => 'Small',
    'hj:embed:medium' => 'Medium',
    'hj:embed:large' => 'Large',

    'hj:embed:none' => 'None',
    'hj:embed:right' => 'Right',
    'hj:embed:left' => 'Left',

    /**
     * AJAX / JS
     */
    'hj:framework:processing' => 'Processing...',
    'hj:framework:success' => 'Successfully completed',
    'hj:framework:error' => 'Something went wrong',

	'hj:framework:pagination:loadmore' => 'Show More',
);


add_translation("es", $spanish);
?>