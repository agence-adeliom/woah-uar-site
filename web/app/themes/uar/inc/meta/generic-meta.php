<?php
add_filter( 'rwmb_meta_boxes', 'generic_register_meta_boxes' );

function generic_register_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = [
        'title'      => esc_html__( 'Post Meta', 'uar' ),
        'id'         => 'generic',
        'post_types' => ['post',
                          'page',
                          'toolbox',
                          'news',
                          'events-courses',
                          'uar-best-practice',
                          'publications',
                          'working-groups',
                          'uar-media-library',
                          'governance-policies',
                        ],
        'context'    => 'normal',
        'fields'     => [
          [
              'type' => 'checkbox',
              'name' => esc_html__( 'Featured', 'uar' ),
              'id'   => 'featured_post',
          ],
          [
              'type' => 'text',
              'name'       => esc_html__( 'Year', 'uar' ),
              'id'         => 'list_year',

          ],
            [
                'type' => 'text',
                'name'       => esc_html__( 'Creation Date', 'uar' ),
                'id'         => 'creation_date',

            ],
            [
                'type' => 'text',
                'name' => esc_html__( 'Produced by', 'uar' ),
                'id'   => 'produced_by',
            ],
            [
                'type' => 'text',
                'name' => esc_html__( 'Resource language', 'uar' ),
                'id'   => 'resources_language',
            ],
            [
                'type' => 'text',
                'name' => esc_html__( 'Toolbox code', 'uar' ),
                'id'   => 'toolbox_code',
            ],
            [
                'type' => 'text',
                'name' => esc_html__( 'Roadmap milestone', 'uar' ),
                'id'   => 'roadmap_milestone',
            ],

        ],
    ];

    return $meta_boxes;
}

//////////////SEO

add_filter( 'rwmb_meta_boxes', 'seo_register_meta_boxes' );

function seo_register_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = [
        'title'      => esc_html__( 'SEO', 'uar' ),
        'id'         => 'seometa',
        'post_types' => ['post',
                          'page',
                          'toolbox',
                          'news',
                          'events-courses',
                          'uar-best-practice',
                          'publications',
                          'working-groups',
                          'uar-media-library',
                          'governance-policies',
                        ],
        'context'    => 'normal',
        'fields'     => [

            [
                'type' => 'text',
                'name' => esc_html__( 'SEO Title', 'uar' ),
                'id'   => 'seo_title',
                'desc' => esc_html__( 'Under or approximately 60 characters', 'uar' ),
            ],
            [
                'type' => 'textarea',
                'name' => esc_html__( 'SEO Meta Description', 'uar' ),
                'id'   => 'seo_desc',
                'desc' => esc_html__( 'Between 150 and 160 characters', 'uar' ),
                'rows' => 3,
            ],
        ],
    ];

    return $meta_boxes;
}
