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

    const toggleSwitch = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme');
    const logo = document.getElementById('site-logo');
    const tagline = document.getElementById('site-tagline');
    const lightModeLogo = '/wp-content/uploads/2024/11/logo_resized_final.webp';
    const darkModeLogo = '/wp-content/uploads/2024/11/logo-resized-final-dark-mode.webp';
    const lightModeTagline = '/wp-content/uploads/2024/11/tagline_resized.webp';
    const darkModeTagline = 'wp-content/uploads/2024/11/tagline-resized-dark-mode.webp';

    // Applique le thème si une préférence existe
    if (currentTheme === 'dark') {
        document.documentElement.classList.add('dark-mode');
        toggleSwitch.checked = true;
        logo.src = darkModeLogo;       // Change le logo pour le mode sombre
        tagline.src = darkModeTagline; // Change la tagline pour le mode sombre
    } else {
        logo.src = lightModeLogo;       // Par défaut, mode clair
        tagline.src = lightModeTagline; // Par défaut, tagline normale
    }

// Ajoute un événement pour basculer le thème
    toggleSwitch.addEventListener('change', () => {
        if (toggleSwitch.checked) {
            document.documentElement.classList.add('dark-mode');
            localStorage.setItem('theme', 'dark');
            logo.src = darkModeLogo;       // Change le logo pour le mode sombre
            tagline.src = darkModeTagline; // Change la tagline pour le mode sombre
        } else {
            document.documentElement.classList.remove('dark-mode');
            localStorage.setItem('theme', 'light');
            logo.src = lightModeLogo;       // Reviens au logo normal
            tagline.src = lightModeTagline; // Reviens à la tagline normale
        }
    });

    // (() => {
    //    const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p');
    //    const structure = Array.from(headings).map((el) => ({
    //       tag: el.tagName,
    //       text: el.textContent.trim(),
    //    }));

    //    console.table(structure);
    // })();
});

