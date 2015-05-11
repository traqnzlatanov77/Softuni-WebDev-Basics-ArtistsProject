<?php

class PlaylistsModel extends BaseModel {

    public function getAll() {

        $statement = self::$db->query("SELECT * FROM playlists ORDER BY id");
        return $statement->fetch_all(MYSQL_ASSOC);
    }

    public function createPlaylist( $name ) {
        if( $name == '' ) {
            return false;
        }

        $statement = self::$db->prepare(
            "INSERT INTO playlists VALUES(NULL, ?)");

        $statement->bind_param("s", $name);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function deletePlaylist( $id ) {

        $statement = self::$db->prepare(
            "DELETE FROM playlists WHERE id = ?");

        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows >0;
    }

}