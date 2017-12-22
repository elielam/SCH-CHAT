var Encore = require('@symfony/webpack-encore');

Encore

    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('js/app', './assets/app.js')
    .addStyleEntry('css/app', './assets/app.scss')

    // uncomment if you use Sass/SCSS files
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })

    // JQuery
    .autoProvidejQuery()

    // Jquery & Popper.js var for Bootstrap
    .autoProvideVariables({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
        Popper: ['popper.js', 'default'],
    })

    // Nettoyage du dossier /build a chaque build
    .cleanupOutputBeforeBuild()
    // Active les notifications dans cmd
    .enableBuildNotifications()
;

module.exports = Encore.getWebpackConfig();
