<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		// $this->load->model("codechef");
		// $this->codechef->get_rank();
		$this->load->view("home_tab.php");
		
	} 
	public function home(){

		$data['active']="1";
		$data['title']='Home';
		$this->load->view("top_head.php",$data);

		// $this->load->view("accountpage.php");
		$this->load->view("content_home.php");		
		$this->load->view("footer.php");

	}

	public function tutorial(){
		$data['active']="2";
		$data['title']='Tutorial';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_tutorial.php");		
		$this->load->view("footer.php");		
		
	}

	public function projects(){
		$data['active']="3";
		$data['title']='Projects';
		$data['add_project']='';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_projects.php");		
		$this->load->view("footer.php");		
	}

	// public function blog(){
	// 	$data['active']="4";
	// 	$data['title']='Blog';
	// 	$this->load->view("top_head.php",$data);
	// 	$this->load->view("content_blog.php");
	// 	$this->load->view("footer.php");		
	// }


	public function forum(){
		$data['active']="5";
		$data['title']='Forum';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_forum.php");
		$this->load->view("footer.php");		
	}

	// public function team(){
	// 	$data['active']="6";
	// 	$data['title']='Team';
	// 	$this->load->view("top_head.php",$data);
	// 	$this->load->view("content_team.php");
	// 	$this->load->view("footer.php");		
	// }

	public function about(){
		$data['active']="6";
		$data['title']='About';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_about.php");
		$this->load->view("footer.php");		
	}

	public function calender(){
		$this->load->view("calender.php");
	}
	public function login(){
		$data['active']="0";
		$data['title']='Login';
		$this->load->view("top_head.php",$data);
		$this->load->view("login.php");
		$this->load->view("footer.php");		
	}
	public function signup(){
		$data['active']="0";
		$data['title']='Login';
		$this->load->view("top_head.php",$data);
		$this->load->view("sign.php");
		$this->load->view("footer.php");		
	}


	public function login_validation(){

		$this->load->library("form_validation");
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|md5|trim');
		if ($this->form_validation->run()){
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => 1,
				'admin'=>0
			);
			$this->load->model('model_users');
			if($this->model_users->is_admin()){
				$data['admin']=1;
			}
			else{
				$data['admin']=0;
			}
			$this->session->set_userdata($data);
			redirect('site/members');

		} else{
			$data['active']="0";
			$data['title']='Login';
			$this->load->view("top_head.php",$data);
			$this->load->view("login");
			$this->load->view("footer.php");
		}
	}

	public function members(){
		$data['active']="1";
		$data['title']='Home';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_home.php");		
		$this->load->view("footer.php");
	}

	public function validate_credentials(){
		$this->load->model('model_users');

		if ($this->model_users->can_log_in()){
			return true;
		} else{
			$this->form_validation->set_message("validate_credentials","Incorrect username/password");
			return false;
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("site/home");
	}


	public function signup_validation(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[users.username]');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('cppassword','Confirm Password','required|trim|matches[password]');

		$this->form_validation->set_message("is_unique","That email address already exists.");


		if($this->form_validation->run()){
			$key = md5(uniqid());

			$this->load->library('email',array('mailtype'=>'html'));
			$this->load->model('model_users');

			$this->email->from('hello_kitty@goil.com',"bad_person");

			$this->email->to($this->input->post('email'));

			$this->email->subject("Confirm your account");

			$message = '<p>Thank you for signing up </p>';

			$message .= "<p><a href ='".base_url()."main/register_user/$key' >Click here </a> to confirm your account</p>";

			$this->email->message($message);

			if($this->model_users->add_temp_users($key)){
				if($this->email->send()){
					echo "This email has been sent";

					echo "<p><a href ='".base_url()."site/register_user/$key' >Click here </a> to confirm your account</p>";
				} else{
					echo "email failed";
				}
			}
			else{
				echo "problem adding to database";
			}
		}else{
			$data['active']="0";
			$data['title']='Login';
			$this->load->view("top_head.php",$data);
			$this->load->view("sign.php");
			$this->load->view("footer.php");
		}
	}



	public function register_user($key){

		$this->load->model('model_users');

		if ( $this->model_users->is_key_valid($key)){
			if($user = $this->model_users->add_user($key)){
				$data = array(
					'username' => $user,
					'is_logged_in' =>1
				);
				$this->session->set_userdata($data);
				redirect('site/home');
			} else {
				echo "failed to add user, please try again";
			}
		} else {
			echo "invalid key";
		}

	}
	// public function admin_panel(){
	// 	$data['active']="7";
	// 	$data['title']='Admin';
	// 	$data['add_event']='';
	// 	$this->load->view("top_head.php",$data);
	// 	$this->load->view("content_admin.php");		
	// 	$this->load->view("footer.php");
	// }

	public function add_event(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules('name','Heading','required|trim');
		$this->form_validation->set_rules('venue','Venue and timing','required|trim');
		$this->form_validation->set_rules('date','Date','required|trim');
		$this->form_validation->set_rules('time','Time','required|trim');
		if($this->form_validation->run()){
			$this->load->model('event');
			if($this->event->add_event()){
				$data['add_event']=true;
			}
			else{
				$data['add_event']=false;
			}
		}
		else{
			$data['add_event']='';
		}
		$data['active']="7";
		$data['title']='Admin';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_admin.php");
		$this->load->view("footer.php");


	}

	public function admin_panel_tutorial(){
		$data['active']="7";
		$data['title']='Admin';
		$data['add_tutorial']='';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_admin_tut.php");		
		$this->load->view("footer.php");
	}
	public function admin_panel_event(){
		$data['active']="7";
		$data['title']='Admin';
		$data['add_event']='';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_admin_eve.php");		
		$this->load->view("footer.php");
	}

	public function upload_file(){

		$this->load->library("form_validation");
		$this->form_validation->set_rules('title','Title','required|trim');
		$this->form_validation->set_rules('comment','Body','required|trim');
		if($this->form_validation->run()){
			if($_FILES['file']['tmp_name']){
				$uploaddir = "C:/Setup/xampp/htdocs/website_new/file/";
				$uploadfile = $uploaddir . basename($_FILES['file']['name']);
				if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
					$this->load->model("tutorial");
					$this->tutorial->add_tutorial($_FILES['file']['name']);
					$data['add_tutorial']=TRUE;
				}
				else
				{
					$data['add_tutorial']=FALSE;
				}
			}
			else{
				$this->load->model("tutorial");
				$this->tutorial->add_tutorial('');
				$data['add_tutorial']=TRUE;
			}
		}
		else
		{
			$data['add_tutorial']='';

		}
		$data['active']="2";
		$data['title']='Add Tutorial';
		$this->load->view("top_head.php",$data);
		$this->load->view("content_admin_tut.php");		
		$this->load->view("footer.php");
	}

	public function account($username){
		$data['active']="10";
		$data['title']='account_info';
		$data['username']=$username;
		$this->load->view("top_head.php",$data);
		$this->load->view("accountpage.php",$data);
		$this->load->view("footer.php");
	}

	public function updatedb($username)
	{
		$this->load->model('model_users');
		$this->model_users->updatedb();
		redirect('/site/account/'.$username);
		
	}

	public function update_codechef_database(){
		$this->load->model("codechef");
		$this->codechef->get_rank();
		redirect('site/admin_panel');
	}

	public function rm_admin($user){
		$this->load->model("model_users");
		$this->model_users->rm_admin($user);
		redirect('site/account/'.$user);
	}

	public function add_admin($user){
		$this->load->model("model_users");
		$this->model_users->add_admin($user);
		redirect('site/account/'.$user);
	}

	public function acc_deactivate($user){
		$this->load->model("model_users");
		$this->model_users->acc_deactivate($user);
		redirect('site/account/'.$user);
	}

	public function acc_activate($user){
		$this->load->model("model_users");
		$this->model_users->acc_activate($user);
		redirect('site/account/'.$user);
	}

	public function addpro()
	{
		$data['active']="3";
		$data['title']='Add Tutorial';
		$data['add_project']='';
		$this->load->view("top_head.php",$data);
		$this->load->view("addpro.php");		
		$this->load->view("footer.php");
	}

	public function pro_add()
	{

		$this->load->library("form_validation");
		$this->form_validation->set_rules('title','Title','required|trim');
		//$this->form_validation->set_rules('comment','Body','required|trim');
		if($this->form_validation->run()){
			$uploaddir = "C:/Setup/xampp/htdocs/website_new/project/";
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
			if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
				$this->load->model("project");
				$this->project->add_project($_FILES['file']['name']);
				$data['add_project']=true;
			}
			else
			{
				$data['add_project']=false;
			}
		}
		else
		{
			$data['add_project']='';

		}
		$data['active']="3";
		$data['title']='Add Project';
		$this->load->view("top_head.php",$data);
		$this->load->view("addpro.php");		
		$this->load->view("footer.php");
	}

}

