import { isNil, pickNotNil } from './objects'

describe('utils/objects', () => {
  describe('isNil', () => {
    test('null isNil? true', () => {
      expect(isNil(null)).toBe(true)
    })
    test('undefined isNil? true', () => {
      expect(isNil(undefined)).toBe(true)
    })
    test('0 isNil? false', () => {
      expect(isNil(0)).toBe(false)
    })
    test('false isNil? false', () => {
      expect(isNil(false)).toBe(false)
    })
  })

  describe('pickNotNil', () => {
    test('Using Object.keys()', () => {
      expect(pickNotNil({ a: 0, b: undefined, c: null, d: '' })).toEqual({ a: 0, d: '' })
    })
    test('Passing keys', () => {
      expect(pickNotNil({ a: 0, b: undefined, c: null, d: '' }, ['c', 'd'])).toEqual({ d: '' })
    })
  })
})
