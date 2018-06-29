<?php
        class movie_model extends CI_Model {

                public $title;
                public $content;
                public $date;

                public function get_last_ten_entries()
                {
                        $query = $this->db->get('movie', 10);
                        return $query->result();
                }

                public function insert_entry()
                {
                        $this->title    = $_POST['title']; // please read the below note
                        $this->content  = $_POST['content'];
                        $this->date     = time();

                        $this->db->insert('entries', $this);
                }

                public function update_entry()
                {
                        $this->title    = $_POST['title'];
                        $this->content  = $_POST['content'];
                        $this->date     = time();

                        $this->db->update('entries', $this, array('id' => $_POST['id']));
                }

                public function getMovies($lim = 0, $offset = 0){
                        $this->db->limit($lim,$offset);
                        $query = $this->db->get('movie');
                        return $query->result();
                }

                public function getMovieCount(){
                        // return $this->db->count_all('movie');
                }

        }
?>