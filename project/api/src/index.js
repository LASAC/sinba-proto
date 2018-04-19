import app from './app'
import config from './config'

app.server.listen(process.env.PORT || config.port, () => {
  process.stdout.write(`Started on port ${app.server.address().port}\n`)
})

export default app
