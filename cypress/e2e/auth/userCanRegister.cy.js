describe('User Can Register', () => {
    
    before('Fresh seed of database', () => {
        cy.exec('php artisan migrate:fresh --seed')
    })
    
    it('Registers a new user', () => {
        cy.visit('/')
        cy.get('#register').click()
        cy.get('#name').type('Test Name')
        cy.get('#email').type('testuser@mail.com')
        cy.get('#password').type('bearsB33TSbattlestarGALACTIC4')
        cy.get('#password-confirm').type('bearsB33TSbattlestarGALACTIC4')
        cy.get('#submit').click()
        cy.get('#alert').should('contain', 'You are logged in!')
    })
  })
