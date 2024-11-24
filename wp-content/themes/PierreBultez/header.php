<!DOCTYPE html>
<html lang=fr>
<head>
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
            <?php the_custom_logo(); ?>
        </div>
    <?php endif; ?>

    <div class="tagline">
        <img src="/wp-content/uploads/2024/11/tagline_resized.webp" alt="">
    </div>
</header>
