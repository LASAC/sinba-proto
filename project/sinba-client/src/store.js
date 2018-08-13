import { applyMiddleware, createStore } from 'redux'
import thunk from 'redux-thunk'
import rootReducer from './reducers'
import api from './api'

const middlewares = [thunk.withExtraArgument(api)]

if (process.env.REACT_APP_DEBUG === 'true') {
  const { logger } = require('redux-logger')
  middlewares.push(logger)
}

export default createStore(
  rootReducer,
  window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__(),
  applyMiddleware(...middlewares)
)
