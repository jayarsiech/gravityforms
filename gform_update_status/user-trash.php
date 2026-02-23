<?php
add_action( 'gform_update_status', 'update_status_mosahebe', 10, 3 );
function update_status_mosahebe( $entry_id, $property_value) {
    $entry = GFAPI::get_entry( $entry_id );
    if($entry['form_id'] == 38){
        if ($property_value == 'trash'){
        delete_user_meta($entry['created_by'],'mosahebegaran' );
        }
    }
}
?>
