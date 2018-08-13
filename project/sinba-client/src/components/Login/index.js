import React from 'react'
import { connect } from 'react-redux'
import { Redirect } from 'react-router-dom'
import { bindActionCreators } from 'redux'
import { login } from '../../reducers/auth/actions'
import { Button } from '../Button'
import Checkbox from '../Checkbox'
import Input from 'react-toolbox/lib/input'
import Link from 'react-toolbox/lib/link'
import strings from '../../services/localization'
import theme from './theme.scss'

class Login extends React.Component {
  state = {
    username: '',
    password: '',
    remember: false
  }
  usernameInput = null
  passwordInput = null

  render() {
    const { authenticated } = this.props
    const { username, password, remember } = this.state

    if (authenticated) {
      return <Redirect to="/home" />
    }

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
            <Button primary label={strings.signIn} onClick={this.onSubmit} />
            <Link href="#" label={strings.forgotYourPassword} theme={theme} />
          </div>
        </fieldset>
      </div>
    )
  }

  changePassword = (password) => {
    this.setState({ password })
  }

  onSubmit = () => {
    this.props.login(this.state)
  }

  toggleRemember = () => {
    this.setState({ remember: !this.state.remember })
  }
}

const mapStateToProps = (state) => {
  const { authenticated } = state.auth
  const { clientVersion, serverVersion } = state.apiStatus
  return { clientVersion, serverVersion, authenticated }
}
const mapDispatchToProps = (dispatch) => bindActionCreators({ login }, dispatch)

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Login)
