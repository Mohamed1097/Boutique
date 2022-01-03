
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        a{
        color: unset;
        }
        .tbs,.cons{
            float: left;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
   <?php
   include 'include\design\menu.php';
   ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
              <?php
              include 'include\design\header.php';
              
              ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 tbs" >
                         <a href="?show=admins" class="col-12" style="<?php
                                    if (isset($_GET['show'])) {
                            if ($_GET['show']=='admins') {
                                 echo 'color: #4e73df;';
                            }

                               # code...
                           }
                           elseif (isset($_GET['do'])) {
                            if ($_GET['do']=='addadmin'||$_GET['do']=='editadmin') {
                               echo 'color: #4e73df;'; # code...
                            }
                               # code...
                           }
                        if (!isset($_GET['show'])&&!isset($_GET['do'])) {
                        echo 'color: #4e73df;';
                    } 
                  
                        ?>">
                              <div class="card mb-4 py-3   <?php
                      if (isset($_GET['show'])) {
                            if ($_GET['show']=='admins') {
                                 echo 'border-left-primary';
                            }

                               # code...
                           }
                       elseif (isset($_GET['do'])) {
                            if ($_GET['do']=='addadmin'||$_GET['do']=='editadmin') {
                               echo 'border-left-primary'; # code...
                            }
                               # code...
                           }

                    if (!isset($_GET['show'])&&!isset($_GET['do'])) {
                        echo 'border-left-primary';
                    } 
                    


                    ?>">
                                <div class="card-body">
                                    Admins
                                </div>
                            </div>
                        </a>
                    </div>
                       
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 tbs" >
                            <a href="?show=users" class="col-12" style="<?php
                        if ($_GET['show']=='users') {

                       echo 'color: #4e73df;';
                    }
                        ?>">
                            <div class="card mb-4 py-3 <?php
                             if ($_GET['show']=='users') {

                       echo 'border-left-primary';
                    }
                            ?>">
                                <div class="card-body">
                                    Users
                                </div>
                            </div>
                        </a>  
                        </div>
                        
                       <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 tbs">
                           <a href="?show=products" class="col-12" style="<?php
                           if (isset($_GET['show'])) {
                            if ($_GET['show']=='products') {
                                 echo 'color: #4e73df;';
                            }

                               # code...
                           }
                           elseif (isset($_GET['do'])) {
                            if ($_GET['do']=='addpro'||$_GET['do']=='editpro') {
                               echo 'color: #4e73df;'; # code...
                            }
                               # code...
                           }
                     
                        ?>">
                             
                             <div class="card mb-4 py-3  <?php
                                              if (isset($_GET['show'])) {
                            if ($_GET['show']=='products') {
                                 echo 'border-left-primary';
                            }

                               # code...
                           }
                           elseif (isset($_GET['do'])) {
                            if ($_GET['do']=='addpro'||$_GET['do']=='editpro') {
                               echo 'border-left-primary'; # code...
                            }
                               # code...
                           }
                                             ?>" >
                                <div class="card-body">
                                    Products
                                </div>
                            </div>
                        </a>  
                       </div> 
                         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 tbs" >
                             <a href="?show=categories" class="col-12" style="<?php
                      if (isset($_GET['show'])) {
                            if ($_GET['show']=='categories') {
                                 echo 'color: #4e73df;';
                            }

                               # code...
                           }
                       elseif (isset($_GET['do'])) {
                            if ($_GET['do']=='addcat'||$_GET['do']=='editcat') {
                               echo 'color: #4e73df;'; # code...
                            }
                               # code...
                           }

                           
                             ?>">
                              <div class="card mb-4 py-3 <?php
                              if (isset($_GET['show'])) {
                            if ($_GET['show']=='categories') {
                                 echo 'border-left-primary';
                            }

                               # code...
                           }
                       elseif (isset($_GET['do'])) {
                            if ($_GET['do']=='addcat'||$_GET['do']=='editcat') {
                               echo 'border-left-primary'; # code...
                            }
                               # code...
                           }

                  
                            ?>">
                                <div class="card-body">
                                    Categories
                                </div>
                            </div>
                        </a>
                         </div>
                            
                    
                   

                    <!-- DataTales Example -->
                    <?php
                    if (isset($_GET['show'])) {
                        if ($_GET['show']=='admins') {

                       include 'include\design\admins.php';
                    }
                     elseif ($_GET['show']=='users') {
                        
                       include 'include\design\users.php';
                    }
                       elseif ($_GET['show']=='products') {
                        
                       include 'include\design\products.php';
                    }
                    elseif ($_GET['show']=='categories') {
                        
                       include 'include\design\categories.php';
                    }
                   

                    }
                    elseif (!isset($_GET['do']))
                    {
                        include 'include\design\admins.php';
                    }
                  
                    if (isset($_GET['do'])) {
                        if ($_GET['do']=='addpro') 
                        {
                            include 'include\design\addnewproduct.php';
                        }
                        elseif ($_GET['do']=='editpro') {
                            include 'include\design\editproduct.php';
                            # code...
                        }
                        elseif ($_GET['do']=='addcat') {
                            include 'include\design\addcategory.php';
                            # code...
                        }
                        elseif ($_GET['do']=='editadmin') {
                            include 'include\design\editadmin.php';
                            # code...
                        }
                        elseif ($_GET['do']=='addadmin') {
                            include 'include\design\addadmin.php';
                            # code...
                        }
                        elseif ($_GET['do']=='editcat') {
                            include 'include\design\editcat.php';
                            # code...
                        }

                    }
                
                   
                    

                    ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" <?php
            if (!isset($_GET['show'])) 
            {
              ?>
              id='deleteadmin'
              <?php
            }
          elseif (isset($_GET['show'])) 
          {
                        if ($_GET['show']=='admins') {

                       ?>
                       id='deleteadmin'
                       <?php
                    }

                       elseif ($_GET['show']=='products') {
                        ?>
                        id='deletepro'
                        <?php
                    }
                    elseif ($_GET['show']=='categories') {
                        ?>
                       id='deletecat'
                       <?php
                    }
                   
                    }
?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title delete-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body delete-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger <?php 
        if (!isset($_GET['show'])) 
            {
              
              echo 'confirm-deleteadmin';
              
            }
          elseif (isset($_GET['show'])) 
          {
                        if ($_GET['show']=='admins') {

                       
                       echo 'confirm-deleteadmin';
                       
                    }

                       elseif ($_GET['show']=='products') {
                        
                        echo 'confirm-deletepro';
                        
                    }
                    elseif ($_GET['show']=='categories') {
                        
                       echo 'confirm-deletecat';
                       
                    }
                   
                    }
        ?>" data-dismiss="modal">Confirm</button>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
        <script type="text/javascript">
        var cheak=0;
                $(".cover").click(function () 
{
    if (cheak==0) 
    {
        $(".cover").after('<input type="file" name="cover" style="display: none;" class="coverimg" accept="image/*">');
    cheak=1;
    }
    
    $(".coverimg").click();

});
                var cheakitem=0;
         $(".images").click(function () 
            {
    if (cheakitem==0) {
        $(".images").after('<input type="file" name="imgs[]" style="display: none;" class="imgs" accept="image/*" multiple>');
    cheakitem=1;
    }
    
    $(".imgs").click();

});
    let deleteElement;
    let id;
    let deleteBtn=document.querySelectorAll('tr td .btn-danger');
    for (var i = 0; i < deleteBtn.length; i++) {
      let dataId=deleteBtn[i].getAttribute('data-id');
      let random=Math.floor(Math.random() * 10000000)
      if (random<1000000) {
        random+=1000000
      }
      dataId=`${random}${dataId}`
      deleteBtn[i].setAttribute('data-id',dataId);

    }
        let addAdminBtn=document.querySelectorAll('tr td .addadmin-btn');
    for (var i = 0; i < addAdminBtn.length; i++) {
      let dataId=addAdminBtn[i].getAttribute('data-id');
           let random=Math.floor(Math.random() * 10000000)
      if (random<1000000) {
        random+=1000000
      }
      dataId=`${random}${dataId}`
      addAdminBtn[i].setAttribute('data-id',dataId);

    }

   $('.deletepro-btn').click(function(event) {
       deleteElement=this.parentElement.parentElement
       id=this.getAttribute('data-id').slice(7);
       console.log(id);
       let deletetitle=`Deleteing ${deleteElement.firstElementChild.textContent}`
       $('#deletepro .delete-title').html(deletetitle);
       let deletebody=`Are You Sure You Wanna Delete ${deleteElement.firstElementChild.textContent}`
       $('#deletepro .delete-body').text(deletebody);
   });
   $('.confirm-deletepro').click(function(event) 
   {
    deleteElement.remove();
    $.post('include/function/deletepro.php', {id}, function(data) 
    {
      console.log(data)
      /*optional stuff to do after success */
    });
   });
     $('.deleteadmin-btn').click(function(event) {
       deleteElement=this.parentElement.parentElement
       console.log(deleteElement)
       id=this.getAttribute('data-id').slice(7);
       console.log(id);
       let deletetitle=`Deleteing ${deleteElement.querySelectorAll('td')[0].textContent}`
       $('#deleteadmin .delete-title').html(deletetitle);
       let deletebody=`Are You Sure You Wanna Delete ${deleteElement.querySelectorAll('td')[0].textContent},`
       $('#deleteadmin .delete-body').text(deletebody);
       $('#deleteadmin .delete-body').append('<br><br>')
       let ps=document.createElement('p')
       ps.textContent=`PS:All Products Which ${deleteElement.querySelectorAll('td')[0].textContent} Uploaded Will Be Removed As Well`
       document.querySelector('#deleteadmin .delete-body').appendChild(ps);
   });
   $('.confirm-deleteadmin').click(function(event) 
   {
    deleteElement.remove();
    $.post('include/function/deleteadmin.php', {id}, function(data) 
    {
      console.log(data)
    });
   });
        $('.deletecat-btn').click(function(event) {
               deleteElement=this.parentElement.parentElement
               id=this.getAttribute('data-id').slice(7);
               console.log(id);
               let deletetitle=`Deleteing ${deleteElement.querySelectorAll('td')[0].textContent}`
               $('#deletecat .delete-title').html(deletetitle);
               let deletebody=`Are You Sure You Wanna Delete ${deleteElement.querySelectorAll('td')[0].textContent},`
               $('#deletecat .delete-body').text(deletebody);
               $('#deletecat .delete-body').append('<br><br>')
               let ps=document.createElement('p')
               ps.textContent=`PS:All Products in ${deleteElement.querySelectorAll('td')[0].textContent} Will BE Removed As Well`
               document.querySelector('#deletecat .delete-body').appendChild(ps);
           });
           $('.confirm-deletecat').click(function(event) 
           {
            deleteElement.remove();
            $.post('include/function/deletecat.php', {id}, function(data) 
            {
              console.log(data)
              /*optional stuff to do after success */
            });
   });
           $('tr td .addadmin-btn').click(function(event) 
           {

           });

           for (var i = 0; i < addAdminBtn.length; i++) {
             let addadmin=addAdminBtn[i];
             addadmin.addEventListener('click',function(){
               id=this.getAttribute('data-id').slice(7);
               let position=this.parentElement.parentElement.querySelector('select').value;
                $.post('include/function/getuser.php', {id}, function(data)
              {

              data=data.split('/');
              let name=data[0];
              let email=data[1];
              let password=data[2];
              let gender=data[3];
              $.post('include/function/doaddadmin.php', {id,name,email,password,gender,position}, function(data) {
                console.log(data);
                location.href='tables.php';
                
              });
                });
             })
           }
           $('form').on('submit' , function(e){
 e.preventDefault();

 $.ajax({
   url : 'include/function/doaddnewproduct.php' ,
   method : 'post' ,
   data : new FormData(this) , 
   success : function(res) 
   {
    console.log(res=res.split('/'))
     let td=[];
    let tr=document.createElement('tr');
    for (var i = 1; i < res.length; i++) {
      td.push(document.createElement('td'))
      td[i-1].textContent=res[i];
      tr.appendChild(td[i-1]);
      }
        let dataId=res[0];
           let random=Math.floor(Math.random() * 10000000)
      if (random<1000000) {
        random+=1000000
      }
      dataId=`${random}${dataId}`
      

    


    
    tr.insertAdjacentHTML('beforeend',`<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 cons"><a href="?do=editpro&id=${res[0]}" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a></div><button type="button" class="btn btn-danger btn-circle deletepro-btn" data-toggle="modal" data-target="#deletepro" data-id="${dataId}"><i class="fas fa-trash"></i></button></td>`)
    document.querySelector('tbody').appendChild(tr);
    $('#addpro').modal('hide');
       $('.deletepro-btn').click(function(event) {
       deleteElement=this.parentElement.parentElement
       id=this.getAttribute('data-id').slice(7);
       console.log(id);
       let deletetitle=`Deleteing ${deleteElement.firstElementChild.textContent}`
       $('#deletepro .delete-title').html(deletetitle);
       let deletebody=`Are You Sure You Wanna Delete ${deleteElement.firstElementChild.textContent}`
       $('#deletepro .delete-body').text(deletebody);
   });
    
   } ,
   error : function (error) {
     switch(error.status) {
       case 404 :
         console.log(error.statusText);
         break;
       case 500:
         console.log(error.statusText);
         break;
     }
   } ,

   contentType : false ,
   processData  : false 

 })
})


</script>

</body>

</html>