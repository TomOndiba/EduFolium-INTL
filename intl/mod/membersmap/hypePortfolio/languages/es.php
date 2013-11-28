<?php

$spanish = array(
    
    /** 
     *  Portfolio UI elements
     */
    'portfolio' => 'EduFolium',
    'hj:portfolio:menu:owner_block' => 'EduFolium',

    'hj:portfolio:portfolio' => "EduFolium de %s",
    'hj:portfolio:portfolios' => "EduFoliums de %s",
    'hj:portfolio:addnew' => 'Agregar',
    /**
     *  Widgets
     */
    'hj:portfolio:widget' => 'Agregar Sección de EduFolium',
    'hj:portfolio:widgetdescription' => 'Widget de Sección de EduFolium',
    'hj:portfolio:widget:title' => 'Titulo de la sección',
    
    'hj:portfolio:widget:type' => 'Tipo de Sección',
    /**
     * Labels
     * 
     */
    'hj:label:form:new:hypePortfolio:portfolio:create' => 'Crear Nuevo EduFolium',
    'hj:label:form:edit:hypePortfolio:portfolio:create' => 'Editar su EduFolium',
    'hj:label:form:new:hypePortfolio:experience' => 'Agregar Experiencia Laboral',
    'hj:label:form:edit:hypePortfolio:experience' => 'Editar Experiencia Laboral',
    'hj:label:form:new:hypePortfolio:education' => 'Agregar Estudios',
    'hj:label:form:edit:hypePortfolio:education' => 'Editar Estudios',
    'hj:label:form:new:hypePortfolio:languages' => 'Agregar Idioma',
    'hj:label:form:edit:hypePortfolio:languages' => 'Editar Idioma',
    'hj:label:form:new:hypePortfolio:skills' => 'Agregar Habilidades',
    'hj:label:form:edit:hypePortfolio:skills' => 'Editar Habilidades',
    'hj:label:form:new:hypePortfolio:files' => 'Agregar archivo',
    'hj:label:form:edit:hypePortfolio:files' => 'Editar Archivo',
    'hj:label:form:edit:hypePortfolio:email' => 'Enviar EduFolium por correo',
    
    /**
     * Languages
     */
    'hj:portfolio:proficiency:native' => 'Native or bilingual proficiency',
    'hj:portfolio:proficiency:fullprofessional' => 'Full professional proficiency',
    'hj:portfolio:proficiency:workingprofessional' => 'Working professional proficiency',
    'hj:portfolio:proficiency:limitedworking' => 'Limited working proficiency',
    'hj:portfolio:proficiency:elementary' => 'Elementary proficiency',
    
    /**
     * UI
     */
    'hj:portfolio:button:print' => 'Versión para impresora',
    'hj:portfolio:button:email' => 'Enviar EduFolium por correo',
    
    /**
     *  Modules
     */
    'hj:portfolio:hjexperience' => 'Experiencia Laboral',
    'hj:portfolio:hjeducation' => 'Estudios',
    'hj:portfolio:hjskill' => 'Habilidades',
    'hj:portfolio:hjlanguage' => 'Idiomas',
    'hj:portfolio:hjportfoliofile' => 'Archivos',
    'hj:portfolio:hjplace' => 'Lugares',
    'hj:hjportfolio:hjexperience' => 'Experiencia Laboral',
    'hj:hjportfolio:hjeducation' => 'Estudios',
    'hj:hjportfolio:hjskill' => 'Habilidades',
    'hj:hjportfolio:hjlanguage' => 'Idiomas',
    'hj:hjportfolio:hjportfoliofile' => 'Archivos',
    'hj:hjportfolio:hjplace' => 'Lugares',
    'hj:hjportfolio:default' => 'Cambiar este nombre en la configuración',
    
    
    
    /**
     * Actions
     */
    'hj:portfolio:save:success' => 'Su EduFolium fue guardado satisfactoriamente',
    'hj:portfolio:save:error' => 'Su EduFolium no pudo ser guardado',
    'hj:portfolio:delete:success' => 'Su EduFolium fue eliminado satisfactoriamente',
    'hj:portfolio:delete:error' => 'Su EduFolium no pudo ser borrado',
    'hj:portfolio:setup:success' => 'Su EduFolium fue configurado satisfactoriamente. Puede empezar a agregar información.',
    'hj:portfolio:setup:error' => 'Hubo un problema configurando su EduFolium. ',
    'hj:portfolio:noportfolio' => 'Este usuario todavía no tiene un EduFolium. Verifique más adelante',
    /**
     * River
     */
    'river:create:object:hjportfolio' => '%s creó un nuevo EduFolium %s',
    'river:update:object:hjportfolio' => '%s actualizó su EduFolium %s',
    
    'river:create:object:hjexperience' => '%s agregó nueva experiencia laboral como %s en su EduFolium',
    'river:update:object:hjexperience' => '%s actualizó experiencia laboral como %s',
    
    'river:create:object:hjeducation' => '%s agregó un nuevo grado %s a sus estudios',
    'river:update:object:hjeducation' => '%s actualizó un grado',
    
    'river:create:object:hjlanguage' => '%s agregó un nuevo idioma',
    'river:update:object:hjlanguage' => '%s actualizó los idiomas que habla',
    
    'river:create:object:hjportfoliofile' => '%s agregó un nuevo archivo %s a su EduFolium',
    'river:update:object:hjportfoliofile' => '%s actualizó el archivo %s a su EduFolium',
    
    'river:create:object:hjskill' => '%s agregó una nueva habilidad a su lista de habilidades',
    'river:update:object:hjskill' => '%s actualizó sus habilidades',
    
    
    
);

add_translation("es", $spanish);
?>