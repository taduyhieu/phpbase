<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
    <ul class="nav nav-list">
        <?php
          foreach ($category as $key => $value) {
             
        ?>
        <li><a href="javascript:void(0)" onclick="getList(<?php echo $value->id_category ?>)"><span class="icon-chevron-right"></span><?php echo $value->name_category; ?></a></li>
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

          </ul>

    </div>
<div class="span9">
	<div class="well well-small">
		<h3>Sản phẩm </h3>
		<div class="row-fluid" id="list">
			<?php
				$s = array_chunk($_SESSION['shop'], 3);
				foreach ($s as $key => $value) {
            /*echo "<pre>";
            print_r($value);*/
				?>	
			<ul class="thumbnails">
				<?php 
					foreach ($value as $key1 => $val) {
						
				?>
				<li class="span4">
					<div class="thumbnail">
						<a href="product_details.html" class="overlay"></a>
						<a class="zoomTool" href="productdetails?id=<?php echo $val->id_product;?>" title="Xem sản phẩm"><span class="icon-search"></span> Xem</a>
						<a href="productdetails?id=<?php echo $val->id_product;?>"><img src="<?php echo htmlspecialchars($val->url_image, ENT_QUOTES, 'UTF-8');?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo htmlspecialchars($val->name_product, ENT_QUOTES, 'UTF-8');?></p>
							<p><strong> <?php echo htmlspecialchars($val->price, ENT_QUOTES, 'UTF-8');?><sup>đ</sup></strong></p>
							<h4><a class="shopBtn" href="javascript:void(0)" onclick="addCart(<?php echo $val->id_product ?>)" title="Thêm vào giỏ"><span class="icon-plus"></span> Thêm vào giỏ </a></h4>
							
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