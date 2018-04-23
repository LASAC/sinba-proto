import faker from 'faker/locale/pt_BR'
import bcrypt from 'bcrypt'
import cpf from 'cpf'
import config from '../../config'
import logger from '../../services/logger'

function randomStringNumber(max, length) {
  return Array(length)
    .fill(1)
    .map(() => faker.random.number(max))
    .join('')
}

export function fakeUser(isAdmin = false) {
  const startDate = new Date()
  logger.debug('config.bcryptRounds:', config.bcryptRounds)
  logger.debug('bcrypt start: ', startDate)

  const password = bcrypt.hashSync('11111111', config.bcryptRounds)

  const endDate = new Date()
  logger.debug('bcrypt end: ', endDate)

  const diff = endDate - startDate
  logger.debug(`bcrypt spent: ${diff / 1000} seconds`)

  return {
    email: faker.internet.email(),
    password, // : bcrypt.hashSync('11111111', 16),
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
    isAdmin
  }
}

logger.debug('fakeUser(true):', fakeUser(false))
