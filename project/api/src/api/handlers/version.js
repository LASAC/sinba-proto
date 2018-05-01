import { version } from '../../../package.json'
import config from '../../config'
import { handleSuccess } from '../../helpers/handlers'

export default ({ req }) => {
  const body = {
    version,
    env: process.env.NODE_ENV || 'development',
    ...testSession({ req })
  }

  return handleSuccess({ body, req })
}

// manipulates session data for testing purposes
const testSession = ({ req }) => {
  const { logger } = req
  if (config.debug) {
    const { sessionData } = req
    let { hits, user } = sessionData.get()
    logger.info('testSession > req.session.data:', req.session.data)
    logger.info('testSession > sessionData.get():', sessionData.get())
    if (!hits) {
      hits = 0
    }
    hits++
    sessionData.set('hits', hits)
    return {
      hits,
      user,
      config
    }
  }
  return {}
}
