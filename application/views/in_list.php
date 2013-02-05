<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title>In List Page</title>
	<link type="text/css" href="<?php echo base_url('css/style.css'); ?>" rel="Stylesheet" />

</head>
<body>
<section id="navigation">
	<?php echo anchor('inventory', 'Home'); ?>
	<?php echo anchor('inventory/create_record', 'Create Record'); ?>
	<?php echo anchor('inventory/in_list', 'In List'); ?>
	<?php echo anchor('inventory/out_list', 'Out List'); ?>
</section>
<br /><br />	

			<h3>Item List - IN</h3>
			<?php
				echo $this->table->set_heading('Item Number', 'Item Name', 'Item Description');
				if (isset($rows) && count($rows)): 
					foreach ($rows as $row) :
					$this->table->add_row(anchor('inventory/edit_item/'. $row->id, $row->item_no), $row->item_name, $row->item_descr);	
					endforeach;  
				else: ?>		
					<div id="blank">Error displaying the item or no item on the list.</div>
                <?php endif; 

                echo $this->table->generate(); 
            ?>
			<?php echo $this->pagination->create_links(); ?>
			

</body>
</html>