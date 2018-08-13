import React from 'react'
// import { Link } from 'react-router-dom'
// import { connect } from 'react-redux'
// import { bindActionCreators } from 'redux'
// import { Button } from 'react-toolbox/lib/button'
import Dialog from 'react-toolbox/lib/dialog'
import strings from '../../services/localization'
import theme from './theme.scss'

import AppBar from '../../components/AppBar'
import SignOut from './SignOut'

class Home extends React.Component {
  state = {
    signOutDialogActive: false
  }

  render() {
    const signOutButton = {
      to: '/home',
      label: strings.signOut,
      onClick: this.toggleSignOut
    }
    return (
      <article className={theme.landing}>
        <AppBar leftButtons={[signOutButton]} hide={['/', '/register', '/home']} />
        <header>
          <h1>{strings.home}</h1>
        </header>
        <main className={theme.main}>
          {/* <nav>
            <a href="https://github.com/LASAC/SINBA/wiki">{strings.documentation}</a>
            <a href="http://lasac.ledes.net">LASAC</a>
            <a href="http://www.ledes.net">LEDES</a>
            <a href="https://ufms.br">UFMS</a>
          </nav> */}
        </main>
        <div className={theme.footer}>SINBA {/* this.getVersionNote() */}</div>
        {this.renderDialog()}
      </article>
    )
  }

  renderDialog = () => {
    const { signOutDialogActive } = this.state
    return (
      <Dialog
        actions={this.actions}
        active={signOutDialogActive}
        className={theme.loginDialog}
        onEscKeyDown={this.toggleSignOut}
        onOverlayClick={this.toggleSignOut}
      >
        <SignOut onConfirm={() => alert('TODO: Sign Out!')} onCancel={this.toggleSignOut} />
      </Dialog>
    )
  }

  toggleSignOut = () => {
    const { signOutDialogActive } = this.state
    this.setState({ signOutDialogActive: !signOutDialogActive })
  }
}

export default Home
