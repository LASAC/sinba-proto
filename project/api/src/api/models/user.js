import restful, { mongoose } from 'node-restful'

// User Roles:
export const UserRole = {
  ADMIN: 'ADMIN',
  SUPPORT: 'SUPPORT',
  CONTRIBUTOR: 'CONTRIBUTOR',
  READER: 'READER',
  INACTIVE: 'INACTIVE'
}

/*
// Validation:
$validator = Validator::make($data, [
    'name' => 'required|max:255',
    'lastName' => 'required|max:255',
    'birthDate' => 'required|date_format:"d/m/Y"',
    'cpf' => 'required|regex:[\d{11}]|unique:users' . $id,
    'rg' => 'required|max:15',
    'address' => 'required|max:255',
    'phone' => 'required|regex:[\d{10}]',
    'cellphone' => 'required|regex:[\d{11}]',
    'email' => 'required|email|max:255|unique:users' . $id,
    'occupation' => 'required|max:255',
    'institution' => 'required|max:255',
    'justification' => 'required|max:511',
    'password' => 'required|min:6' . $passwordConfirmed,
]);
*/

const userSchema = new mongoose.Schema({
  email: { type: String, required: [true, 'E-mail é obrigatório'], unique: true },
  password: { type: String, required: true },
  firstName: { type: String, required: true },
  lastName: { type: String, required: true },
  birthDate: { type: String, required: true },
  cpf: { type: String, required: true, unique: true },
  rg: { type: String, required: true },
  address: { type: String, required: true },
  phone: { type: String, required: true },
  occupation: { type: String, required: true },
  institution: { type: String, required: true },
  justification: { type: String, required: true },
  role: { 
    type: String, 
    enum: {
      values: Object.keys(UserRole),
      message: '`{VALUE}` is not a valid value for path `{PATH}`.'
    }, 
    default: UserRole.INACTIVE
  }
})

export default restful.model('user', userSchema)
