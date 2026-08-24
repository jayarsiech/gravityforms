<?php
add_filter( 'gform_after_update_entry_64', 'change_aproval_status_mosahebe', 10, 3 );
function change_aproval_status_mosahebe( $form, $entry_id, $original_entry ) {
    global $wpdb;
    $entry = GFAPI::get_entry( $entry_id );
    $newDate__status_nazarsanji_eng = current_time('mysql');
    update_user_meta($entry['created_by'],'date_status_nazarsanji_darjaryan', $newDate__status_nazarsanji_eng);
    update_user_meta($entry['created_by'],'update_status_nazarsanji_darjaryan','1');
    delete_user_meta($entry['created_by'],'update_status_nazarsanji_laghv','1');
    GravityView_Entry_Approval::update_approved( $entry['id'], GravityView_Entry_Approval_Status::UNAPPROVED, $entry['form_id'] );
        
        $peygham_auto = "سلام پویانی مصاحبه شما با موفقیت انجام شد
لطفا وارد پنل استعدادیابی بشوید و فرم نظرسنجی مصاحبه که بین مرحله 5 و 6 است را تکمیل نمایید
POIAN.IR";

    $mobile_karbar_api = get_user_meta($entry['created_by'],'digits_phone',true);
    $url = "https://ippanel.com/services.jspd";
	$param = array
					(
						'uname'=>'FREE',
						'pass'=>'Faraz',
						'from'=>'3000505',
                'message' => 'سلام پویانی مصاحبه شما با موفقیت انجام شد
لطفا وارد پنل استعدادیابی بشوید و فرم نظرسنجی مصاحبه که بین مرحله 5 و 6 است را تکمیل نمایید
POIAN.IR
',
						'to'=> $mobile_karbar_api,
						'op'=>'send'
					);
					
		$handler = curl_init($url);             
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $param);                       
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
		$response2 = curl_exec($handler);
		
		$response2 = json_decode($response2);
		$res_code = $response2[0];
		$res_data = $response2[1];
		
		
		     // ثبت اطلاعات در دیتابیس
$table_name = $wpdb->prefix . 'jay_payamak_auto'; // نام جدول
$current_date = current_time('Y-m-d'); // تاریخ کنونی
$current_time = current_time('H:i:s'); // زمان کنونی
$user_id = $entry['created_by'];
$wpdb->insert(
    $table_name,
    array(
        'user_id' => $user_id,           // ذخیره user_id
        'description' => $peygham_auto,   // ذخیره متن پیامک
        'date' => $current_date,         // ذخیره تاریخ
        'time' => $current_time          // ذخیره زمان
    ),
    array(
        '%d', // نوع داده user_id (عدد صحیح)
        '%s', // نوع داده description (متن)
        '%s', // نوع داده date (متن)
        '%s'  // نوع داده time (متن)
    )
);

// افزودن اطلاعات به جدول ربات حسینی

$robot_table_name = $wpdb->prefix . 'jay_robot_hosseini_mosahebe';

// 2. اطلاعات مورد نیاز را از فرم و وردپرس دریافت می‌کنیم
$link_video_data = rgar( $entry, '117' ); // مقدار فیلد شماره 24
$user_id_data = $entry['created_by']; // آیدی کاربری که فرم را پر کرده
$karshenas_id_data = get_current_user_id(); // آیدی کارشناسی که در حال ویرایش فرم است
 
