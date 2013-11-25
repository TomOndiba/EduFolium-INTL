<?php
/**
 * Design hypePortfolio items using hjForm and hjField classes
 */
function hj_portfolio_setup() {
    if (elgg_is_logged_in()) {
        hj_portfolio_setup_portfolio_form();
        hj_portfolio_setup_experience_form();
        hj_portfolio_setup_education_form();
        hj_portfolio_setup_skill_form();
        hj_portfolio_setup_language_form();
        hj_portfolio_setup_file_form();
        elgg_set_plugin_setting('hj:portfolio:setup', true);
        return true;
    }
    return false;
}

function hj_portfolio_setup_portfolio_form() {
    $form = new hjForm();
    $form->title = 'hypePortfolio:portfolio:create';
    $form->label = 'Create Portfolio';
    $form->description = '';
    $form->subject_entity_subtype = 'hjsegment';
    $form->handler = 'hjportfolio';
    $form->notify_admins = false;
    $form->add_to_river = false;
    $form->comments_on = true;

    if ($form->save()) {
        $form->addField(array(
            'title' => 'Name of your portfolio',
            'name' => 'title',
            'mandatory' => true
        ));

        $form->addField(array(
            'title' => 'Description',
            'name' => 'description',
            'input_type' => 'longtext',
            'class' => 'elgg-input-longtext'
        ));
        
        $form->addField(array(
            'title' => 'Access Level',
            'input_type' => 'access',
            'mandatory' => true,
            'name' => 'access_id'
        ));

        return true;
    }
    return false;
}

function hj_portfolio_setup_experience_form() {
    elgg_load_library('hj:framework:knowledge');

// Setup employment/experience form
    $form = new hjForm();
    $form->title = 'hypePortfolio:experience';
    $form->label = 'Add Work Experience';
    $form->description = '';
    $form->subject_entity_subtype = 'hjexperience';
    $form->notify_admins = false;
    $form->add_to_river = true;
    $form->comments_on = true;
    $form->ajaxify = true;

    if ($form->save()) {
        $form->addField(array(
            'title' => 'Position',
            'name' => 'title',
            'mandatory' => true
        ));

        $form->addField(array(
            'title' => 'Company name',
            'name' => 'companyname',
            'mandatory' => true,
            'image_block_section' => 'strapline'
        ));

        $form->addField(array(
            'title' => 'Industry',
            'input_type' => 'tags',
            'name' => 'industries'
        ));

        $form->addField(array(
            'title' => 'Location',
            'name' => 'location',
            'input_type' => 'location',
            'image_block_section' => 'strapline'
        ));

        $form->addField(array(
            'title' => 'Start Date',
            'input_type' => 'date',
            'name' => 'startdate',
            'mandatory' => 'true',
            'image_block_section' => 'strapline'
        ));

        $form->addField(array(
            'title' => 'End Date',
            'input_type' => 'date',
            'value' => "elgg_echo('present');",
            'name' => 'enddate',
            'image_block_section' => 'strapline'
        ));

        $form->addField(array(
            'title' => 'Description',
            'input_type' => 'longtext',
            'class' => 'elgg-input-longtext',
            'name' => 'description'
        ));

        $form->addField(array(
            'title' => 'Access Level',
            'input_type' => 'access',
            'name' => 'access_id'
        ));
        return true;
    }
    return false;
}

function hj_portfolio_setup_education_form() {
// Setup education form
    $form = new hjForm();
    $form->title = 'hypePortfolio:education';
    $form->label = 'Add Education';
    $form->description = '';
    $form->subject_entity_subtype = 'hjeducation';
    $form->notify_admins = false;
    $form->add_to_river = true;
    $form->comments_on = true;
    $form->ajaxify = true;

    if ($form->save()) {
        $form->addField(array(
            'title' => 'Degree',
            'name' => 'title',
            'mandatory' => true
        ));

        $form->addField(array(
            'title' => 'School Name',
            'name' => 'schoolname',
            'mandatory' => true,
            'image_block_section' => 'strapline'
        ));
        $form->addField(array(
            'title' => 'Field(s) of Study',
            'input_type' => 'tags',
            'name' => 'fieldofstudy',
            'mandatory' => true,
            'image_block_section' => 'strapline'
        ));
        $form->addField(array(
            'title' => 'Commencement Date',
            'input_type' => 'date',
            'name' => 'startdate',
            'mandatory' => true,
            'image_block_section' => 'strapline'
        ));
        $form->addField(array(
            'title' => 'Graduation Date',
            'input_type' => 'date',
            'name' => 'enddate',
            //'mandatory' => true,
            'value' => "elgg_echo('present');",
            'image_block_section' => 'strapline'
        ));
        $form->addField(array(
            'title' => 'Clubs and activities',
            'input_type' => 'tags',
            'name' => 'activities'
        ));
        $form->addField(array(
            'title' => 'Additional notes',
            'input_type' => 'longtext',
            'class' => 'elgg-input-longtext',
            'name' => 'description'
        ));
        $form->addField(array(
            'title' => 'Access Level',
            'input_type' => 'access',
            'name' => 'access_id'
        ));
        return true;
    }
    return false;
}

