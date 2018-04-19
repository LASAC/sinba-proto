import { UPDATE_AUTH, CLEAR_AUTH } from './action-types'

export default (state = secureAuth(), action) => {
  switch (action.type) {
    case CLEAR_AUTH:
      return secureAuth()
    case UPDATE_AUTH:
      return updateAuth(state, action.payload)
    default:
      return state
  }
}

/**
 * Updates any property of the Auth Object
 * @param {*} state Auth Object (see secureAuth)
 * @param {*} payload Any subset of the Auth Object to be updated
 */
function updateAuth(state, payload) {
  return secureAuth({
    ...state,
    ...payload
  })
}

/**
 * Updates Auth Object and guarantees data consistency for Auth Object,
 * by falling back wrong or missing property to it's defaults
 * @param {*} data Data to be added on Auth Object
 */
export function secureAuth(data = {}) {
  return {
    authenticated: data.authenticated || false,
    user: secureUser()
  }
}

function secureUser(data = {}) {
  const {
    id,
    name,
    lastName,
    birthDate,
    cpf,
    rg,
    address,
    phone,
    cellphone,
    email,
    occupation
  } = data

  if (
    id &&
    name &&
    lastName &&
    birthDate &&
    cpf &&
    rg &&
    address &&
    phone &&
    cellphone &&
    email &&
    occupation
  ) {
    return {
      id,
      name,
      lastName,
      birthDate,
      cpf,
      rg,
      address,
      phone,
      cellphone,
      email,
      occupation
    }
  }
  return null
}
