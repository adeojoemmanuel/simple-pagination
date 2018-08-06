<?php
	require_once ('pagination.php');
	$paginator = new paginate();
	$query = "SELECT * FROM products where description = 'mens wear'";       
	$data_per_Page=2;
	$pageing = $paginator->paging($query,$data_per_Page);
	$paginator->dataview($pageing);
	$paginator->paginglink($query,$data_per_Page); 
?>