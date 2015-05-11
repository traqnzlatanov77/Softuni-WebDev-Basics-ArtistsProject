<?php

class PlaylistsController extends BaseController {

    private $db;

    public function OnInit() {
        $this->title = 'Playlists';
        $this->db = new PlaylistsModel();
    }

    public function index() {

        $this->authorize();

        $this->title = "Playlists";
        $this->playlists = $this->db->getAll();
    }

    public function create() {

        $this->authorize();

        if( $this->isPost ) {
            $name = $_POST['playlist_name'];

            if( $this->db->createPlaylist( $name ) ) {
                $this->addInfoMessage("Playlist created.");
                $this->redirect( 'playlists' );
            }
            else {
                $this->addErrorMessage("Error creating playlist.");
            }


            //$this->redirectToUrl('/Audio_Album_Softuni/playlists');

        }
    }

    public function delete( $id ) {

        $this->authorize();

        if( $this->db->deletePlaylist( $id ) ) {
            $this->addInfoMessage("Playlist deleted.");
        }
        else {
            $this->addErrorMessage('Plailist cannot be deleted');
        }

        $this->redirect( 'playlists' );
    }
}