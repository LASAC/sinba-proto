import moment from 'moment'

const DATETIME_WITH_TZ_FORMAT = 'YYYY-MM-DD HH:mm:ss Z'

export const getMoment = (date = new Date(), format = DATETIME_WITH_TZ_FORMAT) => moment(date, format)
