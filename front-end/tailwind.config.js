module.exports = {
  purge: [
    './src/**/*.html', './src/**/*.vue', './src/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      screens: {
       'xsm':{'min':'0px','max':'259px'}, 
       'ssm':{'min':'260px','max':'319px'},
       'vs': {'min': '320px', 'max': '503px'},
       'sm': {'min': '504px', 'max': '639px'},
       'md': {'min': '640px', 'max': '1023px'},
        'lg': {'min': '1024px', 'max': '1279px'},
        'xl': {'min': '1280px', 'max': '1535px'},
        '2xl': {'min': '1536px'},
      },
      colors:{
        bastille: '#1E1825',
        red:{
          500: '#EF4444',
          700: '#E50F0F',
          danger:'#FF0028',
          buttons:'#CD0F0F',
          search:'#B72525'
        },
        gray:{
          50: '#F9FAFB',
          100: '#F3F4F6',
          400: '#9CA3AF',
          bgcolor:'#EBEBEB',
        },
        orange:{
          100:'#EE6D11',
        },
        green:{
          150:'#708d3a',
        },
        waterloo:'#35397B',
        balticsea: '#1C1720',
        warning:' #FE6B00',
        success: '#708D3A',

      },
        spacing: {
        0.5: '0.2rem',
        1.4: '0.300rem',
        17: '4.3rem',
        22: '5.5rem',
        28.5: '7.5rem',
        355: '8.9rem',
        50: '12.5rem',
        74:'19rem',
        75: '19rem',
        222: '19.5rem',
        224: '20.5rem',
        87: '22rem',
        89: '23rem',
        91: '23.5rem',
        90: '24rem',
        96: '24.9rem',
        96.5: '26rem',
        26.5: '26.5rem',
        96.7: '28rem',
        97: '30rem',
        448: '30.5rem',
        97.2:'31.5rem',
        31.75: '31.75rem',
        97.5: '32.5rem',
        528: '33rem',
        98: '33rem',
        550: '34.375rem',
        538: '35rem',
        99: '35rem',
        608: '38rem',
        100:'40rem',
        500: '500rem',
        //px
        eh: '430px',
        ew: '844px',
        65: '267px',
        
          
      },
      fontFamily: {
        nunito: ['Nunito'],
        raleway: ['Raleway']
      },
      fontSize: {
        md: ['0.910rem', { lineHeight: '1.28rem' }],  
      },
    },
  },
  variants: {
    display: ['responsive', 'group-hover', 'group-focus'],

    extend: {
      padding: ['hover'],
      textDecoration: ['focus-visible'],
      translate: ['motion-reduce'],
      justifySelf: ['hover', 'focus'],
      placeSelf: ['hover', 'focus'],
      alignContent: ['hover', 'focus'],
      scale: ['focus-within'],
      fontSize: ["hover","focus-within","focus"],
      justifyContent: ['responsive'],
      justifyItems: ['responsive'],
      width: ['responsive'],
      float: ['responsive'],
      flex: ['responsive'],

    },
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
  ],
}
