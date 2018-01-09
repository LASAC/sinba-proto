import React from 'react'
import strings from '../../localization'
import { AppBar } from 'react-toolbox/lib/app_bar'
import styles from './theme.scss'

class Register extends React.Component {
  render () {
    return (
      <div className={styles.register}>
        <AppBar className={styles.appBar} />
        <header>
          <h1>{strings.registerTitle}</h1>
        </header>
        <main>
          <form>
            <input name='name' id='name' />
            <input name='lastName' id='lastName' />
          </form>
        </main>
      </div>
    )
  }
}
  

export default Register