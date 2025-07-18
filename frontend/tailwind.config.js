/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html",         // file HTML nằm trong thư mục frontend
    "./*.php",
    "./**/*.php",       // toàn bộ file PHP trong các thư mục con
    "./js/**/*.js",     // nếu có file JS nằm trong thư mục js/
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Be Vietnam Pro'],
        roboto: ['Be Vietnam Pro'],
        mono: ['Be Vietnam Pro']
      },
    },
  },
  plugins: [],
}