import { UserRole } from '../../models/user'
import UnauthorizedError from '../../errors/UnauthorizedError'

const onlyAdmin = (req, res, next) => {
  req.logger.debug('User.authorize > ', req.user)
  const { role } = req.user || {}
  if (role === UserRole.ADMIN) {
    return next()
  }
  throw new UnauthorizedError('Usuário não autorizado!')
}

export default (User) => {
  // Authorization
  for (const method of ['get', 'post', 'put', 'delete']) {
    User.before(method, onlyAdmin)
  }

  return User
}