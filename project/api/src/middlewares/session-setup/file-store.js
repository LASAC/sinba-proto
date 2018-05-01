import path from 'path'
import session from 'express-session'
import createFileStore from 'session-file-store'
import { isDev } from '../../helpers'
import sessionData from './session-data'

export default ({ app, config, logger }) => {
  return sessionSetup()

  function sessionSetup() {
    logger.debug('setting up File Session...')
    const store = getSessionStore(logger)

    app.use(getSession(store))
    app.use(sessionData(logger, config))
  }

  function getSession(store) {
    return session({
      name: config.sessionCookieName,
      path: path.resolve(process.cwd(), config.sessionFolder),
      secret: config.url,
      resave: true,
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
    const FileStore = createFileStore(session)
    return new FileStore()
  }
}
