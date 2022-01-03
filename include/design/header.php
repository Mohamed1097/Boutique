      <?php
//     header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
// header('Cache-Control: no-store, no-cache, must-revalidate');
// header('Cache-Control: post-check=0, pre-check=0', FALSE);
// header('Pragma: no-cache');
      // error_reporting(0);
          session_start();
           # code...
         
         if (isset($_COOKIE['randomId'])) 
         {
          $cookie=$_COOKIE['randomId'];
         }
      include 'admin/include/function/conn.php';
         $url=$_SERVER['PHP_SELF'];

         $userid='';
         if (isset($_SESSION['userid'])) 
         {
          $userid=$_SESSION['userid'];
         }
         if (isset($_SESSION['userid'])&&isset($_COOKIE['randomId'])) 
         {
          $productid=array();
          $cartid=array();
          $q=array();
          $randomId=$_COOKIE['randomId'];
          setcookie('randomId',"",time()-(3600*24*30),'/');
          $update="UPDATE `cart` SET userid='$userid' WHERE userid='$randomId'";
          $query=$conn->query($update);
          if ($query) {
            $sql="SELECT * FROM cart WHERE userid = '$userid'";
            $resultsql=$conn->query($sql);
            while ($rowsql=$resultsql->fetch_assoc()) {
              array_push($productid, $rowsql['proid']);
              array_push($cartid, $rowsql['id']);
              array_push($q, $rowsql['quantity']);
             
            }
            for ($i=0; $i <count($productid) ; $i++) 
            {
              for ($j=0; $j <count($productid) ; $j++) 
              {
                if ($i!=$j && $productid[$i]==$productid[$j])
                 {
                  $orginalcartid=$cartid[$i];
                  $newQ=$q[$i]+$q[$j];
                  $deletedcart=$cartid[$j];
                  array_splice($productid, $j,1);
                  array_splice($cartid, $j,1);
                  array_splice($q, $j,1);
                  $updateQ="UPDATE `cart` SET quantity='$newQ' WHERE id='$orginalcartid'";
                  $conn->query($updateQ);
                  $conn->query("DELETE FROM `cart` WHERE id='$deletedcart'");


                 } 
                 # code...
               } 
              # code...
            }

          }
          else
          {
            echo "false";
          }

          
         }
   

      ?>
      <header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">Boutique</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php if($url=='/jumia/index.php')
{
  echo 'active';
}?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php if($url=='/jumia/shop.php')
{
  echo 'active';
}?>" href="shop.php">Shop</a>
                </li>
                <?php
                  if (isset($_SESSION['power'])) {
                    echo ' <li class="nav-item">
                 <a class="nav-link" href="admin/index.php">Dashboard</a>
                </li>';
                    # code...
                  }

                ?>
               
              </ul>
              <ul class="navbar-nav ml-auto"> 
          
                <li class="nav-item"><a class="nav-link <?php if($url=='/jumia/cart.php')
{
  echo 'active';
}?>" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray pronum">
<?php
if (isset($_SESSION['userid'])&&!isset($_COOKIE['randomId'])) 
{
  $countofpro="SELECT COUNT(id) as counter FROM cart WHERE userid='$userid'";
  $res=$conn->query($countofpro);
  $data=$res->fetch_assoc();
  ?>
  (<?=$data['counter']?>)</small></a></li>
  <?php
}
elseif(!isset($_SESSION['userid'])&&isset($_COOKIE['randomId']))
{
  $countofpro="SELECT COUNT(id) as counter FROM cart WHERE userid='$cookie'";
  $res=$conn->query($countofpro);
  $data=$res->fetch_assoc();
  ?>
  (<?=$data['counter']?>)</small></a></li>
  <?php
}
elseif(isset($_SESSION['userid'])&&isset($_COOKIE['randomId']))
{
  $countofpro="SELECT COUNT(id) as counter FROM cart WHERE userid='$userid'";
  $res=$conn->query($countofpro);
  $data=$res->fetch_assoc();
  ?>
  (<?=$data['counter']?>)</small></a></li>
  <?php
}
else
{
  ?>
(0)</small></a></li>
  <?php 
}



?>





                      
                
                <!-- <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li> -->
                  <?php
                  if (!isset($_SESSION['userid'])) {
                    ?>
                    <li class="nav-item"><a class="nav-link" href="login.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                    <?php
                    # code...
                  }
                  else
                  {
                    $name=$_SESSION['username'];
                    ?>
                     <li class="nav-item"><a class="nav-link" href="#"> <i class="fas fa-user-alt mr-1 text-gray"></i><?=$name?></a></li>
                     <li class="nav-item"><a class="nav-link" href="logout.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>logout</a></li>
                     <?php
                  }

                  ?>
                
              </ul>
            </div>
          </nav>
        </div>
      </header>