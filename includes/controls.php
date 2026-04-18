<?php
add_action( 'elementor/init', function() {
    add_action( 'elementor/element/common/_section_style/after_section_end', 'ecr_add_controls', 10, 2 );
    add_action( 'elementor/element/container/section_layout/after_section_end', 'ecr_add_controls', 10, 2 );
    add_action( 'elementor/element/section/section_advanced/after_section_end', 'ecr_add_controls', 10, 2 );
});

function ecr_add_controls( $element, $args ) {
    $element->start_controls_section(
        'ecr_restriction_section',
        [
            'label' => __( '🔒 Restriction', 'easy-content-restriction' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $element->add_control(
        'ecr_is_restricted',
        [
            'label'        => __( 'Restrict this content?', 'easy-content-restriction' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Yes', 'easy-content-restriction' ),
            'label_off'    => __( 'No', 'easy-content-restriction' ),
            'return_value' => 'yes',
        ]
    );



    $element->end_controls_section();
}