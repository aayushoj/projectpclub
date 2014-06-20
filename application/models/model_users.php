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
					'activated'=> 1,
					'photo' =>'id',
					'about_me' => '',
					'codechef' => '',
					'spoj' => '',
					'topcoder' => '',
					'website' => '',
					'name' => ''
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

		public function rm_admin($user){
			$this->db->where('username',$user);
			$data = array(
				'admin'=>0,
			);
			$this->db->update('users',$data);
		}

		public function add_admin($user){
			$this->db->where('username',$user);
			$data = array(
				'admin'=>1,
			);
			$this->db->update('users',$data);
		}

		public function acc_deactivate($user){
			$this->db->where('username',$user);
			$data = array(
				'activated'=>0,
			);
			$this->db->update('users',$data);
		}

		public function acc_activate($user){
			$this->db->where('username',$user);
			$data = array(
				'activated'=>1,
			);
			$this->db->update('users',$data);
		}

		public function updatepassword($input) {
     		$data = array(
               
               'password' =>$input['password'],
               'sequrity_ques' => $input['security_ques'],
               'security_ans' => $input['security_ans'],
            );

			$this->db->where('id', $input['id']);
			$verified=$this->db->where(md5('password'),$input['oldpassword']);
			if($verified)
			{
			 	$this->db->update('users', $data);
			}
		}



	}





	
		// public function add_user_forum($username){
		// 	function _hash_crypt_private($password, $setting, &$itoa64){
		// 		$output = '*';

		// 		// Check for correct hash
		// 		if (substr($setting, 0, 3) != '$H$' && substr($setting, 0, 3) != '$P$')
		// 		{
		// 			return $output;
		// 		}

		// 		$count_log2 = strpos($itoa64, $setting[3]);

		// 		if ($count_log2 < 7 || $count_log2 > 30)
		// 		{
		// 			return $output;
		// 		}

		// 		$count = 1 << $count_log2;
		// 		$salt = substr($setting, 4, 8);

		// 		if (strlen($salt) != 8)
		// 		{
		// 			return $output;
		// 		}

		// 		$hash = md5($salt . $password, true);
		// 		do
		// 		{
		// 			$hash = md5($hash . $password, true);
		// 		}
		// 		while (--$count);
		// 		$output = substr($setting, 0, 12);
		// 		$output .= _hash_encode64($hash, 16, $itoa64);

		// 		return $output;
		// 	}

		// 	function _hash_encode64($input, $count, &$itoa64){
		// 		$output = '';
		// 		$i = 0;

		// 		do
		// 		{
		// 			$value = ord($input[$i++]);
		// 			$output .= $itoa64[$value & 0x3f];

		// 			if ($i < $count)
		// 			{
		// 				$value |= ord($input[$i]) << 8;
		// 			}

		// 			$output .= $itoa64[($value >> 6) & 0x3f];

		// 			if ($i++ >= $count)
		// 			{
		// 				break;
		// 			}

		// 			if ($i < $count)
		// 			{
		// 				$value |= ord($input[$i]) << 16;
		// 			}

		// 			$output .= $itoa64[($value >> 12) & 0x3f];

		// 			if ($i++ >= $count)
		// 			{
		// 				break;
		// 			}

		// 			$output .= $itoa64[($value >> 18) & 0x3f];
		// 		}
		// 		while ($i < $count);

		// 		return $output;
		// 	}

		// 	function set_config($config_name, $config_value, $is_dynamic = false)
		// 	{
		// 		global $db, $cache, $config;

		// 		$sql = 'UPDATE ' . CONFIG_TABLE . "
		// 			SET config_value = '" . $db->sql_escape($config_value) . "'
		// 			WHERE config_name = '" . $db->sql_escape($config_name) . "'";
		// 		$db->sql_query($sql);

		// 		if (!$db->sql_affectedrows() && !isset($config[$config_name]))
		// 		{
		// 			$sql = 'INSERT INTO ' . CONFIG_TABLE . ' ' . $db->sql_build_array('INSERT', array(
		// 				'config_name'	=> $config_name,
		// 				'config_value'	=> $config_value,
		// 				'is_dynamic'	=> ($is_dynamic) ? 1 : 0));
		// 			$db->sql_query($sql);
		// 		}

		// 		$config[$config_name] = $config_value;

		// 		if (!$is_dynamic)
		// 		{
		// 			$cache->destroy('config');
		// 		}
		// 	}

		// 	function unique_id($extra = 'c')
		// 	{
		// 		static $dss_seeded = false;
		// 		global $config;

		// 		$val = $config['rand_seed'] . microtime();
		// 		$val = md5($val);
		// 		$config['rand_seed'] = md5($config['rand_seed'] . $val . $extra);

		// 		if ($dss_seeded !== true && ($config['rand_seed_last_update'] < time() - rand(1,10)))
		// 		{
		// 			set_config('rand_seed_last_update', time(), true);
		// 			set_config('rand_seed', $config['rand_seed'], true);
		// 			$dss_seeded = true;
		// 		}

		// 		return substr($val, 4, 16);
		// 	}


		// 	function _hash_gensalt_private($input, &$itoa64, $iteration_count_log2 = 6){
		// 		if ($iteration_count_log2 < 4 || $iteration_count_log2 > 31)
		// 		{
		// 			$iteration_count_log2 = 8;
		// 		}

		// 		$output = '$H$';
		// 		$output .= $itoa64[min($iteration_count_log2 + 5, 30)];
		// 		$output .= _hash_encode64($input, 6, $itoa64);

		// 		return $output;
		// 	}


		// 	function phpbb_hash($password){
		// 		$itoa64 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

		// 		$random_state = unique_id();
		// 		$random = '';
		// 		$count = 6;

		// 		if (($fh = @fopen('/dev/urandom', 'rb')))
		// 		{
		// 			$random = fread($fh, $count);
		// 			fclose($fh);
		// 		}

		// 		if (strlen($random) < $count)
		// 		{
		// 			$random = '';

		// 			for ($i = 0; $i < $count; $i += 16)
		// 			{
		// 				$random_state = md5(unique_id() . $random_state);
		// 				$random .= pack('H*', md5($random_state));
		// 			}
		// 			$random = substr($random, 0, $count);
		// 		}

		// 		$hash = _hash_crypt_private($password, _hash_gensalt_private($random, $itoa64), $itoa64);

		// 		if (strlen($hash) == 34)
		// 		{
		// 			return $hash;
		// 		}

		// 		return md5($password);
		// 	}
		// 	$this->db->where('username',$username);
		// 	$user = $this->db->get('users');
		// 	$row = $user->row();

		// 	$user_actkey = md5(rand(0, 100) . time());
		// 	$user_actkey = substr($user_actkey, 0, rand(8, 12));
		// 	$data2 =array(
		// 	    'username'              => $row->username,
		// 	    'username_clean'		=> $row->username, 	
		// 	    'user_password'         => phpbb_hash($row->password),
		// 	    'user_email'            => $row->email ,
		// 	    'group_id'              => (int) 4,
		// 	    'user_timezone'         => (float) '+5:30',
		// 	    'user_dst'              => 0,
		// 	    'user_lang'             => 'en',
		// 	    'user_type'             => 'USER_NORMAL',
		// 	    'user_actkey'           => $user_actkey,
		// 	    'user_regdate'          => time(),
		// 	    'user_inactive_reason'  => 'INACTIVE_REGISTER',
		// 	    'user_inactive_time'    => time(),
		// 		);
		// 	$db_b = $this->load->database('forum',TRUE);
		// 	$this->db_b->insert('phpbb_users',$data2);
		// }			