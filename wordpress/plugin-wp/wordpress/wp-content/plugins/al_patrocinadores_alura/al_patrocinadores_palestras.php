<?php
/**
 * @package teste
 */
/*
Plugin Name: Teste Alura
Description: Meu primeiro pluguin.
Author: Hugo do Valle
Version: 1.0.0
*/

// error_log("estou dentro do plugin dos patrocinadores");
if(!defined('ABSPATH')){
    die;
}

require_once plugin_dir_path(__FILE__) . '/includes/al_patrocinadores_palestras_widget.php';