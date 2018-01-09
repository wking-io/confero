<?php

  function get_service_links() {
    $links = array(
      '/portfolio/editorial' => 'Editorial Page',
      '/portfolio/wedding' => 'Wedding Page',
      '/portfolio/social' => 'Social Page',
    );

    return $links;
  }

  acf_add_local_field_group(array(
    'key' => 'group_services',
    'title' => 'Services Fields',
    'fields' => array(
      array(
        'key' => 'field_service_tiles',
        'label' => 'Service Tiles',
        'name' => 'service_tiles',
        'type' => 'repeater',
        'layout'       => 'block',
        'button_label' => 'Add Tile',
        'collapsed'    => true,
        'min'          => 1,
        'max'          => 3,
        'instructions' => 'Using the Add Tile button below add a tile for each service.',
        'sub_fields'   => array(
          array(
            'key' => 'field_service_img',
            'label' => 'Service Image',
            'name' => 'service_img',
            'type'    			=> 'image',
            'return_format' => 'array',
            'mime_types' 		=> 'jpg, png',
          ),
          array(
            'key' => 'field_service_title',
            'label' => 'Service Title',
            'name' => 'service_title',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_service_link_url',
            'label' => 'Service Link URL',
            'name' => 'service_link_url',
            'type'    => 'select',
            'instructions' => 'This dropdown lets you choose where the tile links to',
            'choices' => get_service_links(),
          ),
          array(
            'key' => 'field_service_link_text',
            'label' => 'Service Link Text',
            'name' => 'service_link_text',
            'type'    => 'text',
            'instructions' => 'This is the text that shows on the button for the tile',
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_service_description',
            'label' => 'Service Description',
            'name' => 'service_description',
            'type'    => 'textarea',
            'new_lines' => 'wpautop',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page',
          'operator' => '==',
          'value' => 34,
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