<?php
	class TransModel extends CI_Model {

		private $id;
		private $ref;
		private $date;
		private $amount;
		private $type;
		private $s_id;
		private $c_id;

		public function get_transaction()
		{
			$query = $this->db->get('transaction');
            return $query->result();
		}
		
		public function addTransaction($form_data)
		{
			return $this->db->insert('transaction', $form_data);
		}
		
		public function deleteTransaction($trans_id)
		{
			$sql = "DELETE FROM `transaction` WHERE transaction_id = ? ";
			return $this->db->query($sql, $trans_id);
		}
		
		public function updateTransaction($form_data)
		{
			$t_id = $form_data['transaction_id'];
			unset($form_data['transaction_id']);
			$this->db->where('transaction_id',$t_id);
			//print_r ($form_data);
			return $this->db->update('transaction', $form_data);
		}
	}

?>