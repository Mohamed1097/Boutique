<?php
if($power>200)
{
    ?>
    <form action="include/function/doaddcategory.php" method="post" >



    <label>Category:</label>
<input type="text" name="name" class="form-control" autofocus="">
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
                                        <span class="text">Add</span>
                                    </button>
        </div>
    <br>
    <br>







</form>
    <?php
}
?>

