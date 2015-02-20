<?php

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'horizons_2015-page-options-jumbotron-wysiwyg',
        'title' => 'Horizons Page Options - Jumbotron wysiwyg',
        'fields' => array (
            array (
                'key' => 'field_54e7719268ac4',
                'label' => 'Jumbotron Content',
                'name' => 'horizons_2015_jumbotron_content',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'horizons_2015-page-options',
        'title' => 'Page Options',
        'fields' => array (
            array (
                'key' => 'field_54e771fab446c',
                'label' => 'Location',
                'name' => 'horizons_2015_page_location',
                'type' => 'radio',
                'required' => 1,
                'choices' => array (
                    'austin' => 'Global (Austin, Texas)',
                    'london' => 'Europe (London, UK)',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
            ),
            array (
                'key' => 'field_54e77243b446d',
                'label' => 'Event Homepage?',
                'name' => 'horizons_2015_homepage_design',
                'type' => 'true_false',
                'message' => 'Use homepage design (larger header)',
                'default_value' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
