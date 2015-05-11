<?php

class SongCommentsController extends BaseController {

    private $db;

    public function OnInit() {
        $this->title = 'Song Comments';
        $this->db = new SongCommentsModel();
    }

    public function index() {

        $this->authorize();

        $this->title = "Song Comments";
        $this->songcomments = $this->db->getAll();
    }

    public function create() {

        $this->authorize();
        $this->songs_id = $this->db->getSongs();

        if( $this->isPost ) {

            $text = $_POST['songCommentText'];
            $playlist_id = $_POST['song_id'];

            if( $this->db->createSongComment( $text, $playlist_id ) ) {
                $this->addInfoMessage("Comment created.");
                $this->redirect( 'songComments' );
            }
            else {
                $this->addErrorMessage("Error creating comment.");
            }
        }
    }

    public function delete( $id ) {

        $this->authorize();

        if( $this->db->deleteSongComment( $id ) ) {
            $this->addInfoMessage("Song comment deleted.");
        }
        else {
            $this->addErrorMessage('Song comment cannot be deleted');
        }

        $this->redirect( 'songComments' );
    }
}