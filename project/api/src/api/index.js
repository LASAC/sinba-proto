import { Router } from 'express'
import version from './handlers/version'
// import {authentication} from './middlewares'

export default () => {
  let api = Router()

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
  api.get('/version', (req, res) => {
    const { body, status } = version({ req })
    res.status(status).json(body)
  })

  return api
}
