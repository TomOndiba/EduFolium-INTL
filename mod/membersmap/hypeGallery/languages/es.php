<?php

$spanish = array(

    /**
     *  Gallery UI elements
     */
    'gallery' => 'Galería',
    'hj:gallery:menu:owner_block' => 'Galería',

	'item:object:hjalbum' => 'Álbum',
	'items:object:hjalbum' => 'Álbums',

	'item:object:hjalbumimage' => 'Imagen de Álbum',
	'items:object:hjalbumimage' => 'Imagenes de Álbum',

    'hj:gallery:album:owner' => "Álbum de %s",
    'hj:gallery:albums:owner' => "Álbumes de %s",
	'hj:gallery:album:author' => 'po %s',
	'hj:gallery:albums:all' => 'Todos los Álbumes',
    'hj:gallery:addnew' => 'Crear Álbum',
    'hj:gallery:addimage' => 'Agregar Foto',
    'hj:gallery:noalbums' => 'No hay ningún álbum todavía',

	'hj:gallery:image:author' => 'Agregado por %s',

    /**
     *  Widgets
     */
    'hj:gallery:widget' => 'Agregar Sección a Galería',
    'hj:gallery:widgetdescription' => 'Widget de la sección de Galería',
    'hj:gallery:widget:title' => 'Título de la Sección',

    'hj:gallery:widget:type' => 'Tipo de Sección',
    /**
     * Labels
     *
     */
    'hj:label:form:new:hypeGallery:gallery:create' => 'Crear nueva Galería',
    'hj:label:form:edit:hypeGallery:gallery:create' => 'Editar Galería',
    'hj:label:form:new:hypeGallery:album' => 'Agregar nuevo Álbum',
    'hj:label:form:edit:hypeGallery:album' => 'Editar álbum',
    'hj:label:form:new:hypeGallery:album:image' => 'Agregar Imagen',
    'hj:label:form:edit:hypeGallery:album:image' => 'Editar Imagen',

    'hj:label:hjalbum:title' => 'Nombre del Álbum',
    'hj:label:hjalbum:description' => 'Descripción',
    'hj:label:hjalbum:location' => 'Ubicación del Álbum',
    'hj:label:hjalbum:date' => 'Fecha del Álbum',
    'hj:label:hjalbum:friend_tags' => 'Amigos en este álbum',
    'hj:framework:relationship_tags:notagged_in' => 'Todavía no tienes amigos',
    'hj:label:hjalbum:tags' => 'Etiquetas de palabras',
    'hj:label:hjalbum:copyright' => 'Copyright Notices',
    'hj:label:hjalbum:access_id' => 'Visibilidad',

    'hj:label:hjalbumimage:image' => 'Subir Imagen',
    'hj:label:hjalbumimage:title' => 'Titulo',
    'hj:label:hjalbumimage:description' => 'Descripción',
    'hj:label:hjalbumimage:location' => 'Ubicación',
    'hj:label:hjalbumimage:date' => 'Fecha',
    'hj:label:hjalbumimage:friend_tags' => 'Amigos en esta Foto',
    'hj:label:hjalbumimage:tags' => 'Etiquetas',
    'hj:label:hjalbumimage:copyright' => 'Aviso de Privacidad',
    'hj:label:hjalbumimage:access_id' => 'Visibilidad',
	'hj:label:hjalbum:permissions' => '¿Quien puede agregar fotos a este álbum?',

	'permission:value:private' => 'Solo yo',
	'permission:value:friends' => 'Yo y mis colegas',
	'permission:value:public' => 'Todo el mundo',

	'hj:album:image:makeavatar' => 'Hacer foto de Perfil',
	'hj:album:image:makecover' => 'Convertir en Portada del Álbum',
	'hj:album:image:editthumb' => 'Editar Thumbnail',
	'hj:album:image:tag' => 'Tag',

	'hj:gallery:thumb:crop:success' => 'Thumbnail ha sido creado',
	'hj:album:image:thumb:create' => 'Create a thumbnail',
	'hj:album:image:preview' => 'Preview',
	
	/**
     *  Modules
     */
    'hj:gallery:hjalbum' => 'Álbumes',
    'hj:hjgallery:hjalbum' => 'Álbumes',



    /**
     * Actions
     */
    'hj:gallery:save:success' => 'La Galería fue guardada satisfactoriamente',
    'hj:gallery:save:error' => 'La Galería no pudo ser guardada',
    'hj:gallery:delete:success' => 'La galería fue eliminada satisfactoriamente',
    'hj:gallery:delete:error' => 'La Galería no pudo ser eliminada',
    'hj:gallery:setup:success' => 'La galería fue configurada satisfactoriamente. Puede empezar a ingresar información.',
    'hj:gallery:setup:error' => 'Ocurrió un problema configurando su galería.',
    'hj:gallery:nogallery' => 'Este usuario todavía no tiene galerías. Verifique más adelante',
    /**
     * River
     */
    'river:create:object:hjgallery' => '%s creó una nueva galería %s',
    'river:update:object:hjgallery' => '%s actualizó su galería %s',

	'river:create:object:hjalbumimage' => '%s subió una nueva imagen | %s',
	'river:update:object:hjalbumimage' => '%s actualizo su imagen | %s',

	'river:create:object:hjalbum' => '%s creó un nuevo álbum | %s',
	'river:update:object:hjalbum' => '%s actualizó su álbum | %s',

	'hj:album:cover:success' => 'La nueva portada de álbum fue actualizada satisfactoriamente',
	'hj:album:cover:error' => 'Hubo un problema configurando la nueva portada de álbum',

	'hj:album:image:startagging' => 'Empiece a etiquetar ',
	'hj:album:image:stoptagging' => 'Dejar a etiquetar ',
	'hj:album:image:tag:create' => 'Agregar Etiqueta',
	'hj:gallery:phototag:success' => 'La etiqueta fue agregada satisfactoriamente',
	'hj:gallery:phototag:error' => 'La etiqueta no pudo ser agregada',
	
);

add_translation("es", $spanish);
?>