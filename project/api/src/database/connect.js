import mongoose from 'mongoose'
import config from '../config'
import logger from '../services/logger'

logger.debug('[DB] Setting up...')

mongoose.Promise = Promise
mongoose.Error.messages.general.required = "O campo '{PATH}' é obrigatório"

export default () =>
  mongoose
    .connect(config.databaseUri, { useMongoClient: true })
    .then((result) => {
      const { host, port, name } = result
      logger.info(`[DB] Connection Successful! ${host}:${port}/${name}`)
    })
    .catch(logger.err)
