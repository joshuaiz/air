module.exports = {
    theme: {
        extend: {
            // Adds additional widths to max-w-
            maxWidth: {
                '7xl': '80rem',
                '8xl': '88rem',
                '9xl': '96rem'
            },
            colors: {
                'sb-blue': '#0056ac',
                'sb-light-blue': '#99bbde',
                'sb-dark-blue': '#004466',
                'sb-midnight': '#001c3a',
                'sb-purple': '#CC0099',
                'sb-orange': '#F05A28',
                'sb-dark-orange': '#B4441E',
                'sb-red': '#F23E2F',
                'sb-black': '#111111',
                'sb-grey': '#808080'
            },
            screens: {
                'below-sm': { max: '639px' },
                // => @media (max-width: 639px) { ... }

                'below-md': { max: '767px' },
                // => @media (max-width: 767px) { ... }

                'below-lg': { max: '1023px' },
                // => @media (max-width: 1023px) { ... }

                'below-xl': { max: '1279px' }
                // => @media (max-width: 1279px) { ... }
            }
        }
    },
    variants: {},
    plugins: []
}
