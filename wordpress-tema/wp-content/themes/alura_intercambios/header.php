<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title><?php bloginfo('name') ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <?php wp_head(); ?>
    <link href="<?= get_template_directory_uri() . '/css/normalize.css' ?> " rel="stylesheet">
    <link href="<?= get_template_directory_uri() . '/css/bootstrap.css' ?> " rel="stylesheet">
    <link href="<?= get_template_directory_uri() . '/css/header.css' ?> " rel="stylesheet">
    <link href="<?= get_template_directory_uri() . '/css/' . $estiloPagina ?> " rel="stylesheet">
    <link href="<?= get_template_directory_uri() . '/css/footer.css' ?> " rel="stylesheet">
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container-alura">
            <?php
            the_custom_logo();
            ?>
        </div>
        <nav>
            <?php
            wp_nav_menu(array(
                'menu'    => 'menu-navegacao',
                'menu_id' => 'menu-principal'
            ))

            ?>
        </nav>
    </header>