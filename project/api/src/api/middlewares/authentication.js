import { handleError } from '../../helpers/handlers'
import User from '../models/user'
import UnauthorizedError from '../errors/UnauthorizedError'

const NOT_LOGGED_IN = 'Not logged in'

export default () => async (req, res, next) => {
  try {
    const { logger, sessionData } = req
    const _id = sessionData.get('userId')
    const user = await User.findOne({ _id }).exec()

    if (!user) {
      throw new UnauthorizedError(NOT_LOGGED_IN)
    }

    req.user = user

    logger.debug(
      '[authentication middleware]',
      req.user ? `\n - req.user: ${req.user.firstName} ${req.user.lastName} - ${req.user.email}` : `\nreq.user: ${req.user}`,
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
