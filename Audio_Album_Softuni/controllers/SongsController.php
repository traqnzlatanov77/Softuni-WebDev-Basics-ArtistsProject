<?php

class SongsController extends BaseController{

    private $db;

    public function OnInit() {
        $this->title = 'Songs';
        $this->db = new SongsModel();
    }

    public function index() {

        $this->authorize();

        $this->songs = $this->db->getAll();
    }

    public function create() {

        $this->authorize();
        $this->genres_id = $this->db->getGenres();

        if( $this->isPost ) {
            $artist = $_POST['artist_name'];
            $name = $_POST['song_name'];
            $duration = $_POST['song_duration'];
            $genres_id = $_POST['genres_id'];
            $blob_data = '';

            if( $_FILES['input_file']['tmp_name'] ) {

                if( $_FILES['input_file']['size'] > 9097152 ) {
                    $this->addErrorMessage('File is more than 9MB');
                    $this->redirect('songs', 'create');
                }
                else {

                    if( $_FILES['input_file']['type'] != 'audio/mp3' &&
                        $_FILES['input_file']['type'] != 'audio/wav') {

                        $this->addErrorMessage('File type is not supported');
                        $this->redirect('songs', 'create');
                    }
                    else {
                        if( !is_dir('user_songs' . DIRECTORY_SEPARATOR . $_SESSION['username']) ) {
                            mkdir('user_songs' . DIRECTORY_SEPARATOR . $_SESSION['username']);
                        }

                        $song_name = time() .'_'. $_FILES['input_file']['name'];

                        if( move_uploaded_file( $_FILES['input_file']['tmp_name'],
                            'user_songs' . DIRECTORY_SEPARATOR . $_SESSION['username']. DIRECTORY_SEPARATOR . $song_name) ) {
                            $blob_data = 'user_songs' . DIRECTORY_SEPARATOR . $_SESSION['username']. DIRECTORY_SEPARATOR . $song_name;

                            $this->addInfoMessage('Song successfully created');
                        }
                        else {
                            $this->addErrorMessage('Error during copying the file');
                            $this->redirect('songs', 'create');
                        }
                    }
                }

            }

            if( $this->db->createSong( $artist, $name, $duration, $genres_id, $blob_data ) ) {
                $this->redirect( 'songs' );
            }
            else {
                $this->addErrorMessage("Error creating song.");
            }


            //$this->redirectToUrl('/Audio_Album_Softuni/playlists');

        }
    }

    public function download( $id ) {
        $this->authorize();

        $songLocationQuery = $this->db->getSongLocation( $id );
        $location = array_shift(mysqli_fetch_array($songLocationQuery, MYSQL_BOTH));
        $file_name = substr($location, 36);
        $file = $location;

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
//            header('Content-Disposition: attachment; filename='.basename($file_name));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

    public function upRank( $id ) {

        $this->authorize();

        $value = array_shift($this->db->getRank( $id ));

        $value += 1;

        $this->db->rank( $id, $value );

        $this->redirect( 'songs' );
    }

    public function downRank( $id ) {

        $this->authorize();

        $value = array_shift($this->db->getRank( $id ));

        $value -= 1;

        $this->db->rank( $id, $value );

        $this->redirect( 'songs' );
    }

    public function delete( $id ) {

        $this->authorize();

        $songLocationQuery = $this->db->getSongLocation( $id );
        $location = array_shift(mysqli_fetch_array($songLocationQuery, MYSQL_BOTH));

        if( $this->db->deleteSong( $id ) ) {
            unlink($location);
            $this->addInfoMessage('Song deleted successfully');
        }
        else {
            $this->addErrorMessage('Songs cannot be deleted');
        }

        $this->redirect( 'songs' );
    }
}