<?php
class Admin extends CI_Controller {

        public function index()
        {
            $this->load->view('admin');
        }
        public function adminbc()
        {
        	$this->load->model('buildingModel');
        	$res = $this->buildingModel->get_all();
        	$data['rs'] = $res;
            $this->load->view('adminbc', $data);

        }
		public function adminci()
        {
        	$this->load->model('cinemaaModel');
        	$res = $this->cinemaaModel->get_cinema();
        	$data['rs'] = $res;
            $this->load->view('adminci', $data);

        }
        public function adminms($flag = 0)
        {
        	$this->load->model('movieModel');
        	$res = $this->movieModel->get_movie();
        	$data['rs'] = $res;
			$data['msg_code'] = $flag;
            $this->load->view('adminms', $data);
        }
		
		
		public function adminsc($flag = 0)
        {
        	$this->load->model('screeningModel');
        	$res = $this->screeningModel->get_screening();
        	$data['rs'] = $res;
			$data['msg_code'] = $flag;
            $this->load->view('adminsc', $data);
        }
		
        public function adminut()
        {
			$this->load->model('userModel');
        	$res = $this->userModel->get_user();
        	$data['rs'] = $res;
            $this->load->view('adminut');
        }
		
		public function admintr()
        {
			$this->load->model('transModel');
        	$res = $this->transModel->get_transaction();
        	$data['rs'] = $res;
            $this->load->view('admintr');
        }
		
		public function addBuilding()
		{
			$this->load->model('buildingModel');
			$form_data = array(
				'building_id' => "",
				'building_name' => $this->input->post("bname"),
				'building_address' => $this->input->post("baddress"),
				'building_owner' => $this->input->post("bowner")
			);
			//print_r($form_data);
			$res = $this->buildingModel->addBuilding($form_data);
			//echo $res;
			if($res){
				redirect(base_url('admin/adminbc/5'),'refresh');
			}else{
				redirect(base_url('admin/adminbc/6'),'refresh');
			}
		}
		
		public function deleteBuilding($building_id)
		{
			$this->load->model('buildingModel');
			$res = $this->buildingModel->deleteBuilding($building_id);
			if($res){
				redirect(base_url('admin/adminbc/1'),'refresh');
			}else{
				redirect(base_url('admin/adminbc/2'),'refresh');
			}
		}
		
		public function updateBuilding()
		{
			//isloggedIN
			$this->load->model('buildingModel');
			$form_data = array(
				'building_id' => $this->input->post("building_id"),
				'building_name' => $this->input->post("building_name"),
				'building_address' => $this->input->post("building_address"),
				'building_owner' => $this->input->post("building_owner")
			);
			//print_r($form_data);
			$res = $this->buildingModel->updateBuilding($form_data);
			if($res){
				redirect(base_url('admin/adminbc/3'),'refresh');
			}else{
				redirect(base_url('admin/adminbc/4'),'refresh');
			}
		}
		
		public function addCinema()
        {
        	$this->load->model('cinemaaModel');
			$form_data = array(
				'cinema_id' => "",
				'cinema_number' => $this->input->post("cinema_number"),
				'cinema_type' => $this->input->post("cinema_type"),
				'building_id' => $this->input->post("building_id")
			);
			//print_r($form_data);
			$res = $this->cinemaaModel->addCinema($form_data);
			//echo $res;
			if($res){
				redirect(base_url('admin/adminci/5'),'refresh');
			}else{
				redirect(base_url('admin/adminci/6'),'refresh');
			}
        }
		
		public function deleteCinema($cinema_id){
			//isloggedIN
			$this->load->model('cinemaaModel');
			$res = $this->cinemaaModel->deleteCinema($cinema_id);
			if($res){
				redirect(base_url('admin/adminci/1'),'refresh');
			}else{
				redirect(base_url('admin/adminci/2'),'refresh');
			}
		}
		
