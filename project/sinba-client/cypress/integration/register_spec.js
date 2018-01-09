//
// Register Page UI Tests
//

describe('Register', () => {
  it('should open register page and fill form with dummy data', () => {
    cy.visit('localhost:3000/register')
    cy.wait(200)
    cy.get('#name').type('John')
    cy.get('#lastName').type('Doe')
  })
})