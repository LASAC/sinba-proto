import fileSessionSetup from './file-store'
import memorySessionSetup from './memory-store'
import { isTest } from '../../helpers'

export default ({ app, config, logger }) => {
  // Use file session on non-local environments.
  if (config.sessionType === 'memory' || isTest()) {
    // 1) Test Environment (jest):
    // Running tests in watch mode will look for
    // changes on the folders, and because we're
    // creating files for session, it will cause
    // the tests to never stop re-running.
    // 2) Development
    // Due to the fact that front-end dev env is
    // not able to send the cookies with the req
    // we have a session exposure procedure that
    // is already for single user sessions based
    // on memory store.
    // NOTICE: if you need to test the behaviour
    // of file session use the config.local.json
    // file and add {sessionType: 'file'} to it.
    // Remember that ReactApp Dev Env won't work
    return memorySessionSetup({ app, config, logger })
  }
  return fileSessionSetup({ app, config, logger })
}
