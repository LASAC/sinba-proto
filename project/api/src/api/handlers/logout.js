import { handleSuccess } from '../../helpers/handlers'
import { isFrontEndDev } from '../../helpers/dev'

export default ({ config, req }) => {
  const { sessionData, logger } = req
  logger.debug('[logout] > signing out...')
  sessionData.clear('user')
  logger.debug('[logout] > session:', sessionData.get())

  // delete all sessions if it's front-end dev
  if (isFrontEndDev(config, req)) {
    logger.debug('[logout] > FRONT-END-DEV detected - Clearing all sessions...')
    req.sessionStore.clear()
  }

  return handleSuccess({ body: 'successfully logged out', req })
}
