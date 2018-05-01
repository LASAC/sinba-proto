export default ({ app, config, logger }) => {
  const attachLoggerToReq = (req, logger) => {
    const { sessionData } = req
    const loggerToAttach = {}

    // append session id to log message
    for (const fn in logger) {
      logger.debug('fn:', fn, '\n---> typeof logger[fn]:', typeof logger[fn])
      if (typeof logger[fn] === 'function') {
        logger.debug('... attaching')
        loggerToAttach[fn] = (...args) => logger[fn](...args, `[session: ${sessionData.getId()}]`)
      }
    }

    req.logger = loggerToAttach
    logger.debug('req.logger:', req.logger)
  }

  app.use((req, res, next) => {
    logger.debug('[logger-setup middleware]')
    attachLoggerToReq(req, logger, config.loggerMethods)
    next()
  })
}
