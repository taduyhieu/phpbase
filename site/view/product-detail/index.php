<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
    <ul class="nav nav-list">
        <?php
          foreach ($category as $key => $value) {
          	
        ?>
        <li><a href=""><span class="icon-chevron-right"></span><?php echo htmlspecialchars($value->name_category, ENT_QUOTES, 'UTF-8');?></a></li>
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
          </ul>

    </div>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="<?php echo URL."home" ?>">Trang chủ</a> <span class="divider">/</span></li>
		<li><a href="shop">Sản phẩm</a> <span class="divider">/</span></li>
		<li class="active">Xem hàng</li>
	</ul>	
	<div class="well well-small">
		<div class="row-fluid">
			
			<div class="span5">
				<div id="myCarousel" class="carousel slide cntr">

					<div class="carousel-inner">
						
						<div class="item active">
							<a href="#"> <img src="<?= $productdetail->url_image ?>" alt="" style="width:100%"></a>
						</div>
						
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
				</div>
			</div>
			<div class="span7" style="margin-left: 10px;">
				<h3><?php echo $productdetail->name_product; ?></h3>
				<hr class="soft"/>
				
				<form class="form-horizontal qtyFrm"  method="post">
					
					<div class="control-group">
						<label class="control-label"><span>Giá: <?php echo $productdetail->price; ?><sup>đ</sup></span></label>
						
					</div>
					
					<div class="control-group">
						<label class="control-label"><span>Màu sắc:</span></label>
						<div class="controls">
							<select class="span11">
								<option>Đỏ</option>
								<option>Vàng</option>
								<option>Xanh</option>
							</select>
						</div>
					</div>
					
							<a href="javascript:void(0)" onclick="addCart(<?php echo $productdetail->id_product ?>)" class="shopBtn"><span class=" icon-shopping-cart"></span> Thêm vào giỏ</a>
						</form>
			</div>
				<hr class="softn clr"/>


				<ul id="productDetail" class="nav nav-tabs">
					<li class="active"><a href="#home" data-toggle="tab">Thông tin chi tiết</a></li>
					<li class=""><a href="#related" data-toggle="tab">Sản phẩm liên quan </a></li>
				</ul>
				<div id="myTabContent" class="tab-content tabWrapper">
					<div class="tab-pane fade active in" id="home">
						<h4>Thông tin sản phẩm</h4>
						<table class="table table-striped">
							<tbody>
								<tr class="techSpecRow"><td class="techSpecTD1">Màu sắc:</td><td class="techSpecTD2"></td></tr>
								<tr class="techSpecRow"><td class="techSpecTD1">Loại:</td><td class="techSpecTD2"><?php echo $cate->name_category; ?></td></tr>
								<tr class="techSpecRow"><td class="techSpecTD1">Thương hiệu:</td><td class="techSpecTD2"><?php echo $productdetail->name_brand; ?></td></tr>
							</tbody>
						</table>
						<p><?php echo $productdetail->description; ?></p>

					</div>
					<div class="tab-pane fade" id="related">
						<table class="table table-striped">
							
							<tbody>
								<?php foreach ($related as $key => $value) {
								# code...
							 ?>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><img src="<?php echo $value->url_image; ?>" alt="" width="20%"></td>
									<td class="techSpecTD2"><?php echo $value->name_product; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
			
		
	</div>
</div>
</div>
