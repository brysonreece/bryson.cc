module.exports = {
  theme: {
    container: {
      center: true,
    },
    extend: {
      spacing: {
        '3.75': '0.9375rem',
        '12.5': '3.125rem'
      }
    }
  },
  plugins: [
    require('@tailwindcss/ui')
  ],
  purge: false,
  variants: {}
}
