// ==========================================
// بعد از ثبت فرم توسط کاربر تغییر مود تایید در حال انتظار کنسل در گراویتی ویو انجام شود
// ==========================================

<?php
add_action("gform_after_submission_38", "mosahebegaran", 10, 2); 
function mosahebegaran($entry, $form){ 
    $current_meta_value = get_user_meta(get_current_user_id(), 'mosahebegaran', true);
    if (!$current_meta_value){
        GravityView_Entry_Approval::update_approved( $entry['id'], GravityView_Entry_Approval_Status::DISAPPROVED, $entry['form_id'] );
        update_user_meta(get_current_user_id(), 'mosahebegaran', 1);
        update_user_meta(get_current_user_id(),'update_status_nazarsanji_laghv','1');
    }
}
?>
