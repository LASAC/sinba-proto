import config from '../config'

//
// Basic implementation of a logger: to be replaced by a logger/reporter tool
//
export const createLogger = (debugMode = false) => ({
  info: (...args) => console.info('\n\n\n\n\n\nINFO:', ...args, '\n\n'), // eslint-disable-line no-console
  warn: (...args) => console.warn('\n\n\n\n\n\nWARN:', ...args, '\n\n'), // eslint-disable-line no-console
  error: (...args) => console.error('\n\n\n\n\n\nERROR:', ...args, '\n\n'), // eslint-disable-line no-console
  debug: (...args) => (debugMode ? console.log('\n\n\n\n\n\nDEBUG:', ...args, '\n\n') : undefined) // eslint-disable-line no-console
})

export default createLogger(config.debug)
