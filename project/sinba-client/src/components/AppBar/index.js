import React from 'react'
import PropTypes from 'prop-types'
import { Link } from 'react-router-dom'
import { Button } from 'react-toolbox/lib/button'
import getRoutes from '../../routes'
import theme from './theme.scss'

const renderButtons = (buttons) =>
  buttons.map((button, index) => (
    <Link key={index} to={button.to}>
      <Button
        className={theme.button}
        label={button.label}
        onClick={button.onClick}
      />
    </Link>
  ))

const AppBar = ({ leftButtons, hide, rightButtons }) => {
  const routes = getRoutes()
  return (
    <nav className={theme.topNav}>
      {renderButtons(leftButtons)}
      {Object.keys(routes)
        .filter((key) => !hide.includes(key))
        .map((path, index) => (
          <Link key={index} to={path}>
            <Button className={theme.button} label={routes[path].label} />
          </Link>
        ))}
      {renderButtons(rightButtons)}
    </nav>
  )
}

AppBar.defaultProps = {
  leftButtons: [],
  hide: [],
  rightButtons: []
}

const buttonsPropTypes = PropTypes.arrayOf(
  PropTypes.shape({
    label: PropTypes.string.isRequired,
    onClick: PropTypes.func.isRequired
  })
)

AppBar.propTypes = {
  leftButtons: buttonsPropTypes,
  hide: PropTypes.arrayOf(PropTypes.string).isRequired,
  rightButtons: buttonsPropTypes
}

export default AppBar
