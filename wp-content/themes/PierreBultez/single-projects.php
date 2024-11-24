<?php
/**
 * Template Name: Single Projects
 * Description: Template par défaut pour afficher les projets.
 */

get_header();
?>

<section class="hero">
    <div class="hero-left">
        <div class="hero-left-text">
            <p class="">Vous apprendrez à mettre en place des structures de données personnalisées en utilisant des <strong>custom post types (CPT)</strong> et des <strong>champs ACF</strong> avec PHP.
                <br>
                <br>
                Votre mission sera de rendre les templates de contenu <strong>dynamiques</strong>, en exploitant les données du back-office de WordPress.
                <br>
                <br>
                Vous intégrerez des techniques comme <strong>Ajax</strong> pour un affichage dynamique des données.
            </p>
        </div>
        <div class="hero-left-button">
            <a href="https://github.com/PierreBultez/OpenClassrooms-Dev-Wordpress-P11-nathalie-mota" target="_blank">
                <img src="/wp-content/uploads/2024/11/code_1.webp" alt="">
            </a>
            <a href="https://motaphoto.pierrebultez.com/" target="_blank">
                <img src="/wp-content/uploads/2024/11/live.webp" alt="">
            </a>
        </div>
        <div class="hero-left-logo">
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
    <div class="hero-right">
        <img src="/wp-content/uploads/2024/11/motaphoto.webp" alt="">
    </div>
</section>

<?php get_footer(); ?>
