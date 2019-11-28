# Air by [studio.bio](https://studio.bio/)

[![License](https://img.shields.io/github/license/joshuaiz/air)](https://img.shields.io/github/license/joshuaiz/air)
[![Github Last Commit](https://img.shields.io/github/last-commit/joshuaiz/air)]()
[![GitHub issues](https://img.shields.io/github/issues/joshuaiz/air)]()
[![GitHub forks](https://img.shields.io/github/forks/joshuaiz/air)](https://github.com/joshuaiz/plate/network)
[![GitHub stars](https://img.shields.io/github/stars/joshuaiz/air)](https://github.com/joshuaiz/air/stargazers)
[![Twitter](https://img.shields.io/twitter/follow/joshuaiz)](https://twitter.com/joshuaiz)

## A hyper-minimal WordPress starter theme for developers built with Tailwind CSS.

### Quickstart
1. Download or clone into `/wp-content/themes/`
2. Run `npm install` to install the dependencies.
3. Change the name of the directory from `air` to whatever you want and also change the comment header in `style.css` to your desired theme name.
4. Activate the theme in the WordPress admin.
5. ❤️ Love.

### Developing with Air
Run `npm run dev` or even better `npm run watch` which includes browser reloading.

As you update your files, Air will either hot reload or rebuild if new `.css` files are required.

Run `npm run build` to generate a production build which uses `purgecss` to remove any styles from Tailwind CSS that you aren't using in your theme keeping it as lean as possible.

### Air + Tailwind CSS
Air uses [Tailwind CSS](https://tailwindcss.com) which is a **utility-first** css framework and a whole new way to think about adding styles to your project.

Instead of creating markup, coming up with class names and then adding `css` styles to those classes in your stylesheets, Tailwind CSS's low-level utility classes are added _directly to your HTML_ to create your designs.

Think of Tailwind CSS like an alphabet that — when combined in beautiful ways — can create rich and complex designs, just like we do with the letters of our English alphabet when combined to form language.

Once you learn Tailwind's classes "alphabet" and how to use it, the possibilities are endless. Yet, by using pre-defined styles as building blocks, you aren't creating everything from scratch.

Still, if you need to do something custom, you can always write your own `css` just as before. The beauty of Tailwind CSS though is that you will be writing way less `css`. 

![](http:///studio.bio/images/tailwind1.png)

The example above is from the Tailwind CSS website and shows a sample component created without any added `css` styles — everything is done in the HTML using Tailwind's classes. This example even sets responsive breakpoints and their respective styles right in the HTML. 

See this on the [tailwindcss.com site](https://tailwindcss.com) site &rarr;.

### How does it work?
Tailwind CSS requires a _build process_ so Air is set up a little differently than most other WordPress themes. If you've used Sass/SCSS with a preprocessor then the process is similar, with some differences that we'll explain in detail.

But don't worry — even if you never used a preprocessor, Webpack or Grunt or Gulp or have no idea what a `package.json` file is or does, Air makes it easy.

The first thing you might notice is that there are a few files in the theme's root folder that may look unfamiliar. Let's take a look at these and explain what they do.

#### `webpack.mix.js`
This file imports `mix` which is a very cool utility that allows us to use JavaScript libraries and build tools in our WordPress theme (or any kind of project). 

The magic happens here:
```javascript
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
        // more stuffs
```
Tailwind CSS is a plugin for`PostCSS` and that's not particularly important other than the fact that `mix` supports `PostCSS` out-of-the-box. So all we have to do is `require` our `PostCSS` plugins (including Tailwind) and we are good to go.

Here we're telling `mix` to use `PostCSS` to use the `theme-style.css` file to build our `style.css` file using the options specified.

You don't need to edit this file at all but you *can* and add your own `PostCSS` options/plugins or even other JavaScript libraries or plugins (outside of CSS) and extend `mix` as you see fit! 

#### `tailwind.config.js`
This file is used to extend Tailwind's defaults as well as add custom defaults for a theme. We've added some default classes and colors for Air but feel free to delete what's there or add your own.

See more info on [customizing Tailwind's config](https://tailwindcss.com/docs/configuration).

#### What about SCSS?
Our other WordPress starter theme [Plate](https://github.com/joshuaiz/plate) uses modular `.scss` files and media queries so definitely look at that if you want to use `.scss`.

We love `.scss` however with Air and Tailwind CSS, you don't need it! In our `webpack.mix.js` file above, we are using `PostCSS` plugins that support imports, nesting, and autoprefixing just like SCSS. 

You weren't really using lots of complex Sass mixins, were you? (If so, you still can use `.scss` and preprocessors with Tailwind...see the [docs](https://tailwindcss.com/docs/using-with-preprocessors).)

Here's the key concept:

> **Most of your styles will be added as classes directly to the theme's HTML**

As a result, we're using regular ol' `.css` files but you can nest selectors just like Sass/SCSS and don't need to worry about browser prefixing — that is all handled at the build step.

Yet really you will be writing less CSS which will speed up your development immensely. 

### Try Air
If you're still skeptical, just give Air + Tailwind CSS a try. The only way to really see the benefits of Tailwind CSS is to dive in and use it. I was skeptical too — but I was hooked after 15 minutes and never looked back.

Granted, Air (and Tailwind CSS) won't be the right fit for every project but at [studio.bio](https://studio.bio) we wanted another option for a starter theme for non-headless projects and we love working with Tailwind CSS. Enter Air.





