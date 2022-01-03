<?php
if($power>200)
{
    $id=$_GET['id'];
	$select="SELECT * FROM cat WHERE id = $id";
    $result = $conn->query($select);
    
        ?>
    <form action="include/function/doeditcategory.php" method="post" >


        <input type="hidden" name="id" value="<?=$id?>">


    <label>Category:</label>
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
        <input type="text" name="name" class="form-control" value="<?=$row['name']?>">
        <?php
    }

    ?>

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

        <div >
            <a href="?show=categories" class="btn btn-secondary btn-icon-split">
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





