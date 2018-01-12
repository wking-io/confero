<?php

  function get_home_service_links() {
    $links = array(
      '/services' => 'Services Page',
      '/portfolio' => 'Portfolio Page',
      '/portfolio/event/editorial' => 'Editorial Page',
      '/portfolio/event/social' => 'Social Page',
      '/portfolio/event/wedding' => 'Wedding Page',
    );

    return $links;
  }

  function get_page_links() {
    $links = array(
      0 => 'No link',
      '/services' => 'Services Page',
      '/portfolio' => 'Portfolio Page',
      '/portfolio/event/editorial' => 'Editorial Page',
      '/portfolio/event/wedding' => 'Wedding Page',
      '/portfolio/event/social' => 'Social Page',
      '/media/publications' => 'Publications Page',
      '/media/films' => 'Films Page',
      '/converse' => 'Contact Page',
    );

    return $links;
  }

  acf_add_local_field_group(array(
    'key' => 'group_home',
    'title' => 'Home Fields',
    'fields' => array(
      array(
        'key'          => 'field_hero_slides_desktop',
        'label'        => 'Hero Slides - Desktop',
        'name'         => 'hero_slides_desktop',
        'type'         => 'repeater',
        'layout'       => 'table',
        'button_label' => 'Add Slide',
        'collapsed'    => true,
        'min'          => 1,
        'instructions' => 'Use the Add Slide button below add a new slides.',
        'sub_fields'   => array(
          array(
            'key' => 'field_hero_slides_desktop_img',
            'label' => 'Slide Image',
            'name' => 'hero_slides_desktop_img',
            'type'    			=> 'image',
            'return_format' => 'array',
            'mime_types' 		=> 'jpg, png',
          ),
          array(
            'key' => 'field_hero_slides_desktop_link',
            'label' => 'Slide Link',
            'name' => 'hero_slides_desktop_link',
            'type'    => 'select',
            'instructions' => 'This dropdown lets you choose where the slide links to',
            'choices' => get_page_links(),
          ),
        ),
      ),
      array(
        'key'          => 'field_hero_slides_mobile',
        'label'        => 'Hero Slides - Mobile',
        'name'         => 'hero_slides_mobile',
        'type'         => 'repeater',
        'layout'       => 'table',
        'button_label' => 'Add Slide',
        'collapsed'    => true,
        'min'          => 1,
        'instructions' => 'Use the Add Slide button below add a new slides.',
        'sub_fields'   => array(
          array(
            'key' => 'field_hero_slides_mobile_img',
            'label' => 'Slide Image',
            'name' => 'hero_slides_mobile_img',
            'type'    			=> 'image',
            'return_format' => 'array',
            'mime_types' 		=> 'jpg, png',
          ),
          array(
            'key' => 'field_hero_slides_mobile_link',
            'label' => 'Slide Link',
            'name' => 'hero_slides_mobile_link',
            'type'    => 'select',
            'instructions' => 'This dropdown lets you choose where the slide links to',
            'choices' => get_page_links(),
          ),
        ),
      ),
      array(
        'key'          => 'field_home_service_tiles',
        'label'        => 'Service Tiles',
        'name'         => 'home_service_tiles',
        'type'         => 'repeater',
        'layout'       => 'table',
        'button_label' => 'Add Tile',
        'collapsed'    => true,
        'min'          => 1,
        'max'          => 3,
        'instructions' => 'Using the Add Tile button below add a tile for each service.',
        'sub_fields'   => array(
          array(
            'key' => 'field_home_service_img',
            'label' => 'Service Image',
            'name' => 'home_service_img',
            'type'    			=> 'image',
            'return_format' => 'array',
            'mime_types' 		=> 'jpg, png',
          ),
          array(
            'key' => 'field_home_service_text',
            'label' => 'Service Text',
            'name' => 'home_service_text',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'instructions' => 'If you want to add text using your image just leave this field blank.',
          ),
          array(
            'key' => 'field_home_service_position',
            'label' => 'Service Text Position',
            'name' => 'home_service_position',
            'type'    => 'select',
            'instructions' => 'This dropdown moves the text to the different corners of the tile',
            'choices' => array(
              'top-left' => 'Top - Left',
              'top-right' => 'Top - Right',
              'bottom-right' => 'Bottom - Right',
              'bottom-left' => 'Bottom - Left',
            ),
          ),
          array(
            'key' => 'field_home_service_link',
            'label' => 'Service Link',
            'name' => 'home_service_link',
            'type'    => 'select',
            'instructions' => 'This dropdown lets you choose where the tile links to',
            'choices' => get_home_service_links(),
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page',
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