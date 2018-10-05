<?php
	if(!isset($_POST["id"]) || intval($_POST["id"])<=0)
    die();
	$gcb_id= intval($_POST["id"]);
	require_once('../../../../../wp-load.php');
	
	//check user rights, only Contributors and above can get this
	
	if(!current_user_can('edit_posts')) {die("disallowed.");}	
	
  $val = get_option("gcb_".$gcb_id,"");
	if(strlen($val)) {
    $entry = unserialize($val);
    if(is_array($entry) && isset($entry['value'])) {
      echo stripslashes(htmlspecialchars_decode($entry['value']));
    }
	}
	die();
?>
