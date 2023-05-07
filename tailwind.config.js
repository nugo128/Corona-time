/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      width: {
        '200': '58rem',
        '150': '36rem'
      },
      height:{
        'screenx': '60vh'
      },
      fontSize:{
        '2xs': '0.4rem'
      }
    },
  },
  plugins: [],
}

