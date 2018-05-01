import { Router } from 'express'
import version from './handlers/version'
import userService from './services/user-service'
import login from './handlers/login'
import { authentication } from './middlewares'
import logout from './handlers/logout'

export default ({ config }) => {
  const jsonHandler = (handler) => async (req, res) => {
    const { body, status } = await handler({ config, req })
    res.status(status).json(body)
  }

  const api = Router()
  // api.use(encryptPassword({ config }))

  /**
   * @swagger
   * /version:
   *   get:
   *     description: Expose API Version and Environment. When **debug** is `true` epxposes session info (see `src/config`).
   *     produces:
   *       - application/json
   *     responses:
   *       200:
   *         description: version, build, and session info
   *       400:
   *         description: Error
   *         schema:
   *            $ref: '#/definitions/ApiError'
   */
  api.get('/version', jsonHandler(version))

  /**
   * @swagger
   * /login:
   *   post:
   *     description: Login to the application
   *     produces:
   *       - application/json
   *     parameters:
   *       - in: "body"
   *         name: "body"
   *         description: "user credential"
   *         required: true
   *         schema:
   *           $ref: "#/definitions/CredentialPayload"
   *     responses:
   *       200:
   *         description: User object with the informatino of the user that was successfully logged in.
   *         schema:
   *            $ref: '#/definitions/User'
   *       400:
   *         description: Error
   *         schema:
   *            $ref: '#/definitions/ApiError'
   */
  api.post('/login', jsonHandler(login))

  //
  // Authenticated Routes
  //

  api.use(authentication())

  /**
   * @swagger
   * /logout:
   *   post:
   *     description: Logout user from the application
   *     produces:
   *       - application/json
   *     responses:
   *       200:
   *         description: successfully logged out
   */
  api.post('/logout', jsonHandler(logout))

  userService().register(api, '/users')

  return api
}
