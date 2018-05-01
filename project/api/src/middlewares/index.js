import setupApi from './api-setup'
import setupLibs from './libs-setup'
import setupSession from './session-setup'
import setupLogger from './logger-setup'
// import setupWeb from './web-setup'
import setupApiDocs from './api-docs-setup'
// import errorHandler from './error-handler'

const applyMiddlewares = ({ app, config, logger }) => {
  // dependency settings
  setupLibs({ app, config, logger })

  // server session
  setupSession({ app, config, logger })

  // attach log to
  setupLogger({ app, config, logger })

  // api router
  setupApi({ app, config, logger })

  // swagger router
  setupApiDocs({ app, config, logger })

  // // front-end router
  // setupWeb({ app, config, logger })

  // // error Handler
  // errorHandler({ app, config, logger })
}

export default applyMiddlewares
