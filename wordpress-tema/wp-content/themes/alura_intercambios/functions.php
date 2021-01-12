<?php

function alura_intercambios_recursos_ao_tema(){
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'alura_intercambios_recursos_ao_tema');

function alura_intercambios_registrando_menu(){
    register_nav_menu(
        'menu-navegacao',
        'Menu Navegação'
    );
}

add_action('init', 'alura_intercambios_registrando_menu');