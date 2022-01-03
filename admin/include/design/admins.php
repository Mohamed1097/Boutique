                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Admins</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Position</th>
                                            <th>Gender</th>
                                            <th>Control</th>
                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Position</th>
                                            <th>Gender</th>
                                            <th>Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $selectadmin='SELECT * FROM admin';
                                        $result = $conn->query($selectadmin);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?=$row['name']?></td>
                                            <td><?=$row['email']?></td>
                                            <td><?php
                                                $positionid=$row['position'];

                                                $selectpr="SELECT name FROM position WHERE  id = $positionid";
                                                $resultpr = $conn->query($selectpr);
                                                while ($rowpr = $resultpr->fetch_assoc()) {
                                                    echo $rowpr['name'];
                                                }
                                                
                                                
                                            ?></td>
                                            <td><?php
                                            $genderid=$row['gender'];
                                            if ($genderid=='1') {
                                                echo "Male";
                                            }
                                            else
                                            {
                                                echo "Female";
                                            }
                                            ?></td>
                                              <td>
                                                <?php
                                                   if ($power>"200"||$email==$row['email']) 
                                            {
                                                echo ' <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 cons">'.
                                                     '<a href="?do=editadmin&id='.$row['id'].'" class="btn btn-warning btn-circle">'.
                                        '<i class="fas fa-edit"></i>
                                    </a>
                                                </div>';
                                            }

                                                ?>
                                                <?php
                                                if ($email!=$row['email']&&$power>200) {
                                                    ?>
                                                       <button type="button" class="btn btn-danger btn-circle deleteadmin-btn" data-toggle="modal" data-target="#deleteadmin" data-id="<?=$row['id']?>">
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
                                <?php
                                    if ($power>"200") 
                                    {
                                        echo '<a href="?do=addadmin" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Admin</span>
                                    </a>';
                                        
                                    }


                                ?>
                                 
                            </div>
                        </div>
                    </div>