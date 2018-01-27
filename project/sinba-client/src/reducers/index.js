import { combineReducers } from 'redux'
import apiStatus, { secureApiStatus } from './api-status/reducer'
import auth, { secureAuth } from './auth/reducer'
import log from '../services/logger'

log(process.env)
if (!process.env.REACT_APP_VERSION) {
  throw new Error('REACT_APP_VERSION should be setup!')
}

export default combineReducers({
  apiStatus,
  auth
})

export const initialState = {
  apiStatus: secureApiStatus({ clientVersion: process.env.REACT_APP_VERSION }),
  auth: secureAuth()
}
