var Encore = require('@symfony/webpack-encore');

Encore

    .setOutputPath('public/build/')

    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')

    .enableSassLoader()


    .disableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()


    .enableVueLoader()
    .enableVersioning()


;

module.exports = Encore.getWebpackConfig();
