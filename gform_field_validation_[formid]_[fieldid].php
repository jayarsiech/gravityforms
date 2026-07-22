// ==========================================
// در اینجا فیلد هاتون را میتوانین براش قوانین اضافه کنید
//بعضی ها حروف فارسی بعضی ها 11 رقم بعضی ها اعداد فارسی انگلیسی متوجه بشود
// ==========================================
<?php
add_filter( 'gform_field_validation_12_7', 'codeposti_validation', 10, 4 );
function codeposti_validation( $result, $value, $form, $field ) {
  
     if( ! preg_match('/^[0-9]{10,10}$/', $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'فقط عدد وارد کنید،تعداد کد پستی 10 رقم می باشد';
        }
   
    return $result;
}
?>
<?php
add_filter( 'gform_field_validation_12_10', 'shomaremanzel_validation', 10, 4 );
function shomaremanzel_validation( $result, $value, $form, $field ) {
  
     if( ! preg_match('/^[0-9]{11,11}$/', $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'فقط عدد وارد کنید،تعداد 11 عدد می باشد';
        }
   
    return $result;
}
?>
<?php
add_filter( 'gform_field_validation_12_9', 'shomarenojavan_validation', 10, 4 );
function shomarenojavan_validation( $result, $value, $form, $field ) {
  
     if( ! preg_match('/^[0-9]{11,11}$/', $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'فقط عدد وارد کنید،تعداد 11 عدد می باشد';
        }
   
    return $result;
}
?>
<?php
add_filter( 'gform_field_validation_12_18', 'shomaredovom_validation', 10, 4 );
function shomaredovom_validation( $result, $value, $form, $field ) {
  
     if( ! preg_match('/^[0-9]{11,11}$/', $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'فقط عدد وارد کنید،تعداد 11 عدد می باشد';
        }
   
    return $result;
}
?>
<?php
add_filter( 'gform_field_validation_12_11', 'shomarepedar_validation', 10, 4 );
function shomarepedar_validation( $result, $value, $form, $field ) {
  
     if( ! preg_match('/^[0-9]{11,11}$/', $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'فقط عدد وارد کنید،تعداد 11 عدد می باشد';
        }
    return $result;
}
?>
<?php
add_filter( 'gform_field_validation_12_12', 'shomaremadar_validation', 10, 4 );
function shomaremadar_validation( $result, $value, $form, $field ) {
  
     if( ! preg_match('/^[0-9]{11,11}$/', $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'فقط عدد وارد کنید،تعداد 11 عدد می باشد';
        }
    return $result;
}
?>
<?php
add_filter( 'gform_field_validation_12_16', 'khanevadegi_validation', 10, 4 );
function khanevadegi_validation( $result, $value, $form, $field ) {
  
     if( ! preg_match('/^[آ-ی\s]+$/u', $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'فیلد فقط باید شامل حروف فارسی باشد.';
        }
    return $result;
}
?>
<?php
add_filter( 'gform_field_validation_12_15', 'nam_validation', 10, 4 );
function nam_validation( $result, $value, $form, $field ) {
  
     if( ! preg_match('/^[آ-ی\s]+$/u', $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'فیلد فقط باید شامل حروف فارسی باشد.';
        }
    return $result;
}
?>
