<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */

class Edujobsext extends ElggObject {
    const SUBTYPE = "edujobsext";
 	
    protected $meta_defaults = array(
        "title" 			=> NULL,
        "description" 		=> NULL,
        "country" 			=> NULL,
        "location" 			=> NULL,
        "company" 			=> NULL,
        "source" 			=> NULL,
        "link" 				=> NULL,
        "localt" 			=> NULL,	// location alternative
    );    

    protected function initializeAttributes() {
        parent::initializeAttributes();

        $this->attributes["subtype"] = self::SUBTYPE;
    }

}
