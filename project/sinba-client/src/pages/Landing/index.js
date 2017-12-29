import React from 'react'
import strings from '../../localization'
import theme from './theme.css'

export default () =>
  <article className={theme.landing}>
    <nav className={theme.topNav}>
      <a href='/login'>{strings.signIn}</a>
      <a href='/register'>{strings.register}</a>
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
  </article>