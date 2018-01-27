import React from 'react'
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux'
import { getPing } from '../../reducers/api-status/actions'
import { isBackspace, isDelete, validCPF, isNumeric } from '../../utils'
import log from '../../services/logger'
import strings from '../../localization'
import { Grid, Row, Col } from 'react-flexbox-grid'
import AppBar from '../../components/AppBar'
import { Button, Input, DatePicker } from './components'
import theme from './theme.scss'

class Register extends React.Component {
  state = {
    name: '',
    lastName: '',
    birthDate: '',
    cpf: '',
    rg: '',
    address: '',
    phone: '',
    cellphone: '',
    occupation: '',
    institution: '',
    justification: '',
    email: '',
    password: '',
    passwordConfirm: '',
    error: {
      name: '',
      lastName: '',
      birthDate: '',
      cpf: '',
      rg: '',
      address: '',
      phone: '',
      cellphone: '',
      occupation: '',
      institution: '',
      justification: '',
      email: '',
      password: '',
      passwordConfirm: ''
    }
  }

  render() {
    return (
      <Grid fluid>
        <Row xs={12}>
          <Col xs={12}>
            {/* App Bar */}
            <AppBar />
          </Col>
        </Row>
        <Row xs={12}>
          <Col lg={4} md={3} sm={0} xs={0} />
          <Col lg={4} md={6} sm={12} xs={12}>
            {/* Main Container */}
            <div className={theme.register}>
              {/* Title */}
              <div className={theme.header}>
                <h1>{strings.registerTitle}</h1>
              </div>
              {/* Form */}
              <div className={theme.main}>
                <Input
                  type="text"
                  label={strings.firstName}
                  name="name"
                  value={this.state.name}
                  error={this.state.error.name}
                  onChange={this.handleChange.bind(this, 'name')}
                  onBlur={this.handleBlur.bind(this, 'name')}
                  maxLength={255}
                  required
                />
                <Input
                  type="text"
                  label={strings.lastName}
                  name="lastName"
                  value={this.state.lastName}
                  error={this.state.error.lastName}
                  onChange={this.handleChange.bind(this, 'lastName')}
                  onBlur={this.handleBlur.bind(this, 'lastName')}
                  maxLength={255}
                  required
                />
                <DatePicker
                  label={strings.birthDate}
                  locale="pt"
                  value={this.state.birthDate}
                  error={this.state.error.birthDate}
                  onChange={this.handleChangeDate.bind(this, 'birthDate')}
                  onDismiss={this.handleDismissDate.bind(this, 'birthDate')}
                  required
                />
                <Input
                  type="text"
                  label="CPF"
                  name="cpf"
                  value={this.state.cpf}
                  error={this.state.error.cpf}
                  onKeyDown={this.handleKeyDownCPF}
                  onBlur={this.checkCPF}
                  maxLength={14}
                  required
                />
                <Input
                  type="text"
                  label="RG"
                  name="rg"
                  value={this.state.rg}
                  error={this.state.error.rg}
                  onChange={this.handleChange.bind(this, 'rg')}
                  onBlur={this.handleBlur.bind(this, 'rg')}
                  maxLength={15}
                  required
                />
                <Input
                  required
                  type="text"
                  label={strings.address}
                  name="address"
                  value={this.state.address}
                  error={this.state.error.address}
                  onChange={this.handleChange.bind(this, 'address')}
                  onBlur={this.handleBlur.bind(this, 'address')}
                  maxLength={255}
                />
                <Input
                  required
                  type="text"
                  label={strings.phone}
                  name="phone"
                  value={this.state.phone}
                  error={this.state.error.phone}
                  onChange={this.handleChange.bind(this, 'phone')}
                  onBlur={this.handleBlur.bind(this, 'phone')}
                  maxLength={16}
                />
                <Input
                  required
                  type="text"
                  label={strings.cellphone}
                  name="cellphone"
                  value={this.state.cellphone}
                  error={this.state.error.cellphone}
                  onChange={this.handleChange.bind(this, 'cellphone')}
                  onBlur={this.handleBlur.bind(this, 'cellphone')}
                  maxLength={16}
                />
                <Input
                  required
                  type="text"
                  label={strings.occupation}
                  name="occupation"
                  value={this.state.occupation}
                  error={this.state.error.occupation}
                  onChange={this.handleChange.bind(this, 'occupation')}
                  onBlur={this.handleBlur.bind(this, 'occupation')}
                  maxLength={255}
                />
                <Input
                  required
                  type="text"
                  label={strings.institution}
                  name="institution"
                  value={this.state.institution}
                  error={this.state.error.institution}
                  onChange={this.handleChange.bind(this, 'institution')}
                  onBlur={this.handleBlur.bind(this, 'institution')}
                  maxLength={255}
                />
                <Input
                  required
                  multiline
                  type="text"
                  label={strings.justification}
                  name="justification"
                  value={this.state.justification}
                  error={this.state.error.justification}
                  onChange={this.handleChange.bind(this, 'justification')}
                  onBlur={this.handleBlur.bind(this, 'justification')}
                  maxLength={511}
                />
                <Input
                  required
                  type="text"
                  label="E-mail"
                  name="email"
                  value={this.state.email}
                  error={this.state.error.email}
                  onChange={this.handleChange.bind(this, 'email')}
                  onBlur={this.handleBlur.bind(this, 'email')}
                  maxLength={16}
                />
                <Input
                  required
                  type="password"
                  label={strings.password}
                  name="password"
                  pattern=".{6,}"
                  value={this.state.password}
                  error={this.state.error.password}
                  onChange={this.handleChange.bind(this, 'password')}
                  onBlur={this.handleBlur.bind(this, 'password')}
                  maxLength={16}
                />
                <Input
                  required
                  type="password"
                  label={strings.passwordConfirm}
                  name="passwordConfirm"
                  pattern=".{6,}"
                  value={this.state.passwordConfirm}
                  error={this.state.error.passwordConfirm}
                  onChange={this.handleChange.bind(this, 'passwordConfirm')}
                  onBlur={this.handleBlur.bind(this, 'passwordConfirm')}
                  maxLength={16}
                />
                <Button onClick={this.handleSubmit}>{strings.submit}</Button>
              </div>
            </div>
          </Col>
          <Col lg={4} md={3} sm={0} xs={0} />
        </Row>
      </Grid>
    )
  }

