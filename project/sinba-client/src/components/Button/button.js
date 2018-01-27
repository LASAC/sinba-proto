import React from 'react'
import { Button as RTButton } from 'react-toolbox/lib/button'
import theme from './button.css'

const Button = (props) => <RTButton type="submit" theme={theme} {...props} />

export default Button
