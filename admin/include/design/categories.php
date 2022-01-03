                   

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <?php
                                if ($power>"200")
                                {
                                    echo '<th>Control</th>';
                                }

                                ?>
                                            
                                           
                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <?php
                                if ($power>"200")
                                {
                                    echo '<th>Control</th>';
                                }

                                ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $select='SELECT * FROM cat';
                                        $result = $conn->query($select);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?=$row['name']?></td>

                                                  <?php
                                if ($power>"200")
                                {
                                    echo '<td>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 cons">
                                                     <a href="?do=editcat&id='.$row['id'].'" class="btn btn-warning btn-circle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                                </div>'
                                                ?>


                                                       <button type="button" class="btn btn-danger btn-circle deletecat-btn" data-toggle="modal" data-target="#deletecat" data-id="<?=$row['id']?>">
                                                              <i class="fas fa-trash"></i>
                                                            </button>
                                                            <?php
                                                
                                }

                                ?>
                             
                                        </tr>
                                        <?php
                                    }?>
                                    </tbody>
                                </table>
                                <?php
                                if ($power>"200")
                                {
                                    echo '<a href="?do=addcat" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Category</span>
                                    </a>';
                                }

                                ?>
                                   
                                  
                            </div>
                        </div>
                    </div>
                    <!-- Page level plugins -->
   