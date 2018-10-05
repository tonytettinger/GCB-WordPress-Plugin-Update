<?php
	require_once('../../../../../wp-load.php');	
	
	if(!isset($_POST["name"]) || !isset($_POST["content"])) {die("invalid call!");}
	
	//check user rights, only editors and above can add
	if(!current_user_can('publish_pages')) {die("disallowed.");}
	
	
	$name = $_POST["name"];
	$description = (htmlspecialchars($_POST['description']));
	$type = (htmlspecialchars($_POST['type']));
	$value = (htmlspecialchars($_POST['content']));
	
	if(!strlen($name) || !strlen($value)) {die("invalid call.");}
	
	$available_types = gcb::get_available_types();	
  
  $entry_data = array(
          "name"        =>  $name,
          "description" =>  $description,
          "value"       =>  $value,
          "type"        =>  $type,        
        );	
        
  $new_id = gcb::add_entry($entry_data);    
	
	$return = array(
	"id"=>$new_id,
	"name"=>$name,
	"img"=>$available_types[$type]["img"]
	);
	
	echo json_encode($return);die();
?>