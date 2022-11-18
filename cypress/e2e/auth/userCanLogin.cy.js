describe('User Can Login', () => {
    
    before('Fresh seed of database', () => {
        cy.exec('php artisan migrate:fresh --seed')
        cy.generateUser()
    })
    
    it('Registers a new user', () => {
        cy.visit('/')
        cy.get('#log-in').click()
        cy.get('#email').type('testuser@mail.com')
        cy.get('#password').type('bearsB33TSbattlestarGALACTIC4')
        cy.get('#login-button').click()
        cy.get('#alert').should('contain', 'You are logged in!')
    })
})
