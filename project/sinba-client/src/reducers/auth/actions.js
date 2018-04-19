import { Status } from '../api-status/reducer'
import { UPDATE_API_STATUS } from '../api-status/action-types'
import log from '../../services/logger'
import { UPDATE_AUTH } from './action-types'

export const login = (credentials) => {
  return async (dispatch, getState, api) => {
    const { apiStatus } = getState()

    if (apiStatus.postLogin !== Status.IN_PROGRESS) {
      dispatch({
        type: UPDATE_API_STATUS,
        payload: { postLogin: Status.IN_PROGRESS }
      })

      const response = await api.post('login', credentials)
      const { data, ok, problem } = response
      if (ok) {
        log('Login Success:', data)
        const { user } = data
        dispatch({
          type: UPDATE_AUTH,
          payload: { user, authenticated: true }
        })
        dispatch({
          type: UPDATE_API_STATUS,
          payload: { postLogin: Status.SUCCESS }
        })
      } else {
        log('Login Problem:', problem)
        log('Login Error:', data)
        dispatch({
          type: UPDATE_AUTH
        })
        dispatch({
          type: UPDATE_API_STATUS,
          payload: { postLogin: Status.ERROR }
        })
      }
    }
  }
}
