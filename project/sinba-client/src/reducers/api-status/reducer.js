import { CLEAR_API_STATUS, UPDATE_API_STATUS } from './action-types'
import log from '../../services/logger'

export default (state = secureApiStatus(), action) => {
  switch (action.type) {
    case CLEAR_API_STATUS:
      return secureApiStatus()
    case UPDATE_API_STATUS:
      return updateApiStatus(state, action.payload)
    default:
      return state
  }
}

export const Status = {
  READY: 'READY',
  IN_PROGRESS: 'IN_PROGRESS',
  SUCCESS: 'SUCCESS',
  ERROR: 'SUCCESS'
}

/**
 * Updates any property of the Auth Object
 * @param {*} state Auth Object (see secureAuth)
 * @param {*} payload Any subset of the Auth Object to be updated
 */
function updateApiStatus(state, payload) {
  log('updateApiStatus(payload):', payload)
  return secureApiStatus({
    ...state,
    ...payload
  })
}

/**
 * Updates Auth Object and guarantees data consistency for Auth Object,
 * by falling back wrong or missing property to it's defaults
 * @param {*} data Data to be added on Auth Object
 */
export function secureApiStatus(data = {}) {
  return {
    clientVersion: data.clientVersion || null,
    serverVersion: data.serverVersion || null,
    getPing: data.getPing || Status.READY,
    getVersion: data.getVersion || Status.READY
  }
}
