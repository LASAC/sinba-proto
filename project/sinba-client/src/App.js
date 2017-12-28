import React, { Component } from 'react'
import Register from './pages/Register'
import strings from './localization'

strings.setLanguage('pt')

class App extends Component {
  render() {
    return (
      <Register />
    )
  }
}

export default App
