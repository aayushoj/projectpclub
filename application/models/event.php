<?php
	class Event extends CI_Model{
		public function add_event(){
			$data = array(
				'name' => $this->input->post('name'),
				'venue' => $this->input->post('venue'),
				'about' => ($this->input->post('about')),
				'date' => ($this->input->post('date')),
				'time' => ($this->input->post('time')),

			);
			$query = $this->db->insert('events',$data);
			if($query){
				return true;
			} else{
				return false;
			}

		}
	}