// ==========================================
// فقط یکبار ارسال کرده باشند
// دیگر نمیتونن فرم را ارسال کنن تا از صندوق پاک بشه
// ==========================================
<?php
add_filter( 'gform_get_form_filter_13', 'custom_schedule', 10, 2 );
function custom_schedule( $form_string, $form ) {
    
    $current_user = wp_get_current_user();

    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array( //which fields to search
            array(
                'key' => 'created_by', 'value' => $current_user->ID, //Current logged in user
            )
        )
    );
    $form_id = 13;
    $entry = GFAPI::get_entries($form_id,$search_criteria);

    if ( !empty($entry) ) {
       $form_string = '<p> شما قبلا عکس خود را ارسال کرده اید. در صورت تغییر با کانون پویان تماس بگیرید</p>';
    }   
    return $form_string;
}
?>
// ==========================================
// مثال بعدی برای فرم 64
// اینم برای اینکه یکبار ارسال بشود و صفحه و را ببندد و دیگه فرم ثبت را نمایش ندهد
// ==========================================

<?php
add_filter( 'gform_get_form_filter_64', 'yekbar_reserv_mosahebe', 10, 2 );
function yekbar_reserv_mosahebe( $form_string, $form ) {
    
    $current_user = wp_get_current_user();

    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array( //which fields to search
            array(
                'key' => 'created_by', 'value' => $current_user->ID, //Current logged in user
            )
        )
    );
    $form_id = 64;
    $entry = GFAPI::get_entries($form_id,$search_criteria);

    if ( !empty($entry) ) {
$form_string = '<p></p>';
    }   
    return $form_string;
}
?>
