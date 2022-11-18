describe('User can edit a playlist', () => {
    
    before('Refresh database, generate a user and creates a playlist', () => {
        cy.exec('php artisan migrate:fresh')
        cy.generateUser()
        cy.createPlaylist()
    })
    
    it('Edits the name of a Playlist', () => {

        cy.intercept({method: 'POST', url: '/editPlaylist'}).as('call')

        cy.request('/getAllPlaylists').then((response) => {

            let oldPlaylistName = response.body[0].playlist_name;

            cy.getCyId('edit-playlist-btn-1').click()
            cy.getCyId('playlist-name-input').type('Editted name')
            cy.getCyId('submit-btn').click()

            cy.wait('@call').then((data) => {
                cy.request('/getAllPlaylists').then((response) => {
                    
                    let newPlaylistName = response.body[0].playlist_name;

                    expect(newPlaylistName).to.not.equal(oldPlaylistName);
                    expect(newPlaylistName).to.equal('Editted name');
                })
            })
        })
    })    
})
