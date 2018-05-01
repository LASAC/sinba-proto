import { handleError } from '../../helpers/handlers'

export default () => (req, res, next) => {
  try {
    const { logger, sessionData } = req
    const user = sessionData.get('user')

    if (!user) {
      throw new UnauthorizedError(NOT_LOGGED_IN)
    }

    logger.debug(
      '[authentication middleware]',
      user ? `\n - user: ${user.firstName} ${user.lastName} - ${user.email}` : `\nuser: ${user}`,
      '\n - Cookies:',
      req.cookies
    )

    return next()
  } catch (err) {
    const { body, status } = handleError({
      req,
      err,
      status: 401
    })
    res.status(status).json(body)
    return
  }
}

const NOT_LOGGED_IN = 'Not logged in'

// UnauthorizedError
class UnauthorizedError extends Error {
  constructor(...args) {
    super(...args)
    this.code = 'authenticator/UnauthorizedError'
    Error.captureStackTrace(this, UnauthorizedError)
  }
}
