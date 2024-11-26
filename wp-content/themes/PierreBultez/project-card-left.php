<section class="project">
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

                // Parcours chaque technologie et affiche son icône
                foreach ($technologies as $tech) {
                    // Récupère l'image associée via ACF
                    $icon_id = get_field('icone_technologie', 'term_' . $tech->term_id);
                    if ($icon_id) {
                        // Affiche l'image avec sa taille définie
                        echo wp_get_attachment_image($icon_id, '', false, [
                            'alt' => esc_attr($tech->name), // Texte alternatif de l'image
                        ]);
                    } else {
                        // Affiche le nom de la technologie si aucune icône n’est définie
                        echo '<span>' . esc_html($tech->name) . '</span>';
                    }
                }

                echo '</div>';
            }
            ?>

        </div>
    </div>
    <div class="project-right">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('card', ['alt' => esc_attr(get_the_title())]);
        } else {
            echo '<img src="/wp-content/uploads/2024/11/fallback.webp" alt="Image par défaut affichant le texte Coming soon ...">';
        }
        ?>
    </div>
</section>
