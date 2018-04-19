import logger from '../../services/logger'

class SessionDataHelper {
  constructor(session) {
    if (!session) {
      throw Error('Session is required!')
    }

    if (!session.data) {
      throw Error(
        'No data object in the session! Make sure to call sesion-data middleware after session-setup middleware'
      )
    }

    this.session = session
    logger.debug('SessionDataHelper > constructor > this.session:', this.session)
  }

  get = (key = null) => {
    logger.debug(`SessionDataHelper > get(key: ${key}) - this.session.data:`, this.session.data)
    if (!key) {
      return this.session.data
    }
    return this.session.data[key]
  }

  set = (key, value) => {
    this.session.data[key] = value
    logger.debug(`SessionDataHelper > set(key: ${key}, value: ${value}) - this.session.data:`, this.session.data)
  }

  delete = (key) => {
    delete this.session.data[key]
    logger.debug(`SessionDataHelper > delete(key: ${key}) - this.session.data:`, this.session.data)
  }

  clear = () => {
    this.session.data = {}
    logger.debug('SessionDataHelper > clear() - this.session.data:', this.session.data)
  }
}

/**
 * @param {req.session} session
 */
const createSessionDataHelper = (session) => new SessionDataHelper(session)

let data = {}

export default createSessionDataHelper
export const createSingleSessionDataHelper = () => createSessionDataHelper({ data })
