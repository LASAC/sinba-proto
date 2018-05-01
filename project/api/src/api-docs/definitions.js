/**
 * see https://swagger.io/docs/specification/data-models/
 */

/**
 * @swagger
 * definitions:
 *   ApiError:
 *     properties:
 *       code:
 *         type: string
 *       message:
 *         type: string
 *   User:
 *      type: "object"
 *      properties:
 *        _id:
 *          type: "string"
 *        firstName:
 *          type: "string"
 *        lastName:
 *          type: "string"
 *        email:
 *          type: "string"
 *        birthDate:
 *          type: "string"
 *          format: "date"
 *        cpf:
 *          type: "string"
 *        rg:
 *          type: "string"
 *        address:
 *          type: "string"
 *        phone:
 *          type: "string"
 *        occupation:
 *          type: "string"
 *        institution:
 *          type: "string"
 *        justification:
 *          type: "string"
 *        isAdmin:
 *          type: "boolean"
 *        __v:
 *          type: "integer"
 *   VersionPayload:
 *      type: object
 *      properties:
 *        version:
 *          type: string
 *        env:
 *          type: string
 *        hits:
 *          type: integer
 *        config:
 *          type: object
 */

// TODO: create definition to Config
