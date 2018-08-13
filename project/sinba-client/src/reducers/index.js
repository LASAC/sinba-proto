import { combineReducers } from 'redux'
import apiStatus from './api-status/reducer'
import auth from './auth/reducer'
import log from '../services/logger'

log(process.env)
if (!process.env.REACT_APP_VERSION) {
  throw new Error('REACT_APP_VERSION should be setup!')
}

export default combineReducers({
  apiStatus,
  auth
})
