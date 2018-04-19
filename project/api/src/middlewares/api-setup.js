import api from '../api'

export default ({ app, config, logger }) => {
  // api router
  app.use('/api', api({ config, logger }))
}
