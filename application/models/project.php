<?php
	class Project extends CI_Model{
		public function add_project($filename)
		{
			$data=array(
				'title' => $this->input->post('title'),
				'description' =>  $this->input->post('description'),
				'wiki' => $this->input->post('wiki'),
				'github' => $this->input->post('github'),
				'members' => $this->input->post('members'),
				'project_status' =>  $this->input->post('project_status'),
				'filename' => $filename
				);
			$query=$this->db->insert('project',$data);
			if($query){
				return true;
			}
			else
			{
				return false;
			}

		}
	}
	?>