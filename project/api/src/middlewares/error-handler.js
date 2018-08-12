import { handleError } from '../helpers/handlers'
import ErrorCode from '../api/errors/ErrorCode'

const errorHandler = ({ app, logger }) => {
  // Global Error Handler
  app.use((err, req, res, next) => {
    // in case the error happened before logger is attached to the session, use default logger
    // otherwise use the attached one, since session id is a useful information it carries.
    const localLogger = req.logger || logger

    localLogger.debug('[Global Error Handler] Unhandled error has been caught...', err)
    if (req.headersSent) {
      return next(err)
    }

    let statusCode = 500

    if (err instanceof SyntaxError) {
      statusCode = 400
    }

    if (err.code === ErrorCode.UNAUTHORIZED_ERROR) {
      statusCode = 400
    }

    const { status, body } = handleError({ status: statusCode, err, req })
    return res.status(status).send(body)
  })
}

export default errorHandler