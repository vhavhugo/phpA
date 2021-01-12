<?php

function alura_intercambios_registrando_menu(){
    register_nav_menu(
        'menu-navegacao',
        'Menu Navegação'
    );
}

add_action('init', 'alura_intercambios_registrando_menu');