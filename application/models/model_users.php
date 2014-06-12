<?php
	class Model_users extends CI_Model{

		public function can_log_in(){

			$this->db->where("username",$this->input->post('username'));
			$this->db->where("password",md5($this->input->post('password')));

			$query = $this->db->get('users');

			if ($query->num_rows == 1){
				return true;
			} else{
				return false;
			}
		}

		public function add_temp_users($key){

			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'security_ques' => $this->input->post('security_ques'),
				'security_ans' => $this->input->post('security_ans'),
				'key' => $key
			);

			$query = $this->db->insert('temp_users',$data);

			if($query){
				return true;
			} else{
				return false;
			}

		}

		public function is_key_valid($key){
			$this->db->where('key', $key);

			$query = $this->db->get("temp_users");

			if($query->num_rows()== 1){
				return true;
			} else{
				return false;
			}
		}

		public function add_user($key){
			$this->db->where('key',$key);
			$temp_user = $this->db->get('temp_users');

			if($temp_user){
				$row = $temp_user->row();

				$data = array(
					'username'=>$row->username,
					'email'=>$row->email ,
					'password'=>$row->password,
					'security_ques'=>$row->security_ques,
					'security_ans'=>$row->security_ans,
					'admin'=>0,
					'activated'=> 1
				);

				$did_add_user = $this->db->insert('users',$data);
			}

			if($did_add_user){
				$this->db->where('key',$key);
				$this->db->delete('temp_users');
				return $data['username'];
			} else{
				return false;
			}
		}

		public function is_admin(){
			$this->db->where("username",$this->input->post('username'));
			$this->db->where("admin",'1');
			$query = $this->db->get('users');
			if ($query->num_rows == 1){
				return true;
			} else{
				return false;
			}
		}
	}