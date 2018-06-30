<?php
	class ScreeningModel extends CI_Model {

		private $id;
		private $date;
		private $sched;
		private $m_id;
		private $c_id;

		public function get_screeningDate($cinema)
		{
			$query = $this->db->query("SELECT screening_date FROM screening WHERE cinema_id = '{$cinema}' GROUP BY screening_date");
            return $query->result();
		}

		public function get_screeningTime($date){
			$query = $this->db->query("SELECT screening_id, screening_sched FROM screening WHERE screening_date = '{$date}'");
			return $query->result();

		}
		
		public function addScreening($form_data)
		{
			return $this->db->insert('screening', $form_data);
		}
		
		public function deleteScreening($screening_id)
		{
			$sql = "DELETE FROM `screening` WHERE screening_id = ? ";
			return $this->db->query($sql, $screening_id);
		}
		
		public function updateScreening($form_data)
		{
			$s_id = $form_data['screening_id'];
			unset($form_data['screening_id']);
			$this->db->where('screening_id',$s_id);
			print_r ($form_data);
			return $this->db->update('screening', $form_data);
		}

		public function screening($id)
		{
			$query = $this->db->get_where('screening', array('screening_id' => $id));
			return $query->result();
		}
	}

?>