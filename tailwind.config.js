/** @type {import('tailwindcss').Config} */

module.exports = {
    darkMode: 'class',
  content: [
    "./resources/**/*.{blade.php, vue, js}",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
    './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php',
    './vendor/wire-elements/modal/resources/views/*.blade.php',
    './storage/framework/views/*.php',
],
  theme: {
    extend: {
        colors : {
            primary : '#d94a11',
            secondary : '#ffa500',
            hovered : '#ffc266',
            containerColor : '#f9f9f9',
            success : '#65a30d',
            error : '#0f172a',
            hovered_error: '#dc2626',
        },
        fontFamily : {
            robotoThin : 'Roboto, sans-serif',
            robotoBold : "url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap')",
        },
    },
  },
  plugins: [],
}
