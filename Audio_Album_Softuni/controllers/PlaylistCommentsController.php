<?php

class PlaylistCommentsController extends BaseController {

    private $db;

    public function OnInit() {
        $this->title = 'Playlist Comments';
        $this->db = new PlaylistCommentsModel();
    }

    public function index() {

        $this->authorize();

        $this->title = "Playlist Commnets";
        $this->playlistscomments = $this->db->getAll();
    }

    public function create() {

        $this->authorize();
        $this->playlists_id = $this->db->getPlaylists();

        if( $this->isPost ) {

            $text = $_POST['playlistCommentText'];
            $playlist_id = $_POST['playlist_id'];

            if( $this->db->createPlaylistComment( $text, $playlist_id ) ) {
                $this->addInfoMessage("Comment created.");
                $this->redirect( 'playlistComments' );
            }
            else {
                $this->addErrorMessage("Error creating comment.");
            }
        }
    }

    public function delete( $id ) {

        $this->authorize();

        if( $this->db->deletePlaylistComment( $id ) ) {
            $this->addInfoMessage("Playlist comment deleted.");
        }
        else {
            $this->addErrorMessage('Playlist comment cannot be deleted');
        }

        $this->redirect( 'playlistComments' );
    }
}