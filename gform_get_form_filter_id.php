# بعد از قرار دادن این کد کاربر فقط میتواند یکبار فرم را ارسال کند و بعد از اون با پیغام که در کد به آن اضافه میکنید مواجه میشود
در کل با این کد میتوانن کاربران فقط یکبار فرم را ارسال کنند
<?php
add_filter( 'gform_get_form_filter_66', 'yekbar_reserv_moshavere', 10, 2 );
function yekbar_reserv_moshavere( $form_string, $form ) {
    
    $current_user = wp_get_current_user();

    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array( //which fields to search
            array(
                'key' => 'created_by', 'value' => $current_user->ID, //Current logged in user
            )
        )
    );
    $form_id = 66;
    $entry = GFAPI::get_entries($form_id,$search_criteria);

    if ( !empty($entry) ) {
$form_string = '<p>در اینجا هرچی دوست دارید بنویسید که کاربر برای دفه های بعد ببیند</p>';
    }   
    return $form_string;
} 
?>
