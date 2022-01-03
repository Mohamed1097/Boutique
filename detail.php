
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
                <script type="text/javascript">
    document.addEventListener('DOMContentLoaded',function()
    {
        

    });   
        </script>
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
                 color: black;
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
    <?php
    if (!isset($_GET['id'])) {
      ?>
      <h2>Not Found</h2>
      <?php
      # code...
    }
    else
    {
      ?>
      <div class="page-holder bg-light">
      <!-- navbar-->
      <?php
      include_once 'include\design\header.php';

      ?>
      <!--  Modal -->

      <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                  <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                    <?php
                    if(isset($_GET['id']))
                    {
                      $id=$_GET['id'];
                      $selectpro="SELECT * FROM product WHERE  id = $id";
                      $resultpro=$conn->query($selectpro);
                      $rowpro=$resultpro->fetch_assoc();
                      $catid=$rowpro['cat'];
                      $selectcat="SELECT * FROM cat WHERE  id = $catid";
                      $resultcat=$conn->query($selectcat);
                      $rowcat=$resultcat->fetch_assoc();
                      $images=explode('/', $rowpro['images']);
                      foreach ($images as $value) 
                      {
                        ?>
                        <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="admin/include/function/imgs/<?=$value?>" alt="..."></div>
                         <?php
                       } 
                       ?>
                      
                       <?php

                    }



                    ?>
                    
                    
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="owl-carousel product-slider" data-slider-id="1">
                    <?php
                    foreach ($images as $value) 
                      {
                        ?>
                        <a class="d-block" href="admin/include/function/imgs/<?=$value?>" data-lightbox="product" title="Product item 3"><img class="img-fluid" src="admin/include/function/imgs/<?=$value?>" alt="..."></a>
                        <?php
                      }



                    ?>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <ul class="list-inline mb-2">

                <li class="list-inline-item"><div><p style="margin: 0; font-size: 1.2em; font-weight: bold;">The Rate</p>
                      <i class="fas fa-star" style="font-size: 2em;color: gold;"></i><span style="font-size: 1.5em;"><?=$rowpro['rate']?></span></div></li>
                <li class="list-inline-item" style="margin-left: 10px;"><div><p style="margin: 0; font-size: 1.2em; font-weight: bold;">Your Rate</p>
                  <i <?php 
                      if (isset($_SESSION['userid'])) {
                        ?>
                        class="fas fa-star rate" data-toggle="modal" data-target="#ratepro"
                        <?php
                        # code...
                      }
                      else
                      {
                        ?>
                        class="fas fa-star" data-toggle="modal" data-target="#loginmodal"
                        <?php
                      }
                  ?> 

                  <?php
                    if(isset($_SESSION['userid']))
                    {
                      $proid=$rowpro['id'];
                      $res=$conn->query("SELECT rate FROM rating WHERE userid='$userid' and proid='$proid'");
                      $count = $res->num_rows;
                      if ($count>0) {
                        
                        echo 'style="font-size: 2em;color: rgb(87, 153, 239); cursor: pointer;"';
                      }
                      else
                      {
                        echo 'style="font-size: 2em;color: rgba(0, 0, 0,0.2); cursor: pointer;"';
                      }
                    }
                    else
                    {
                      echo 'style="font-size: 2em;color: rgba(0, 0, 0,0.2); cursor: pointer;"';
                    }
                    ?>
                   data-id=<?=$rowpro['id']?>></i><span style="font-size: 1.5em;">
                    <?php
                    if(isset($_SESSION['userid']))
                    {
                      $proid=$rowpro['id'];
                      $res=$conn->query("SELECT rate FROM rating WHERE userid='$userid' and proid='$proid'");
                      $count = $res->num_rows;
                      if ($count>0) {
                        $rate=$res->fetch_assoc();
                        echo $rate['rate'];
                      }
                    }



                    ?>
                  </span></div></li>
                
              </ul>
              
              <h1><?=$rowpro['name']?></h1>
              <p class="text-muted lead"><?=$rowpro['price']?><span> L.E</span></p>
              <p class="text-small mb-4"><?=$rowpro['content']?></p>
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                  <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                    <div class="quantity">
                      <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control border-0 shadow-0 p-0" type="number" value="1">
                      <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 pl-sm-0"><button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0 addtocart" data-id=<?=$rowpro['id']?>>Add to cart</button></div>
              </div><a class="btn btn-link text-dark p-0 mb-4" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a><br>
              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted">039</span></li>
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="shop.php?id=<?=$rowpro['cat']?>"><?=$rowcat['name']?></a></li>
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ml-2" href="#">Innovation</a></li>
              </ul>
            </div>
          </div>
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
            <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description </h6>
                <p class="text-muted text-small mb-0"><?=$rowpro['content']?></p>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
              <div class="p-4 p-lg-5 bg-white">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="media mb-3"><img class="rounded-circle" src="img/customer-1.png" alt="" width="50">
                      <div class="media-body ml-3">
                        <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                        <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                        <ul class="list-inline mb-1 text-xs">
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                        </ul>
                        <p class="text-small mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                    </div>
                    <div class="media"><img class="rounded-circle" src="img/customer-2.png" alt="" width="50">
                      <div class="media-body ml-3">
                        <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                        <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                        <ul class="list-inline mb-1 text-xs">
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                        </ul>
                        <p class="text-small mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- RELATED PRODUCTS-->
          <h2 class="h5 text-uppercase mb-4">Related products</h2>
          <div class="row">
            <!-- PRODUCT-->
            <?php
            $selectpro1="SELECT * FROM product WHERE  cat = $catid AND id <> $id LIMIT 4 ";
            $resultpro1=$conn->query($selectpro1);
            while ($rowpro1=$resultpro1->fetch_assoc()) 
            {
              ?>
              <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.php?id=<?=$rowpro1['id']?>"><img class="cover img-fluid w-100" src="admin/include/function/imgs/<?=$rowpro1['cover']?>" alt="..."></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                      <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addtocart" data-id=<?=$rowpro1['id']?>>Add to cart</button></li>
                      <li class="list-inline-item mr-0"><a class="details btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal" data-id='<?=$rowpro1['id']?>'><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="detail.php?id=<?=$rowpro1['id']?>"><?=$rowpro1['name']?></a></h6>
                <p class="small text-muted"><?=$rowpro1['price']?>L.E</p>
              </div>
            </div>
              <?php
            }


            ?>
            
           
          </div>
        </div>
      </section>
      <?php
        include_once 'include\design\footer.php';


        ?>
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
      <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
<div class="modal fade" id="ratemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: unset;">
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
<div class="modal fade" id="ratepro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: unset;">
      </div>
      <div class="modal-body" style="text-align: center;">
        <div class="stars">
          <i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='1'></i><i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='2'></i><i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='3'></i><i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='4'></i><i class="fas fa-star" style="font-size: 2em;color: rgba(0,0,0,0.2); cursor: pointer;" data-rate='5'></i>
        </div>
        <hr>
        <div class="btn btn-lg btn-dark ratepro" style="margin-top: 10px;">Rate</div>
        </div>
      
    </div>
  </div>
</div>
      <div class="event"></div>

      <?php
    }


    ?>
      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/lightbox2/js/lightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
      <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
      <script src="js/front.js"></script>
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
      let id;
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
      $('.ratepro').click(function(event)
       {
        if (rate!=undefined) 
        {
          $.post('include/function/addrate.php', {id,rate}, function(data)
           {
            document.querySelectorAll('ul.list-inline li div i')[1].style.color='#5799ef';
            document.querySelectorAll('ul.list-inline li div span')[1].textContent=rate;
            document.querySelectorAll('ul.list-inline li div span')[0].textContent=data;
          });
         $('#ratepro').modal('hide'); 
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
              if (document.querySelector('#ratemodal').style.display == 'none' && document.querySelector('#ratepro').style.display == 'none') 
              {
                for (var i = 0; i < stars.length; i++)
                 {
                    stars[i].style.color='rgba(0,0,0,0.2)';
                    rate=undefined;
                 }

              }
            },100)
            console.log(document.querySelectorAll('ul.list-inline li div i')[1]);
            document.querySelectorAll('ul.list-inline li div i')[1].addEventListener('click',function(event)
            {
              id=Number($(this).attr('data-id'));
            })
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
           
            

            
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </di
    v>
  </body>
</html>