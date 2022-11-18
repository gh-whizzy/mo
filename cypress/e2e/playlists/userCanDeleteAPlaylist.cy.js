describe('User can delete a playlist', () => {
    
    before('Seed database and generate a user', () => {
        cy.exec('php artisan migrate:fresh --seed')
        cy.generateUser()
    })
    
    it('Deletes the first 3 Playlist', () => {

        
        
        cy.request('/getAllPlaylists').then( function(response) {

            let oldPlaylistSize = response.body.length;

            cy.get(response.body).each((playlist) => {

                cy.getCyId('delete-playlist-btn-' + playlist.id).click()
                
                cy.request('/getAllPlaylists').then((response) => {

                    let newPlaylistSize = response.body.length;

                    expect(newPlaylistSize).to.not.equal(oldPlaylistSize)
                    oldPlaylistSize--
                    expect(newPlaylistSize).to.equal(oldPlaylistSize)        
                    cy.reload()            
                })
            })
        })
    })    
})