function hj_portfolio_setup_skill_form() {
// Setup education form
    $form = new hjForm();
    $form->title = 'hypePortfolio:skills';
    $form->label = 'Add Skills';
    $form->description = 'hypePortfolio Skills Creation Form';
    $form->subject_entity_subtype = 'hjskill';
    $form->notify_admins = false;
    $form->add_to_river = true;
    $form->comments_on = true;
    $form->ajaxify = true;

    if ($form->save()) {
        $form->addField(array(
            'title' => 'Skill(s)',
            'input_type' => 'tags',
            'name' => 'title',
            'mandatory' => true
        ));
        $form->addField(array(
            'title' => 'Access Level',
            'name' => 'access_id',
            'input_type' => 'access'
        ));
        return true;
    }
    return false;
}

function hj_portfolio_setup_language_form() {
//Setup Language Form
    $form = new hjForm();
    $form->title = 'hypePortfolio:languages';
    $form->label = 'Add Languages';
    $form->description = '';
    $form->action = 'action/framework/entities/save';
    $form->subject_entity_type = 'object';
    $form->subject_entity_subtype = 'hjlanguage';
    $form->notify_admins = false;
    $form->add_to_river = true;
    $form->comments_on = false;
    $form->ajaxify = true;

    if ($form->save()) {
        $form->addField(array(
            'title' => 'Language',
            'name' => 'language',
            'mandatory' => true
        ));
        $form->addField(array(
            'title' => 'Proficiency',
            'name' => 'proficiency',
            'options' => 'hj_portfolio_get_language_proficiency_array();',
            'input_type' => 'dropdown',
            'mandatory' => true,
            'image_block_section' => 'strapline'
        ));
        $form->addField(array(
            'title' => 'Access Level',
            'name' => 'access_id',
            'input_type' => 'access'
        ));
        return true;
    }
    return false;
}

function hj_portfolio_setup_file_form() {
//Setup Files Form
    $form = new hjForm();
    $form->title = 'hypePortfolio:files';
    $form->label = 'Add label';
    $form->description = 'hypePortfolio File Upload Form';
    $form->subject_entity_subtype = 'hjportfoliofile';
    $form->notify_admins = false;
    $form->add_to_river = true;
    $form->comments_on = true;

    if ($form->save()) {
        $form->addField(array(
            'title' => 'Name of the File',
            'name' => 'title',
            'mandatory' => true
        ));
        $form->addField(array(
            'title' => 'Description',
            'name' => 'description',
            'input_type' => 'longtext',
            'class' => 'elgg-input-longtext'
        ));
        $form->addField(array(
            'title' => 'Tags',
            'name' => 'tags',
            'input_type' => 'tags'
        ));
        $form->addField(array(
            'title' => 'Folder Name',
            'tooltip' => 'elgg_echo("if empty, create one below")',
            'name' => 'filefolder',
            'input_type' => 'dropdown',
            'options_values' => 'hj_framework_get_user_file_folders();'
        ));
        $form->addField(array(
            'title' => 'Create new folder',
            'name' => 'newfilefolder'
        ));
        $form->addField(array(
            'title' => 'Upload',
            'name' => 'fileupload',
            'input_type' => 'file',
        ));
        $form->addField(array(
            'title' => 'Access Level',
            'name' => 'access_id',
            'input_type' => 'access'
        ));
        return true;
    }
    return false;
}