// eslint-disable
const mix = require('laravel-mix')

mix.postCss('library/css/theme-style.css', 'library/css/style.css').options({
    postCss: [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
        require('autoprefixer')
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
