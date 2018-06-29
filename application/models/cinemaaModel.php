<?php
	class CinemaaModel extends CI_Model {

		private $id;
		private $number;
		private $type;
		private $b_id;

		public function get_cinema()
		{
			$query = $this->db->get('cinema');
            return $query->result();
		}
		
		public function addCinema($form_data)
		{
			return $this->db->insert('cinema', $form_data);
		}
		
		public function deleteCinema($cinema_id)
		{
			$sql = "DELETE FROM `cinema` WHERE cinema_id = ? ";
			return $this->db->query($sql, $cinema_id);
		}
		
		public function updateCinema($form_data)
		{
			$c_id = $form_data['cinema_id'];
			unset($form_data['cinema_id']);
			$this->db->where('cinema_id',$c_id);
			//print_r ($form_data);
			return $this->db->update('movie', $form_data);
		}
	}

?>