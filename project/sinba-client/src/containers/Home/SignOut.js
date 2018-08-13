import React from 'react'
import { Button } from '../../components/Button'
import theme from './SignOut.scss'

const SignOut = (props) => (
  <div className={theme.container}>
    <fieldset>
      <h2>Tem certeza?</h2>
      <div className={theme.actions}>
        <Button label={'Sim'} primary onClick={props.onConfirm} />
        <Button label={'Não'} danger onClick={props.onCancel} />
      </div>
    </fieldset>
  </div>
)

export default SignOut
