<?php 
class Utility {

	protected $DBcon;

	public function __construct(){
		require  './dbcon.php';
 		$db = new dbconnect();
    	$this->DBcon = $db->connect();
	}

}

class paginate extends Utility{
	function __construct() {
		parent::__construct();
		require 'hashing.php';
	}

	public function dataview($query){
		$stmt = $this->DBcon->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0){
					 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
							?>
							<!-- <tr>
							<td><?php //echo $row['tuts_id']; ?></td>
							<td><?php //echo $row['tuts_title']; ?></td>
							<td><a href="<?php //echo $row['tuts_link']; ?>">Open</a></td>
							</tr> -->
							<?php
					 }
		}else{
					 ?>
					 <tr>
					 <td>No data in your DATABASE...</td>
					 </tr>
					 <?php
		}
	}

	public function paging($query,$data_per_Page){
			$starting_position=0;
			if(isset($_GET["page_no"])){
						$starting_position=($_GET["page_no"]-1)*$data_per_Page;
			}
			$query2=$query." limit $starting_position,$data_per_Page";
			return $query2;
	}

	public function paginglink($query,$data_per_Page){
		 $self = $_SERVER['PHP_SELF'];
		 $stmt = $this->DBcon->prepare($query);
		 $stmt->execute();
		 $total_no_of_records = $stmt->rowCount();
		 if($total_no_of_records > 0){
				 ?><tr><td colspan="3">
				 <?php
				 $whole_count_Of_Pages=ceil($total_no_of_records/$data_per_Page);
				 $current_page=1;
				 if(isset($_GET["page_no"])){
						$current_page=$_GET["page_no"];
				 }
				 if($current_page!=1){
						$previous =$current_page-1;
						echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
						echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
				 }
				 for($i=1;$i<=$whole_count_Of_Pages;$i++){
					if($i==$current_page){
							echo "<strong><a href='".$self."?page_no=".$i."' class='active'>".$i."</a></strong>&nbsp;&nbsp;";
					}else{
						 echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
				  }
				}
				if($current_page!=$whole_count_Of_Pages){
						$next=$current_page+1;
						echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
						echo "<a href='".$self."?page_no=".$whole_count_Of_Pages."'>Last</a>&nbsp;&nbsp;";
				}
					?></td></tr><?php
			}
	}
}