<?php
add_action('jaymahsool_after_buy_13', 'dorehooshhayejani_for_product_13', 10, 2);
function dorehooshhayejani_for_product_13($order, $product) {
    global $wpdb;
    $user_id = $order->user_id;

    $sms_sent = get_user_meta($user_id, 'sms_active_video_hoosh', true);
    if (!$sms_sent) {
        $first_name = get_user_meta($user_id, 'first_name', true);
        $last_name = get_user_meta($user_id, 'last_name', true);
        $name_mokhatab = trim($first_name . ' ' . $last_name);
        $peygham = "سلام  " . $name_mokhatab . "  دوره هوش هیجانی شما فعال شد. POIAN.IR";
        $shomare_karbar = get_user_meta($user_id, 'digits_phone', true);

        // ارسال پیامک
        $url = "https://ippanel.com/services.jspd";
        $param = array(
            'uname' => 'USERNAME',
            'pass' => 'PASSWORD',
            'from' => '3000000',
            'message' => json_decode('"' . $peygham . '"'),
            'to' => $shomare_karbar,
            'op' => 'send'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        curl_exec($handler);
        curl_close($handler);

        update_user_meta($user_id, 'sms_active_video_hoosh', 1);

$table_name = $wpdb->prefix . 'jay_payamak_auto'; // نام جدول
$current_date = current_time('Y-m-d'); // تاریخ کنونی
$current_time = current_time('H:i:s'); // زمان کنونی

$wpdb->insert(
    $table_name,
    array(
        'user_id' => $user_id,           // ذخیره user_id
        'description' => $peygham,   // ذخیره متن پیامک
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
    }

}

?>
