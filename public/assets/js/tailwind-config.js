tailwind.config = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: '#cc0000',
                brand: {
                    DEFAULT: '#cc0000',
                    dark: '#990000',
                    light: '#ff3333',
                },
                darkBg: '#0a0a0a',
                surface: '#141414',
                industrial: {
                    900: '#0a0a0a',
                    800: '#171717',
                    700: '#262626',
                    600: '#404040',
                    500: '#737373',
                    400: '#a3a3a3',
                }
            },
            fontFamily: {
                sans: ['Space Grotesk', 'sans-serif'],
            },
            borderRadius: {
                'custom': '1rem',
            }
        }
    }
}
