// ==========================================
// این کد عالی است بعد از آپدیت یعنی همون ویرایش ورودی کاربر میتوانید مود وضعیت آنرا در گراویتی ویو هم تغییر دهید یعنی تیک سبز یا دایره زرد و... تبدیل بشه
// ==========================================

<?php
add_filter( 'gform_after_update_entry_38', 'change_aproval_status', 10, 3 );
function change_aproval_status( $form, $entry_id, $original_entry ) {
    $entry = GFAPI::get_entry( $entry_id );
    
    update_user_meta($entry['created_by'],'update_status_nazarsanji_darjaryan','1');
    delete_user_meta($entry['created_by'],'update_status_nazarsanji_laghv','1');
    GravityView_Entry_Approval::update_approved( $entry['id'], GravityView_Entry_Approval_Status::UNAPPROVED, $entry['form_id'] );
}
?>
