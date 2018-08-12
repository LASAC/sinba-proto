/**
 * Server should not be in index.js for testing purposes
 */
// import 'babel-core/register'
// import 'babel-polyfill'
import http from 'http'
import express from 'express'
import applyMiddlewares from './middlewares'
import logger from './services/logger'
import config from './config'
import db from './database'

db.connect()

const app = express()
app.server = http.createServer(app)

applyMiddlewares({ app, config, logger })

logger.debug('process.env.NODE_ENV:', process.env.NODE_ENV || 'development')

export default app
