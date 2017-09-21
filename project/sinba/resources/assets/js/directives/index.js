var createFilereadDirective = require('./fileread')
var createModelDisplayDirective = require('./model-display')

module.exports = (angularModule) => {
  createFilereadDirective(angularModule)
  createModelDisplayDirective(angularModule)
}
