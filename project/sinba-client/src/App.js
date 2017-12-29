import React, { Component } from 'react'

// import Register from './pages/Register'
import Landing from './pages/Landing'

import strings from './localization'

strings.setLanguage('pt')

class App extends Component {
  render() {
    return (
      // <Register />
      <Landing />
    )
  }
}

export default App
