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
    this.id = session.id
  }

  getId = () => this.id

  get = (key = null) => {
    if (!key) {
      return this.session.data
    }
    return this.session.data[key]
  }

  set = (key, value) => {
    this.session.data[key] = value
  }

  delete = (key) => {
    delete this.session.data[key]
  }

  clear = () => {
    this.session.data = {}
  }
}

/**
 * @param {req.session} session
 */
const createSessionDataHelper = (session) => new SessionDataHelper(session)

let data = {}

export default createSessionDataHelper
export const createSingleSessionDataHelper = () => createSessionDataHelper({ data, id: 1 })
