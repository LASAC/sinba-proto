const path = require('path')
const { name, version, description } = require('../../package.json')
const { url } = require('../../dist/config').default

const DEFINITIONS_PATH = path.join(__dirname, 'definition.js')
const API_INDEX_PATH = path.join(__dirname, '../../src/api/index.js')

module.exports = {
  swagger: '2.0',
  info: {
    description,
    version,
    title: name
  },
  host: url,
  schemes: ['http', 'https'],
  basePath: '/api',
  apis: [DEFINITIONS_PATH, API_INDEX_PATH] // Path to the API docs
}
