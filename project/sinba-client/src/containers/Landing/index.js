import React from 'react'
// import { Link } from 'react-router-dom'
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux'
// import { Button } from 'react-toolbox/lib/button'
import { getVersion } from '../../reducers/api-status/actions'
import { login } from '../../reducers/auth/actions'
import Dialog from 'react-toolbox/lib/dialog'
import Login from '../../components/Login'
import strings from '../../services/localization'
import theme from './theme.scss'
import AppBar from '../../components/AppBar'

class Landing extends React.Component {
  state = {
    loginDialogActive: false
  }

  render() {
    const signInButton = {
      to: '/',
      label: strings.signIn,
      onClick: this.toggleLogin
    }
    return (
      <article className={theme.landing}>
        <AppBar leftButtons={[signInButton]} hide={['/']} />
        <header>
          <h1>SINBA</h1>
        </header>
        <main className={theme.main}>
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

  toggleLogin = () => {
    const { loginDialogActive } = this.state
    this.setState({ loginDialogActive: !loginDialogActive })
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
const mapDispatchToProps = (dispatch) => bindActionCreators({ getVersion, login }, dispatch)
export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Landing)
