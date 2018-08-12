import ErrorCode from './ErrorCode'

export default class UnauthorizedError extends Error {
  constructor(...args) {
    super(...args)
    this.code = ErrorCode.UNAUTHORIZED_ERROR
    Error.captureStackTrace(this, UnauthorizedError)
  }
}
