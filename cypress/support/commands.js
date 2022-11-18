// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// -- This is a parent command --
// Cypress.Commands.add('login', (email, password) => { ... })
//
//
// -- This is a child command --
// Cypress.Commands.add('drag', { prevSubject: 'element'}, (subject, options) => { ... })
//
//
// -- This is a dual command --
// Cypress.Commands.add('dismiss', { prevSubject: 'optional'}, (subject, options) => { ... })
//
//
// -- This will overwrite an existing command --
// Cypress.Commands.overwrite('visit', (originalFn, url, options) => { ... })

Cypress.Commands.add('getCyId', (id) => {
    cy.get(`[data-cy=${id}]`)
})

Cypress.Commands.add('generateUser', () => {
    cy.visit('/')
    cy.get('#register').click()
    cy.get('#name').type('Test Name')
    cy.get('#email').type('testuser@mail.com')
    cy.get('#password').type('bearsB33TSbattlestarGALACTIC4')
    cy.get('#password-confirm').type('bearsB33TSbattlestarGALACTIC4')
    cy.get('#submit').click()
    cy.get('#alert').should('contain', 'You are logged in!')
})