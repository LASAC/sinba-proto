import { Landing, Register } from './containers'
import { strings } from './services'

export default (path) => {
  return {
    '/': { component: Landing, label: strings.landingPage },
    '/register': { component: Register, label: strings.register }
  }
}
