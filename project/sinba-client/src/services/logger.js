export default (...args) => (process.env.NODE_ENV === 'development' ? console.log(...args) : undefined) // eslint-disable-line no-console
