import React, { Fragment } from 'react'
import { BrowserRouter as Router, Route } from 'react-router-dom'
import { Provider } from 'react-redux'
import getRoutes from './routes'
import store from './store'

import { strings } from './services'

strings.setLanguage('pt')

const App = () => {
  const routes = getRoutes()
  return (
    <Provider store={store}>
      <Router>
        <Fragment>
          {Object.keys(routes).map((path, index) => (
            <Route
              key={index}
              exact
              path={path}
              component={routes[path].component}
            />
          ))}
        </Fragment>
      </Router>
    </Provider>
  )
}

export default App
