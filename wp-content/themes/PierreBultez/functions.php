<?php

function pierrebultez_register_assets(): void {
    // Définir les styles à enregistrer et à inclure
    $styles = [
        'pierrebultez' => get_stylesheet_directory_uri() . '/style.css',
        'fontawesome' => get_stylesheet_directory_uri() . '/assets/fontawesome/css/fontawesome.css',
        'fontawesome-all' => get_stylesheet_directory_uri() . '/assets/fontawesome/css/all.css',
    ];

    // Enregistrer et inclure chaque style
    foreach ($styles as $handle => $src) {
        wp_register_style($handle, $src);
        wp_enqueue_style($handle);
    }

    // Définir les scripts à enregistrer et à inclure
    $scripts = [
        'pierrebultez-scripts' => get_stylesheet_directory_uri() . '/scripts/scripts.js',
    ];

    // Enregistrer et inclure chaque script
    foreach ($scripts as $handle => $src) {
        wp_register_script($handle, $src, ['jquery'], false, true);
        wp_enqueue_script($handle);
    }
}

// Action pour enregistrer et inclure les styles et scripts
add_action('wp_enqueue_scripts', 'pierrebultez_register_assets');
