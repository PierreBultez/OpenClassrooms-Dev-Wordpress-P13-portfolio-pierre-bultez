<section class="project">
    <div class="project-right">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('card', ['alt' => esc_attr(get_the_title())]);
        } else {
            echo '<img src="/wp-content/uploads/2024/11/fallback.webp" alt="Image par défaut affichant le texte Coming soon ...">';
        }
        ?>
    </div>
    <div class="project-left">
        <div class="project-left-text">

            <?php
            // Affiche le titre
            the_title('<h2>', '</h2>');

            // Affiche le contenu principal
            the_content();
            ?>

        </div>
        <div class="project-left-button">

            <?php
            $code_url = get_field('code_url');
            $live_url = get_field('live_url');

            if ($code_url) {
                echo '<a href="' . esc_url($code_url) . '" class="button" target="_blank" rel="noopener noreferrer">
                    <button type="button">Code</button>
                </a>';
            }

            if ($live_url) {
                echo '<a href="' . esc_url($live_url) . '" class="button" target="_blank" rel="noopener noreferrer">
                    <button type="button">Live</button>
                </a>';
            }
            ?>

        </div>
        <div class="project-left-logo">
            <?php
            // Récupère les technologies associées au projet (taxonomie)
            $technologies = get_the_terms(get_the_ID(), 'technologies');

            if ($technologies && !is_wp_error($technologies)) {
                // Parcours chaque technologie et affiche ses icônes pour les deux modes
                foreach ($technologies as $tech) {
                    $icon_light_id = get_field('icone_technologie_light', 'term_' . $tech->term_id);
                    $icon_dark_id = get_field('icone_technologie_dark', 'term_' . $tech->term_id);

                    // Génère les URLs des icônes
                    $icon_light_url = $icon_light_id ? wp_get_attachment_url($icon_light_id) : '';
                    $icon_dark_url = $icon_dark_id ? wp_get_attachment_url($icon_dark_id) : '';

                    if ($icon_light_url && $icon_dark_url) {
                        echo '<img class="technology-icon" 
                           src="' . esc_url($icon_light_url) . '" 
                           data-dark="' . esc_url($icon_dark_url) . '" 
                           data-light="' . esc_url($icon_light_url) . '" 
                           alt="' . esc_attr($tech->name) . '">';
                    } else {
                        echo '<span>' . esc_html($tech->name) . '</span>';
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