		public function updateCinema(){
			//isloggedIN
			$this->load->model('cinemaaModel');
			$form_data = array(
				'cinema_id' => $this->input->post("cinema_id"),
				'cinema_number' => $this->input->post("cinema_number"),
				'cinema_type' => $this->input->post("cinema_type"),
				'building_id' => $this->input->post("building_id")
			);
			//print_r($form_data);
			$res = $this->cinemaaModel->updateCinema($form_data);
			if($res){
				redirect(base_url('admin/adminci/3'),'refresh');
			}else{
				redirect(base_url('admin/adminci/4'),'refresh');
			}
			
		}
		
		
		
		
        public function addMovie()
        {
        	$this->load->model('movieModel');
			$form_data = array(
				'movie_id' => "",
				'movie_title' => $this->input->post("title"),
				'movie_desc' => $this->input->post("desc"),
				'movie_year' => $this->input->post("year"),
				'movie_rating' => $this->input->post("rating"),
				'movie_poster' => ""
			);
			//print_r($form_data);
			$res = $this->movieModel->addMovie($form_data);
			//echo $res;
			if($res){
				redirect(base_url('admin/adminms/5'),'refresh');
			}else{
				redirect(base_url('admin/adminms/6'),'refresh');
			}
        }
		
		public function deleteMovie($movie_id){
			//isloggedIN
			$this->load->model('movieModel');
			$res = $this->movieModel->deleteMovie($movie_id);
			if($res){
				redirect(base_url('admin/adminms/1'),'refresh');
			}else{
				redirect(base_url('admin/adminms/2'),'refresh');
			}
		}
		
		public function updateMovie(){
			//isloggedIN
			$this->load->model('movieModel');
			$form_data = array(
				'movie_id' => $this->input->post("movie_id"),
				'movie_title' => $this->input->post("movie_title"),
				'movie_desc' => $this->input->post("movie_desc"),
				'movie_year' => $this->input->post("movie_year"),
				'movie_rating' => $this->input->post("movie_rating"),
				'movie_poster' => ""
			);
			//print_r($form_data);
			$res = $this->movieModel->updateMovie($form_data);
			if($res){
				redirect(base_url('admin/adminms/3'),'refresh');
			}else{
				redirect(base_url('admin/adminms/4'),'refresh');
			}
			
		}
		
		public function addScreening()
        {
        	$this->load->model('screeningModel');
			$form_data = array(
				'screening_id' => "",
				'screening_date' => $this->input->post("date"),
				'screening_sched' => $this->input->post("sched"),
				'movie_id' => $this->input->post("m_id"),
				'cinema_id' => $this->input->post("c_id")
			);
			//print_r($form_data);
			$res = $this->screeningModel->addScreening($form_data);
			//echo $res;
			if($res){
				redirect(base_url('admin/adminsc/5'),'refresh');
			}else{
				redirect(base_url('admin/adminsc/6'),'refresh');
			}
        }
		
		public function deleteScreening($screening_id){
			//isloggedIN
			$this->load->model('screeningModel');
			$res = $this->screeningModel->deleteScreening($screening_id);
			if($res){
				redirect(base_url('admin/adminsc/1'),'refresh');
			}else{
				redirect(base_url('admin/adminsc/2'),'refresh');
			}
		}
		
		public function updateScreening(){
			//isloggedIN
			$this->load->model('screeningModel');
			$form_data = array(
				'screening_id' => $this->input->post("screening_id"),
				'screening_date' => $this->input->post("screening_date"),
				'screening_sched' => $this->input->post("screening_sched"),
				'movie_id' => $this->input->post("movie_id"),
				'cinema_id' => $this->input->post("cinema_id")
			);
			//print_r($form_data);
			$res = $this->screeningModel->updateScreening($form_data);
			if($res){
				redirect(base_url('admin/adminsc/3'),'refresh');
			}else{
				redirect(base_url('admin/adminsc/4'),'refresh');
			}
			
		}
		
