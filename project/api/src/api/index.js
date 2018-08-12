import { Router } from 'express'
import version from './handlers/version'
import login from './handlers/login'
import logout from './handlers/logout'
import register from './handlers/register'
import { authentication } from './middlewares'
import userService from './services/user'

export default ({ config }) => {
  const jsonHandler = (handler) => async (req, res) => {
    const { body, status } = await handler({ config, req })
    res.status(status).json(body)
  }

  const api = Router()

  api.get('/version', jsonHandler(version))

  api.post('/login', jsonHandler(login))

  api.post('/register', jsonHandler(register))

  //
  // Authenticated Routes
  //
  api.use(authentication())

  api.post('/logout', jsonHandler(logout))

  userService().register(api, '/users')

  return api
}
