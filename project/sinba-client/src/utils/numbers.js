// https://stackoverflow.com/questions/9716468/is-there-any-function-like-isnumeric-in-javascript-to-validate-numbers
const isNumeric = (n) => {
  return !isNaN(parseFloat(n)) && isFinite(n)
}

const keyCodeIsNumeric = (keyCode) => (keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105)

export { keyCodeIsNumeric, isNumeric }
