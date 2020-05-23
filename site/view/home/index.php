<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
    <ul class="nav nav-list">
        <?php
          foreach ($category as $category) {
        ?>
        <li><a href="shop" ><span class="icon-chevron-right"></span><?php echo htmlspecialchars($category->name_category, ENT_QUOTES, 'UTF-8');?></a></li>
        <?php } ?>
    </ul>
</div>

              <div class="well well-small alert alert-warning cntr">
                  <h2>50% Discount</h2>
                  <p>
                     only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
                  </p>
              </div>
            
            <ul class="nav nav-list promowrapper">
            <li>
              <div class="thumbnail">
                <a class="zoomTool" href="productdetails?id=22" title="add to cart"><span class="icon-search"></span> Xem ngay</a>
                <img src="img/png4.png" alt="bootstrap ecommerce templates">
                <div class="caption">
                  <h4><a class="defaultBtn" href="productdetails?id=22">XEM</a> <span class="pull-right">22<sup>đ</sup></span></h4>
                </div>
              </div>
            </li>
            <li style="border:0"> &nbsp;</li>
            <li>
              <div class="thumbnail">
                <a class="zoomTool" href="productdetails?id=23" title="add to cart"><span class="icon-search"></span> Xem ngay</a>
                <img src="img/png2.png" alt="shopping cart template">
                <div class="caption">
                  <h4><a class="defaultBtn" href="productdetails?id=23">XEM</a> <span class="pull-right">22<sup>đ</sup></span></h4>
                </div>
              </div>
            </li>
            <li style="border:0"> &nbsp;</li>
            <li>
              <div class="thumbnail">
                <a class="zoomTool" href="productdetails?id=24" title="add to cart"><span class="icon-search"></span> Xem ngay</a>
                <img src="img/png1.png" alt="bootstrap template">
                <div class="caption">
                  <h4><a class="defaultBtn" href="productdetails?id=24">XEM</a> <span class="pull-right">22<sup>đ</sup></span></h4>
                </div>
              </div>
            </li>
          </ul>

    </div>
    <div class="span9">
      <div class="well np">
        <div id="myCarousel" class="carousel slide homCar">
          <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($sliders as $slider) {
              $i++;
            ?>
            <div class="item <?php if($i == 1) echo "active" ?>">
              <img style="width:100%" src="<?php echo URL."public/". htmlspecialchars($slider->url_slider, ENT_QUOTES, 'UTF-8'); ?>" alt="bootstrap ecommerce templates">
              <div class="carousel-caption">
                <h4>Săn hàng trúng quà</h4>
                <p><span>Cơ hội trúng Iphone X</span></p>
              </div>
            </div>
            <?php } ?>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
      </div>


<?php
  $pro = array_chunk($newproduct,4);
?>
    <div class="well well-small">
    <h3>Sản phẩm mới </h3>
    <hr class="soften"/>
        <div class="row-fluid">
        <div id="newProductCar" class="carousel slide">
            <div class="carousel-inner">
              <?php
                foreach ($pro as $key => $value) {
              ?>
              <div class="item <?= $key ? '' : 'active' ?>">
                <ul class="thumbnails">
                  <?php
                    foreach ($value as $key1 => $a) {

                  ?>
                  <li class="span3">
                    <div class="thumbnail">
                        <a class="zoomTool" href="productdetails?id=<?php echo $a->id_product; ?>" title="Xem sản phẩm"><span class="icon-search"></span> Xem</a>
                        <a href="#" class="tag"></a>
                        <a href=""><img src="<?=$a->url_image ?>" alt="bootstrap-ring"></a>
                    </div>
                  </li>
                <?php } ?>
                </ul>
              </div>
            <?php }?>
           </div>
          <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
          </div>
          </div>
        <!-- <div class="row-fluid">
          <ul class="thumbnails">
            <li class="span4">
              <div class="thumbnail">

                <a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                <a href="product_details.html"><img src="assets/img/b.jpg" alt=""></a>
                <div class="caption cntr">
                    <p>Manicure & Pedicure</p>
                    <p><strong> $22.00</strong></p>
                    <h4><a class="shopBtn" href="#" title="add to cart"> Thêm vào giỏ </a></h4>
                    <div class="actionList">
                        <a class="pull-left" href="#">Add to Wish List </a>
                        <a class="pull-left" href="#"> Add to Compare </a>
                    </div>
                    <br class="clr">
                </div>
              </div>
            </li>
          </ul>
        </div> -->
    </div>
    <!--
    Featured Products
    -->
        <div class="well well-small">
          <h3><a class="btn btn-mini pull-right" href="shop" title="View more">Xem thêm <span class="icon-plus"></span></a> Sản phẩm nổi bật  </h3>
          <hr class="soften"/>
          <div class="row-fluid">
            <?php
            $item = array_chunk($featureitem, 3);
              foreach ($item as $key => $value) {

            ?>
          <ul class="thumbnails">
            <?php foreach ($value as $key1 => $val) {
              ?>
            <li class="span4">
              <div class="thumbnail">
                <a class="zoomTool" href="productdetails?id=<?php echo $val->id_product;?>" title="Xem sản phẩm"><span class="icon-search"></span> Xem</a>
                <a  href="productdetails?id=<?php echo $val->id_product;?>"><img src="<?=$val->url_image ?>" alt=""></a>
                <div class="caption">
                  <h5><?php echo $val->name_product;?></h5>
                  <h4>
                      <a class="shopBtn" href="javascript:void(0)" onclick="addCart(<?php echo $val->id_product ?>)" title="Thêm vào giỏ"><span class="icon-plus"></span> Thêm vào giỏ</a>
                      <span class="pull-right"><?php echo $val->price;?><sup>đ</sup></span>
                  </h4>
                </div>
              </div>
            </li>
            <?php } ?>
          </ul>
          <?php } ?>
    </div>
    </div>


    </div>
    </div>
<!--
Clients
-->
<section class="our_client">
    <hr class="soften"/>
    <h4 class="title cntr"><span class="text">Nhà cung cấp</span></h4>
    <hr class="soften"/>
    <div class="row">
        <div class="span2">
            <a href="javascript:void(0)"><img alt="" src="img/1.png"></a>
        </div>
        <div class="span2">
            <a href="javascript:void(0)"><img alt="" src="img/2.png"></a>
        </div>
        <div class="span2">
            <a href="javascript:void(0)"><img alt="" src="img/3.png"></a>
        </div>
        <div class="span2">
            <a href="javascript:void(0)"><img alt="" src="img/4.png"></a>
        </div>
        <div class="span2">
            <a href="javascript:void(0)"><img alt="" src="img/5.png"></a>
        </div>
        <div class="span2">
            <a href="javascript:void(0)"><img alt="" src="img/6.png"></a>
        </div>
    </div>
</section>
