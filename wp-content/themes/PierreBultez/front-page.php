<?php get_header(); ?>

<?php
// Début de la section dédiée aux projets
echo '<section class="homepage-projects">';
?>

<div class="homepage-projects-title">
    <h2 class="rust-script section-title">Projets</h2>
</div>

<?php

// Requête pour récupérer les projets
$args = [
    'post_type'      => 'projects',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
];

$query = new WP_Query($args);
$i = 0; // Compteur pour alterner les templates

if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();

        // Alterne entre deux templates
        if ($i % 2 === 0) {
            get_template_part('project-card-left');
        } else {
            get_template_part('project-card-right');
        }

        $i++; // Incrémente le compteur
    endwhile;
else :
    echo '<p>Aucun projet trouvé.</p>';
endif;

// Réinitialise la requête principale
wp_reset_postdata();

echo '</section>';
?>

<section class="testimonials-slider">
    <h2 class="rust-script section-title">Témoignages</h2>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            $query = new WP_Query([
                'post_type'      => 'testimonials',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    ?>
                    <div class="swiper-slide">
                        <blockquote>
                            <p><?php the_content(); ?></p>
                            <br>
                            <cite><?php the_title(); ?></cite>
                        </blockquote>
                    </div>
                <?php
                endwhile;
            else :
                echo '<p>Aucun témoignage pour l’instant.</p>';
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<section class="software">
    <div class="software-title">
        <h2 class="rust-script section-title">Outils</h2>
    </div>
    <div class="software-box">
        <div class="software-icons">
            <?php
            $query = new WP_Query([
                'post_type'      => 'software',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    ?>
                    <div class="software-icon">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('', ['alt' => esc_attr(get_the_title())]);
                        } else {
                            echo '<span>' . esc_html(get_the_title()) . '</span>';
                        }
                        ?>
                        <span class="software-name"><?php the_title(); ?></span>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>

        <div class="software-text">
            <p>Que ce soit pour le <strong>développement</strong>, la <strong>gestion de projets</strong> ou l'optimisation des <strong>workflows</strong>, ces outils font partie intégrante de mon <strong>quotidien</strong>. Ils me permettent de travailler avec <strong>efficacité</strong>, d’assurer la <strong>qualité</strong> de mes livrables et de répondre aux besoins variés de chaque projet. Grâce à ces <strong>compétences</strong>, je peux m’adapter aux exigences techniques et proposer des solutions <strong>sur mesure</strong>, tout en restant à jour avec les pratiques et standards de l’industrie.</p>
        </div>
    </div>
</section>

<section class="software">
    <div class="software-title">
        <h2 class="rust-script section-title">Administration système</h2>
    </div>
    <div class="software-box">
        <div class="software-text">
            <p>En plus de concevoir et développer des <strong>sites web performants</strong>, je suis également en mesure de les <strong>héberger</strong> et d'assurer leur gestion sur des <strong>environnements adaptés</strong>. Grâce à mes compétences en <strong>administration système</strong>, je suis capable d'utiliser les outils nécessaires pour <strong>configurer, sécuriser et optimiser</strong> les <strong>serveurs</strong> qui hébergent vos projets. Qu'il s'agisse de la gestion des <strong>bases de données</strong> ou de l'<strong>optimisation des performances</strong>, je veille à ce que chaque site fonctionne de manière fiable et rapide, même sous <strong>forte charge</strong>.</p>
        </div>
        <div class="software-icons">
            <?php
            $query = new WP_Query([
                'post_type'      => 'sysadmin',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    ?>
                    <div class="software-icon">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('', ['alt' => esc_attr(get_the_title())]);
                        } else {
                            echo '<span>' . esc_html(get_the_title()) . '</span>';
                        }
                        ?>
                        <span class="sysadmin-name"><?php the_title(); ?></span>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<section class="bio">

</section>


<?php get_footer(); ?>