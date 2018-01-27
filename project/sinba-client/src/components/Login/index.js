import React from 'react'
import { Button } from '../Button'
import Checkbox from '../Checkbox'
import Input from 'react-toolbox/lib/input'
import Link from 'react-toolbox/lib/link'
import strings from '../../localization'
import theme from './theme.scss'

class Login extends React.Component {
  constructor (props) {
    super(props)
    this.usernameInput = null
    this.passwordInput = null
    this.state = {
      username: '',
      password: '',
      remember: false
    }
  }
  render () {
    const { username, password, remember } = this.state
    return (
      <div className={theme.login}>
        <fieldset>
          <Input
            ref={(ref) => (this.usernameInput = ref)}
            name="username"
            type="email"
            label="E-mail"
            value={username}
            onChange={(username) => this.setState({ username })}
            theme={theme}
          />
          <Input
            ref={(ref) => (this.passwordInput = ref)}
            name="password"
            type="password"
            label={strings.password}
            value={password}
            onChange={this.changePassword}
            theme={theme}
          />
          <Checkbox checked={remember} label={strings.stayConnected} onChange={this.toggleRemember} />
          <div className={theme.actions}>
            <Button label="Entrar" />
            <Link href="#" label={strings.forgotYourPassword} theme={theme} />
          </div>
        </fieldset>
      </div>
    )
  }

  changePassword = (password) => {
    this.setState({ password })
  }

  toggleRemember = () => {
    this.setState({ remember: !this.state.remember })
  }
}

export default Login
