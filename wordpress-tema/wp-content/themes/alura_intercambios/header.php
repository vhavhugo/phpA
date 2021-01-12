<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php bloginfo('name') ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <?php wp_head(); ?>
    </head>
    <body>
    <?php 
    the_custom_logo();
    wp_nav_menu(array(
        'menu' => 'menu-navegacao'
    )) 
    
    ?> 