if ( ! empty( $link_video_data ) ) {
    $wpdb->insert(
        $robot_table_name,
        array(
            'user_id'      => $user_id_data,
            'karshenas_id' => $karshenas_id_data,
            'link_video'   => $link_video_data,
            'matn_video'   => '',
        ),
        array(
            '%d', // فرمت user_id
            '%d', // فرمت karshenas_id
            '%s', // فرمت link_video
            '%s', // فرمت matn_video
        )
    );
}

}
?>
<?php
add_filter( 'gform_after_update_entry_66', 'change_aproval_status_moshavere', 10, 3 );
function change_aproval_status_moshavere( $form, $entry_id, $original_entry ) {
    global $wpdb;
    $entry = GFAPI::get_entry( $entry_id );
    $newDate_status_moshavere_eng = current_time('mysql');
    update_user_meta($entry['created_by'],'date_status_moshavere_darjaryan', $newDate_status_moshavere_eng);
    update_user_meta($entry['created_by'],'update_status_moshavere_darjaryan','1');
    delete_user_meta($entry['created_by'],'update_status_moshavere_laghv','1');
    GravityView_Entry_Approval::update_approved( $entry['id'], GravityView_Entry_Approval_Status::UNAPPROVED, $entry['form_id'] );
    $mobile_karbar_api = get_user_meta($entry['created_by'],'digits_phone',true);
    $peygham_auto = "سلام پویانی
خوشحالم که دوره استعدادیابی رو با موفقیت به اتمام رسوندی
امیدوارم کمکت کرده باشیم که با گنج پنهان درونت آشنا شده باشی و در آینده در قله ها ببینیمت
لطفا وارد پنل استعدادیابی بشو و فرم نظرسنجی انتهایی دوره استعدادیابی رو تکمیل کن
نظرات ارزشمند تو کمکمون میکنه که ما هم روز به روز بهتر بشیم
POIAN.IR";
    $url = "https://ippanel.com/services.jspd";
	$param = array
					(
						'uname'=>'FREE',
						'pass'=>'Faraz',
						'from'=>'3000505',
                        'message' => 'سلام پویانی
خوشحالم که دوره استعدادیابی رو با موفقیت به اتمام رسوندی
امیدوارم کمکت کرده باشیم که با گنج پنهان درونت آشنا شده باشی و در آینده در قله ها ببینیمت
لطفا وارد پنل استعدادیابی بشو و فرم نظرسنجی انتهایی دوره استعدادیابی رو تکمیل کن
نظرات ارزشمند تو کمکمون میکنه که ما هم روز به روز بهتر بشیم
POIAN.IR
',
						'to'=> $mobile_karbar_api,
						'op'=>'send'
					);
					
		$handler = curl_init($url);             
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $param);                       
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
		$response2 = curl_exec($handler);
		
		$response2 = json_decode($response2);
		$res_code = $response2[0];
		$res_data = $response2[1];
		
		  // ثبت اطلاعات در دیتابیس
$table_name = $wpdb->prefix . 'jay_payamak_auto'; // نام جدول
$current_date = current_time('Y-m-d'); // تاریخ کنونی
$current_time = current_time('H:i:s'); // زمان کنونی
$user_id = $entry['created_by'];
$wpdb->insert(
    $table_name,
    array(
        'user_id' => $user_id,           // ذخیره user_id
        'description' => $peygham_auto,   // ذخیره متن پیامک
        'date' => $current_date,         // ذخیره تاریخ
        'time' => $current_time          // ذخیره زمان
    ),
    array(
        '%d', // نوع داده user_id (عدد صحیح)
        '%s', // نوع داده description (متن)
        '%s', // نوع داده date (متن)
        '%s'  // نوع داده time (متن)
    )
);

// افزودن اطلاعات به جدول ربات حسینی

// 1. نام جدول را مشخص می‌کنیم
$robot_table_name = $wpdb->prefix . 'jay_robot_hosseini_moshavere';

// 2. اطلاعات مورد نیاز را از فرم و وردپرس دریافت می‌کنیم
$link_video_data = rgar( $entry, '24' ); // مقدار فیلد شماره 24
$user_id_data = $entry['created_by']; // آیدی کاربری که فرم را پر کرده
$karshenas_id_data = get_current_user_id(); // آیدی کارشناسی که در حال ویرایش فرم است

if ( ! empty( $link_video_data ) ) {
    $wpdb->insert(
        $robot_table_name,
        array(
            'user_id'      => $user_id_data,
            'karshenas_id' => $karshenas_id_data,
            'link_video'   => $link_video_data,
            'matn_video'   => '',
        ),
        array(
            '%d', // فرمت user_id
            '%d', // فرمت karshenas_id
            '%s', // فرمت link_video
            '%s', // فرمت matn_video
        )
    );
}

}
?>
