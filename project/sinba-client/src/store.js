import { applyMiddleware, createStore } from 'redux'
import thunk from 'redux-thunk'
import rootReducer, { initialState } from './reducers'
import api from './api'

const middlewares = [thunk.withExtraArgument(api)]

if (process.env.NODE_ENV === 'development') {
  const { logger } = require('redux-logger')
  middlewares.push(logger)
}

export default createStore(rootReducer, initialState, applyMiddleware(...middlewares))
