                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Seller</th>
                                            <th>Count</th>
                                            <th>Control</th>
                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Seller</th>
                                            <th>Count</th>
                                            <th>Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $selectpro='SELECT * FROM product';
                                        $result = $conn->query($selectpro);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?=$row['name']?></td>
                                            <td><?=$row['price']?></td>
                                            <td><?php
                                                $catid=$row['cat'];
                                                $selectcat="SELECT name FROM cat WHERE  id = $catid";
                                                $resultcat = $conn->query($selectcat);
                                                while ($rowcat = $resultcat->fetch_assoc()) {
                                                    echo $rowcat['name'];
                                                }
                                                
                                                
                                            ?></td>
                                                <td><?php
                                                $sellerid=$row['seller'];

                                                $selectseller="SELECT * FROM admin WHERE  id = $sellerid";
                                                $resultseller = $conn->query($selectseller);
                                                while ($rowseller = $resultseller->fetch_assoc()) {
                                                    echo $rowseller['name'];
                                                    $powerid=$rowseller['position'];
                                                $selectpower="SELECT power FROM position WHERE  id = $powerid";
                                                $resultpower=$conn->query($selectpower);
                                                $rowpower=$resultpower->fetch_assoc();
                                                

                                                }
                                                
                                                
                                            ?></td>
                                            <td><?=$row['count']?></td>
                                            <td>
                                                <?php
                                                if ($sellerid==$adminid) {
                                                    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 cons">
                                                     <a href="?do=editpro&id='.$row['id'].'" class="btn btn-warning btn-circle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                                </div>';                                                }

                                                ?>
                                                <?php
                                                if ($sellerid==$adminid||$power>$rowpower['power']) {
                                                    ?>
                                                    <button type="button" class="btn btn-danger btn-circle deletepro-btn" data-toggle="modal" data-target="#deletepro" data-id="<?=$row['id']?>">
                                                              <i class="fas fa-trash"></i>
                                                            </button>
                                                            <?php     
                                                                      }

                                                ?>

                                            </td>
                                           
                                        </tr>
                                        <?php
                                    }?>
                                    </tbody>
                                </table>
                                
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpro">
                                                              <i class="fas fa-plus"></i>
                                                              Add Product
                                                            </button>
                
                                     
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title delete-title">Adding Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body ">


<form>
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
        
      </div>
 
    </div>
  </div>
</div>
                    
