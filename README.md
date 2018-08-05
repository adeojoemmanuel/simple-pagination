example use

    <?php </br>
	require_once ('pagination.php'); </br>
	$paginator = new paginate(); </br>
	$query = "SELECT * FROM products";   </br>     
	$data_per_Page=12; </br>
	$pageing = $paginator->paging($query,$data_per_Page); </br>
	$paginator->viewdata($pageing); </br>
	$paginator->paginglink($query,$data_per_Page);  </br>
    ?> </br>
