<?php
/**
 * File CSS extender 
 * 
 * @package MembersMap
 */ 
?>

<?php
    $base_url = elgg_get_site_url();
    $graphics_url = $base_url . 'mod/membersmap/graphics/';
?>

#map    {
    border: 1px solid #333;
    margin-top: 0.6em;
    overflow:hidden;
}

input:-moz-placeholder {
    color: #BBBBBB !important;
}

input {
    margin-bottom:2px;
}

label   {
    font-size:100%;
}

.elgg-sidebar div {
    margin: 0 0 2px 0;
}

#parent {
    line-height: 39px;
}

#parent img {
    vertical-align: middle;
}

#parent span {
    vertical-align: middle;
    font-size: 110%;
}

input, textarea { color: #000; }
.placeholder { color: #aaa; }

div.infowindow	{
	width:150px; 
	padding: 3px; 
	border:0px solid #eaeaea;
	height:70px;
}
