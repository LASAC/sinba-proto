import bcrypt from 'bcrypt'
import User from '../models/user'

export default async ({ username, password }, logger) => {
  logger.debug('username:', username)
  // go to db and retrieve a user with this username
  const user = await User.findOne({ email: username }).exec()

  logger.debug('user:', user)
  if (!user) {
    throw new UserNotFoundError('User not found')
  }

  logger.debug('user.password:', user.password)
  // check if password matches
  const same = await bcrypt.compare(password, user.password)
  logger.debug('same:', same)
  if (!same) {
    throw new PasswordMismatchError('Password mismatch')
  }

  // return user if all good
  return user
}

// UserNotFoundError
class UserNotFoundError extends Error {
  constructor(...args) {
    super(...args)
    this.code = 'authenticator/UserNotFoundError'
    Error.captureStackTrace(this, UserNotFoundError)
  }
}

// PasswordMismatchError
class PasswordMismatchError extends Error {
  constructor(...args) {
    super(...args)
    this.code = 'authenticator/PasswordMismatchError'
    Error.captureStackTrace(this, PasswordMismatchError)
  }
}
