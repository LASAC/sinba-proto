import { UPDATE_API_STATUS } from './action-types'
import { Status } from './reducer'
import log from '../../services/logger'
export const getPing = (dispatch) => {
  return async (dispatch, getState, api) => {
    const { apiStatus } = getState()
    if (apiStatus.getPing !== Status.IN_PROGRESS) {
      log('pinging the server...')
      dispatch({ type: UPDATE_API_STATUS, payload: { getPing: Status.IN_PROGRESS } })

      const { data, ok, problem } = await api.get('ping')
      if (ok) {
        log('Result:', data)
        dispatch({ type: UPDATE_API_STATUS, payload: { getPing: Status.SUCCESS } })
      } else {
        log('NOK! - PROBLEM:', problem)
        dispatch({ type: UPDATE_API_STATUS, payload: { getPing: Status.ERROR } })
      }
    }
  }
}

export const getVersion = (dispatch) => {
  return async (dispatch, getState, api) => {
    const { apiStatus } = getState()
    if (apiStatus.getVersion === Status.READY) {
      dispatch({ type: UPDATE_API_STATUS, payload: { getVersion: Status.IN_PROGRESS } })

      const { data, ok, problem } = await api.get('version')
      if (ok) {
        const { version } = data
        dispatch({ type: UPDATE_API_STATUS, payload: { getVersion: Status.SUCCESS, serverVersion: version } })
      } else {
        log('Problem:', problem)
        dispatch({ type: UPDATE_API_STATUS, payload: { getVersion: Status.ERROR } })
      }
    }
  }
}

export const submitRegister = (registerData) => {
  log('TODO: submitRegister action')
}
