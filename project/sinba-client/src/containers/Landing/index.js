import React from 'react'
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux'
import { Button } from 'react-toolbox/lib/button'
import { getVersion } from '../../reducers/api-status/actions'
import Dialog from 'react-toolbox/lib/dialog'
import Login from '../../components/Login'
import strings from '../../localization'
import theme from './theme.scss'

class Landing extends React.Component {
  constructor(props) {
    super(props)

    this.state = {
      loginDialogActive: false
    }

    this.renderDialog = this.renderDialog.bind(this)
    this.toggleLogin = this.toggleLogin.bind(this)
  }

  render() {
    return (
      <article className={theme.landing}>
        <nav className={theme.topNav}>
          <Button className={theme.link} label={strings.signIn} onClick={this.toggleLogin} />
          <Button className={theme.link} label={strings.register} href="/register" />
        </nav>
        <header>
          <h1>SINBA</h1>
        </header>
        <main>
          <nav>
            <a href="https://github.com/LASAC/SINBA/wiki">{strings.documentation}</a>
            <a href="http://lasac.ledes.net">LASAC</a>
            <a href="http://www.ledes.net">LEDES</a>
            <a href="https://ufms.br">UFMS</a>
          </nav>
        </main>
        <div className={theme.footer}>{this.getVersionNote()}</div>
        {this.renderDialog()}
      </article>
    )
  }

  toggleLogin = () => {
    const { loginDialogActive } = this.state
    this.setState({ loginDialogActive: !loginDialogActive })
  }

  renderDialog = () => {
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

  getVersionNote = () => {
    const { clientVersion, serverVersion } = this.props
    if (!serverVersion) {
      this.props.getVersion()
      return ''
    }

    return `server: ${serverVersion} | client: ${clientVersion}`
  }
}

const mapStateToProps = (state) => {
  const { clientVersion, serverVersion } = state.apiStatus
  return { clientVersion, serverVersion }
}
const mapDispatchToProps = (dispatch) => bindActionCreators({ getVersion }, dispatch)
export default connect(mapStateToProps, mapDispatchToProps)(Landing)
