import { Home, Landing, Register } from './containers'
import { strings } from './services'

export default (path) => {
  return {
    // Public
    '/': { component: Landing, label: strings.landingPage },
    '/register': { component: Register, label: strings.register },
    // Authenticated
    '/home': { component: Home, label: strings.home }
  }
}
