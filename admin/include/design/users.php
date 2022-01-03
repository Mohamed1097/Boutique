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
                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
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
                                            ?></td>
                                        </tr>
                                        <?php
                                    }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>