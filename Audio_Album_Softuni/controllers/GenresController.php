<?php

class GenresController extends BaseController {

    private $db;

    public function OnInit() {
        $this->title = 'Genres';
        $this->db = new GenresModel();
    }

    public function index() {

        $this->authorize();

        $this->genres = $this->db->getAll();
    }
}