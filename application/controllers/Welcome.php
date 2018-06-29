<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('movie_model');
		$res = $this->movie_model->get_last_ten_entries();
		$data['rs'] = $res;
		$this->load->view('header_guest');
		$this->load->view('index', $data);
		$this->load->view('footer_guest');
	}

	public function login()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$data = array(
				'username' => $this->input->post('Username'),	
				'password' => $this->input->post('Password') 
				);

			$this->load->model('userModel');
			$res = $this->userModel->userExists($data);
			if($res != NULL){
				$_SESSION['user_id'] = $res[0]->user_id;
				$_SESSION['username'] = $res[0]->username;
				$_SESSION['user_email'] = $res[0]->user_email;
				$_SESSION['user_type'] = $res[0]->user_type;
				if($_SESSION['user_type'] == 'Admin')
					{
						redirect('admin/index');
					}else{
						redirect('user/index');
					}
			}else{
				redirect('welcome/index');
				echo "you're logged out!";
			}
		}
	}

	public function movies($off = 0){
			$this->load->view('header_guest');
            $this->load->model('movie_model');

            $config['base_url'] = base_url('/welcome/movies');
            $config['total_rows'] = $this->movie_model->getMovieCount();
            $config['per_page'] = 10;

            $this->pagination->initialize($config);

            $data['res'] = $this->movie_model->getMovies($config['per_page'],$off);
            $this->load->view('displayMovies_guest',$data);
            $this->load->view('footer_guest');
    }

	public function genres()
	{
		$this->load->view('header_guest');
		$this->load->view('genres');
		$this->load->view('footer_guest');
	}

	public function horror()
	{
		$this->load->view('header_guest');
		$this->load->view('horror');
		$this->load->view('footer_guest');
	}

	public function comedy()
	{
		$this->load->view('header_guest');
		$this->load->view('comedy');
		$this->load->view('footer_guest');
	}

	public function contact()
	{
		$this->load->view('header_guest');
		$this->load->view('contact');

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		$this->load->library('email');
		$this->email->set_newline('\r\n');

		$this->email->from('$email', '$name');
		$this->email->to('von.arimbay598@gmail.com');
		//$this->subject->('$subject');
		$this->email->message('$message');

		$this->load->view('footer_guest');
	}

	public function snacks()
	{
		$this->load->view('header_guest');
		$this->load->view('snacks');
		$this->load->view('footer_guest');
	}

	public function location()
	{
		$this->load->view('header_guest');
		$this->load->view('location');
		$this->load->view('footer_gcontact');
	}

	public function locationayala()
	{
		$this->load->view('header_guest');
		$this->load->view('locationayala');
		$this->load->view('footer_gcontact');
	}

	public function locationseaside()
	{
		$this->load->view('header_guest');
		$this->load->view('locationseaside');
		$this->load->view('footer_gcontact');
	}

	public function locationgalleria()
	{
		$this->load->view('header_guest');
		$this->load->view('locationgalleria');
		$this->load->view('footer_gcontact');
	}

    public function moviePage($id)
    {
    	$this->load->view('header_guest');
        $this->load->model('movieModel');
        $this->movieModel->specific_movie($id);
        $data['res'] = $this->movieModel->specific_movie($id);
            
        $this->load->view('moviePage_guest', $data);
        $this->load->view('footer_guest');
    }

    public function register()
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
			//print_r($form_data);
			$res = $this->userModel->register($form_data);
			//echo $res;
			if($res){
				redirect(base_url('user/index'),'refresh');
			}else{
				redirect(base_url('welcome/index'),'refresh');
			}
    }
    
}
	