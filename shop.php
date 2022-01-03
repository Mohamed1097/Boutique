<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique | Ecommerce bootstrap template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        
        <style type="text/css">
            .added
          {
              margin-bottom: 60px;
              z-index: 999999999;
          }
          .event
              {
                 width: 100vw;
                 height: 100vh;
                 background-color: rgba(0,0,0,0);
                 display: none;
                 justify-content:center;
                 align-items: flex-end;
                 font-size: 1em;
                 position: fixed;
                 top: 0;
                 z-index: 999999;
              }
          /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
        </style>
  </head>
  <body>
    <div class="page-holder">
      <?php
      include 'include/design/header.php';
      $selectcat='SELECT * FROM `cat`';
      $resultcat=$conn->query($selectcat);
      ?>
      <!--  Modal -->
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
              <div class="col-lg-3 order-2 order-lg-1">
                <h5 class="text-uppercase mb-4">Categories</h5>
                <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Fashion &amp; Acc</strong></div>
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                  <li class="mb-2"><a class="reset-anchor" href="shop.php">All</a></li>
                  <?php
                   while ($rowcat=$resultcat->fetch_assoc()) 
                   {
                      ?>
                      <li class="mb-2"><a class="reset-anchor" href="?id=<?=$rowcat['id']?>"><?=$rowcat['name']?></a></li>
                      <?php
        
                                     } 



                  ?>
                </ul>
                <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase font-weight-bold">Health &amp; Beauty</strong></div>
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                  <li class="mb-2"><a class="reset-anchor" href="#">Shavers</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">bags</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Cosmetic</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Nail Art</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Skin Masks &amp; Peels</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Korean cosmetics</a></li>
                </ul>
                <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase font-weight-bold">Electronics</strong></div>
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal mb-5">
                  <li class="mb-2"><a class="reset-anchor" href="#">Electronics</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">USB Flash drives</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Headphones</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Portable speakers</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Cell Phone bluetooth headsets</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Keyboards</a></li>
                </ul>
                <h6 class="text-uppercase mb-4">Price range</h6>
                <div class="price-range pt-4 mb-5">
                  <div id="range"></div>
                  <div class="row pt-2">
                    <div class="col-6"><strong class="small font-weight-bold text-uppercase">From</strong></div>
                    <div class="col-6 text-right"><strong class="small font-weight-bold text-uppercase">To</strong></div>
                  </div>
                </div>
                <h6 class="text-uppercase mb-3">Show only</h6>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck1" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck1">Returns Accepted</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck2" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck2">Returns Accepted</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck3" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck3">Completed Items</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck4" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck4">Sold Items</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck5" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck5">Deals &amp; Savings</label>
                </div>
                <div class="custom-control custom-checkbox mb-4">
                  <input class="custom-control-input" id="customCheck6" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck6">Authorized Seller</label>
                </div>
                <h6 class="text-uppercase mb-3">Buying format</h6>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio1" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio1">All Listings</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio2" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio2">Best Offer</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio3" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio3">Auction</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio4" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio4">Buy It Now</label>
                </div>
              </div>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-small text-muted mb-0">Showing 1–12 of 53 results</p>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                      <li class="list-inline-item">
                        <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                          <option value="default">Default sorting</option>
                          <option value="popularity">Popularity</option>
                          <option value="low-high">Price: Low to High</option>
                          <option value="high-low">Price: High to Low</option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
              <?php
                  if (!isset($_GET['id'])) 
                  {
                    if (!isset($_GET['pagenum'])) {
                      $_GET['pagenum']=1;
                      $skip=0;
                      # code...
                    }
                    else
                    {
                      $skip=($_GET['pagenum']-1)*12;

                    }
                    $selectpro="SELECT * FROM product LIMIT 12 OFFSET $skip";
                    $resultpro=$conn->query($selectpro);
                    $selectpronum="SELECT COUNT(id) as counter FROM product";
                    $resultpronum=$conn->query($selectpronum);
                    $data=$resultpronum->fetch_assoc();
                    $prepage=$_GET['pagenum']-1;
                    $nextpage=$_GET['pagenum']+1;
                    $pagenum=ceil($data['counter']/12);
                   while ($rowpro=$resultpro->fetch_assoc()) {
                    ?>
                    <div class="col-lg-4  col-sm-6">
                    <div class="product text-center">
                      <div class="mb-3 position-relative">
                        <a class="d-block" href="detail.php?id=<?=$rowpro['id']?>"><img class="cover img-fluid w-100" src="admin/include/function/imgs/<?=$rowpro['cover']?>" alt="..."></a>
                        <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addtocart" data-id=<?=$rowpro['id']?>> Add to cart</button></li>
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark details" href="#productView" data-toggle="modal" class="prodata" data-id="<?=$rowpro['id']?>"><i class="fas fa-expand"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="detail.php?id=<?=$rowpro['id']?>"><?=$rowpro['name']?></a></h6>
                      <p class="small text-muted"><?=$rowpro['price']?>L.E</p>
                    </div>
                  </div>
                    <?php
        # code...
                              }


                    # code...
                  }
                  else
                  {
                    if (!isset($_GET['pagenum'])) {
                      $_GET['pagenum']=1;
                      $skip=0;
                    }
                    else
                    {
                      $skip=($_GET['pagenum']-1)*12;
                    }


                    $catid=$_GET['id'];
                    $selectpro="SELECT * FROM product WHERE  cat = $catid LIMIT 12 OFFSET $skip";
                    $resultpro=$conn->query($selectpro);
                    $selectpronum="SELECT COUNT(id) as counter FROM product WHERE  cat = $catid";
                    $resultpronum=$conn->query($selectpronum);
                    $data=$resultpronum->fetch_assoc();
                    $prepage=$_GET['pagenum']-1;
                    $nextpage=$_GET['pagenum']+1;
                    $pagenum=ceil($data['counter']/12);
                   while ($rowpro=$resultpro->fetch_assoc()) 
                   {  
                    ?>
                    <div class="col-lg-4  col-sm-6">
                    <div class="product text-center">
                      <div class="mb-3 position-relative">
                        <a class="d-block" href="detail.php?id=<?=$rowpro['id']?>"><img class="cover img-fluid w-100" src="admin/include/function/imgs/<?=$rowpro['cover']?>" alt="..."></a>
                        <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addtocart" data-id=<?=$rowpro['id']?>> Add to cart</button></li>
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark details" href="#productView" data-toggle="modal" class="prodata" data-id="<?=$rowpro['id']?>"><i class="fas fa-expand"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="detail.php?id=<?=$rowpro['id']?>"><?=$rowpro['name']?></a></h6>
                      <p class="small text-muted"><?=$rowpro['price']?>L.E</p>
                    </div>
                  </div>
                    <?php

                   }
                  }
                  


                  ?>
                </div>
                <!-- PAGINATION-->
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center justify-content-lg-end">
                    <li class="page-item">
                      <?php
                      if (!isset($_GET['id'])) 
                      {
                        if ($prepage<1)
                         {
                          ?>
                          <a class="page-link" href="?pagenum=1" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                          <?php

                          # code...
                        }
                        else
                        {
                          ?>
                          <a class="page-link" href="?pagenum=<?=$prepage?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                          <?php
                        }
                        # code...
                      }
                      else
                      {
                        if($prepage<1)
                        {
                          ?>
                          <a class="page-link" href="?pagenum=1&id=<?=$catid?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                          <?php
                        }
                        else
                        {
                          ?>
                           <a class="page-link" href="?pagenum=<?=$prepage?>&id=<?=$catid?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                          <?php
                        }
                      }




                      ?>

                      
                    <?php
                    if (!isset($_GET['id'])) {
                      
                 
                    for ($i=1; $i <=$pagenum ; $i++) 
                    {
                    ?>
                    <li class="page-item <?php
                    if(!isset($_GET['pagenum']))
                    {
                     echo 'active'; 
                    }

                   
                    elseif(isset($_GET['pagenum']))
                    {
                      if($_GET['pagenum']==$i)
                    {
                      echo 'active';
                    }
                    }
                    
                    ?>"><a class="page-link" href="?pagenum=<?=$i?>"><?=$i?></a></li>
                    <?php 
                      # code...
                    }

                    }
                    else
                    {

                    for ($i=1; $i <=$pagenum ; $i++) 
                    {
                    ?>
                    <li class="page-item <?php
                    if(!isset($_GET['pagenum']))
                    {
                     echo 'active'; 
                    }

                   
                    elseif(isset($_GET['pagenum']))
                    {
                      if($_GET['pagenum']==$i)
                    {
                      echo 'active';
                    }
                    }

                    ?>"><a class="page-link" href="?id=<?=$catid?>&pagenum=<?=$i?>"><?=$i?></a></li>
                    <?php 
                      # code...
                    }
                    }

                     


                    ?>
                    
                    <li class="page-item">
                      <?php
                      if (!isset($_GET['id'])) 
                      {
                        if ($nextpage>$pagenum)

                         {
                          ?>
                          <a class="page-link" href="?pagenum=<?=$pagenum?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                          <?php

                          # code...
                        }
                        else
                        {
                          ?>
                         <a class="page-link" href="?pagenum=<?=$nextpage?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                         <?php 
                        }
                        # code...
                      }
                      else
                      {
                        if ($nextpage>$pagenum)
                         {
                          ?>
                          <a class="page-link" href="?pagenum=<?=$pagenum?>&id=<?=$catid?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                          <?php

                          # code...
                        }
                        else
                        {
                          ?>
                         <a class="page-link" href="?id=<?=$catid?>&pagenum=<?=$nextpage?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                         <?php 
                        }
                      }


                      ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php
      include 'include/design/footer.php';

      ?>
     <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You Must Login First
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="login.php">Login</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ratemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: unset;">
       <!--  <h5 class="modal-title" id="exampleModalLabel">Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body" style="text-align: center;">
        <div class="stars">
          <i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='1'></i><i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='2'></i><i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='3'></i><i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='4'></i><i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='5'></i>
        </div>
        <hr>
        <div class="btn btn-lg btn-dark ratebtn" style="margin-top: 10px;">Rate</div>
        </div>
      
    </div>
  </div>
