import React, { Fragment } from 'react'
import { BrowserRouter as Router, Route } from 'react-router-dom'
import strings from './localization'
import {
  Landing,
  Login,
  Register
} from './pages'

strings.setLanguage('pt')

const App = () => (
  <Router>
    <Fragment>
      <Route exact path='/' component={Landing} />
      <Route exact path='/register' component={Register} />
    </Fragment>
  </Router>
)

export default App
