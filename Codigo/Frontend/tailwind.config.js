/** @type {import('tailwindcss').Config} */
module.exports = {

  content: [
    "./src/**/*.{html,ts}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    colors: {
      'light': '#E4EBF2',
      'main-blue': '#3E6E8C',
      'main-ligh-blue': '#3BBCD9',
      'main-cyan': '#36D9D9',
      'main-brown': '#BFA29B',
    },
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
