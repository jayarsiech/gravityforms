// ==========================================
// بعد از ویرایش یکی از ورودی های فرم گراویتی فرمز 
// مثلا شما یک فیلد را آپدیت کردید حالا میخواهید با همین فیلد در ورودی فرم دیگری برای همین کاربر آپدیت بشه از این کد استفاده می کنید
// ==========================================

<?php
add_filter( 'gform_after_update_entry', 'bargozari_govahiname_avalo', 10, 3 );
function bargozari_govahiname_avalo( $form, $entry_id, $original_entry ) {
    $entry = GFAPI::get_entry( $entry_id );
    $file_aval_gov = get_user_meta( $entry['created_by'], 'bargozari_govahiname_aval', true );
        if ($entry['form_id']==12) {
    $entry = GFAPI::get_entry( $entry_id );
    $user_govahiname = $entry['created_by'];
    $file_govahiname = rgar( $entry, '27' );
    $file_govahiname2 = rgar( $entry, '37' );        

    $current_user = $entry['created_by'];
    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array( //which fields to search
            array(
                'key' => 'created_by', 'value' => $current_user //Current logged in user
            )
        )
    );
            $form_id = '39';
            $form = GFAPI::get_entries($form_id,$search_criteria);
         
             foreach ($form as $formha){
                $file_govahiname_39 = rgar($formha, '21' );
                $file_govahiname_39_2 = rgar($formha, '20' );
                gform_update_meta( $formha['id'], 21, $file_govahiname );
                gform_update_meta( $formha['id'], 20, $file_govahiname2 );
             }
    
        
        }

}
?>
