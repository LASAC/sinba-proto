import React from 'react'
import { shallow } from 'enzyme'
import toJson from 'enzyme-to-json'
import Landing from '.'

describe('<Landing />', () => {
  it('should render correctly', () => {
    expect(toJson(shallow(<Landing />))).toMatchSnapshot()
  })
})