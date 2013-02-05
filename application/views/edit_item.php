<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title>Edit Record</title>
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
<h1>Edit Item</h1>				
				
				<?php 
				//display errors
				echo validation_errors('<p class="error">');
			
				
				echo form_open('inventory/edititem_submit'); 
				echo form_hidden('item_id', $row->id);
				
				?>
				<legend>Item Number</legend>
				<?php echo form_input('item_number', $row->item_no); ?>
				<br /><br />
				<legend>Item Name</legend>
				<?php echo form_input('item_name', $row->item_name); ?>
				<br /><br />
				<legend>Item Description(optional)</legend>
				<?php echo form_textarea('item_descr', $row->item_descr); ?>
				<br /><br />
				<?php 
				echo form_label('In(1) or Out(0): ', 'in_or_out'); echo '<br />';
				$data = array(
		              'name'        => 'in_or_out',
		              'value'       => $row->in_or_out,
		              'maxlength'   => '1',
		              'size'        => '1',
		            );
				echo form_input($data); echo '<br />';
				?> 
				<br /><br />
			<?php	
				echo form_submit('update', 'Update'); echo '&nbsp';
				echo form_submit('delete', 'Delete'); echo '<br />';
				echo '<br />';
		    echo form_close();	
			?>
			

</body>
</html>