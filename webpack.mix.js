// eslint-disable
const mix = require('laravel-mix')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')

mix.postCss('library/css/theme-style.css', 'library/css/style.css')
    .options({
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
            require('postcss-nested'),
            require('autoprefixer')
        ],
        processCssUrls: false,
        uglify: {
            parallel: 8, // Use multithreading for the processing
            uglifyOptions: {
                mangle: true,
                compress: false // The slow bit
            }
        }
    })
    .webpackConfig({
        plugins: [
            new BrowserSyncPlugin({
                files: '**/*.php',
                proxy: 'https://platetw.local',
                browser: 'google chrome',
                https: true,
                open: false
            })
        ]
    })

if (mix.inProduction()) {
    mix.options({
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
            require('postcss-nested'),
            require('autoprefixer'),
            require('@fullhuman/postcss-purgecss')({
                content: ['./**.php', './**/**.php', './**.html', './**.js'],
                defaultExtractor: content =>
                    content.match(/[A-Za-z0-9-_:/]+/g) || []
            })
        ]
    })
}
