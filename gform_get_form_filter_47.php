// ==========================================
// این برای فرم هایی است که به عنوان محصول استفاده میکنید و وقتی میخواهید پرداخت موفق بود یک سری متاکی برای کاربر آپدیت کنید و یک پیغامی اختصاصی نمایش دهید
// ==========================================

<?php
add_filter( 'gform_get_form_filter_47', 'pishrafte', 10, 2 );
function pishrafte( $form_string, $form ) {
    
    $current_user = wp_get_current_user();

    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array( //which fields to search
            array(
                'key' => 'created_by', 'value' => $current_user->ID, //Current logged in user
            )
        )
    );
    $form_id = 47;
    $entry = GFAPI::get_entries($form_id,$search_criteria);
    
    foreach ($entry as $v){
        if($v['payment_status']=='Paid'){
             update_user_meta( get_current_user_id(), 'pishrafte', true );
             update_user_meta( get_current_user_id(), 'omoomi', true );
       $form_string = '<div style="margin: 0px 0px 20px 0px;
background-color: #409b16;
padding: 10px;
border-radius: 5px;
color: #fff;">
پرداخت شما با موفقیت انجام شد
<br>
لطفا اطلاعات شخصی خود را  تکمیل کنید
<p></p>
<a href="https://poian.ir/personal-information/" class="vorood-panel">ورود به پنل</a>

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
<a href="https://poian.ir/personal-information/" class="vorood-panel">ورود به پنل</a>

  </div>';
    }   
   return $form_string;
// var_dump($entry['1']['payment_status']);
 
}
?>

// مثال دیگر

<?php
add_filter( 'gform_get_form_filter_43', 'pishforoosh', 10, 2 );
function pishforoosh( $form_string, $form ) {
    
    $current_user = wp_get_current_user();

    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array( //which fields to search
            array(
                'key' => 'created_by', 'value' => $current_user->ID, //Current logged in user
            )
        )
    );
    $form_id = 43;
    $entry = GFAPI::get_entries($form_id,$search_criteria);
    
    foreach ($entry as $v){
        if($v['payment_status']=='Paid'){
            $pishforooshDate_eng = current_time('mysql');
             update_user_meta( get_current_user_id(), 'pishforoosh', true );
             update_user_meta( get_current_user_id(), 'date_pishforoosh', $pishforooshDate_eng );
             
             update_user_meta( get_current_user_id(), 'omoomi', true );
       $form_string = '<div style="margin: 0px 0px 20px 0px;
background-color: #409b16;
padding: 10px;
border-radius: 5px;
color: #fff;">
پرداخت شما با موفقیت انجام شد
<br>
لطفا اطلاعات شخصی خود را  تکمیل کنید
<p></p>
<a href="https://poian.ir/personal-information/" class="vorood-panel">ورود به پنل</a>

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
<a href="https://poian.ir/personal-information/" class="vorood-panel">ورود به پنل</a>

  </div>';
    }   
   return $form_string;
// var_dump($entry['1']['payment_status']);
 
}
?>