		public function addUser()
        {
        	$this->load->model('userModel');
			$form_data = array(
				'user_id' => "",
				'username' => $this->input->post("username"),
				'password' => $this->input->post("password"),
				'user_fname' => $this->input->post("user_fname"),
				'user_lname' => $this->input->post("user_lname"),
				'user_bod' => $this->input->post("user_bod"),
				'user_gender' => $this->input->post("user_gender"),
				'user_civil' => $this->input->post("user_civil"),
				'user_address' => $this->input->post("user_address"),
				'user_province' => $this->input->post("user_province"),
				'user_city' => $this->input->post("user_city"),
				'user_mobile' => $this->input->post("user_mobile"),
				'user_email' => $this->input->post("user_email"),
				'user_type' => $this->input->post("user_type")
			);
			//print_r($form_data);
			$res = $this->userModel->addUser($form_data);
			//echo $res;
			if($res){
				redirect(base_url('admin/adminut/5'),'refresh');
			}else{
				redirect(base_url('admin/adminut/6'),'refresh');
			}
        }
		
		public function deleteUser($user_id){
			//isloggedIN
			$this->load->model('userModel');
			$res = $this->userModel->deleteUser($user_id);
			if($res){
				redirect(base_url('admin/adminut/1'),'refresh');
			}else{
				redirect(base_url('admin/adminut/2'),'refresh');
			}
		}
		
		public function updateUser(){
			//isloggedIN
			$this->load->model('userModel');
			$form_data = array(
				'user_id' => $this->input->post("user_id"),
				'username' => $this->input->post("username"),
				'password' => $this->input->post("password"),
				'user_fname' => $this->input->post("user_fname"),
				'user_lname' => $this->input->post("user_lname"),
				'user_bod' => $this->input->post("user_bod"),
				'user_gender' => $this->input->post("user_gender"),
				'user_civil' => $this->input->post("user_civil"),
				'user_address' => $this->input->post("user_address"),
				'user_province' => $this->input->post("user_province"),
				'user_city' => $this->input->post("user_city"),
				'user_mobile' => $this->input->post("user_mobile"),
				'user_email' => $this->input->post("user_email"),
				'user_type' => $this->input->post("user_type")
			);
			//print_r($form_data);
			$res = $this->userModel->updateUser($form_data);
			if($res){
				redirect(base_url('admin/adminut/3'),'refresh');
			}else{
				redirect(base_url('admin/adminut/4'),'refresh');
			}
			
		}
		
		
		
		public function addTransaction()
        {
        	$this->load->model('transModel');
			$form_data = array(
				'transaction_id' => "",
				'trans_ref' => $this->input->post("trans_ref"),
				'trans_date' => $this->input->post("trans_date"),
				'trans_amount' => $this->input->post("trans_amount"),
				'trans_type' => $this->input->post("trans_type"),
				'screening_id' => $this->input->post("screening_id"),
				'cust_id' => $this->input->post("cust_id")
			);
			//print_r($form_data);
			$res = $this->transModel->addTransaction($form_data);
			//echo $res;
			if($res){
				redirect(base_url('admin/admintr/5'),'refresh');
			}else{
				redirect(base_url('admin/admintr/6'),'refresh');
			}
        }
		
		public function deleteTransaction($trans_id){
			//isloggedIN
			$this->load->model('transModel');
			$res = $this->transModel->deleteTransaction($trans_id);
			if($res){
				redirect(base_url('admin/admintr/1'),'refresh');
			}else{
				redirect(base_url('admin/admintr/2'),'refresh');
			}
		}
		
		public function updateTransaction(){
			//isloggedIN
			$this->load->model('transModel');
			$form_data = array(
				'transaction_id' => $this->input->post("transaction_id"),
				'trans_ref' => $this->input->post("trans_ref"),
				'trans_date' => $this->input->post("trans_date"),
				'trans_amount' => $this->input->post("trans_amount"),
				'trans_type' => $this->input->post("trans_type"),
				'screening_id' => $this->input->post("screening_id"),
				'cust_id' => $this->input->post("cust_id")
			);
			//print_r($form_data);
			$res = $this->transModel->updateTransaction($form_data);
			if($res){
				redirect(base_url('admin/admintr/3'),'refresh');
			}else{
				redirect(base_url('admin/admintr/4'),'refresh');
			}
			
		}
		
}