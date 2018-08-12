import { isDev } from './dev'

export const DEFAULT_SUCCESS_STATUS = 200
export const DEFAULT_ERROR_STATUS = 400

//
// Note about the DEFAULT_ERROR_CODE:
//
// Currently, 400 is the default code
// being sent inside the error object
// when no code is passed.
//
// Maybe we should change this to
// something more meaningful, such as
// 'UnrecognizedError'. However, client
// implementation needs to be carefully
// inspected before doing such a change.
//
// In one way or another, The concepts
// of code (error code) and status
// (http status code) are different.
//
// That's why we have two different
// constants with the same value here.
//
export const DEFAULT_ERROR_CODE = 'sinba/Unknown'
export const DEFAULT_ERROR_MESSAGE = 'Bad request'

export const handleError = ({ status, err, req }) => {
  status = status || DEFAULT_ERROR_STATUS
  const detailedError = parseError(err)
  const { code, message } = detailedError
  req.logger.debug('[handler helper] > handleError > detailedError:', detailedError)
  return {
    status,
    body: {
      error: isDev() ? detailedError : { code, message }
    }
  }
}

export const handleSuccess = ({ status, body, req }) => {
  status = status || DEFAULT_SUCCESS_STATUS

  const { sessionData, logger } = req
  const { user } = body

  logger.debug('handleSuccess > user:', user)

  // first, update user in the session
  if (user && user._id) {
    sessionData.set('userId', user._id)
  }

  logger.debug('handleSuccess > session data:', sessionData.get())

  // then return the response data
  return { status, body }
}

export const parseError = (err) => {
  const { code, message } = err
  return {
    code,
    message,
    details: err.stack
  }
}
