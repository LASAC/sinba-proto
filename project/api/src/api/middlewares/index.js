//
// Middlewares that are specific for the backend API ('/api/' sub-routes)
//
import authentication from './authentication'
import encryptPassword from './encrypt-password'

export { authentication, encryptPassword }
