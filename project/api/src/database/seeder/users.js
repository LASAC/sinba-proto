import faker from 'faker/locale/pt_BR'
import bcrypt from 'bcrypt'
import cpf from 'cpf'
import config from '../../config'
import logger from '../../services/logger'
import { UserRole } from '../../api/models/user'

function randomStringNumber(max, length) {
  return Array(length)
    .fill(1)
    .map(() => faker.random.number(max))
    .join('')
}

export const DEFAULT_PASSWORD = '11111111'

export function fakeUser(plainPassword = DEFAULT_PASSWORD, role = UserRole.INACTIVE) {
  const startDate = new Date()
  logger.debug('config.bcryptRounds:', config.bcryptRounds)
  logger.debug('bcrypt start: ', startDate)

  const password = bcrypt.hashSync(plainPassword, config.bcryptRounds)

  const endDate = new Date()
  logger.debug('bcrypt end: ', endDate)

  const diff = endDate - startDate
  logger.debug(`bcrypt spent: ${diff / 1000} seconds`)

  return {
    email: faker.internet.email(),
    password,
    firstName: faker.name.firstName(),
    lastName: faker.name.lastName(),
    birthDate: faker.date.past(),
    cpf: cpf.generate(false),
    rg: randomStringNumber(9, 15),
    address: faker.address.streetAddress(),
    phone: randomStringNumber(9, 11),
    occupation: faker.name.jobTitle(),
    institution: faker.company.companyName(),
    justification: faker.lorem.paragraph(),
    role
  }
}

logger.debug('fakeUser():', fakeUser())
