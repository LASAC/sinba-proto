import crypto from 'crypto'
import session from 'express-session'
import createMemoryStore from 'memorystore'
import { isDev } from '../../helpers'
import sessionData from './session-data'
import logger from '../../services/logger'
import config from '../../config'

export default ({ app }) => {
  return sessionSetup()

  function sessionSetup() {
    logger.debug('setting up Memory Session...')
    const store = getSessionStore(logger)

    app.use(getSession(store))
    app.use(sessionData)

    if (isDev()) {
      logger.debug('exposing session...')
      app.use((req, res, next) => exposeSession(req, next, store, logger))
    }
  }

  function getSession(store) {
    const salt = getSecretSalt()

    return session({
      name: config.sessionCookieName,
      secret: config.url + salt,
      resave: false,
      saveUninitialized: true,
      cookie: {
        secure: !isDev(),
        domain: config.url,
        httpOnly: true,
        sameSite: true
        // maxAge
      },
      store
    })
  }

  function getSessionStore() {
    const MemoryStore = createMemoryStore(session)
    return new MemoryStore({
      checkPeriod: 86400000 // prune expired entries every 24h
    })
  }

  function getSecretSalt() {
    const buf = crypto.randomBytes(256)
    return buf.toString('hex')
  }

  /**
   * Exposes the session by injecting the following objects to the request for debugging purposes:
   * sessionStore: session store object
   * sessions: all sessions currently in tfrom the store
   *
   * @param {*} req request object
   * @param {*} next next middleware in the chain
   * @param {*} store session store object
   * @param {*} logger logger object
   */
  function exposeSession(req, next, store, logger) {
    logger.debug('exposeSession middleware...')
    req.sessionStore = store
    req.sessionStore.all((err, sessions) => {
      if (err) {
        // just log and try to keep going...
        logger.debug('---> error retrieving sessions:', err)
      } else {
        // expose all the sessions
        req.sessions = sessions
      }
      return next()
    })
  }
}
