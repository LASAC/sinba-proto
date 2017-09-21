var createCreateModelCtrl = require('./create-model-ctrl')
var createHomeCtrl = require('./home-ctrl')
var createImportDataCtrl = require('./import-data-ctrl')

module.exports = (angularModule) => {
  createCreateModelCtrl(angularModule)
  createHomeCtrl(angularModule)
  createImportDataCtrl(angularModule)
}
