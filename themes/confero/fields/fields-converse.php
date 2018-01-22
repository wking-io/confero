<?php

  acf_add_local_field_group(array(
    'key' => 'group_converse',
    'title' => 'Converse Fields',
    'fields' => array(
      array(
        'key' => 'field_converse_heading',
        'label' => 'Converse Heading',
        'name' => 'converse_heading',
        'type' => 'text',
        'default_value' => 'Converse',
        'placeholder' => 'Converse',
      ),
      array(
        'key' => 'field_converse_content',
        'label' => 'Converse Content',
        'name' => 'converse_content',
        'type' => 'textarea',
        'default_value' => 'Tell us about your next party! We\'re free to chat Tuesday through Friday. Meetings are scheduled in advance and by appointment only. We are closed Sunday and Monday to rest and recharge. We can\'t wait to hear from you!',
        'placeholder' => '',
        'new_lines' => '',
      ),
      array(
        'key'          => 'field_converse_options',
        'label'        => 'Contact Options',
        'name'         => 'converse_options',
        'type'         => 'repeater',
        'layout'       => 'table',
        'button_label' => 'Add Option',
        'collapsed'    => true,
        'min'          => 1,
        'max'          => 3,
        'instructions' => 'Using the Add Option button below add a section for each contact option you want to add',
        'sub_fields'   => array(
          array(
            'key' => 'field_converse_title',
            'label' => 'Converse Option Title',
            'name' => 'converse_title',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'instructions' => 'Add the title of the option here',
          ),
          array(
            'key' => 'field_converse_info',
            'label' => 'Converse Option Info',
            'name' => 'converse_info',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'instructions' => 'Add the info of option here. Whether it is an email addres or phone number',
          )
        ),
      ),
      array(
        'key' => 'field_converse_slide_link',
        'label' => 'Converse Slider Link',
        'name' => 'converse_slide_link',
        'type' => 'url',
        'default_value' => 'https://www.instagram.com/confero/',
        'placeholder' => 'https://www.instagram.com/confero/',
      ),
    ),
    'location' => array(
      array(
        array(
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