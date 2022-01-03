

<form action="include/function/doaddnewproduct.php" method="post" enctype="multipart/form-data">
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
	<div  class="btn btn-primary btn-icon-split btn-lg cover">
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
<input type="text" name="name" class="form-control" autofocus="">
<br>
	<label>Price:</label>
<input type="number" name="price" class="form-control">		
<br>
<label>Content:</label>
<textarea name="content" class="form-control col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 300px;"></textarea>
<br>
<label>Count:</label>
<input type="number" name="count" class="form-control">		
<br>
<label>Category:</label>
<select name="cat" class="form-control">
	<?php
		$sql_cat="SELECT * FROM cat";
		$result_cat=$conn->query($sql_cat);
		while ($row_cat=$result_cat->fetch_assoc())
		 {
		 	?>
		 	<option value="<?=$row_cat['id'];?>"><?=$row_cat['name'];?></option>

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
                                        <span class="text">Add</span>
                                    </button>
		</div>
	<br>
	<br>







</form>