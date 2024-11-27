jQuery(document).ready(function ($) {
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });

    // Fonction pour charger les projets via AJAX
    function loadProjects(screenWidth) {
        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'load_projects',
                screen_width: screenWidth,
            },
            success: function (response) {
                // Met à jour le contenu des projets
                $('.homepage-projects').html(response);
            },
            error: function (error) {
                console.error('Erreur lors du chargement des projets:', error);
            },
        });
    }

    // Détection de la largeur initiale
    let currentWidth = window.innerWidth;
    loadProjects(currentWidth);

    // Écoute les changements de taille de la fenêtre
    $(window).on('resize', function () {
        const newWidth = window.innerWidth;

        // Recharge uniquement si on franchit la limite de 1440px
        if (
            (currentWidth >= 1440 && newWidth < 1440) || // Passer de >1440px à <1440px
            (currentWidth < 1440 && newWidth >= 1440)   // Passer de <1440px à >1440px
        ) {
            currentWidth = newWidth; // Met à jour la largeur actuelle
            loadProjects(newWidth); // Recharge les projets
        }
    });
});

