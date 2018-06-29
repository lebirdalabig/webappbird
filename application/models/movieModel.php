<?php
	class MovieModel extends CI_Model {

		private $id;
		private $title;
		private $desc;
		private $year;
		private $rating;

		public function get_movie()
		{
			$query = $this->db->get('movie');
            return $query->result();
		}
		
		public function addMovie($form_data)
		{
			return $this->db->insert('movie', $form_data);
		}
		
		public function deleteMovie($movie_id)
		{
			$sql = "DELETE FROM `movie` WHERE movie_id = ? ";
			return $this->db->query($sql, $movie_id);
		}
		
		public function updateMovie($form_data)
		{
			$m_id = $form_data['movie_id'];
			unset($form_data['movie_id']);
			$this->db->where('movie_id',$m_id);
			//print_r ($form_data);
			return $this->db->update('movie', $form_data);
		}
		
		public function specific_movie($id)
		{
			$query = $this->db->get_where('movie', array('movie_id' => $id));
			return $query->result();
		}

		public function transaction($form_data)
		{
			return $this->db->insert('transaction', $form_data);
		}

}

?>