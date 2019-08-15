var Encore = require('@symfony/webpack-encore');

Encore

    .setOutputPath('public/build/')

    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('css/login', ['./assets/css/login.css'])

    .enableSassLoader()


    .disableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()


    .enableVueLoader()
    .enableVersioning()


;

module.exports = Encore.getWebpackConfig();
