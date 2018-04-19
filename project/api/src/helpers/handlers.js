import { isDev } from './dev'
import logger from '../services/logger'

export const handleError = (err, status = 400) => {
  const detailedError = parseError(err, status)
  const { code, message } = detailedError
  logger.debug('handleError > detailedError:', detailedError)
  return {
    status,
    body: {
      error: isDev() ? detailedError : { code, message }
    }
  }
}

export const handleSuccess = (body, req) => {
  const { sessionData } = req
  logger.debug('[handler helper] handleSuccess > body:', body)
  const { user } = body

  // first, update user in the session
  if (user) {
    sessionData.set('user', user)
  }

  // then return the response data
  return { status: 200, body }
}

export const parseError = (err, status) => {
  // TODO
  logger.debug('parseError (TODOO) > err:', err)
  logger.debug('parseError (TODOO) > status:', status)
  return Object.assign({}, err, { code: status })
}
