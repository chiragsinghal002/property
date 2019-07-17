<?php
class Csv_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('cuisines_id', 'DESC');
		$query = $this->db->get('cuisines');
		return $query;
	}

	function insert($data)
	{
		
		$this->db->insert_batch('cuisines', $data);
	}
}
