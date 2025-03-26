/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      fontFamily: {
        'serif': ['PT Serif'],
      },
      extend: {
        fontFamily: {
          'pt-serif': ['PT Serif', 'serif'],
        },
      },
    },
    plugins: [],
  }