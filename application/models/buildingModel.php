<?php
	class BuildingModel extends CI_Model {

		private $id;
		private $name;
		private $address;
		private $owner;

		public function get_all()
		{
			$query = $this->db->get('building');
            return $query->result();
		}
		
		public function addBuilding($form_data)
		{
			return $this->db->insert('building', $form_data);
		}
		
		public function deleteBuilding($building_id)
		{
			$sql = "DELETE FROM `building` WHERE building_id = ? ";
			return $this->db->query($sql, $building_id);
		}
		
		public function updateBuilding($form_data)
		{
			$b_id = $form_data['building_id'];
			unset($form_data['building_id']);
			$this->db->where('building_id',$b_id);
			//print_r ($form_data);
			return $this->db->update('building', $form_data);
		}
	}

?>