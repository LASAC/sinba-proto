/* eslint-disable */
import React from 'react'
import Input from 'react-toolbox/lib/input'
import { Button } from 'react-toolbox/lib/button'
import strings from '../../localization'
import theme from './theme.css'

class Login extends React.Component {
  constructor() {
    super()
    this.usernameInput = null
    this.passwordInput = null
    this.state = {
      username: '',
      password: ''
    }

    this._changePassword = this._changePassword.bind(this)
  }
  componentDidMount() {
    console.log('username:', this.usernameInput)
    console.log('password:', this.passwordInput)
  }

  render() {
    const { username, password } = this.state
    return (
      <article className={theme.login}>
        <nav className={theme.topNav}>
          <a href='/'>{strings.landingPage}</a>
          <a href='/register'>{strings.register}</a>
        </nav>
        <main>
          <div className={theme.box}>
            <div className={theme.title}>SINBA</div>
            <fieldset>
              <Input
                ref={(ref) => this.usernameInput = ref}
                type='username'
                label='E-mail'
                value={username}
                onChange={(username) => this.setState({ username })}
              />
              <Input
                ref={(ref) => this.passwordInput = ref}
                type='password'
                label='Password'
                value={password} onChange={this._changePassword}
              />
              <Button className={theme.btnPrimary} label='Entrar' raised />
            </fieldset>
          </div>
        </main>
      </article>
    )
  }

  _changePassword(password) {
    console.log('current password: ', this.state.password, ' - new password:', password)
    this.setState({ password })
  }
}

export default Login