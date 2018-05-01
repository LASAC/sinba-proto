import bcrypt from 'bcrypt'
import { handleError } from '../../helpers/handlers'

// will be used on /register
export default ({ config }) => async (req, res, next) => {
  const { logger } = req
  logger.debug('[encprypt-password middleware]')
  if (req.body && req.body.password) {
    try {
      req.body.password = await bcrypt.hash(req.body.password, config.bcryptRounds)
      logger.debug('[encprypt-password middleware] - req.body.password:', req.body.password)
    } catch (err) {
      logger.error('[encprypt-password middleware] - err!')
      const { status, body } = handleError({ err, req })
      res.status(status).json(body)
      return
    }
  }
  return next()
}
