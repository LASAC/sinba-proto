// https://stackoverflow.com/questions/9716468/is-there-any-function-like-isnumeric-in-javascript-to-validate-numbers
const isNumeric = (n) => {
  return !isNaN(parseFloat(n)) && isFinite(n)
}

export {
  isNumeric
}
