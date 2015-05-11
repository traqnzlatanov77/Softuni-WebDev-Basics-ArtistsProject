<?php

class SongCommentsModel extends BaseModel {

    public function getAll() {

        $statement = self::$db->query("SELECT * FROM songcomments ORDER BY id");
        return $statement->fetch_all(MYSQL_ASSOC);
    }

    public function createSongComment( $text, $playlist_id ) {
        if( $text == '' || $playlist_id == null) {
            return false;
        }

        $statement = self::$db->prepare(
            "INSERT INTO songcomments VALUES(NULL, ?, ?)");



        $statement->bind_param("si", $text, $playlist_id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function getSongs() {
        $statement = self::$db->query("SELECT * FROM songs");
        return $statement;
    }

    public function deleteSongComment( $id ) {

        $statement = self::$db->prepare(
            "DELETE FROM songcomments WHERE id = ?");

        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows >0;
    }
}