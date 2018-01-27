import { validEmail, validPhone, validUrl, validCPF } from './regex'

describe('utils/regex', () => {
  describe('validEmail', () => {
    test('it should return false if the email is `invalidemail`', () => {
      expect(validEmail('invalidemail')).toBe(false)
    })
    test('it should return true if the email is `valid@email.com`', () => {
      expect(validEmail('valid@email.com')).toBe(true)
    })
    test('it should return true if the email is `valid+1@email.com`', () => {
      expect(validEmail('valid+1@email.com')).toBe(true)
    })
    test('it should return true if the email is `Valid@email.ca`', () => {
      expect(validEmail('Valid@email.ca')).toBe(true)
    })
  })

  describe('validPhone', () => {
    test('it should return true if the phone is `+19999999999` 10 digits length', () => {
      expect(validPhone('+19999999999')).toBe(true)
    })
    test('it should return false if the phone is `+1999999999` 9 digits length', () => {
      expect(validPhone('+1999999999')).toBe(false)
    })
  })

  describe('validUrl', () => {
    test('it should return true if the url is `http://google.com` 10 digits length', () => {
      expect(validUrl('http://google.com')).toBe(true)
    })
    test('it should return false if the url is `+1999999999` 9 digits length', () => {
      expect(validUrl('+1999999999')).toBe(false)
    })
  })

  describe('validCPF', () => {
    test('`476.828.336-53` should be valid', () => {
      expect(validCPF('476.828.336-53')).toBe(true)
    })
    test('`47682833653` should be valid', () => {
      expect(validCPF('47682833653')).toBe(true)
    })
  })
})
