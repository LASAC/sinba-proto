import { isTest } from '../../../dist/helpers/dev'
import setupApiDocs from './api-docs-setup'
export default ({ app, config, logger }) => {
  // currently yamljs library is causing
  // syntax error on tests, so, keeping
  // it out from tests for now...
  if (!isTest()) {
    setupApiDocs({ app, config, logger })
  }
}
