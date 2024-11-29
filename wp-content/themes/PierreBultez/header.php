<!DOCTYPE html>
<html lang=fr>
<head>
    <!-- Start cookieyes banner -->
    <script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/ae3ffb2f76634cd955a83423/script.js"></script>
    <!-- End cookieyes banner -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo get_dynamic_meta_description(); ?>">
    <link rel="stylesheet" href="https://use.typekit.net/fbq1tkp.css">

    <?php wp_head(); ?>
</head>
<body>
<header>
    <?php if (has_custom_logo()) : ?>
        <div class="logo">
            <?php
            $logo_id = get_theme_mod('custom_logo');
            $logo_url = wp_get_attachment_image_url($logo_id, 'full');
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                <img id="site-logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
    <?php endif; ?>

    <div class="theme-switcher">
        <label for="theme-toggle">
            <i class="fa-regular fa-sun"></i>
            <input type="checkbox" id="theme-toggle" />
            <span class="sr-only">Toggle dark mode</span>
            <i class="fa-regular fa-moon"></i>
        </label>
    </div>

    <div class="tagline">
        <img id="site-tagline" src="/wp-content/uploads/2024/11/tagline_resized.webp" alt="Tagline Not Only Developer">
    </div>
</header>
