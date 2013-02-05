<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title>Create Record</title>
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
<h1>Insert Item</h1>
<?php echo validation_errors('<p class="error">'); ?>	
<?php echo form_open('inventory/insert_record'); ?>

<legend>Item Number</legend>
<?php echo form_input('item_number', set_value('item_number')); ?>
<br /><br />
<legend>Item Name</legend>
<?php echo form_input('item_name', set_value('item_name')); ?>
<br /><br />
<legend>Item Description(optional)</legend>
<?php echo form_textarea('item_descr', set_value('item_descr')); ?>
<br /><br />
<?php echo form_submit('submit', 'Submit');?>
<?php echo form_close();?>


</body>
</html>