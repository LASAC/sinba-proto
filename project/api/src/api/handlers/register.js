import { handleSuccess, handleError } from '../../helpers/handlers'
import User, { UserRole } from '../models/user'

export default async ({ req }) => {
  try {
    const body = await User.create({ ...req.body, role: UserRole.INACTIVE })  
    req.logger.debug('[register] > user created:', body)
    return handleSuccess({ body, req })
  } catch (err) {
    return handleError({ err, req })
  }
}
