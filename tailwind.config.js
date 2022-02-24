module.exports = {
  content: [
    './resources/js/*.{js,jsx,ts,tsx}',
    './resources/js/**/*.{js,jsx,ts,tsx}',
  ],
  theme: {
    extend: {
      colors: {
        'header': '#41414C',
        'custom-gray': '#BFBFCC',
        'custom-orange': '#F1972C'
      }
    },
    fontFamily: {
      roboto: ['Roboto'],
    },
  },
  plugins: [],
};
