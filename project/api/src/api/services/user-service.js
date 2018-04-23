import { User } from '../models'
// import logger from '../../services/logger'

User.methods(['get', 'post', 'put', 'delete'])
// logger.debug('services/user-service > User Service:', User)

export default User
