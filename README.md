example use

    <?php 
	require_once ('pagination.php'); 
	$paginator = new paginate(); </br>
	$query = "SELECT * FROM products";      
	$data_per_Page=12; </br>
	$pageing = $paginator->paging($query,$data_per_Page); 
	$paginator->viewdata($pageing); 
	$paginator->paginglink($query,$data_per_Page); 
    ?> </br>
