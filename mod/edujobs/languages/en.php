<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */

$lang = array(

    // Menu items and titles
    'edujobs' => "Jobs",
    'edujobs:menu' => "Jobs",
    'item:object:edujobs' => "Jobs",
    'item:object:jobappication' => "Job Applications",
    'item:object:educv' => "Teachers CV",
        
    // Menu tab titles
    'edujobs:label:myjobs' => "My Jobs",
    'edujobs:label:mycv' => "My CV",
    'edujobs:label:jobsmaylike' => "Jobs you may Like",
    'edujobs:label:myjobposts' => "Job Posts",
    'edujobs:label:teachers' => "Search Teachers",
    'edujobs:label:jobs' => "Search Jobs",
            
    // Sidebar
        
    // General
    'edujobs:none' => "No available jobs",
    'edujobs:add' => "Post job",
    'edujobs:job/add' => "Post job",
    'edujobs:teachers' => "Teachers",
    'edujobs:cv' => "CV of %s",
    'edujobs:add:noaccessforpost' => "Not valid permissions for posting jobs",
    'edujobs:teachers:none' => "No available teachers",
    'edujobs:teachers:myjobs:empty' => "You haven't apply to any jobs yet.",
    'edujobs:teachers:jobsmaylike:empty' => "No suggestions for you at the moment",
    'edujobs:delete:confirm' => "Do you really want to delete this ?",
    'edujobs:delete:cv:success' => "CV was successfully deleted",
    
    'edujobs:add:requiredfields' => "All fields with asterisk are required",
    'edujobs:add:title' => "Job Title",
    'edujobs:add:title:note' => "Enter a short comprehensive title for this job",
    'edujobs:add:subject' => "Subject(s)",
    'edujobs:add:subject:one' => "Subject",
    'edujobs:add:subject:note' => "Enter one or more subjects",
    'edujobs:add:subject:math' => "Math",
    'edujobs:add:subject:science' => "Science",
    'edujobs:add:subject:socialstudies' => "Social Studies",
    'edujobs:add:subject:spanish' => "Spanish",
    'edujobs:add:subject:english' => "English",
    'edujobs:add:subject:otherforeignlangs' => "Other Foreign Languages",
    'edujobs:add:subject:technology' => "Technology",
    'edujobs:add:subject:othersubjects' => "Other Subjects (specify below)",
    'edujobs:add:subject:othersubjects_text' => "Please Specify",
    'edujobs:add:grade' => "Grade(s)",
    'edujobs:add:grade:one' => "Grade",
    'edujobs:add:grade:note' => "Enter one or more grades",
    'edujobs:add:grade:kindergarten' => "Kindergarten",
    'edujobs:add:grade:earlyelementary' => "Early Elementary (Grades 1 to 3)",
    'edujobs:add:grade:lateelementary' => "Late Elementary (Grades 4 to 5)",
    'edujobs:add:grade:middleschool' => "Middle School (Grades 6 to 8)",
    'edujobs:add:grade:highschool' => "High school (Grades 9 to 12)",
    'edujobs:add:grade:othercategories' => "Other Categories (specify below)",
    'edujobs:add:description' => "Job Description / Requirements",
    'edujobs:add:description:note' => "Enter a detailed description for this job",
    'edujobs:add:country' => "Country",
    'edujobs:add:country:note' => "Select the country where this job is offered",
    'edujobs:add:city' => "City",
    'edujobs:add:city:note' => "Select the city where this job is offered",
    'edujobs:add:published_until' => "Publish for",
    'edujobs:add:published_until:note' => "Select the period which this job will be published",
    'edujobs:add:submit' => "Publish",
    'edujobs:add:submit:next' => "Save and Next",
    'edujobs:add:submit:save' => "Save",
    'edujobs:add:missing:title' => "Job title is missing.",
    'edujobs:add:missing:subject' => "Job subject is missing.",
    'edujobs:add:missing:othersubject' => "Other job subject is missing.",
    'edujobs:add:missing:grade' => "Job grade is missing.",
    'edujobs:add:missing:othergrade' => "Other job categories is missing.",
    'edujobs:add:missing:description' => "Job description is missing.",
    'edujobs:add:missing:country' => "Job country is missing.",
    'edujobs:add:missing:city' => "Job city is missing.",
    'edujobs:add:missing:published_until' => "Job published period is missing.",
    'edujobs:add:tags' => "Tags",
    '86400' => "1 days",
    '172800' => "2 days",
    '259200' => "3 days",
    '604800' => "7 days",
    '1296000' => "2 weeks",
    '2592000' => "1 month",
    '5184000' => "2 months",
    '7776000' => "3 months",
    'edujobs:add:job:failed' => "Fail on saving job",
    'edujobs:add:job:missing_fields' => "Job post cannot be saved. Please enter missing fields.",
    'edujobs:add:job:success' => "Job was saved successfully",
    'edujobs:delete:job:success' => "Job was deleted successfully",
    'edujobs:delete:job:failed' => "Fail on delete",
    'edujobs:edit:job' => "Job edit",
    'edujobs:edit:job:novalid' => "No valid perimission to edit this job",
    'edujobs:view:job:date' => "Posted on ",
    'edujobs:view:job:expired' => "<span style='color:red;'>Expired</span>",
    'edujobs:view:job:expired_simple' => "This job has expired",
    'edujobs:view:job:ends' => "Ends: ",
    'edujobs:view:job:update' => "Update",
    'edujobs:view:job:applicants' => "See Applicants",
    'edujobs:view:job:publish' => "Publish",
    'edujobs:view:job:publish' => "Unpublish",
    'edujobs:view:job:apply' => "Apply now",
    'edujobs:view:job:applied' => "Applied - %s",
    'edujobs:view:job:apply:notvalidjob' => "Not valid job.",
    'edujobs:view:job:apply:notvalidapplicant' => "Not valid applicant.",
    'edujobs:view:job:apply:notvaliduser' => "Not valid user. You must login to apply.",
    'edujobs:view:job:apply:success' => "You successfully applied for this job",
    'edujobs:view:job:apply:failed' => "Error while applying for this job",
    'edujobs:view:job:apply:alreadyapplied' => "You have already applied for this job",
    'edujobs:view:job:sort:datepostedrecent' => "Date posted (more recent)",
    'edujobs:view:job:sort:datepostedlatest' => "Date posted (least recent)",
    'edujobs:view:job:sort:noofapplicandslow' => "No of Applicants (low)",
    'edujobs:view:job:sort:noofapplicandshigh' => "No of Applicants (high)",
    'edujobs:view:job:sort:dateappliedlatest' => "Date applied (least recent)",
    'edujobs:view:job:sort:dateappliedrecent' => "Date applied (more recent)",
    'edujobs:view:job:applicants' => "Applicants",
    'edujobs:view:job:applicants:all' => "All Applicants",
    'edujobs:view:job:applicants:favorites' => "Favorites",
    'edujobs:view:job:applicants:rejected' => "Rejected",
    'edujobs:view:job:applicants:title' => "Applicants for \"%s\"",
    'edujobs:view:job:applicants:none' => "No Applicants for this job yet",
    'edujobs:view:job:applicants:favorites:none' => "No Applicants marked as Favorite for this job yet",
    'edujobs:view:job:applicants:rejected:none' => "No Applicants marked as Rejected for this job yet",
    'edujobs:view:job:applicants:noaccess' => "You don't have permissions to view this page",
    'edujobs:view:job:applicants:moreinfo' => "More Info",
    'edujobs:view:job:applicants:markasfavorite' => "Mark as Favorite",
    'edujobs:view:job:applicants:markasrejected' => "Mark as Rejected",
    'edujobs:view:job:applicants:notvalidpermissions' => "You don't have permissions for this action",
    'edujobs:view:job:favorite:success' => "You successfully marked this applicant as Favorite",
    'edujobs:view:job:favorite:failed' => "Error while marking this applicant as Favorite",
    'edujobs:view:job:rejected:success' => "You successfully marked this applicant as Rejected",
    'edujobs:view:job:rejected:failed' => "Error while marking this applicant as Rejected",
    'edujobs:unpublish:job:success' => "You successfully unpublished this job",
    'edujobs:unpublish:job:failed' => "Unpublish of this job failed",
    
    // CV
    'edujobs:teachers/addcv1' => "Edit CV",
    'edujobs:cv:create' => "Create CV to apply",
    'edujobs:cv:empty' => "You haven't upload you CV yet. <a href='%s'>Click here</a> to make your CV.",
    'edujobs:cv:noaccessforpost' => "Not valid permissions for uploading CV",
    'edujobs:cv:sections' => "CV Edit Sections",
    'edujobs:cv:add1' => "CV: Personal Information",
    'edujobs:cv:add1:simple' => "Personal Information",
    'edujobs:add:cv_name' => "Name",
    'edujobs:add:cv_name:note' => "Enter your name",
    'edujobs:add:cv_last_name' => "Last Name",
    'edujobs:add:cv_last_name:note' => "Enter your last name",    
    'edujobs:add:cv_description' => "Description",
    'edujobs:add:cv_description:note' => "Enter a short description of yourself",  
    'edujobs:add:cv_gender' => "Gender",
    'edujobs:add:cv_gender:note' => "Enter your gender",
    'edujobs:add:cv_birth_date' => "Date of Birth",
    'edujobs:add:cv_birth_date:note' => "Enter birth date",
    'edujobs:add:cv_birth_country' => "Country of Birth",
    'edujobs:add:cv_birth_country:note' => "Enter your birth country",
    'edujobs:add:cv_birth_city' => "City of Birth",
    'edujobs:add:cv_birth_city:note' => "Enter your birth city",
    'edujobs:add:cv_email' => "Email",
    'edujobs:add:cv_email:note' => "Enter your email",    
    'edujobs:add:cv_telephone' => "Phone Number",
    'edujobs:add:cv_telephone:note' => "Enter your phone number",
    'edujobs:add:cv_address' => "Address",
    'edujobs:add:cv_address:note' => "Enter your address",
	'edujobs:cv:add2' => "CV: Position Related Questions",
    'edujobs:cv:add2:simple' => "Position Related Questions",   
    'edujobs:add:cv_position_looking_for' => "What position are you looking for?",
    'edujobs:add:cv_position_looking_for:note' => "",     
    'edujobs:add:cv_work_experience_years' => "Total years of work experience",
    'edujobs:add:cv_work_experience_years:note' => "",     
    'edujobs:add:cv_salary_min_acceptable' => "Minimum acceptable salary",
    'edujobs:add:cv_salary_min_acceptable:note' => "",
    'edujobs:add:cv_salary_unit_of_time' => "Unit of time of the salary",
    'edujobs:add:cv_salary_unit_of_time:note' => "",     
    'edujobs:add:cv_salary_currency' => "Currency of the salary",
    'edujobs:add:cv_salary_currency:note' => "",     
    'edujobs:add:cv_availability_date' => "Date available to start working",
    'edujobs:add:cv_availability_date:note' => "",     
    'edujobs:add:cv_availability_date_specify' => "or Indicate a Date",
    'edujobs:add:cv_availability_date_specify:note' => "",     
    'edujobs:add:cv_desired_work_type' => "Type of work desired",
    'edujobs:add:cv_desired_work_type:note' => "",     
    'edujobs:add:cv_subject_math' => "Math",
    'edujobs:add:cv_subject_science' => "Science",
    'edujobs:add:cv_subject_socialstudies' => "Social Studies",
    'edujobs:add:cv_subject_spanish' => "Spanish",
    'edujobs:add:cv_subject_english' => "Engilsh",
    'edujobs:add:cv_subject_otherforeignlangs' => "Other Foreign Languages",
    'edujobs:add:cv_subject_technology' => "Technology",
    'edujobs:add:cv_subject_othersubjects' => "Other subjects (specify below)",
    'edujobs:add:cv_subject_othersubjects_text' => "Which? ",
    'edujobs:add:cv_grade_kindergarten' => "Kindergarten",
    'edujobs:add:cv_grade_earlyelementary' => "Early Elementary (Grades 1 to 3)",
    'edujobs:add:cv_grade_lateelementary' => "Late Elementary (Grades 4 to 5)",
    'edujobs:add:cv_grade_middleschool' => "Middle School (Grades 6 to 8)",
    'edujobs:add:cv_grade_highschool' => "High School (Grades 9 to 12)",
    'edujobs:add:cv_grade_othercategories' => "Other categories (specify below)",
    'edujobs:add:cv_grade_othercategories_text' => "Which? ",
    'edujobs:add:cv_more_info' => "Additional Information",
    'edujobs:add:cv_more_info:note' => "",                 
    'edujobs:cv:add:success' => "Your CV was successfully saved",
    'edujobs:cv:add:failed' => "Fail on saving your CV",
    'edujobs:cv:missing:cv_name' => "Name is missing.",
    'edujobs:cv:missing:cv_last_name' => "Last Name is missing.",
    'edujobs:cv:missing:cv_description' => "Description is missing.",
    'edujobs:cv:missing:cv_gender' => "Gender is missing.",
    'edujobs:cv:missing:cv_birth_date' => "Birth Date is missing.",
    'edujobs:cv:missing:cv_birth_country' => "Birth Country is missing.",
    'edujobs:cv:missing:cv_birth_city' => "Birth City is missing.",
    'edujobs:cv:missing:cv_email' => "Email is missing.",
    'edujobs:add:male' => "Male",
    'edujobs:add:female' => "Female",
    'edujobs:widget:cv' => "CV",
    'edujobs:widget:cv:description' => "Teacher's CV",
    'edujobs:widget:cv:empty' => "This user hasn't upload profile yet",
    'edujobs:widget:cv:full' => "View full CV",
    'edujobs:widget:cv:more' => "More Info",
    'edujobs:add:year' => "Year",
    'edujobs:add:month' => "Month",
    'edujobs:add:hour' => "Hour",   
    'edujobs:add:month01' => "Less than a month", 
    'edujobs:add:month13' => "1-3 Months", 
    'edujobs:add:month49' => "More than 3 months", 
    'edujobs:add:fulltime' => "Full-Time", 
    'edujobs:add:parttime' => "Part-Time", 
    'edujobs:add:cv_grade' => "In which grade(s) do you teach?",
    'edujobs:add:cv_grade:one' => "Grade(s)",
    'edujobs:add:cv_grade:note' => "Enter one or more grades",
    'edujobs:add:cv_subject' => "Subject(s)",
    'edujobs:add:subject:one' => "Subject",
    'edujobs:add:cv_subject:note' => "Enter one or more subjects",  
    'edujobs:cv:missing:cv_position_looking_for' => "Position is missing.",  
    'edujobs:cv:missing:cv_work_experience_years' => "Years of experience is missing.",         
    'edujobs:cv:missing:cv_salary_min_acceptable' => "Minimum acceptable salary is missing.",  
    'edujobs:cv:missing:cv_salary_unit_of_time' => "Unit of time of the salary is missing.",        
    'edujobs:cv:missing:cv_salary_currency' => "Currency of the salary is missing.",  
    'edujobs:cv:missing:cv_availability_date' => "Date available for start working is missing.",      
	'edujobs:add:missing:cv_subject' => "Subject(s) is missing.",
    'edujobs:add:missing:cv_othersubject' => "Other job subject is missing.",
    'edujobs:add:missing:cv_grade' => "Grade(s) is missing.",
    'edujobs:add:missing:cv_othergrade' => "Other job categories is missing.",
    'edujobs:cv:missing_fields' => "CV post cannot be saved. Please enter missing fields.",
    'edujobs:teachers:user:emptycv' => "CV not available",
    'edujobs:cv:currency:per' => " per ",
	'edujobs:teachers/addworkexperience' => "Add New Work Experience",
	'edujobs:cv:add3' => "CV: Work Experience",
	'edujobs:cv:add3:simple' => "Work Experience",  
	'edujobs:cv:addworkexperience' => "Add Work Experience", 
	'edujobs:cv:add4' => "CV: Education",
	'edujobs:cv:add4:simple' => "Education", 
	'edujobs:cv:addeducation' => "Add New Education",
	'edujobs:teachers/addeducation' => "Add New Education", 
	'edujobs:cv:add5' => "CV: Languages",
	'edujobs:cv:add5:simple' => "Languages", 
	'edujobs:cv:addlanguage' => "Add New Language",
	'edujobs:teachers/addlanguage' => "Add New Language",
	'edujobs:cv:add6' => "CV: Paste CV",
	'edujobs:cv:add6:simple' => "Paste CV", 	
	'edujobs:cv:add6:title' => "More Info", 
	'edujobs:cv:add7' => "CV: Portfolio",
	'edujobs:cv:add7:simple' => "Portfolio", 
	'edujobs:teachers/addportfolio' => "Add New Portfolio Link or File", 
	'edujobs:add:cvwe_job_title' => "Job Title",
    'edujobs:add:cvwe_job_title:note' => "",
    'edujobs:add:cvwe_organization' => "Name of Organization",
    'edujobs:add:cvwe_organization:note' => "",  
    'edujobs:add:cvwe_country' => "Country",
    'edujobs:add:cvwe_country:note' => "",  
    'edujobs:add:cvwe_city' => "City",
    'edujobs:add:cvwe_city:note' => "",  
    'edujobs:add:cvwe_period_from' => "Time Period",
    'edujobs:add:cvwe_period_from:start' => "Start date",
    'edujobs:add:cvwe_period_from:end' => "End date",
    'edujobs:add:cvwe_period_from:note' => "",  
    'edujobs:add:cvwe_period_to' => "to",
    'edujobs:add:cvwe_period_to:note' => "",  
    'edujobs:add:cvwe_period_now' => "I currently work here",
    'edujobs:add:cvwe_period_now:note' => "",  
    'edujobs:add:cvwe_salary_starting' => "Starting Salary",
    'edujobs:add:cvwe_salary_starting:note' => "",  
    'edujobs:add:cvwe_salary_ending' => "Salary at the moment you left",
    'edujobs:add:cvwe_salary_ending:note' => "",  
    'edujobs:add:cvwe_salary_unit_time' => "Unit time of salary",
    'edujobs:add:cvwe_salary_unit_time:note' => "",  
    'edujobs:add:cvwe_salary_currency' => "Currency of the salary",
    'edujobs:add:cvwe_salary_currency:note' => "",  
    'edujobs:add:cvwe_reasons_go' => "Reasons for leaving the job",
    'edujobs:add:cvwe_reasons_go:note' => "",  
    'edujobs:add:cvwe_comments' => "Comments",
    'edujobs:add:cvwe_comments:note' => "",  
 	'edujobs:delete:cvwe:success' => "Work experience was successfully deleted",
	'edujobs:cv:we:edit' => "Update",
	'edujobs:cv:we:delete' => "Delete",
	'edujobs:cv:add::we:success' => "Work experience was successfully added",
	'edujobs:cv:missing:cvwe_job_title' => "Job Title is missing",
	'edujobs:cv:missing:cvwe_organization' => "Name of organization is missing",
	'edujobs:cv:missing:cvwe_country' => "Country is missing",
	'edujobs:cv:missing:cvwe_city' => "City is missing",
	'edujobs:cv:missing:cvwe_period_from' => "Beginning of Time Period is missing",
	'edujobs:cv:missing:cvwe_period_to' => "Finish of Time Period is missing",
	'edujobs:cv:missing:missing_fields' => "Work experience cannot be saved. Please enter missing fields.",
	'edujobs:cv:add:we:failed' => "Error on saving work experience", 
	'edujobs:teachers:user:emptycvwe' => "Work experience not available",
	'edujobs:teachers:user:emptycvedu' => "Education not available",
	'edujobs:teachers:user:emptycvlang' => "Languages not available",
	'edujobs:teachers:user:emptycvport' => "Portfolio not available",
    'edujobs:add:cvedu_degree' => "Degree obtained",
    'edujobs:add:cvedu_degree:note' => "", 
    'edujobs:add:cvedu_school_name' => "School Name",
    'edujobs:add:cvedu_school_name:note' => "", 
    'edujobs:add:cvedu_country' => "Country",
    'edujobs:add:cvedu_country:note' => "", 
    'edujobs:add:cvedu_city' => "City",
    'edujobs:add:cvedu_city:note' => "", 
    'edujobs:add:cvedu_time_from' => "Time Period",
    'edujobs:add:cvedu_time_from:note' => "", 
    'edujobs:add:cvedu_time_currently' => "I currently study here",
    'edujobs:add:cvedu_time_to' => "to", 
    'edujobs:cv:missing:cvedu_degree' => "Degree is missing",
    'edujobs:cv:missing:cvedu_school_name' => "School Name is missing",
    'edujobs:cv:missing:cvedu_country' => "Country is missing",
    'edujobs:cv:missing:cvedu_city' => "City is missing",
    'edujobs:cv:missing:cvedu_time_from' => "Beginning of Time Period is missing",
    'edujobs:cv:missing:cvedu_time_to' => "Finish of Time Period is missing",
    'edujobs:cv:add:edu:failed' => "Error on saving education",
    'edujobs:cv:add:edu:success' => "Education was successfully added",
    'edujobs:add:cvedu_time_from:start' => "Start Date",
    'edujobs:add:cvedu_time_from:end' => "End Date",
    'edujobs:delete:cvedu:success' => "Education was successfully deleted",
    'edujobs:add:cvlang_language' => "Language",
    'edujobs:add:cvlang_language:note' => "",  
    'edujobs:add:cvlang_level' => "Level",
    'edujobs:add:cvlang_level:note' => "",  
    'edujobs:add:cvlang_cert_institute' => "Language Certification Institute",
    'edujobs:add:cvlang_cert_institute:note' => "",  
    'edujobs:add:cvlang_reading_score' => "Reading Section Score",
    'edujobs:add:cvlang_reading_score:note' => "",  
    'edujobs:add:cvlang_listening_score' => "Listening Section Score",
    'edujobs:add:cvlang_listening_score:note' => "",  
    'edujobs:add:cvlang_speaking_score' => "Speaking Section Score",
    'edujobs:add:cvlang_speaking_score:note' => "",  
    'edujobs:add:cvlang_writing_score' => "Writing Section Score",
    'edujobs:add:cvlang_writing_score:note' => "",  
    'edujobs:add:cvlang_total_score' => "Total Score",
    'edujobs:add:cvlang_total_score:note' => "",  
    'edujobs:add:cvlang_cert_document' => "Attach Certification Document",
    'edujobs:add:cvlang_cert_document:note' => "File type must be .jpg or .pdf", 
    'edujobs:add:cvlang_cert_document:title' => "Certification Document",
	'edujobs:langs:Akan' => "Akan",
	'edujobs:langs:Amharic' => "Amharic",
	'edujobs:langs:Arabic' => "Arabic",
	'edujobs:langs:Assamese' => "Assamese",
	'edujobs:langs:Awadhi' => "Awadhi",
	'edujobs:langs:Azerbaijani' => "Azerbaijani",
	'edujobs:langs:Balochi' => "Balochi",
	'edujobs:langs:Belarusian' => "Belarusian",
	'edujobs:langs:Bengali' => "Bengali",
	'edujobs:langs:Bhojpuri' => "Bhojpuri",
	'edujobs:langs:Burmese' => "Burmese",
	'edujobs:langs:Cantonese' => "Cantonese",
	'edujobs:langs:Cebuano' => "Cebuano",
	'edujobs:langs:Chewa' => "Chewa",
	'edujobs:langs:Chhattisgarhi' => "Chhattisgarhi",
	'edujobs:langs:Chittagonian' => "Chittagonian",
	'edujobs:langs:Czech' => "Czech",
	'edujobs:langs:Deccan' => "Deccan",
	'edujobs:langs:Dhundhari' => "Dhundhari",
	'edujobs:langs:Dutch' => "Dutch",
	'edujobs:langs:English' => "English",
	'edujobs:langs:French' => "French",
	'edujobs:langs:Fula' => "Fula",
	'edujobs:langs:Gan' => "Gan",
	'edujobs:langs:German' => "German",
	'edujobs:langs:Greek' => "Greek",
	'edujobs:langs:Gujarati' => "Gujarati",
	'edujobs:langs:Hakka' => "Hakka",
	'edujobs:langs:Haryanvi' => "Haryanvi",
	'edujobs:langs:Hausa' => "Hausa",
	'edujobs:langs:Hiligaynon' => "Hiligaynon",
	'edujobs:langs:Hindi' => "Hindi",
	'edujobs:langs:Hmong' => "Hmong",
	'edujobs:langs:Hungarian' => "Hungarian",
	'edujobs:langs:Igbo' => "Igbo",
	'edujobs:langs:Ilokano' => "Ilokano",
	'edujobs:langs:Italian' => "Italian",
	'edujobs:langs:Japanese' => "Japanese",
	'edujobs:langs:Javanese' => "Javanese",
	'edujobs:langs:Jin' => "Jin",
	'edujobs:langs:Kannada' => "Kannada",
	'edujobs:langs:Kazakh' => "Kazakh",
	'edujobs:langs:Khmer' => "Khmer",
	'edujobs:langs:Kinyarwanda' => "Kinyarwanda",
	'edujobs:langs:Kirundi' => "Kirundi",
	'edujobs:langs:Konkani' => "Konkani",
	'edujobs:langs:Korean' => "Korean",
	'edujobs:langs:Kurdish' => "Kurdish",
	'edujobs:langs:Madurese' => "Madurese",
	'edujobs:langs:Magahi' => "Magahi",
	'edujobs:langs:Maithili' => "Maithili",
	'edujobs:langs:Malagasy' => "Malagasy",
	'edujobs:langs:Malay/Indonesian' => "Malay/Indonesian",
	'edujobs:langs:Malayalam' => "Malayalam",
	'edujobs:langs:Mandarin' => "Mandarin",
	'edujobs:langs:Marathi' => "Marathi",
	'edujobs:langs:Marwari' => "Marwari",
	'edujobs:langs:Mossi' => "Mossi",
	'edujobs:langs:Nepali' => "Nepali",
	'edujobs:langs:Oriya' => "Oriya",
	'edujobs:langs:Oromo' => "Oromo",
	'edujobs:langs:Pashto' => "Pashto",
	'edujobs:langs:Persian' => "Persian",
	'edujobs:langs:Polish' => "Polish",
	'edujobs:langs:Portuguese' => "Portuguese",
	'edujobs:langs:Punjabi' => "Punjabi",
	'edujobs:langs:Quechua' => "Quechua",
	'edujobs:langs:Romanian' => "Romanian",
	'edujobs:langs:Russian' => "Russian",
	'edujobs:langs:Saraiki' => "Saraiki",
	'edujobs:langs:Serbo-Croatian' => "Serbo-Croatian",
	'edujobs:langs:Shona' => "Shona",
	'edujobs:langs:Sindhi' => "Sindhi",
	'edujobs:langs:Sinhalese' => "Sinhalese",
	'edujobs:langs:Somali' => "Somali",
	'edujobs:langs:Spanish' => "Spanish",
	'edujobs:langs:Sundanese' => "Sundanese",
	'edujobs:langs:Swahili' => "Swahili",
	'edujobs:langs:Swedish' => "Swedish",
	'edujobs:langs:Sylheti' => "Sylheti",
	'edujobs:langs:Tagalog' => "Tagalog",
	'edujobs:langs:Tamil' => "Tamil",
	'edujobs:langs:Telugu' => "Telugu",
	'edujobs:langs:Thai' => "Thai",
	'edujobs:langs:Turkish' => "Turkish",
	'edujobs:langs:Ukrainian' => "Ukrainian",
	'edujobs:langs:Urdu' => "Urdu",
	'edujobs:langs:Uyghur' => "Uyghur",
	'edujobs:langs:Uzbek' => "Uzbek",
	'edujobs:langs:Vietnamese' => "Vietnamese",
	'edujobs:langs:Wu' => "Wu",
	'edujobs:langs:Xhosa' => "Xhosa",
	'edujobs:langs:Xiang' => "Xiang",
	'edujobs:langs:Yoruba' => "Yoruba",
	'edujobs:langs:Zhuang' => "Zhuang",
	'edujobs:langs:Zulu' => "Zulu",
	'edujobs:langs:level:mother' => "Mother Tongue",
	'edujobs:langs:level:native' => "Native Like",
	'edujobs:langs:level:advanced' => "Advanced",
	'edujobs:langs:level:intermediate' => "Intermediate",
	'edujobs:langs:level:basic' => "Basic",
	'edujobs:langs:level:none' => "None",
	'edujobs:cv:missing:cvlang_language' => "Language is missing",
	'edujobs:cv:missing:cvlang_level' => "Level is missing",
    'edujobs:cv:add:lang:failed' => "Error on saving language",
    'edujobs:cv:add:lang:success' => "Language was successfully added",
    'edujobs:cv:lang:score' => "Score",
    'edujobs:lang:cvlang_cert_document:wrong_type' => "Not valid file type for Certification Document",
    'edujobs:delete:cvlang:success' => "Language was successfully deleted",
    'edujobs:add:cv_paste_cv' => "Copy the text from your pdf or word document and paste here",
    'edujobs:cv:portfolio' => "Portfolio",
    'edujobs:cv:download:filenotexists' => "File doesn't exists",
    'edujobs:cv:download:file' => "Certification File",
    'edujobs:add:cvport_title' => "Title",
    'edujobs:add:cvport_title:note' => "", 
    'edujobs:add:cvport_type' => "Type",
    'edujobs:add:cvport_type:note' => "", 
    'edujobs:add:cvport_link' => "Link",
    'edujobs:add:cvport_link:note' => "", 
    'edujobs:add:cvport_file' => "File",
    'edujobs:add:cvport_file:note' => "", 
    'edujobs:add:cvport_recommend' => "Why do you recommend this to other teachers?",
    'edujobs:add:cvport_recommend:note' => "", 
    'edujobs:cv:addportfolio' => "Add Portfolio",
    'edujobs:cv:portfolio:link' => "Link",
    'edujobs:cv:portfolio:file' => "File",
    'edujobs:cv:missing:cvport_title' => "Title is missing",
    'edujobs:cv:missing:cvport_type' => "Type is missing",
    'edujobs:cv:novalid_cvport_link' => "Not valid link",
    'edujobs:cv:missing:cvport_recommend' => "Recommendation text is missing",
    'edujobs:portfolio:cvport_file:wrong_type' => "Not valid file type for Portfolio Type",
    'edujobs:cv:add:portfolio:failed' => "Error on saving portfolio",
    'edujobs:cv:add:portfolio:success' => "Portfolio was successfully added",  
    'edujobs:add:cvport_file:title' => "Portfolio Document",  
    'edujobs:delete:cvport:success' => "Portfolio was successfully deleted",
    'edujobs:cv:port:edit' => "Update",
    'edujobs:cv:port:delete' => "Delete",
    'edujobs:cv:portfolio:whyrecommend' => "I recommend this resource because: ",
    'edujobs:cv:download:portfile' => "Portfolio File",
    
		
    'edujobs:search:country' => "Select Country",
    'edujobs:search:allcountries' => "All Countries",
    'edujobs:search:city' => "Select City",
    'edujobs:search:grades' => "Grades",
    'edujobs:search:subjects' => "Subjects",
    'edujobs:search:jobstart' => "Jobs that start after:",
    'edujobs:search:jobposts' => "Jobs Posted",
    'edujobs:search:tags' => "Search Tags",
    'edujobs:search:grades:othercategories' => "Other categories",
    'edujobs:search:subject:othersubjects' => "Other subjects",
    'edujobs:search:86400' => "Within 1 day",
    'edujobs:search:259200' => "Within 3 days",
    'edujobs:search:604800' => "Within 7 days",
    'edujobs:search:submit' => "Search Jobs",
    'edujobs:search:teachers:submit' => "Search Teachers",
	'edujobs:search:cv_work_experience_years' => "Work experience (Years)",
	'edujobs:search:select' => "Select", 
	'edujobs:search:month01' => "Immediately", 
	'edujobs:search:month13' => "In 1 month", 
	'edujobs:search:month49' => "In 3 months", 
	'edujobs:search:cv_wey0' => "0 ", 
	'edujobs:search:cv_wey1' => "1-2", 
	'edujobs:search:cv_wey2' => "2-5", 
	'edujobs:search:cv_wey5' => "5-10", 
	'edujobs:search:cv_wey10' => ">10", 
	
    // river
    'river:create:object:edujobs' => '%s posted new job %s',
    'river:comment:object:edujobs' => '%s commented on job %s',
    'agora:river:annotate' => 'a comment on this job',
    'agora:river:item' => 'an item',	
    'river:update:object:educv' => '%s has update the CV',
    'river:we:object:educvwe' => '%s has a new work experience',
    'river:portfolio:object:educvport' => '%s has upload a new resource %s',
	    
	'edujobs:addcv:country' => "Select your Country",    
	
	// external jobs
	'jobsext' => "External Jobs",
	'jobsext:none' => 'No results',
	'edujobs:label:extjobs' => "External Jobs",
	'edujobs:label:jobsexternal:source' => "Source",
	'edujobs:label:jobsexternal:clicktoapply' => "Click to external site to apply",
	'edujobs:label:jobsexternal:published' => "Published on ",
	'edujobs:label:jobsexternal:search:area' => "City / Area",
	'edujobs:jobsexternal:resultsno' => "Results: ",
);

add_translation("en", $lang);  
