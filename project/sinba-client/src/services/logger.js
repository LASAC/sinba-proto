export default (...args) => (process.env.REACT_APP_DEBUG ? console.log(...args) : undefined) // eslint-disable-line no-console
