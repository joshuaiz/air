// eslint-disable
const mix = require("laravel-mix");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

/**
 * Development Builds
 *
 * The below runs using either `npm run dev` or `npm run watch`
 * when you're developing locally. Will refresh the browser too.
 *
 */

mix
    .postCss("library/css/theme-style.css", "library/css/style.css")
    .options({
        from: "undefined",
        postCss: [
            require("postcss-import"),
            require("tailwindcss"),
            require("postcss-nested"),
            require("autoprefixer")
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
                files: "**/*.php",
                proxy: "https://platetw.local",
                browser: "google chrome",
                https: true,
                open: false
            })
        ]
    });

/**
 * Extra Builds
 * 
 * Uncomment these to build editor styles for Classic + Gutenberg editors.
 * These add to the build time so only run when you need them.
 */
//   .postCss(
//     "library/css/editor/editor-styles.css",
//     "library/css/editor/editor-style.css"
//   )
//   .options({
//     postCss: [
//       require("postcss-import"),
//       require("tailwindcss"),
//       require("postcss-nested"),
//       require("autoprefixer")
//     ]
//   })
//   .postCss(
//     "library/css/editor/gutenberg-styles.css",
//     "library/css/editor/gutenberg.css"
//   )
//   .options({
//     postCss: [
//       require("postcss-import"),
//       require("tailwindcss"),
//       require("postcss-nested"),
//       require("autoprefixer")
//     ]
//   })
//   .postCss(
//     "library/css/editor/block-editor-styles.css",
//     "library/css/editor/block-editor.css"
//   )
//   .options({
//     postCss: [
//       require("postcss-import"),
//       require("tailwindcss"),
//       require("postcss-nested"),
//       require("autoprefixer")
//     ]
//   });

/**
 * Production Build
 *
 * Run `npm run prod` to create a minified production build.
 *
 * This will also run PurgeCSS removing all of the Tailwind
 * stuffs you didn't use. Really cool.
 */

if (mix.inProduction()) {
    mix.options({
        postCss: [
            require("postcss-import"),
            require("tailwindcss"),
            require("postcss-nested"),
            require("autoprefixer"),
            require("@fullhuman/postcss-purgecss")({
                content: ["./**.php", "./**/**.php", "./**.html", "./**.js"],
                defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || []
            })
        ]
    });
}
