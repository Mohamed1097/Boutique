<?php
if ($power>200) 
{
	
	?>
	                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Position</th>
                                            <th>Add Admin</th>
                                       		
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Position</th>
                                            <th>Add Admin</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $select='SELECT * FROM user';
                                        $result = $conn->query($select);
                                        while ($row = $result->fetch_assoc()) {
                                        		?>
       
                                        	<tr>
                                            <td><?=$row['name']?></td>
                                            <td><?=$row['email']?></td>
                                          
                                            <td><?php
                                            $genderid=$row['gender'];
                                            if ($genderid=='1') {
                                                echo "Male";
                                            }
                                            else
                                            {
                                                echo "Female";
                                            }
                                            ?>
                                            <td><select name="position" class="form-control">
                                            	<?php
                                                $skip=1;
                                            	$selectposition="SELECT * FROM position LIMIT 20 OFFSET $skip";
												$result_position=$conn->query($selectposition);
                                            	while ($rowposition=$result_position->fetch_assoc())
                                            	 {
                                            		?>
                                            		<option value="<?=$rowposition['id']?>"><?=$rowposition['name']?></option>
                                            		<?php
                                            	}



                                            	?>
                                            	
                                            </select></td>
                                            <td>
                                            	<button class="btn btn-primary btn-icon-split addadmin-btn" data-id='<?=$row['id']?>'>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Admin</span>
                                    </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
	

                                    ?>
                                        


                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   </div>
                   <?php 
}



?>