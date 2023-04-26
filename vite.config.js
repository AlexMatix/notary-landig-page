import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //CSS
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/css/bootstrap.min.css',
                'resources/css/bootstrap-datepicker.css',
                'resources/css/jquery.fancybox.min.css',
                'resources/css/owl.carousel.min.css',
                'resources/css/owl.theme.default.min.css',
                'resources/css/aos.css',
                //FONTS
                'resources/fonts/style.css',
                'resources/fonts/flaticon/font/flaticon.css',
                //JS
                'resources/js/app.js',
                'resources/js/jquery-3.3.1.min.js',
                'resources/js/popper.min.js',
                'resources/js/bootstrap.min.js',
                'resources/js/owl.carousel.min.js',
                'resources/js/jquery.sticky.js',
                'resources/js/jquery.waypoints.min.js',
                'resources/js/jquery.animateNumber.min.js',
                'resources/js/jquery.fancybox.min.js',
                'resources/js/jquery.easing.1.3.js',
                'resources/js/bootstrap-datepicker.min.js',
                'resources/js/aos.js',
                'resources/js/main.js',
                //IMAGES
                'resources/images/logo.png',
                'resources/images/portada.png',
                'resources/images/portada1.jpg',
                'resources/images/norma.png',
                'resources/images/maestra_norma.PNG',
                //FILES
                'resources/files/services_notary.pdf'
            ],
            refresh: true,
        }),
    ],
});
