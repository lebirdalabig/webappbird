<?php
class User extends CI_Controller {

         public function index()
        {
            if($this->isLoggedIn()){
                $this->load->model('movie_model');
                $res = $this->movie_model->get_last_ten_entries();
                $data['rs'] = $res;
                $this->load->view('header');
                $this->load->view('user',$data);
                $this->load->view('footer');
            }
        }

        public function isLoggedIn(){
            $flag = false;
            if(isset($_SESSION['user_id'])){
                $flag = true;
            }else{
                redirect('welcome/index');
            }
            return $flag;
        }

        public function movies($off = 0){
            $this->load->model('movie_model');

            $config['base_url'] = base_url('/users/movies');
            $config['total_rows'] = $this->movie_model->getMovieCount();
            $config['per_page'] = 10;

            echo $config['total_rows'];

            $this->pagination->initialize($config);

            $data['res'] = $this->movie_model->getMovies($config['per_page'],$off);
            $this->load->view('header');
            $this->load->view('displayMovies',$data);
            $this->load->view('footer');
        }

        public function transaction()
        {
            $this->load->model('screeningModel');
            $this->load->model('buildingModel');
            $this->movieModel->specific_movie($id);
            $this->load->model('movieModel');
            $form_data = array(
                'transaction_id' => "",
                'trans_ref' => $this->input->post("title"),
                'trans_date' => "",
                'trans_amount' => "",
                'trans_type' => "Credit",
                'screening_id' => $data['res'] = $this->screeningModel->screening($id),
                'cust_id' => $_SESSION["user_id"]
        );
            print_r($form_data);
            $res = $this->movieModel->transaction($form_data);
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('welcome/index');
        }

        public function genres()
        {
            $this->load->view('header');
            $this->load->view('genres');
            $this->load->view('footer');
        }

        public function horror()
        {
            $this->load->view('header');
            $this->load->view('horror');
            $this->load->view('footer');
        }

        public function comedy()
        {
            $this->load->view('header');
            $this->load->view('comedy');
            $this->load->view('footer');
        }

        public function contact()
        {
            $this->load->view('header');
            $this->load->view('contact');
            $this->load->view('footer');
        }

        public function snacks()
        {
            $this->load->view('header');
            $this->load->view('snacks');
            $this->load->view('footer');
        }

        public function location()
        {
            $this->load->view('header');
            $this->load->view('location');
            $this->load->view('footer');
        }

        public function locationayala()
        {
            $this->load->view('header');
            $this->load->view('locationayala');
            $this->load->view('footer');
        }

        public function locationseaside()
        {
            $this->load->view('header');
            $this->load->view('locationseaside');
            $this->load->view('footer');
        }

        public function locationgalleria()
        {
            $this->load->view('header');
            $this->load->view('locationgalleria');
            $this->load->view('footer');
        }
        
        public function moviePage($id)
        {
            $this->load->view('header');
            $this->load->model('cinemaaModel');
            $data['cinema'] = $this->cinemaaModel->get_cinema();
            $this->load->model('buildingModel');
            $data['building'] = $this->buildingModel->get_all();
            $this->load->model('movieModel');
            $this->movieModel->specific_movie($id);
            $this->load->model('screeningModel');
            $data['res'] = $this->movieModel->specific_movie($id);
            
            $this->load->view('moviePage', $data);
            $this->load->view('footer');
        }

        public function getScreening_date()
        {
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["cinema"])){
                $cinema_id = $_POST["cinema"];
                $this->load->model('screeningModel');
                $result['data'] = $this->screeningModel->get_screeningDate($cinema_id);
                echo json_encode($result['data']);
            }
        }

        public function getScreening_time()
        {
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["date"])){
                $screening_date = $_POST["date"];
                $this->load->model('screeningModel');
                $result['data'] = $this->screeningModel->get_screeningTime($screening_date);
                echo json_encode($result['data']);
            }

        }
        public  function userSettings()
        {
            $this->load->view('header');
            $this->load->view('userSettings');
            $this->load->view('footer');

        }

        public function updateUser()
        {
            $this->load->model('userModel');
            $form_data = array(
                //'user' => "",
                'username' => $this->input->post("username"),
                'password' => $this->input->post("Password"),
                'user_email' => $this->input->post("email"),
                'user_fname' => $this->input->post("fName"),
                'user_lname' => $this->input->post("lName"),
                'user_mobile' => $this->input->post("Phone"),
                'user_type' => "Customer"
            );
            $res = $this->userModel->updateUser($form_data);
            if($res){
                redirect(base_url('user/userSettings'),'refresh');
            }else{
                redirect(base_url('welcome/index'),'refresh');
            }

        }	

		public function updateItem($id = 0){
			if($this->isLoggedIn()){
				$msg['success'] = false;
				$msg['type'] = 'update';
				
				$this->load->model('itemModel');
				$id = $this->input->post('item_id');
				
				$form_data = array();
				$result = $this->itemModel->updateItem($id,$form_data);
				
				if($result){
					$msg['success'] = true;
				}
				echo json_encode($msg);
			}
			
		}
}