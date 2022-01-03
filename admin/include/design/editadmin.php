<?php
$id=$_GET['id'];
$select="SELECT * FROM admin WHERE id='$id' ";
$result=$conn->query($select);
$row=$result->fetch_assoc();



?>
<?php
if ($adminid==$id) {
    ?>
<form action="include/function/doeditadmin.php" method="post">


<input type="hidden" name="id" value="<?=$row["id"]?>">
    <label>Name:</label>
<input type="text" name="name" class="form-control" autofocus="" value="<?=$row["name"]?>">
<br>
    <label>Email:</label>
<input type="email" name="email" class="form-control" value="<?=$row["email"]?>">       
<br>
<label>Password:</label>
<input type="password" name="password" class="form-control" value="<?=$row["password"]?>">

<?php
if (isset($_GET["msg"])) {
    $msg=$_GET["msg"];
    echo '<br><div class="alert bg-danger alert-icon-split" style="color: #fff;">
                                        <span class="icon text-white-50">
                                        </span>
                                        <span class="text">'.$msg.'</span>
                                    </div>';
    # code...
}

  ?>
<br>
        <div >
            <a href="?show=admins" class="btn btn-secondary btn-icon-split">
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
elseif($_SESSION['power']>200)
{
    ?>
    <form method="post" action="include/function/doeditadmin.php">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <label>Position:</label>
       <select name="position" class="form-control">
    <?php
        $selectposition="SELECT * FROM position";
        $result_position=$conn->query($selectposition);
        while ($row_position=$result_position->fetch_assoc())
         {
            ?>
            <option <?php
            if ($row_position['id']==$row['position']) 
            {
                echo "selected";
                # code...
            }


            ?> value="<?=$row_position['id'];?>"><?=$row_position['name'];?></option>

            <?php
        }


      ?>
</select>
<br>
<br>
<div >
            <a href="?show=admins" class="btn btn-secondary btn-icon-split">
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

