/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}"
  ],
  theme: {
    extend: {
      colors: {
        'header': "#222831",
        'main': "#DFEFF9",
        'title': "#31363F",
        'buttons': "#EEEEEE"
      },
      fontFamily: {
        'popins': 'Poppins, sans-serif'
      }
    }
  },
  plugins: [],
}

