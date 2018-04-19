import bodyParser from 'body-parser'
import cookieParser from 'cookie-parser'
import cors from 'cors'
import morgan from 'morgan'
import config from '../config'

const setupLibs = ({ app }) => {
  app.use(morgan(config.logFormat))

  app.use(
    cors({
      exposedHeaders: config.corsHeaders
    })
  )

  app.use(
    bodyParser.json({
      limit: config.bodyLimit
    })
  )

  app.use(cookieParser())
}

export default setupLibs
