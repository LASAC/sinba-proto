import createSessionDataHelper, { createSingleSessionDataHelper } from './helpers'
import { isFrontEndDev } from '../../helpers'

/**
 * Session Data Middleware
 *
 * This middleware makes sure that the data object is initialized on every request.
 * After this middleware runs, we can safely work with `req.session.data`.
 * Additionally, it attaches to the request a SessionHelper object to make session
 * access easier, and to allow customizations like single session on front-end dev mode.
 *
 * It also checks if front-end dev env is detected (run by client's `npm start`),
 * based on the origin header. If that is the case, it uses a singleton to store
 * the session data instead of using the real session.
 *
 * Notice (1): this is implemented to make front-end react development environment work,
 * origin attribute is set up on config/config.development.json (e.g. localhost:3000)
 *
 * Notice (2): this restricts the session usage to single session only.
 * - If you're developing front-end feature that requires log in with multiple users, or the
 * of the session in general, use back-end built version, i.e., through url from
 * config/config.local.json (e.g. localhost:8080).
 * - If you're developing back-end feature, you should also use the back-end built version.
 *
 * @param {object} logger (see: src/services/logger)
 * @param {object} config (see: src/config)
 * @throws Error if `req.session` is not present. This would happen if this middleware is
 * used before the session middleware in the app's middleware chain.
 */
export default (logger, config) => (req, res, next) => {
  logger.debug('[session-data middleware]')
  if (!req.session) {
    throw Error('Session is not attached to the request object! Make sure session-setup middleware is run')
  }

  if (!req.session.data) {
    req.session.data = {}
  }

  if (isFrontEndDev(config, req)) {
    req.sessionData = createSingleSessionDataHelper(logger)
  } else {
    req.sessionData = createSessionDataHelper(req.session, logger)
  }

  return next()
}
