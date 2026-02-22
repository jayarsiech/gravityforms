<?php
add_filter( 'gform_get_form_filter_83', 'moghadamati_jashnvare_plus', 10, 2 );
function moghadamati_jashnvare_plus( $form_string, $form ) {
    
    $current_user = wp_get_current_user();

    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array( //which fields to search
            array(
                'key' => 'created_by', 'value' => $current_user->ID, //Current logged in user
            )
        )
    );
    $form_id = 83;
    $entry = GFAPI::get_entries($form_id,$search_criteria);
    
    foreach ($entry as $v){
        if($v['payment_status']=='Paid'){
            $moghadamatiDate_eng = current_time('mysql');
             update_user_meta( get_current_user_id(), 'moghadamati', true );
             update_user_meta( get_current_user_id(), 'date_moghadamati', $moghadamatiDate_eng );
             
             update_user_meta( get_current_user_id(), 'jashnvare8+', true );
             $current_time_jmoghadamati = current_time( 'mysql' );
 // اضافه کردن 2 روز به تاریخ
    $day3_date = date_create($current_time_jmoghadamati);
    $day6_date = date_create($current_time_jmoghadamati);
    $day15_date = date_create($current_time_jmoghadamati);
    $day30_date = date_create($current_time_jmoghadamati);
    
    date_add($day3_date, date_interval_create_from_date_string('3 days'));
    $updated_date_3day = date_format($day3_date, 'Y-m-d H:i:s');
    
    date_add($day6_date, date_interval_create_from_date_string('6 days'));
    $updated_date_6day = date_format($day6_date, 'Y-m-d H:i:s');
    
    date_add($day15_date, date_interval_create_from_date_string('15 days'));
    $updated_date_15day = date_format($day15_date, 'Y-m-d H:i:s');
    
    date_add($day30_date, date_interval_create_from_date_string('30 days'));
    $updated_date_30day = date_format($day30_date, 'Y-m-d H:i:s');
    
    
    // ذخیره تاریخ جدید به عنوان user meta با کلید "next_check_date"
    update_user_meta(get_current_user_id(), '3day_check_date_bargozari', $updated_date_3day);
    update_user_meta(get_current_user_id(), '6day_check_date_bargozari', $updated_date_6day);
    update_user_meta(get_current_user_id(), '15day_check_date_bargozari', $updated_date_15day);
    update_user_meta(get_current_user_id(), '30day_check_date_bargozari', $updated_date_30day);
             
             
             
       $form_string = '<div style="margin: 0px 0px 20px 0px;
background-color: #409b16;
padding: 10px;
border-radius: 5px;
color: #fff;">
پرداخت شما با موفقیت انجام شد
<br>
لطفا اطلاعات شخصی خود را  تکمیل کنید
<p></p>
<a href="https://yourdomain.ir/personal-information/" class="vorood-panel">ورود به پنل</a>

  </div>';
        }
        elseif($v['payment_status']=='Processing') {
            return $form_string;
        }
          elseif($v['payment_status']=='Failed') {
            return $form_string;
        }
            elseif($v['payment_status']=='Cancelled') {
            return $form_string;
        }
        
    }
    
     if ( !empty($entry) ) {
$form_string = '<div style="margin: 0px 0px 20px 0px;
background-color: #409b16;
padding: 10px;
border-radius: 5px;
color: #fff;">
پرداخت شما با موفقیت انجام شد
<br>
لطفا اطلاعات شخصی خود را وارد کنید
<a href="https://yourdomain.ir/personal-information/" class="vorood-panel">ورود به پنل</a>

  </div>';
    }   
   return $form_string;
// var_dump($entry['1']['payment_status']);
 
}
?>
