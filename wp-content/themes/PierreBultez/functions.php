<?php

function pierrebultez_init() {

    register_taxonomy(
        'technologies', // Slug de la taxonomie
'projects',
        [
            'labels' => [
                'name' => 'Technologies',
                'singular_name' => 'Technologie',
                'search_items' => 'Rechercher des technologies',
                'all_items' => 'Toutes les technologies',
                'edit_item' => 'Modifier la technologie',
                'update_item' => 'Mettre à jour la technologie',
                'add_new_item' => 'Ajouter une nouvelle technologie',
                'new_item_name' => 'Nom de la nouvelle technologie',
                'menu_name' => 'Technologies',
            ],
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'show_in_rest' => true, // Permet de gérer via Gutenberg
        ]
    );

    // Enregistrer le type de post personnalisé "photographies"
    register_post_type('projects', [
        'labels' => [
            'name' => __('Projets'),
            'singular_name' => __('Projet'),
            'search_items' => __('Rechercher un projet'),
            'all_items' => __('Tous les projets'),
            'edit_item' => __('Editer un projet'),
            'update_item' => __('Mettre à jour le projet'),
            'add_new' => __('Ajouter un nouveau projet'),
            'add_new_item' => __('Nouveau projet'),
            'new_item_name' => __('Nouveau projet'),
            'menu_name' => __('Projets'),
            'not_found' => __('Aucune projet trouvé'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-html',
        'menu_position' => 3,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
    ]);

    register_post_type('testimonials', [
        'labels' => [
            'name' => 'Appréciations',
            'singular_name' => 'Appréciation',
            'menu_name' => 'Appréciations',
            'add_new_item' => 'Ajouter une nouvelle appréciation',
            'edit_item' => "Modifier l'appréciation",
        ],
        'public' => true,
        'has_archive' => false,
        'supports' => ['title', 'editor'], // Titre et contenu (texte du témoignage)
        'menu_icon' => 'dashicons-format-quote', // Icône dans le menu admin
        'menu_position' => 4,
    ]);

    register_post_type('software', [
        'labels' => [
            'name' => 'Logiciels',
            'singular_name' => 'Logiciel',
            'menu_name' => 'Logiciels',
            'add_new_item' => 'Ajouter un nouveau logiciel',
            'edit_item' => "Modifier le logiciel",
        ],
        'public' => true,
        'has_archive' => false,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-hammer',
        'menu_position' => 5,
    ]);

    register_post_type('sysadmin', [
        'labels' => [
            'name' => 'Administration système',
            'singular_name' => 'Administration système',
            'menu_name' => 'Administration système',
            'add_new_item' => "Ajouter un nouvel outil d'administration système",
            'edit_item' => "Modifier l'outil d'administration système",
        ],
        'public' => true,
        'has_archive' => false,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-superhero',
        'menu_position' => 5,
    ]);
}

add_action('init', 'pierrebultez_init');

function pierrebultez_setup () {
    // Ajoute la prise en charge du titre de la page
    add_theme_support('title-tag');

    // Ajoute la prise en charge des images à la une dans les posts
    add_theme_support('post-thumbnails');

    // Enregistre les menus de navigation
    register_nav_menus(array(
        'main_menu' => __('Menu principal', ''),
        'footer_menu' => __('Menu de footer', ''),
    ));

    // Activer le support du logo personnalisé
    add_theme_support('custom-logo', array(
        'height'      => 115,
        'width'       => 900,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Ajoute des tailles d'image personnalisées
    add_image_size('logo', 575, 75);
    add_image_size('tagline', 375, 40);
    add_image_size('card', 813, 500, true);
//    add_image_size('photo-detail-thumb', 80, 80, true);
//    add_image_size('photo-lightbox-landscape', 844, 563, true);
//    add_image_size('photo-lightbox-portrait', 376, 563, true);
//    add_image_size('hero', 1440, 960, true);
}

// Action pour configurer le thème après son activation
add_action('after_setup_theme', 'pierrebultez_setup');

function pierrebultez_register_assets(): void {
    // Définir les styles à enregistrer et à inclure
    $styles = [
        'pierrebultez' => get_stylesheet_directory_uri() . '/style.css',
        'fontawesome' => get_stylesheet_directory_uri() . '/assets/fontawesome/css/fontawesome.css',
        'fontawesome-all' => get_stylesheet_directory_uri() . '/assets/fontawesome/css/all.css',
        'swiper-css' => 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
    ];

    // Enregistrer et inclure chaque style
    foreach ($styles as $handle => $src) {
        wp_register_style($handle, $src);
        wp_enqueue_style($handle);
    }

    // Définir les scripts à enregistrer et à inclure
    $scripts = [
        'pierrebultez-scripts' => get_stylesheet_directory_uri() . '/scripts/scripts.js',
        'swiper-js' => 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true,
    ];

    // Enregistrer et inclure chaque script
    foreach ($scripts as $handle => $src) {
        wp_register_script($handle, $src, ['jquery'], false, true);
        wp_enqueue_script($handle);
    }
}

// Action pour enregistrer et inclure les styles et scripts
add_action('wp_enqueue_scripts', 'pierrebultez_register_assets');

function custom_meta_description_box()
{
    add_meta_box(
        'meta_description_id',
        'Meta Description',
        'custom_meta_description_callback',
        'post',
        'side'
    );
    add_meta_box(
        'meta_description_id',
        'Meta Description',
        'custom_meta_description_callback',
        'page',
        'side'
    );
    add_meta_box(
        'meta_description_id',
        'Meta Description',
        'custom_meta_description_callback',
        'projects',
        'side'
    );
    add_meta_box(
        'meta_description_id',
        'Meta Description',
        'custom_meta_description_callback',
        'testimonials',
        'side'
    );
}

add_action('add_meta_boxes', 'custom_meta_description_box');

function custom_meta_description_callback($post)
{
    $value = get_post_meta($post->ID, '_custom_meta_description', true);
    echo '<textarea style="width:100%;" rows="4" name="custom_meta_description">' . esc_attr($value) . '</textarea>';
}

function save_custom_meta_description($post_id)
{
    if (array_key_exists('custom_meta_description', $_POST)) {
        update_post_meta(
            $post_id,
            '_custom_meta_description',
            sanitize_textarea_field($_POST['custom_meta_description'])
        );
    }
}

add_action('save_post', 'save_custom_meta_description');

function get_dynamic_meta_description()
{
    if (is_single() || is_page()) {
        global $post;
        $custom_meta_description = get_post_meta($post->ID, '_custom_meta_description', true);
        if ($custom_meta_description) {
            return esc_attr($custom_meta_description);
        } else {
            // Fallback to excerpt if no custom meta description is set
            return esc_attr(wp_trim_words($post->post_content, 30, '...'));
        }
    } elseif (is_category()) {
        $category_description = category_description();
        return esc_attr($category_description);
    } else {
        return "Découvrez Pierre Bultez, développeur freelance junior spécialisé en développement front-end et hébergement web. Basé dans le Vaucluse, j'accompagne vos projets web à Orange, Avignon, Carpentras et au-delà. Création de sites modernes, performants et adaptés à vos besoins.";
    }
}
