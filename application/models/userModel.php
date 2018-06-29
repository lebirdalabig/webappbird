<?php
	class UserModel extends CI_Model {

		private $id;
		private $username;
		private $password;
		private $fname;
		private $lname;
		private $bod;
		private $gender;
		private $civil;
		private $address;
		private $province;
		private $city;
		private $mobile;
		private $email;

		public function get_user()
		{
			$query = $this->db->get('user');
            return $query->result();
		}

		public function userExists($data)
		{
			$res = NULL;
			$query = $this->db->get_where('user', $data);
			$res = $query->result();
			print_r($res);
			return $res;
		}

		public function register($form_data)
		{
			return $this->db->insert('user', $form_data);
		}
		
		public function addUser($form_data)
		{
			return $this->db->insert('user', $form_data);
		}
		
		public function deleteUser($user_id)
		{
			$sql = "DELETE FROM `user` WHERE user_id = ? ";
			return $this->db->query($sql, $user_id);
		}
		
		public function updateUser($form_data)
		{
			$u_id = $form_data['user_id'];
			unset($form_data['user_id']);
			$this->db->where('user_id',$u_id);
			//print_r ($form_data);
			return $this->db->update('user', $form_data);
		}
	}

?>