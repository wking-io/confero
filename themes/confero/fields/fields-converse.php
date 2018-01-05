<?php

  acf_add_local_field_group(array (
    'key' => 'group_converse',
    'title' => 'Converse Fields',
    'fields' => array (
      array (
        'key' => 'field_converse_heading',
        'label' => 'Converse Heading',
        'name' => 'converse_heading',
        'type' => 'text',
        'default_value' => 'Converse',
        'placeholder' => 'Converse',
      )
    ),
    'location' => array (
      array (
        array (
          'param' => 'page',
          'operator' => '==',
          'value' => 62,
        ),
      ),
    ),
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'custom_fields',
      3 => 'discussion',
      4 => 'comments',
      5 => 'slug',
      6 => 'author',
      7 => 'format',
      8 => 'page_attributes',
      9 => 'featured_image',
      10 => 'categories',
      11 => 'tags',
      12 => 'send-trackbacks',
    ),
  ));

?>