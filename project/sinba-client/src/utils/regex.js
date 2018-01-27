// https://stackoverflow.com/questions/46155/how-can-you-validate-an-email-address-in-javascript#answer-46181
const validEmail = (str) =>
  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    str
  )

const validPhone = (str) => /^\+\d{11}\d*$/.test(str)

// https://stackoverflow.com/questions/161738/what-is-the-best-regular-expression-to-check-if-a-string-is-a-valid-url#answer-8234912
const validUrl = (str) =>
  /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=+$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=+$,\w]+@)[A-Za-z0-9.-]+)((?:\/[+~%/.\w-_]*)?\??(?:[-+=&;%@.\w_]*)#?(?:[\w]*))?)/.test(
    str
  )

// http://github.com/assisrafael/angular-input-masks
const validCPF = (cpf) => {
  cpf = cpf.replace(/[^\d]+/g, '')
  if (cpf === '' || cpf.split('').every((c) => c === cpf[0]) || cpf.length !== 11) {
    return false
  }
  function validateDigit (digit) {
    var add = 0
    var init = digit - 9
    for (var i = 0; i < 9; i++) {
      add += parseInt(cpf.charAt(i + init), 10) * (i + 1)
    }
    return (add % 11) % 10 === parseInt(cpf.charAt(digit), 10)
  }
  return validateDigit(9) && validateDigit(10)
}

export { validEmail, validPhone, validUrl, validCPF }