  handleBlur(name) {
    this.checkField(name)
  }

  handleChange(name, value) {
    this.setState({ [name]: value })
  }

  handleChangeCPF(value) {
    if (value.length > 14) {
      return
    }
    switch (value.length) {
      case 3:
      case 7:
        value = value + '.'
        break
      case 11:
        value = value + '-'
        break
      default:
        break
    }

    return this.handleChange('cpf', value)
  }

  handleKeyDownCPF = (event) => {
    const keyCode = event.keyCode || event.which
    const value = String.fromCharCode(keyCode)
    const isDeleting = isDelete(keyCode) || isBackspace(keyCode)

    if (isDeleting) {
      // if we're deleting, check if we need to delete one or two keys
      const offset = [4, 8, 12].includes(this.state.cpf.length) ? 2 : 1
      this.setState({ cpf: this.state.cpf.slice(0, -offset) })
    } else if (isNumeric(value)) {
      // if we're not deleting, handle cpf change normally
      this.handleChangeCPF(this.state.cpf + value)
    }
  }

  handleChangeDate(name, value) {
    this.setState({ [name]: value }, () => {
      this.checkField(name)
    })
  }

  handleDismissDate(name, value) {
    this.checkField(name)
  }

  checkField = (name, callIsValid = (value) => value.length !== 0, errorMessage = strings.fieldRequired) => {
    let { error } = this.state
    if (!callIsValid(this.state[name])) {
      error[name] = errorMessage
    } else {
      error[name] = ''
    }
    this.setState({ error })
  }

  checkCPF = () => {
    return this.checkField('cpf', (value) => validCPF(value), strings.invalidCpf)
  }

  handleSubmit = async () => {
    await this.props.getPing()
    if (this.formValid()) {
      log('All good! Submitting...')
    } else {
      log('Fix the errors, please!')
    }
  }

  formValid = () => {
    let valid = true
    let { error } = this.state
    const fields = Object.keys(this.state).filter((key) => key !== 'error')
    for (const field of fields) {
      if (this.state[field].length === 0) {
        error[field] = strings.fieldRequired
        valid = false
      } else {
        error[field] = ''
      }
    }

    this.setState({ error })
    return valid
  }
}

const mapStateToProps = (state) => state
const mapDispatchToProps = (dispatch) => bindActionCreators({ getPing }, dispatch)

export default connect(mapStateToProps, mapDispatchToProps)(Register)
