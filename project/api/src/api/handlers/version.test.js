import request from 'supertest'
import app from '../../app'

describe('Test api version', () => {
  test('GET /api/version should return status 200', () => {
    return request(app)
      .get('/api/version')
      .then((response) => {
        expect(response.statusCode).toBe(200)
      })
  })
})
