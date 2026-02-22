// فقط یکبار ارسال کرده باشند
دیگر نمیتونن فرم را ارسال کنن تا از صندوق پاک بشه
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
