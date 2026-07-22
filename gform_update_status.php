// ==========================================
// پس از پاک کردن ورودی کاربر یک متاکی از تیبل یوزرمتای کاربر پاک بشه
// ==========================================

<?php
add_action( 'gform_update_status', 'update_status_vaghtmoshavere', 10, 3 );
function update_status_vaghtmoshavere( $entry_id, $property_value) {
    $entry = GFAPI::get_entry( $entry_id );
    if($entry['form_id'] == 39){
        if ($property_value == 'trash'){
        delete_user_meta($entry['created_by'],'vaght_moshavere' );
        }
    }
}
?> 
