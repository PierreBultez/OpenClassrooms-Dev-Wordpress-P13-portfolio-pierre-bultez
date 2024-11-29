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
                updateIconsAfterAjax(); // Redétecter et mettre à jour les icônes après AJAX
            },
            error: function (error) {
                console.error('Erreur lors du chargement des projets:', error);
            },
        });
    }

    // Détection de la largeur initiale
    let currentWidth = window.innerWidth;
    loadProjects(currentWidth);
    updateIconsAfterAjax(); // Assurez-vous que les icônes sont correctement détectées après le premier chargement

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

    function updateIconsAfterAjax() {
        const updatedIcons = document.querySelectorAll('.technology-icon');
        console.log("Updated icons:", updatedIcons);
        updatedIcons.forEach(icon => {
            if (localStorage.getItem('theme') === 'dark') {
                icon.src = icon.getAttribute('data-dark');
            } else {
                icon.src = icon.getAttribute('data-light');
            }
        });
        // Réappliquez les changements avec switchIcons pour être sûr
        const currentTheme = localStorage.getItem('theme');
        switchIcons(currentTheme);
    }

    const toggleSwitch = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme');
    const logo = document.getElementById('site-logo');
    const tagline = document.getElementById('site-tagline');
    const lightModeLogo = '/wp-content/uploads/2024/11/logo_resized_final.webp';
    const darkModeLogo = '/wp-content/uploads/2024/11/logo-resized-final-dark-mode.webp';
    const lightModeTagline = '/wp-content/uploads/2024/11/tagline_resized.webp';
    const darkModeTagline = 'wp-content/uploads/2024/11/tagline-resized-dark-mode.webp';

    // Fonction pour changer les icônes des technologies
    function switchIcons(theme) {
        const icons = document.querySelectorAll('.technology-icon'); // Toujours récupérer les icônes actuelles
        icons.forEach(icon => {
            console.log(`Switching icon: ${icon.src}`);
            if (theme === 'dark') {
                icon.src = icon.getAttribute('data-dark'); // Change l'icône pour le mode sombre
            } else {
                icon.src = icon.getAttribute('data-light'); // Reviens à l'icône du mode clair
            }
            console.log("Updated src:", icon.src);
        });
    }

// Fonction pour basculer tous les éléments (logo, tagline, icônes)
    function switchTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark-mode');
            logo.src = darkModeLogo;       // Change le logo pour le mode sombre
            tagline.src = darkModeTagline; // Change la tagline pour le mode sombre
            switchIcons('dark');           // Change les icônes des technologies pour le mode sombre
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark-mode');
            logo.src = lightModeLogo;       // Reviens au logo normal
            tagline.src = lightModeTagline; // Reviens à la tagline normale
            switchIcons('light');           // Reviens aux icônes du mode clair
            localStorage.setItem('theme', 'light');
        }
    }

// Applique le thème et les icônes si une préférence existe
    if (currentTheme === 'dark') {
        switchTheme('dark');
        switchIcons('dark'); // Applique les icônes immédiatement
    } else {
        switchTheme('light');
        switchIcons('light'); // Applique les icônes immédiatement
    }

// Ajoute un événement pour basculer le thème lors du changement de l’interrupteur
    toggleSwitch.addEventListener('change', () => {
        if (toggleSwitch.checked) {
            switchTheme('dark');
        } else {
            switchTheme('light');
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

