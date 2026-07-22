// ==========================================
// با کلان پاک کردن ورودی حتی از سطل زباله متاکی پاک شود
// ==========================================

<?php
add_action( 'gform_delete_entry', 'delete_entry_post_zan' );
function delete_entry_post_zan( $entry_id) {
    $entry = GFAPI::get_entry( $entry_id );
    if($entry['form_id'] == 17){
        delete_user_meta($entry['created_by'],'mosahebezan' );
    }
}
?>
<?php
add_action( 'gform_delete_entry', 'delete_entry_post_mard' );
function delete_entry_post_mard( $entry_id) {
    $entry = GFAPI::get_entry( $entry_id );
    if($entry['form_id'] == 16){
        delete_user_meta($entry['created_by'],'mosahebemard' );
    }
}
?>
