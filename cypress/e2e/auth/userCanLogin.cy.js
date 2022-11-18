const { after } = require("lodash")

describe('User Can Login', () => {
    
    before('Fresh seed of database', () => {
        cy.exec('php artisan migrate:fresh')
        cy.generateUser()
        cy.get('#navbar-dropdown').click()
        cy.get('#navbar-logout').click()
    })
    
    it('Registers a new user', () => {
        cy.visit('/')
        cy.get('#log-in').click()
        cy.get('#email').type('testuser@mail.com')
        cy.get('#password').type('bearsB33TSbattlestarGALACTIC4')
        cy.get('#login-button').click()
        cy.get('#alert').should('contain', 'You are logged in!')

        cy.get('#navbar-dropdown').click()
        cy.get('#navbar-logout').click()
    })

    after('Reset database', () => {
        cy.exec('php artisan migrate:fresh')
    })
})
