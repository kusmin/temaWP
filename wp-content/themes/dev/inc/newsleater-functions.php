<?php
add_action( 'admin_init', 'newsletter_settings_init' );

function newsletter_settings_init() {
    register_setting( 'general', 'enable_newsletter' );
    add_settings_field(
        'enable_newsletter',
        'Habilitar Newsletter',
        'enable_newsletter_callback_function',
        'general',
        'default',
        array( 'label_for' => 'enable_newsletter' )
    );
}

function enable_newsletter_callback_function( $args ) {
    $option = get_option( $args['label_for'] );
    echo '<input type="checkbox" id="'. $args['label_for'] .'" name="'. $args['label_for'] .'" value="1" ' . checked(1, $option, false) . ' />';
}
