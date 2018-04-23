const fs = require('fs')
const path = require('path')

// create db folder
const DB_PATH_DIR = path.resolve(process.cwd(), 'db')
if (!fs.existsSync(DB_PATH_DIR)) {
  fs.mkdirSync(DB_PATH_DIR)
}

// create builds folder
const BUILDS_DIR = path.resolve(process.cwd(), 'scripts/builds')
if (!fs.existsSync(BUILDS_DIR)) {
  fs.mkdirSync(BUILDS_DIR)
}
