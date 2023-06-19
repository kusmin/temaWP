<?php
add_action( 'admin_init', 'register_my_setting' );

function register_my_setting() {
    register_setting( 'general', 'terms_url', 'esc_attr' );
    register_setting( 'general', 'support_url', 'esc_attr' );
	register_setting('general', 'privacy_url', 'esc_attr');

    add_settings_field('terms_url', '<label for="terms_url">'.__('URL dos Termos de Uso' , 'terms_url' ).'</label>' , 'print_terms_url_field', 'general');
    add_settings_field('support_url', '<label for="support_url">'.__('URL de Suporte' , 'support_url' ).'</label>' , 'print_support_url_field', 'general');
	add_settings_field('privacy_url', '<label for="privacy_url">'.__('URL de Privacidade', 'privacy_url' ).'</label>', 'print_privacy_url_field', 'general');
}

function print_terms_url_field() {
    $value = get_option( 'terms_url', '' );
    echo '<input type="text" id="terms_url" name="terms_url" value="' . $value . '" />';
}

function print_support_url_field() {
    $value = get_option( 'support_url', '' );
    echo '<input type="text" id="support_url" name="support_url" value="' . $value . '" />';
}

function print_privacy_url_field(){
	$value = get_option( 'privacy_url', '' );
    echo '<input type="text" id="privacy_url" name="privacy_url" value="'. $value. '" />';
}
