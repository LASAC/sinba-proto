/**
 * Server should not be in index.js for testing purposes
 */
// import 'babel-core/register'
// import 'babel-polyfill'
import http from 'http'
import express from 'express'
import applyMiddlewares from './middlewares'
import logger from './services/logger'

const app = express()
app.server = http.createServer(app)

applyMiddlewares({ app })

logger.debug('process.env.NODE_ENV:', process.env.NODE_ENV)

export default app
