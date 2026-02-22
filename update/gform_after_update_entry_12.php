<!-- بعد از ویرایش فرمز یا به هر نحوی آپدیت اینا ذخیره بشوند در دیتابیس با این هوک -->
<?php
add_action("gform_after_update_entry_12", "update_madarek_bargozari", 10, 2);
function update_madarek_bargozari($form, $entry_id){
    $entry = GFAPI::get_entry($entry_id);
    if ( is_wp_error($entry) || empty($entry['created_by']) ) {
        return;
    }
    $user_id = $entry['created_by'];
    
    $value_shomaremanzel   = isset($entry['10']) ? $entry['10'] : ''; 
    $value_shomarenojavan   = isset($entry['9']) ? $entry['9'] : ''; 
    $value_shomarepedar   = isset($entry['11']) ? $entry['11'] : ''; 
    $value_shomaremadar   = isset($entry['12']) ? $entry['12'] : ''; 
    $value_first_name = isset($entry['15']) ? $entry['15'] : ''; 
       // ** فیلدهای جدید اضافه شده **
    $value_last_name       = isset($entry['16']) ? $entry['16'] : '';
    $value_gozarname       = isset($entry['35']) ? $entry['35'] : '';
    $value_codemeli        = isset($entry['23']) ? $entry['23'] : '';
    
    
    $jalali_date_from_gf     = isset($entry['42']) ? $entry['42'] : ''; 
    $jalali_date_for_meta    = '';
    $gregorian_date_for_meta = '';

    // فقط در صورتی که تاریخ معتبر باشد، آن را پردازش کن
    if ( !empty($jalali_date_from_gf) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $jalali_date_from_gf) ) {
        
        // ۱. ذخیره نسخه شمسی با فرمت YYYY/MM/DD
        $jalali_date_for_meta = str_replace('-', '/', $jalali_date_from_gf);

        // ۲. تبدیل به میلادی برای ذخیره
        list($year, $month, $day) = explode('-', $jalali_date_from_gf);
        
        // اطمینان از وجود تابع قبل از فراخوانی
        if ( function_exists('jalali_to_gregorian') ) { 
            $gregorian_date_parts = jalali_to_gregorian($year, $month, $day);
            $gregorian_date_for_meta = sprintf('%04d-%02d-%02d', $gregorian_date_parts[0], $gregorian_date_parts[1], $gregorian_date_parts[2]);
        }
    }
    
    $gender = '';
    if ( !empty($entry['8.1']) ) { 
        $gender = 'مرد';
    } elseif ( !empty($entry['8.2']) ) { 
        $gender = 'زن';
    }
    
   $file_bargozari_aks = rgar( $entry, '40' );
    if ( $file_bargozari_aks ) {
        update_user_meta( $user_id, 'logoshop', $file_bargozari_aks );
    }
    
    update_user_meta( $user_id, 'tarikhtavalod', $jalali_date_for_meta );
    update_user_meta( $user_id, 'tarikhtavalod_gregorian', $gregorian_date_for_meta );

    
    update_user_meta( $user_id, 'first_name', $value_first_name );
    update_user_meta( $user_id, 'shomaremanzel', $value_shomaremanzel );
    update_user_meta( $user_id, 'shomarenojavan', $value_shomarenojavan );
    update_user_meta( $user_id, 'shomarepedar', $value_shomarepedar );
    update_user_meta( $user_id, 'shomaremadar', $value_shomaremadar );
    update_user_meta( $user_id, 'gender', $gender ); 
        // ** آپدیت متادیتاهای جدید **
    update_user_meta( $user_id, 'last_name', $value_last_name );
    update_user_meta( $user_id, 'gozarname', $value_gozarname );
    update_user_meta( $user_id, 'codemeli', $value_codemeli );

}
?> 
