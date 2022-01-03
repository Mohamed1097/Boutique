<?php
$id=$_GET['id'];
$selectpro="SELECT * FROM product WHERE  id = $id";
$resultpro=$conn->query($selectpro);
$rowpro=$resultpro->fetch_assoc();


if ($_SESSION['adminid']==$rowpro['seller'])
{
	?>
	<label>Cover:</label>
	<br>
	<img src="include/function/imgs/<?=$rowpro['cover']?>" style="width: 300px;height: auto;" class="img-rounded img-responsive">
	<br><br>
	<label>Images:</label>
	
	





	<form  action="include/function/doeditproduct.php" method="post" enctype="multipart/form-data">
		<?php
			$imagenames=explode('/',$rowpro['images']);
			foreach ($imagenames as $value)
			{
				?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 tbs">
                         
                              <div class="card mb-4 py-3   ">
                                <div class="card-body">
                                    <img src="include/function/imgs/<?=$value?>" style="width: 300px;height:300px;">
                                    <br>
                                    <br>
      									<input class="form-check-inline" type="checkbox" value="<?=$value?>" name="deletedimages[]" style="width: 1rem;height: 1.25rem;">
      									<span class="btn btn-danger btn-icon-split" style="background-color: #e74a3b;border-color: #e74a3b;cursor: default;">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </span>
                                    
								  
      									
    										
                                </div>
                            </div>
                    </div>
				<?php
			}



		?>
		

		<br>
		<br>

		<?php
    if (isset($_GET["msg"])) {
    $msg=$_GET["msg"];
    echo '<br><span class="alert bg-danger alert-icon-split " style="color: #fff;">
                                        <span class="icon text-white-50">
                                        </span>
                                        <span class="text">'.$msg.'</span>
                                    </span>';
    # code...
}
?>
<br>
<br>
<
		<input type="hidden" name="id" value="<?=$id?>">
	<div class="btn btn-primary btn-icon-split btn-lg cover">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Cover</span>
                                    </div>
		<div  class="btn btn-primary btn-icon-split btn-lg images">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Images</span>
                                    </div>
<br>
<br>


	<label>Name:</label>
<input type="text" name="name" class="form-control"  value="<?=$rowpro['name']?>">
<br>
	<label>Price:</label>
<input type="number" name="price" class="form-control" value="<?=$rowpro['price']?>">		
<br>
<label>Content:</label>
<textarea name="content" class="form-control col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 300px;"><?=$rowpro['content']?></textarea>
<br>
<label>Count:</label>
<input type="number" name="count" class="form-control" value="<?=$rowpro['count']?>">		
<br>
<label>Category:</label>
<select name="cat" class="form-control">
	<?php
		$sql_cat="SELECT * FROM cat";
		$result_cat=$conn->query($sql_cat);
		while ($row_cat=$result_cat->fetch_assoc())
		 {
		 	?>
		 	<option <?php
		 			if ($row_cat['id']==$rowpro['cat']) {
		 				echo "selected";
		 				# code...
		 			}



		 	?> value="<?=$row_cat['id'];?>"><?=$row_cat['name'];?></option>

		 	<?php
		}


	  ?>
</select>
<br>


		<div >
			<a href="?show=products" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Cancel</span>
                                    </a>
                                    <button class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </button>
		</div>
	<br>
	<br>
</form>
<?php
}
?>




