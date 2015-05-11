<?php
class PlaylistCommentsModel extends BaseModel {

    public function getAll() {

        $statement = self::$db->query("SELECT * FROM playlistcomments ORDER BY id");
        return $statement->fetch_all(MYSQL_ASSOC);
    }

    public function createPlaylistComment( $text, $playlist_id ) {
        if( $text == '' || $playlist_id == null) {
            return false;
        }

        $statement = self::$db->prepare(
            "INSERT INTO playlistcomments VALUES(NULL, ?, ?)");



        $statement->bind_param("si", $text, $playlist_id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function getPlaylists() {
        $statement = self::$db->query("SELECT * FROM playlists");
        return $statement;
    }

    public function deletePlaylistComment( $id ) {

        $statement = self::$db->prepare(
            "DELETE FROM playlistcomments WHERE id = ?");

        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows >0;
    }
}