<div class="row">
	<div id="sidebar" class="span3">
		<div class="well well-small">
			<ul class="nav nav-list">
				<?php
					foreach ($category as $key => $value){
							
				?>
				<li><a href=""><span class="icon-chevron-right"></span><?php echo htmlspecialchars($category->name_category, ENT_QUOTES, 'UTF-8');?></a></li>
				<?php } ?>
			</ul>
		</div>

		<div class="well well-small alert alert-warning cntr">
			<h2>Giảm giá 50%</h2>
			<p>Khi đặt hàng online <br><br><a class="defaultBtn" href="#">Mua ngay </a>
			</p>
		</div>
		<ul class="nav nav-list promowrapper">
			<li>
				<div class="thumbnail">
					<a class="zoomTool" href="product_details.html" title="Xem ngay"><span class="icon-search"></span> XEM NGAY</a>
					<img src="img/bootstrap-ecommerce-templates.png" alt="bootstrap ecommerce templates">
					<div class="caption">
						<h4><a class="defaultBtn" href="product_details.html"> XEM NGAY</a> <span class="pull-right">$22.00</span></h4>
					</div>
				</div>
			</li>
			<li style="border:0"> &nbsp;</li>
			<li>
				<div class="thumbnail">
					<a class="zoomTool" href="product_details.html" title="Xem ngay"><span class="icon-search"></span> XEM NGAY</a>
					<img src="img/shopping-cart-template.png" alt="shopping cart template">
					<div class="caption">
						<h4><a class="defaultBtn" href="product_details.html"> XEM NGAY</a> <span class="pull-right">$22.00</span></h4>
					</div>
				</div>
			</li>
			<li style="border:0"> &nbsp;</li>
			<li>
				<div class="thumbnail">
					<a class="zoomTool" href="product_details.html" title="Xem ngay"><span class="icon-search"></span> XEM NGAY</a>
					<img src="img/bootstrap-template.png" alt="bootstrap template">
					<div class="caption">
						<h4><a class="defaultBtn" href="product_details.html"> XEM NGAY</a> <span class="pull-right">$22.00</span></h4>
					</div>
				</div>
			</li>
		</ul>
	</div>