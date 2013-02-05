<?php

class Inventory_model extends CI_Model {
	
	function insert_record($item_number, $item_name, $item_descr){
			
		$insert_data = array(
      'item_no' => $item_number,
      'item_name' => $item_name,
    	'item_descr' => $item_descr, //provided hard coded value needs Mike's input on this
      );
	     	
      $this->db->set('time_created', 'NOW()', FALSE);	
      $insert_data = $this->db->insert('items', $insert_data);
      
      if($insert_data){
      	return $this->db->insert_id();
      }else {
      	return false;
      }
	
	}
	
	function get_inlist($limit, $offset)
	{
				
		$this->db->select();
		$this->db->where('in_or_out', TRUE); 
		$this->db->from('items');
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $offset);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) 
    {
    	foreach ($query->result() as $row) 
    	{
        $data[] = $row;
      }
    }
        
		return $data;
		
	}
	
	function get_outlist($limit, $offset)
	{
				
		$this->db->select();
		$this->db->where('in_or_out', FALSE); 
		$this->db->from('items');
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $offset);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) 
    {
    	foreach ($query->result() as $row) 
    	{
        $data[] = $row;
      }
    }
        
		return $data;
		
	}
	
	
	function get_incount()
	{
		
		$this->db->where('in_or_out', TRUE);
		$this->db->from('items');
 		$query = $this->db->count_all_results();
 		return $query;
		
	}
	
	function get_outcount()
	{
		
		$this->db->where('in_or_out', FALSE);
		$this->db->from('items');
 		$query = $this->db->count_all_results();
 		return $query;
		
	}
	
	
	function get_totalitems()
	{
		
 		$query = $this->db->count_all_results('items');
 		return $query;
	}
	
	function get_itembyid($item_id)
	{
		$query = $this->db->get_where('items', array('id' => $item_id), 1);
        if ($query->num_rows() === 1) 
        {
            return $query->row(); 
        }
        return NULL;
	}
	
	function update_item()
	{
					
		
			$data = array(
	
	    		'item_no' => $this->input->post('item_number'),
	    		'item_name' => $this->input->post('item_name'),
	        'item_descr' => $this->input->post('item_descr'),
	        'in_or_out' => $this->input->post('in_or_out'),
	        
	    		
			);
			$this->db->where('id', $this->input->post('item_id'));
			$update_data = $this->db->update('items', $data);
			return $update_data;
		
	}
}