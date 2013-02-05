<?php
class Inventory extends CI_Controller {

    function __construct() {
        parent::__construct();
 
    }
		
		
		//view for main/home
		function index()
		{
			
			$this->load->library('pagination');
    	$this->load->library('table');
			
			$this->load->model('inventory_model');
			
			$data['in_count'] = $this->inventory_model->get_incount();
			$data['out_count'] = $this->inventory_model->get_outcount();
			$data['total_items'] = $this->inventory_model->get_totalitems();
			
			 
  		$this->load->view('index', $data);
    }
		
		function in_list()
		{
				
			$this->load->library('pagination');
    	$this->load->library('table');
			
			$this->load->model('inventory_model');
			$data['in_count'] = $this->inventory_model->get_incount();
			
			
			//pagination config
    	$config['base_url'] = site_url('inventory/in_list');
      $config['total_rows'] = $data['in_count'];
      $config['per_page'] = 15;
      $config['num_links'] = 5;
      $config['cur_page'] = $this->uri->segment(3);
 			$config['uri_segment'] = 3;
 	    $config['page_query_string'] = FALSE;
      $config['full_tag_open'] = '<div id="pagination">';
      $config['full_tag_close'] = '</div>';
						
      $this->pagination->initialize($config);
    	
    	$data['rows'] = $this->inventory_model->get_inlist($config['per_page'], $this->uri->segment(3));
			
			
			$this->load->view('in_list', $data);

		}
		
		function out_list()
		{
				
			$this->load->library('pagination');
    	$this->load->library('table');
			
			$this->load->model('inventory_model');
			$data['out_count'] = $this->inventory_model->get_outcount();
			
			
			//pagination config
    	$config['base_url'] = site_url('inventory/out_list');
      $config['total_rows'] = $data['out_count'];
      $config['per_page'] = 15;
      $config['num_links'] = 5;
      $config['cur_page'] = $this->uri->segment(3);
 			$config['uri_segment'] = 3;
 	    $config['page_query_string'] = FALSE;
      $config['full_tag_open'] = '<div id="pagination">';
      $config['full_tag_close'] = '</div>';
						
      $this->pagination->initialize($config);
    	
    	$data['rows'] = $this->inventory_model->get_outlist($config['per_page'], $this->uri->segment(3));
			
			$this->load->view('out_list', $data);

		}
		
		//form for adding/creating record
		function create_record()
		{	
    	$this->load->view('create_record_form');
    }
		
		//process insert
		function insert_record()
		{
			
			$this->load->model('inventory_model');
					
	  	// validation
			$this->form_validation->set_rules('item_number', 'Item Number', 'trim|required|max_length[20]|xss_clean|strip_tags');
	    $this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|max_length[50]|xss_clean|strip_tags');
	    $this->form_validation->set_rules('item_descr', 'Item Description', 'trim|required|max_length[100]|xss_clean|strip_tags');

      if ($this->form_validation->run() == FALSE) 
      {
          //display errors back to the form page
          $this->load->view('create_record_form');
      } else 
      {

        	//pass inputs to variables
        	$item_number = $this->form_validation->set_value('item_number');
        	$item_name = $this->form_validation->set_value('item_name');
        	$item_descr = $this->form_validation->set_value('item_descr');
					
        	if ($this->inventory_model->insert_record($item_number, $item_name, $item_descr)) 
        	{
                
					//create record successfull - success page
        		echo 'insert success!';
        	}else{
        		echo 'insert failed';
        	}
        }
    }

		function edit_item()
		{
			$this->load->model('inventory_model');
			
			
				
			$item_id = $this->uri->segment(3);
			$data['row'] = $this->inventory_model->get_itembyid($item_id);
			$this->load->view('edit_item', $data);
		}
		
		function edititem_submit()
		{
			$this->load->model('inventory_model');
			
			if($this->input->post('update')){
				if ($this->inventory_model->update_item()) 
	     		{
	   			//edit successful
					redirect('inventory/index');
					}
			}elseif($this->input->post('delete')){
			//	echo 'delete';die();
				
				$this->db->where('id', $this->input->post('item_id'));
			//	echo $this->input->post('item_id'); die();
    		$this->db->delete('items');	
				redirect('inventory/index');
			
			}else{
				redirect('inventory/index');
			}	
			
		}
}