<?php
	class Tutorial extends CI_Model{
		public function add_tutorial($filename)
		{
			$data=array(
				'title' => htmlspecialchars($this->input->post('title')),
				'body' =>  $this->input->post('comment'),
				'filename' => $filename
				);
			$query=$this->db->insert('tutorial',$data);
			if($query){
				return true;
			}
			else
			{
				return false;
			}

		}
	}