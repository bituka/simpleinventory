<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title>Home Page</title>
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
Inventory Counts	
<?php if($in_count): ?>	
<h2>
In:	<?php echo $in_count; ?>	
</h2>
<?php endif; ?>

<?php if($out_count): ?>	
<h2>
Out:	<?php echo $out_count; ?>	
</h2>
<?php endif; ?>

<?php if($total_items): ?>	
<h2>
Total:	<?php echo $total_items; ?>	
</h2>
<?php endif; ?>

</body>
</html>