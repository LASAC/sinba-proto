import React, { Fragment } from 'react'
import { BrowserRouter as Router, Route } from 'react-router-dom'
import { Provider } from 'react-redux'
import store from './store'
import strings from './localization'
import { Landing, Register } from './containers'

strings.setLanguage('en')

const App = () => (
  <Provider store={store}>
    <Router>
      <Fragment>
        <Route exact path="/" component={Landing} />
        <Route exact path="/register" component={Register} />
      </Fragment>
    </Router>
  </Provider>
)

export default App
