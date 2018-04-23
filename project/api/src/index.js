import app from './app'
import config from './config'
import logger from './services/logger'

import './database/seeder/users'

app.server.listen(process.env.PORT || config.port, () => {
  logger.info(`Started on port ${app.server.address().port}`)
})

export default app
