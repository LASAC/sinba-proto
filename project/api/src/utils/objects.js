const isNil = (element) => element == null

const pickNotNil = (obj, keys = null) => {
  keys = Array.isArray(keys) ? keys : Object.keys(obj)
  let copy = {}
  keys.filter((key) => !isNil(obj[key])).forEach((key) => {
    copy[key] = obj[key]
  })
  return copy
}

export { isNil, pickNotNil }
