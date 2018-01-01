import React from 'react'
import { Button } from 'react-toolbox/lib/button'
import Dialog from 'react-toolbox/lib/dialog'
import Login from '../../components/Login'
import strings from '../../localization'
import theme from './theme.scss'

export default class extends React.Component {
  constructor(props) {
    super(props)

    this.state = {
      loginDialogActive: true
    }

    this.renderDialog = this.renderDialog.bind(this)
    this.toggleLogin = this.toggleLogin.bind(this)
  }

  render() {
    return (
      <article className={theme.landing}>
        <nav className={theme.topNav}>
          <Button className={theme.link} label={strings.signIn} onClick={this.toggleLogin} />
          <Button className={theme.link} label={strings.register} href='/register' />
        </nav>
        <header>
          <h1>SINBA</h1>
        </header>
        <main>
          <nav>
            <a href='https://github.com/LASAC/SINBA/wiki'>{strings.documentation}</a>
            <a href='http://lasac.ledes.net'>LASAC</a>
            <a href='http://www.ledes.net'>LEDES</a>
            <a href='https://ufms.br'>UFMS</a>
          </nav>
        </main>
        {this.renderDialog()}
      </article>
    )
  }

  toggleLogin() {
    const { loginDialogActive } = this.state
    this.setState({ loginDialogActive: !loginDialogActive })
  }

  renderDialog() {
    const { loginDialogActive } = this.state
    return (
      <Dialog
        actions={this.actions}
        active={loginDialogActive}
        className={theme.loginDialog}
        onEscKeyDown={this.toggleLogin}
        onOverlayClick={this.toggleLogin}
      >
        <Login />
      </Dialog>
    )
  }
}
