import theme from '../../theme'
export default {
  register: {
    fontFamily: theme.mainFontFamily
  },
  appBar: {
    backgroundColor: 'transparent',
    boxShadow: 'unset',
    '-webkit-box-shadow': 'unset'
  },
  main: {
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    width: '80%'
  }
}
