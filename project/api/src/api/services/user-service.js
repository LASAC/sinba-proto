import User from '../models/user'

export default () => {
  User.methods(['get', 'post', 'put', 'delete'])
  User.updateOptions({ new: true, runValidators: true })

  User.route('count', (req, res) => {
    User.count((err, value) => {
      if (err) {
        res.status(500).json({ errors: [err] })
      } else {
        res.json({ value })
      }
    })
  })

  return User
}
