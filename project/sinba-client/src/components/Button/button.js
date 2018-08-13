import React from 'react'
import { Button as RTButton } from 'react-toolbox/lib/button'
import buttonPrimary from './buttonPrimary.css'
import buttonDanger from './buttonDanger.css'

const getTheme = (props) => {
  if (props.primary) {
    return buttonPrimary
  }

  if (props.danger) {
    return buttonDanger
  }

  // if (props.light) {
  //   return buttonLight
  // }

  return ''
}

const Button = (props) => <RTButton type="submit" theme={getTheme(props)} {...props} />

export default Button
