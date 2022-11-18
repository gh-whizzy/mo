describe('User Can Login', () => {
    
    before('Fresh seed of database', () => {
        cy.exec('php artisan migrate:fresh --seed')
        cy.generateUser()
    })
    
    it('Creates a playlist', () => {
        cy.login()

        cy.intercept({
            method: 'POST',
            url: '/createNewPlaylist',
          }).as('createNewPlaylist')

        cy.getCyId('create-button').click()
        cy.getCyId('create-playlist-name-input').type('New Playlist')
        cy.getCyId('create-playlist-type-input').select('Video')
        cy.getCyId('create-playlist-submit').click()

        cy.wait('@createNewPlaylist').then((data) => {
            let newPlaylistName = data.request.body.newPlaylistName
            let newPlaylistType = data.request.body.playlistType

            cy.request('/getAllPlaylists').then(function(response) {
                cy.log(response.body)
                cy.get(response.body).each((playlist) => {
                    if (playlist.playlist_name === 'New Playlist'){
                        expect(playlist.playlist_name).to.equal(newPlaylistName)
                        expect(playlist.playlist_type).to.equal(newPlaylistType)
                    }
                })
            })
        })
    })
})
