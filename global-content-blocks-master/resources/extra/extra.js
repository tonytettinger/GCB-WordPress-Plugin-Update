jQuery(document).ready(function() {

    jQuery("#gcb_toggle").click(function(){
        if(jQuery(this).attr("checked")) {
            jQuery(".gcb_del_cb").each(function(){
                jQuery(this).attr("checked",true);
        });
        }
        else
            {
                jQuery(".gcb_del_cb").each(function(){
                jQuery(this).attr("checked",false);
        });
            }
    });

    var cb = jQuery("#unin");
    if(cb.length) {
        cb.click(function(){
           if(confirm("Are you sure? \nYou will permanently lose your content blocks when the plugin is deactivated.")) {
           cb.unbind("click");
           return true;
           }
           else
               {
                   return false;
               }
        });
    }

    jQuery("#gcb_type").change(function(){
        var sel = jQuery(this).children("option:selected");
        jQuery("span#type_help").text(sel.attr("help"));
        jQuery("img#type_img").attr("src","../wp-content/plugins/global-content-blocks/resources/i/"+sel.attr("img"));
		var view = jQuery("#gcb_view").val();
		view = view=="addnew" ? view : "update";
		
		if(view == "addnew") {
			if(sel.val() == "php") {
				location.href = "options-general.php?page=global-content-blocks&view=addnew&type=php#gcb_type_select";
			} else {
				if(jQuery("#php_type_textarea").length) {
					location.href = "options-general.php?page=global-content-blocks&view=addnew&type="+sel.val()+"#gcb_type_select";
				}
			}
		}
		
    });

    jQuery(".gcb_export").each(function(){
        jQuery(this).click(function(evt){
        evt.preventDefault();
        var blocks_to_export = [];
        jQuery(".gcb_del_cb").each(function(){
			var checked = jQuery(this).attr("checked");
            if((typeof checked !== 'undefined') && (checked !== false)) blocks_to_export.push(jQuery(this).val());
        });

        if(blocks_to_export.length)
            {               
                location.href="../wp-content/plugins/global-content-blocks/gcb/gcb_export.php?gcb="+blocks_to_export.join(";");
            }
            else
                {
                    alert("Select at least one block to export.");
                }
    });
    });

    
    jQuery("#message a.gcb_message_close").click(function(evt){evt.preventDefault();jQuery(this).parent().slideUp("fast",function(){jQuery(this).remove();})});
    
    jQuery("#gcb_custom_id").keyup(function(evt){
    
      console.log(jQuery(this).val());
    
    });
    
});
