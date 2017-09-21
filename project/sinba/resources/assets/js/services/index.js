var notifyService = require('./notify')

module.exports = (angularModule, lang) => {
  var localeService = require(`./locale/${lang}`)

  localeService(angularModule)
  notifyService(angularModule)
}
