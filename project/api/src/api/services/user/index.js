import User from '../../models/user'
import withAuthorization from './authorization'

export default () => {

  // Endpoints
  User.methods(['get', 'post', 'put', 'delete'])

  User.updateOptions({ new: true, runValidators: true })

  User.route('count.get', (req, res) => {
    User.count((err, value) => {
      if (err) {
        res.status(500).json({ errors: [err] })
      } else {
        res.json({ value })
      }
    })
  })

  return withAuthorization(User)
}
