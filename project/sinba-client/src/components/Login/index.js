import React from 'react'
import { Button } from 'react-toolbox/lib/button'
import CheckBox from 'react-toolbox/lib/checkbox'
import Input from 'react-toolbox/lib/input'
import Link from 'react-toolbox/lib/link'
import strings from '../../localization'
import theme from './theme.scss'

class Login extends React.Component {
  constructor(props) {
    super(props)
    this.usernameInput = null
    this.passwordInput = null
    this.state = {
      username: '',
      password: '',
      remember: false
    }

    this.changePassword = this.changePassword.bind(this)
    this.toggleRemember = this.toggleRemember.bind(this)
  }
  render() {
    const { username, password, remember } = this.state
    return (
      <div className={theme.login}>
        <fieldset>
          <Input
            ref={(ref) => this.usernameInput = ref}
            name='username'
            type='email'
            label='E-mail'
            value={username}
            onChange={(username) => this.setState({ username })}
            theme={theme}
          />
          <Input
            ref={(ref) => this.passwordInput = ref}
            name='password'
            type='password'
            label={strings.password}
            value={password} onChange={this._changePassword}
            theme={theme}
          />

          <CheckBox
            checked={remember}
            className={theme.checkbox}
            label={strings.stayConnected}
            onChange={this.toggleRemember}
            theme={theme}
          />
          <div className={theme.actions}>
            <Button label='Entrar' primary raised theme={theme} />
            <Link href='#' label={strings.forgotYourPassword} theme={theme} />
          </div>
        </fieldset>
      </div>
    )
  }

  changePassword(password) {
    console.log('current password: ', this.state.password, ' - new password:', password)
    this.setState({ password })
  }

  toggleRemember() {
    this.setState({ remember: !this.state.remember })
  }
}

export default Login