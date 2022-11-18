describe('User can delete from a playlist', () => {
    
    before('Seed database and generate a user', () => {
        cy.exec('php artisan migrate:fresh --seed')
        cy.generateUser()
    })
    
    it('Deletes media from a playlist', () => {
        
        cy.request('/getAllMediaBelongingToPlaylist/1').then(function(response) {

            let oldMediaSize = response.body.length;

            cy.getCyId('view-playlist-btn-1').click()
            cy.request('/getAllMediaBelongingToPlaylist/1').then((response) => {
                
                cy.get(response.body).each((mediaId) => {
                    
                    cy.getCyId('delete-media-btn-' + mediaId.id).click()
                    cy.request('/getAllMediaBelongingToPlaylist/1').then((response) => {

                        let newMediaSize = response.body.length;
    
                        expect(newMediaSize).to.not.equal(oldMediaSize)
                        oldMediaSize--
                        expect(newMediaSize).to.equal(oldMediaSize)        
                        cy.reload()

                        if (newMediaSize >= 1) {
                            cy.getCyId('view-playlist-btn-1').click()
                        }
                    }) 
                })    
            })
        })
    })    
})