</div>
      <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center"  data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
                <div class="col-lg-6">
                  <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="p-5 my-md-4">
                    <ul class="list-inline mb-2">
                     <li class="list-inline-item"><div><p style="margin: 0; font-size: 1.2em; font-weight: bold;">The Rate</p>
                      <i class="fas fa-star" style="font-size: 2em;color: gold;"></i><span style="font-size: 1.5em;"></span></div></li>
                <li class="list-inline-item" style="margin-left: 10px;"><div><p style="margin: 0; font-size: 1.2em; font-weight: bold;">Your Rate</p>
                  <i <?php 
                      if (isset($_SESSION['userid'])) {
                        ?>
                        class="fas fa-star rate" data-toggle="modal" data-target="#ratemodal"
                        <?php
                        # code...
                      }
                      else
                      {
                        ?>
                        class="fas fa-star" data-toggle="modal" data-target="#loginmodal"
                        <?php
                      }
                  ?> style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;"></i><span style="font-size: 1.5em;"></span></div></li>
                    </ul>
                    <h2 class="h4"></h2>
                    <p class="text-muted"></p>
                    <p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                    <div class="row align-items-stretch mb-4">
                      <div class="col-sm-7 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="number" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 pl-sm-0"><button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0 addtocart">Add to cart</button></div>
                    </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="event"></div>
      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/lightbox2/js/lightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
      <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
      <script src="js/front.js"></script>
      <!-- Nouislider Config-->
      <script>
        var range = document.getElementById('range');
        noUiSlider.create(range, {
            range: {
                'min': 0,
                'max': 2000
            },
            step: 5,
            start: [100, 1000],
            margin: 300,
            connect: true,
            direction: 'ltr',
            orientation: 'horizontal',
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
              to: function ( value ) {
                return '$' + value;
              },
              from: function ( value ) {
                return value.replace('', '');
              }
            }
        });
        
      </script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');


        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
    <script type="text/javascript">
            $('.details').click(function(event)
         {
           let name=this.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector('h6 a').textContent;
           let price=$(this).parent().parent().parent().parent().parent().find('p').html();
           document.querySelector('#productView h2').textContent=name
           document.querySelectorAll('#productView p')[2].textContent=price
           let cover=$(this).parent().parent().parent().parent().find('.cover').attr('src');
           let images=document.querySelector('#productView').firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.querySelectorAll('a');
           images[0].style.backgroundImage = `url(${cover})`;
           images[0].href=cover;
           images[0].title=name
          let id=$(this).data('id');
          $('#productView .btn-dark').attr('data-id',id);
          document.querySelectorAll('#productView .fa-star')[1].setAttribute('data-id', id);
          $.post('admin/include/function/selectpro.php', {id}, function(data) 
          {
              let imagesSrc=data.split('/');
              let content=imagesSrc[imagesSrc.length-3];
              let rate=imagesSrc[imagesSrc.length-2];
              let userrate=Number(imagesSrc[imagesSrc.length-1]);
              imagesSrc.pop();
              imagesSrc.pop();
              imagesSrc.pop();
              document.querySelectorAll('#productView p')[3].textContent=content;
              console.log(rate);
              console.log(userrate);
              document.querySelector('#productView ul li div span').textContent=rate;
              document.querySelectorAll('#productView p')[3].textContent=content;
              if(userrate>0)
              {
                document.querySelectorAll('#productView ul li div span')[1].textContent=userrate;
                document.querySelectorAll('#productView ul li div i')[1].style.color='#5799ef';
              }
              else
              {
                document.querySelectorAll('#productView ul li div span')[1].textContent="";
                document.querySelectorAll('#productView ul li div i')[1].style.color='rgba(0,0,0,0.2)';
              }
            for (let i = 1; i < images.length; i++)
            {
              for (var j = 0; j < imagesSrc.length; j++) {
                images[i].href=`admin/include/function/imgs/${imagesSrc[j]}`;
                images[i].title=name;
                imagesSrc.shift();
                break;
              }
            }
          });
        });
      $('.addtocart').click(function(event) {
        let id=$(this).data('id')
        if (this.parentElement.parentElement.querySelectorAll('input').length==0)
         {
        $.post('include/function/addtocart.php', {id}, function(data)
         {
          data= data.split('+')
          document.querySelector('.event').insertAdjacentHTML('beforeend',data[0]);
          document.querySelector('.event').style.display = 'flex';
          setTimeout(function(){
            document.querySelector('.added').remove();
            document.querySelector('.event').style.display = 'none';
          },800)
          if (data[1]==1) 
          {
            let num=$('.pronum').text();
             num=num.replace('(',"");
             num=num.replace(')',"");
             num=Number(num)+1;
             $('.pronum').text(`(${num})`);

          }
  
        });
        }
        else
        {
          let quantity=this.parentElement.parentElement.querySelector('input').value;
        $.post('include/function/addtocart.php', {id,quantity}, function(data)
         {
          data= data.split('+')
          document.querySelector('.event').insertAdjacentHTML('beforeend',data[0]);
          document.querySelector('.event').style.display = 'flex';
          setTimeout(function(){
            document.querySelector('.added').remove();
            document.querySelector('.event').style.display = 'none';
          },800)
          if (data[1]==1) 
          {
            let num=$('.pronum').text();
             num=num.replace('(',"");
             num=num.replace(')',"");
             num=Number(num)+1;
             $('.pronum').text(`(${num})`);

          }
  
        });

        }

      });
      let rate;
      var id;
      let stars=document.querySelectorAll('.stars i');
      $('.stars i').click(function(event) {
        rate=$(this).data('rate');
        for (var i = 0; i < stars.length; i++) {
          
            stars[i].style.color='rgba(0,0,0,.2)';
          
        }
        for (var i = 0; i < stars.length; i++) {
          if (stars[i].getAttribute('data-rate')<=rate) {
            stars[i].style.color='#5799ef';
          }
        }
      });
      $('.ratebtn').click(function(event)
       {
        if (rate!=undefined) 
        {
          $.post('include/function/addrate.php', {id,rate}, function(data)
           {

            document.querySelectorAll('#productView ul li div span')[0].textContent=data;
            document.querySelectorAll('#productView ul li div span')[1].textContent=rate;
            document.querySelectorAll('#productView ul li div i')[1].style.color='#5799ef';
          });
         $('#ratemodal').modal('hide'); 
        }
        
      });
      
      $('.rate').click(function(event) {
        id=Number($(this).attr('data-id'));
      });

     
          setInterval(function(){

              let quantity=document.querySelectorAll('div.quantity')
              for (let i = 0; i < quantity.length; i++) {
                quantity[i].querySelector('input').disabled=true;
                quantity[i].querySelector('input').style.backgroundColor = 'white'
                if (Number(quantity[i].querySelector('input').value)==1) {
                  quantity[i].querySelector('.dec-btn').style.display = 'none';
                }
                else if (Number(quantity[i].querySelector('input').value)>1) {
                   quantity[i].querySelector('.dec-btn').style.display = 'inline-block';
                }
                if (Number(quantity[i].querySelector('input').value)<1) {
                  quantity[i].querySelector('input').value=1;
                }
              }
              if (document.querySelector('#ratemodal').style.display == 'none') 
              {
                for (var i = 0; i < stars.length; i++)
                 {
                    stars[i].style.color='rgba(0,0,0,0.2)';
                    rate=undefined;
                 }

              }
           


            },100)

    </script>
  </body>
</html>