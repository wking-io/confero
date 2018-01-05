<?php

function confero_register_acf_fields() {
  if( function_exists('acf_add_local_field_group') ):
    require_once get_template_directory() . '/fields/fields-biography.php';
    require_once get_template_directory() . '/fields/fields-converse.php';
    require_once get_template_directory() . '/fields/fields-home.php';
    require_once get_template_directory() . '/fields/fields-services.php';
  endif;
}

add_action('acf/init', 'confero_register_acf_fields');
?>