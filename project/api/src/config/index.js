/**
 * Configuration loader
 *
 * Returns the versioned set of configuration: `./config.json`
 * It also allows custom development configuration through  `./config.local.json`
 */
import fs from 'fs'
import path from 'path'

import defaultConfig from './config.json'
import { isDev } from '../helpers/dev'

const localConfigPath = './config.local.json'
const envConfigPath = `./config.${process.env.NODE_ENV || 'development'}.json`

let config = defaultConfig

// configuration based on the environment
if (fs.existsSync(path.resolve(__dirname, envConfigPath))) {
  config = Object.assign({}, config, require(envConfigPath))
}

// static configuration: improving logs on dev environments (development, local)
if (isDev()) {
  config = Object.assign({}, config, { logFormat: 'dev' })
}

// local configuration have precedence
if (fs.existsSync(path.resolve(__dirname, localConfigPath))) {
  config = Object.assign({}, config, require(localConfigPath))
}

export default config
