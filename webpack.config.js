var Encore = require('@symfony/webpack-encore');

Encore

    .setOutputPath('public/build/')

    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('css/style',['./assets/css/style.css'])
    .addStyleEntry('css/registerpage',['./assets/css/registerpage.css'])
    .addStyleEntry('css/style2',['./assets/css/style2.css'])

    .enableSassLoader()


    .disableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()


    .enableVueLoader()
    .enableVersioning()


;

module.exports = Encore.getWebpackConfig();