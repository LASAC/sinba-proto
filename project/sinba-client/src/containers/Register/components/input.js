import React from 'react'
import { Input as RTInput } from 'react-toolbox/lib/input'
import inputTheme from './input.css'
import textareaTheme from './textarea.css'

const Input = (props) => <RTInput theme={props.multiline ? textareaTheme : inputTheme} {...props} />

export default Input
