import bcrypt from 'bcrypt'
import { fakeUser, DEFAULT_PASSWORD } from './users'

describe('seeder > users', () => {
  test('fakeUser - await bcrypt', async () => {
    expect(await bcrypt.compare(DEFAULT_PASSWORD, fakeUser().password)).toBe(true)
  })
  test('fakeUser - promise bcrypt', () => {
    bcrypt.compare(DEFAULT_PASSWORD, fakeUser().password).then((same) => expect(same).toBe(true))
  })
  test('fakeUser - sync bcrypt', () => {
    expect(bcrypt.compareSync(DEFAULT_PASSWORD, fakeUser().password)).toBe(true)
  })
})
