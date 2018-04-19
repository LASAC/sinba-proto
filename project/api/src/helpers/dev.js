/**
 * NOTICE (1): These functions are used on `config/index.js`
 * So this file should not import configs.
 * NOTICE (2): These functions are used on files that don't
 * support ES6 syntax (e.g., swagger documentation lib)
 */
const isDev = () => !process.env.NODE_ENV || process.env.NODE_ENV === 'development'

const isTest = () => process.env.NODE_ENV === 'test'

const isFrontEndDev = (config, req) => config.dev && req.get('origin') === config.dev.frontEndOrigin

module.exports = { isDev, isFrontEndDev, isTest }
