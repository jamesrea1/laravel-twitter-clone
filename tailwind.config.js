const colors = require('tailwindcss/colors')

module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      sm: '500px',
      sm2: '620px',
      md: '1030px',
      md2: '1100px',
      lg: '1287px',
      '2xl': '1536px',
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',

      twitter: '#1DA1F2',
      twdarkblue: '#1A91DA',
      twlightblue: '#E8F5FE',  
      twlightblue100: '#DAE8F2',  
      twrose: '#e0245e',
      twinput: '#EBEEF0',
      twgray150: '#EFF1F2',
      twdanger: '#ca2055',
      
      // twitter: '#E72F82',

      
      black: colors.black,
      white: colors.white,
      gray: colors.coolGray,
      bluegray: colors.blueGray,
      red: colors.red,
      yellow: colors.amber,
      green: colors.emerald,
      blue: colors.blue,
      lightblue: colors.lightBlue
    },
    extend: {
      width : {
        12.5: '3.125rem',
        22: '5.5rem',
        68 : '17.1875rem'
      },
      spacing: {
        '1/2': '50%',
        '1/3': '33.333333%',
        '2/3': '66.666667%',
        '1/4': '25%',
        '2/4': '50%',
        '3/4': '75%',
        '1/5': '20%',
        '2/5': '40%',
        '3/5': '60%',
        '4/5': '80%',
        '1/6': '16.666667%',
        '2/6': '33.333333%',
        '3/6': '50%',
        '4/6': '66.666667%',
        '5/6': '83.333333%'  
      },
      fontSize: {
        base: ['0.9375rem', { lineHeight: '1.25rem' }]
      }
    },
  },
  variants: {
    extend: {
      brightness: ['hover']

      // ringColor: ['group-focus'],
      // ringOpacity: ['group-focus'],
      // ringWidth: ['group-focus']
    },
  },
  plugins: [],
}
