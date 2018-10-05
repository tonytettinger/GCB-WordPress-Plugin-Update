<?php
	if(!isset($_GET["gcb"])) (die("Please select some values"));
	require_once('../../../../wp-load.php');
	
	
	//check user rights, only editors and above can export
	if(!current_user_can('publish_pages')) {die("disallowed.");}
	
	$backup = false;
  
	if($_GET["gcb"] == 'all') {
		//this is the backup
		//$ids = gcb::get_entries_map();
		$backup=true;
		global $wpdb;
		$table_name = $wpdb->prefix . "gcb";
		$results = $wpdb->get_results("SELECT id FROM `$table_name`");
  
		$ids = array();
		foreach($results as $result) {
			$ids[] = $result->id;
		}  
	//update_option('gcb_update_prompt_v2',1);  
	} else {
		$ids = explode(";",$_GET["gcb"]);
	}
	$final_text = array();
	
	foreach($ids as $id) {
		if(intval($id)>0) {
      
			if($_GET["gcb"] == 'all') {
				$entry = $wpdb->get_row("SELECT * FROM `$table_name` WHERE id=".$id, ARRAY_A);
			} else {
				$entry = gcb::get_entry_by_id(intval($id));
			}
			$final_text[] =
			base64_encode($entry['name'])."<;>".
			base64_encode($entry['description'])."<;>".
			base64_encode($entry['value'])."<;>".
			base64_encode($entry['type'])."<;>".    
			base64_encode($entry['custom_id']);      
		}
	}	
	$final = implode("\r\n",$final_text);	
	
	header("Content-Type: text/plain");
	header("Content-disposition: attachment; filename=".($backup ? "backup":"export")."_gcb_".date("d_m_y_H_i").".gcb;");
	header("Content-Length: ".strlen($final));	
	header('Content-Transfer-Encoding: Binary');
	header('Accept-Ranges: bytes');	
	header('ETag: "'.md5($final).'"');
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");	
	echo $final;
	
	die();
?>
