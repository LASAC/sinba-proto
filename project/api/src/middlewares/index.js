import setupApi from './api-setup'
import setupLibs from './libs-setup'
import setupSession from './session-setup'
// import setupWeb from './web-setup'
import setupApiDocs from './api-docs-setup'
// import errorHandler from './error-handler'

const applyMiddlewares = ({ app }) => {
  // dependency settings
  setupLibs({ app })

  // server session - TODO: test if it can be the first setup
  setupSession({ app })

  // // api router
  setupApi({ app })

  // swagger router
  setupApiDocs({ app })

  // // front-end router
  // setupWeb({app})

  // // error Handler
  // errorHandler({app})
}

export default applyMiddlewares
