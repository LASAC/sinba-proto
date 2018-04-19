import swaggerUi from 'swagger-ui-express'
import YAML from 'yamljs'
import path from 'path'
import fs from 'fs'

const API_DOCS_YAML_PATH = path.resolve(process.cwd(), 'dist/api-docs/swagger.yaml')

export default ({ app, logger }) => {
  if (fs.existsSync(API_DOCS_YAML_PATH)) {
    const swaggerDocument = YAML.load(API_DOCS_YAML_PATH)
    app.use('/api-docs', swaggerUi.serve, swaggerUi.setup(swaggerDocument))
  } else {
    logger.error('api-docs > File Not Found:', API_DOCS_YAML_PATH)
  }
}
