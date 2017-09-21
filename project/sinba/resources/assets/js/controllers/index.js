var createCreateModelCtrl = require('./create-model-ctrl')
var createHomeCtrl = require('./home-ctrl')
var createImportDataCtrl = require('./import-data-ctrl')
var createRegisterCtrl = require('./register-ctrl')

module.exports = (angularModule) => {
  createCreateModelCtrl(angularModule)
  createHomeCtrl(angularModule)
  createImportDataCtrl(angularModule)
  createRegisterCtrl(angularModule)
}
