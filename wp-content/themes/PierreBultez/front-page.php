<?php get_header(); ?>

<section class="site-title">
    <h1 class="site-title-text">
        Création et hébergement de sites web dans le Vaucluse
    </h1>
</section>

<section class="bio">
        <div class="bio-title">
            <h2 class="rust-script section-title">Biographie</h2>
        </div>
        <div class="bio-card">
            <div class="bio-text">
                <h3>Développeur Front-end Junior</h3>
                <br>
                <p><strong>Passionné</strong> par le web et <strong>autodidacte</strong>, j’ai commencé mon parcours en apprenant seul les bases du <strong>développement</strong> et de l’<strong>administration de sites</strong>. De la création de sites avec des CMS comme <strong>WordPress</strong> ou <strong>Magento</strong> à leur mise en ligne et leur <strong>hébergement</strong>, j’ai acquis une expérience pratique qui m’a permis de développer une compréhension globale des enjeux du web. J’ai également exploré d’autres outils comme <strong>Prestashop</strong>, touchant à différents aspects de l’écosystème numérique.</p>
                <p>Animé par une envie de reconversion professionnelle et désireux de transformer ma passion en métier, j’ai entrepris une formation structurée pour reprendre les bases fondamentales : <strong>HTML, CSS, SASS, PHP, JavaScript</strong> et une maîtrise avancée de <strong>WordPress</strong>. Cet investissement m’a permis d’obtenir un titre professionnel de <strong>niveau 5 (Bac+2)</strong>, validant mes compétences et me donnant la confiance nécessaire pour me lancer dans l’aventure professionnelle.</p>
                <p>Aujourd’hui, je propose mes services en tant que <strong>freelance</strong>, couvrant un large éventail de besoins : <strong>création</strong> et <strong>refonte</strong> de sites web, <strong>hébergement</strong>, <strong>optimisation</strong> de performances et <strong>gestion</strong> de projets numériques. Toujours en quête de nouvelles opportunités, je suis également ouvert à des collaborations en tant que <strong>salarié</strong>, <strong>sous-traitant</strong> ou <strong>alternant</strong> pour enrichir davantage mes compétences.</p>
                <p>Ma formation ne s’arrête pas là: j’ai adopté une approche d’apprentissage continu. Mon objectif à court terme est de maîtriser un <strong>framework</strong> JavaScript moderne, comme <strong>Angular</strong>, pour élargir encore mes capacités et répondre aux défis du développement <strong>web moderne</strong>. Enthousiaste et adaptable, je suis prêt à accompagner vos projets numériques, quels qu’en soient les besoins.</p>
            </div>
            <div class="bio-content">
                <div class=" bio-pic">
                    <img src="/wp-content/uploads/2024/11/pierre-bultez-resized-blue.webp" alt="#">
                </div>
                <div class="bio-social">
                    <a href="https://github.com/PierreBultez" target="_blank" class="github">
                        <i class="fa-brands fa-github"></i>
                        <span class="sr-only">GitHub</span>
                    </a>
                    <a href="https://www.linkedin.com/in/pierre-bultez-5699b52a8/" target="_blank" class="linkedin">
                        <i class="fa-brands fa-linkedin"></i>
                        <span class="sr-only">Linkedin</span>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=61564566744970" target="_blank" class="facebook">
                        <i class="fa-brands fa-facebook"></i>
                        <span class="sr-only">facebook</span>
                    </a>
                </div>
                <div class="bio-button">
                    <a href="#contact" target="_self"><button class="cta" type="button">Contact</button></a>
                </div>
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

<div class="homepage-projects-title">
    <h2 class="rust-script section-title">Projets</h2>
</div>
<section class="homepage-projects">
    <p>Chargement des projets...</p>
</section>

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

<section class="contact" id="contact">
    <?php echo do_shortcode('[quform id="2" name="Proposition de job"]'); ?>
</section>

<?php get_footer(); ?>