   <?php
   session_start();
   include_once 'include\function\conn.php';
   if (!isset($_SESSION['login'])) {
    header("location:login.php");
       # code...
   }
   $url=$_SERVER['PHP_SELF'];
   $power=$_SESSION['power'];
   $email=$_SESSION['login'];
   $adminid=$_SESSION['adminid'];

   ?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item 
            <?php
            if($url=='/jumia/admin/index.php')
            {
                echo 'active';
            }
            ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            

            <!-- Heading -->
         

            <!-- Nav Item - Pages Collapse Menu -->
          

            <!-- Nav Item - Utilities Collapse Menu -->
        

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
          

            <!-- Nav Item - Charts -->
         

            <!-- Nav Item - Tables -->
            <li class="nav-item  <?php
            if($url=='/jumia/admin/tables.php')
            {
                echo 'active';
            }
            ?>">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item
            ?>">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>Boutique</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
     

        </ul>