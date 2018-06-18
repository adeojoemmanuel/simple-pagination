<?php
	require_once ('pagination.php');
	$paginator = new paginate();
	$query = "SELECT * FROM products";       
	$data_per_Page=12;
	$pageing = $paginator->paging($query,$data_per_Page);
	$paginator->viewdata($pageing);
	$paginator->paginglink($query,$data_per_Page); 
?>