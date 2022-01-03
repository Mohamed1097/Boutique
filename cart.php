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
        </style>
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <?php
      include_once 'include\design\header.php';

      ?>
      <?php
      if (!isset($_SESSION['userid'])&&!isset($_COOKIE['randomId']))
       {
        ?>
        <h2>There Is NO Product In Your Cart</h2>
        <?php
      }elseif(isset($_SESSION['userid'])&&!isset($_COOKIE['randomId']))
      {
        $selectcart="SELECT * FROM cart WHERE userid = '$userid'";
        $result = $conn->query($selectcart);
        $count = $result->num_rows ;
        ?>
            <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Cart</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
         <?php
         if ($count==0) 
         {
          ?>
          <h2>There is No Product in The Cart</h2>
           <?php
         }else
         {
          ?>
              <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                      <th class="border-0" scope="col"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row=$result->fetch_assoc())
                     {
                      $proid=$row['proid'];
                      $selectpro="SELECT * FROM product WHERE id = '$proid'";
                      $resultpro = $conn->query($selectpro);
                      $rowpro=$resultpro->fetch_assoc();
                      $totalprice=$rowpro['price']*$row['quantity'];
                     ?>
                     <tr>
                      <th class="pl-0 border-0" scope="row">
                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php?id=<?=$proid?>"><img src="admin/include/function/imgs/<?=$rowpro['cover']?>" alt="..." width="70"/></a>
                          <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php?id=<?=$proid?>"><?=$rowpro['name']?></a></strong></div>
                        </div>
                      </th>
                      <td class="align-middle border-0">
                        <p class="mb-0 small"><?=$rowpro['price']?>L.E</p>
                      </td>
                      <td class="align-middle border-0">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0" data-id=<?=$rowpro['id']?>><i class="fas fa-caret-left"></i></button>
                            <input class="form-control form-control-sm border-0 shadow-0 p-0" type="number" value="<?=$row['quantity']?>"/>
                            <button class="inc-btn p-0" data-id=<?=$rowpro['id']?>><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle border-0">
                        <p class="mb-0 small total"><?=$totalprice?>L.E</p>
                      </td>
                      <td class="align-middle border-0"><a class="reset-anchor bin" href="#" data-id=<?=$rowpro['id']?>><i class="fas fa-trash-alt small text-muted"></i></a></td>
                    </tr>
                    <?php
                    }


                    ?>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="checkout.html">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Cart total</h5>
                  <ul class="list-unstyled mb-0">
                 <!--    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$250</span></li> -->
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span class="totalprice">$250</span></li>
                    <li>
                      <form action="#">
                        <div class="form-group mb-0">
                          <input class="form-control" type="text" placeholder="Enter your coupon">
                          <button class="btn btn-dark btn-sm btn-block" type="submit"> <i class="fas fa-gift mr-2"></i>Apply coupon</button>
                        </div>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
          <?php
         }


         ?> 
      </div>
        <?php
      }
      elseif(!isset($_SESSION['userid'])&&isset($_COOKIE['randomId']))
      {
        $selectcart="SELECT * FROM cart WHERE userid = '$cookie'";
        $result = $conn->query($selectcart);
        $count = $result->num_rows ;
        ?>
                    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Cart</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
         <?php
         if ($count==0) 
         {
          ?>
          <h2>There is No Product in The Cart</h2>
           <?php
         }else
         {
          ?>
              <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                      <th class="border-0" scope="col"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row=$result->fetch_assoc())
                     {
                      $proid=$row['proid'];
                      $selectpro="SELECT * FROM product WHERE id = '$proid'";
                      $resultpro = $conn->query($selectpro);
                      $rowpro=$resultpro->fetch_assoc();
                      $totalprice=$rowpro['price']*$row['quantity'];
                     ?>
                     <tr>
                      <th class="pl-0 border-0" scope="row">
                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php?id=<?=$proid?>"><img src="admin/include/function/imgs/<?=$rowpro['cover']?>" alt="..." width="70"/></a>
                          <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php?id=<?=$proid?>"><?=$rowpro['name']?></a></strong></div>
                        </div>
                      </th>
                      <td class="align-middle border-0">
                        <p class="mb-0 small"><?=$rowpro['price']?>L.E</p>
                      </td>
                      <td class="align-middle border-0">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0" data-id=<?=$rowpro['id']?>><i class="fas fa-caret-left"></i></button>
                            <input class="form-control form-control-sm border-0 shadow-0 p-0" type="number" value="<?=$row['quantity']?>"/>
                            <button class="inc-btn p-0" data-id=<?=$rowpro['id']?>><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle border-0">
                        <p class="mb-0 small total"><?=$totalprice?>L.E</p>
                      </td>
                      <td class="align-middle border-0"><a class="reset-anchor bin" href="#" data-id=<?=$rowpro['id']?>><i class="fas fa-trash-alt small text-muted"></i></a></td>
                    </tr>
                    <?php
                    }


                    ?>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="checkout.html">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Cart total</h5>
                  <ul class="list-unstyled mb-0">
                 <!--    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$250</span></li> -->
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span class="totalprice">$250</span></li>
                    <li>
                      <form action="#">
                        <div class="form-group mb-0">
                          <input class="form-control" type="text" placeholder="Enter your coupon">
                          <button class="btn btn-dark btn-sm btn-block" type="submit"> <i class="fas fa-gift mr-2"></i>Apply coupon</button>
                        </div>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
          <?php
         }


         ?> 
      </div>
        <?php
      }
      



      ?>
     <?php
        include_once 'include\design\footer.php';


        ?>
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

        document.querySelector('.totalprice').textContent=`${getTotal()}L.E`
        function getTotal()
        {
          let tot=0;
          let totals=document.querySelectorAll('.total');
          for (var i = 0; i < totals.length; i++) {
            let total=Number(totals[i].textContent.replace('L.E',""))
            tot+=total;
            
          }
          return tot;

        }
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
              if (document.querySelectorAll('tr').length==1) {
                document.querySelector('table').remove();
                let h3=document.createElement('h3');
                h3.textContent="There Is No Product in Your Cart";
                document.querySelector('div.table-responsive').appendChild(h3);
                document.querySelector('.btn-outline-dark').style.display = 'none';
              }

            },100)
           $('.inc-btn').click(function(event)
             {
              let quantity=Number(this.parentElement.querySelector('input').value)+1;
              id=$(this).data('id');
              let parent=this.parentElement;
              let price=Number(parent.parentElement.parentElement.parentElement.querySelector('td p').textContent.replace('L.E',""))
              let total=quantity*price;
              parent.parentElement.parentElement.parentElement.querySelector('.total').textContent=`${total}L.E`;
              document.querySelector('.totalprice').textContent=`${getTotal()}L.E`;
              $.post('include/function/updatecart.php', {id,quantity}, function(data) {
                document.querySelector('.event').insertAdjacentHTML('beforeend',data);
                document.querySelector('.event').style.display = 'flex';
              });
              setTimeout(function()
              {
                document.querySelector('.added').remove();
                document.querySelector('.event').style.display = 'none';

              },800)

              
            });
                $('.dec-btn').click(function(event)
             {
              let quantity;
              if (Number(this.parentElement.querySelector('input').value)<=1) {
                let quantity=1;
              }
              else
              {
                quantity=Number(this.parentElement.querySelector('input').value)-1
              }
              
              id=$(this).data('id');
              let parent=this.parentElement;
              let price=Number(parent.parentElement.parentElement.parentElement.querySelector('td p').textContent.replace('L.E',""))
              let total=quantity*price;
              parent.parentElement.parentElement.parentElement.querySelector('.total').textContent=`${total}L.E`;
              document.querySelector('.totalprice').textContent=`${getTotal()}L.E`;
              $.post('include/function/updatecart.php', {id,quantity}, function(data) {
                document.querySelector('.event').insertAdjacentHTML('beforeend',data);
                document.querySelector('.event').style.display = 'flex';

              });
               setTimeout(function()
              {
                document.querySelector('.added').remove();
                document.querySelector('.event').style.display = 'none';

              },800)
              
            });
            $('.bin').click(function(event) {
              let tr=this.parentElement.parentElement;
              tr.remove();
              document.querySelector('.totalprice').textContent=`${getTotal()}L.E`;
              let id=$(this).data('id');
              $.post('include/function/deleteelementcart.php', {id}, function(data) {
                data=data.split("+");
                document.querySelector('.event').insertAdjacentHTML('beforeend',data[0]);
                document.querySelector('.event').style.display = 'flex';
               if (data[1]==1) {
                 let num=$('.pronum').text();
               num=num.replace('(',"");
               num=num.replace(')',"");
               num=Number(num)-1;
               $('.pronum').text(`(${num})`);
               }
              });
              setTimeout(function()
              {
                document.querySelector('.added').remove();
                document.querySelector('.event').style.display = 'none';

              },800)
            });
        
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>