describe('User can create a playlist', () => {
    
    before('Refresh database and generate a user', () => {
        cy.exec('php artisan migrate:fresh')
        cy.generateUser()
    })
    
    it('Creates a video, audio, and images playlist', () => {

        cy.intercept({method: 'POST', url: '/createNewPlaylist'}).as('call')

        cy.getCyId('create-button').click()
        cy.getCyId('create-playlist-name-input').type('New Video Playlist')
        cy.getCyId('create-playlist-type-input').select('Video')
        cy.getCyId('create-playlist-submit').click()

        cy.wait('@call').then((data) => {
            cy.request('/getAllPlaylists').then((response) => {
                cy.get(response.body).each((playlist) => {
                    if (playlist.playlist_name === 'New Playlist'){
                        expect(playlist.playlist_name).to.equal(data.request.body.newPlaylistName)
                        expect(playlist.playlist_type).to.equal(data.request.body.playlistType)
                    }
                })
            })
        })

        cy.reload()

        cy.intercept({method: 'POST', url: '/createNewPlaylist'}).as('call')

        cy.getCyId('create-button').click()
        cy.getCyId('create-playlist-name-input').type('New Audio Playlist')
        cy.getCyId('create-playlist-type-input').select('Audio')
        cy.getCyId('create-playlist-submit').click()

        cy.wait('@call').then((data) => {
            cy.request('/getAllPlaylists').then((response) => {
                cy.get(response.body).each((playlist) => {
                    if (playlist.playlist_name === 'New Playlist'){
                        expect(playlist.playlist_name).to.equal(data.request.body.newPlaylistName)
                        expect(playlist.playlist_type).to.equal(data.request.body.playlistType)
                    }
                })
            })
        })

        cy.reload()

        cy.intercept({method: 'POST', url: '/createNewPlaylist'}).as('call')

        cy.getCyId('create-button').click()
        cy.getCyId('create-playlist-name-input').type('New Image Playlist')
        cy.getCyId('create-playlist-type-input').select('Images')
        cy.getCyId('create-playlist-submit').click()

        cy.wait('@call').then((data) => {
            cy.request('/getAllPlaylists').then((response) => {
                cy.get(response.body).each((playlist) => {
                    if (playlist.playlist_name === 'New Playlist'){
                        expect(playlist.playlist_name).to.equal(data.request.body.newPlaylistName)
                        expect(playlist.playlist_type).to.equal(data.request.body.playlistType)
                    }
                })
            })
        })

        cy.reload()
      
    })

    after('Reset database', () => {
        cy.exec('php artisan migrate:fresh')
    })
})
