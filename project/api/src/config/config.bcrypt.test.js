import config from './index'
import bcrypt from 'bcrypt'

describe('bcrypt', () => {
  test('it should take between 250 ms and 300 ms to compute a bcrypt hash', () => {
    // see: https://security.stackexchange.com/questions/17207/recommended-of-rounds-for-bcrypt
    const { bcryptRounds } = config
    const start = new Date()
    bcrypt.hashSync('11111111', bcryptRounds)
    const end = new Date()
    const diff = end - start
    expect(diff).toBeGreaterThan(250)
  })
})
