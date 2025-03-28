<?php
add_filter( 'rwmb_meta_boxes', 'events_register_meta_boxes' );

function events_register_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = [
        'title'      => esc_html__( 'Events & Courses Meta', 'uar' ),
        'id'         => 'events',
        'post_types' => ['events-courses'],
        'context'    => 'normal',
        'fields'     => [
          [
            'type' => 'date',
             'name' => esc_html__( 'Event Date', 'uar' ),
             'id'   => 'event_date',
             'timestamp' => true
          ],


        ],
    ];

    return $meta_boxes;
}
