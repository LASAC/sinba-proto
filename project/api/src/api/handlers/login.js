import { handleError, handleSuccess } from '../../helpers/handlers'
import authenticateUser from '../services/authenticator-service'

export default ({ req }) => {
  const { logger } = req

  const handleRequest = async () => {
    try {
      logger.debug('login')
      validateRequest(req)
      const user = await authenticateUser(req.body, logger)
      return handleSuccess({ body: { user }, req })
    } catch (err) {
      return handleError({ err, req })
    }
  }

  return handleRequest()
}

export const validateRequest = (req) => {
  if (req.body && req.body.password && req.body.username) {
    // all good.
    return
  }

  throw new MissingArgumentsError('Provide a username and a password')
}

class MissingArgumentsError extends Error {
  constructor(...args) {
    super(...args)
    this.code = 'login/MissingArgumentsError'
    Error.captureStackTrace(this, MissingArgumentsError)
  }
}
