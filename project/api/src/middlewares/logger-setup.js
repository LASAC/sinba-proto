export default ({ app, config, logger }) => {
  const attachLoggerToReq = (req, logger) => {
    const { sessionData } = req
    const loggerToAttach = {}

    // append session id to log message
    for (const fn in logger) {
      if (typeof logger[fn] === 'function') {
        loggerToAttach[fn] = (...args) => logger[fn](...args, `[session: ${sessionData.getId()}]`)
      }
    }

    req.logger = loggerToAttach
  }

  app.use((req, res, next) => {
    logger.debug('[logger-setup middleware]')
    attachLoggerToReq(req, logger, config.loggerMethods)
    next()
  })
}
