import React from 'react'
import { Checkbox as RTCheckbox } from 'react-toolbox/lib/checkbox'
import theme from './checkbox.css'

const Checkbox = (props) => <RTCheckbox type="submit" theme={theme} {...props} />

export default Checkbox
