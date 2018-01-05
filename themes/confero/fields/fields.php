<?php

function confero_register_acf_fields() {
  if( function_exists('acf_add_local_field_group') ):
    require_once get_template_directory() . '/fields/fields-converse.php';;
  endif;
}

add_action('acf/init', 'confero_register_acf_fields');
?>