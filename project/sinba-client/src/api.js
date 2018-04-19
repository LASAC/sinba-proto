import { create } from 'apisauce'
import log from './services/logger'

const token = document.head.querySelector('meta[name="csrf-token"]')
log('token.content:', token.content)

const api = create({
  baseURL: 'api',
  headers: {
    'X-CSRF-TOKEN': token.content
  }
})

export default api
