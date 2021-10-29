<?php

add_action( 'wp_enqueue_scripts', 'sk_scripts' );
function sk_scripts() {

    /**
     * Register CSS styles
     */
    wp_register_style( 'main-styles', URL . 'dist/css/styles.css', '', '' );
    wp_register_style( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css', '', '' );
    wp_register_style( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', '', null );

    /**
     * Register JS scripts
     */

    wp_register_script( 'min', URL . 'dist/js/main.min.js', array( 'jquery' ), null, true );
    wp_register_script( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js', array( 'jquery' ), '', true );
    wp_register_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array( 'jquery' ), '', true );

    wp_enqueue_style( 'swiper' );
    wp_enqueue_style( 'main-styles' );
    wp_enqueue_script( 'swiper' );
    wp_enqueue_script( 'min' );

}

