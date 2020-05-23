
<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li><a href="home">Trang chủ</a> <span class="divider">/</span></li>
			<li class="active">Giỏ hàng</li>
		</ul>
		<div class="well well-small" id="cartList">
			<h1>Giỏ hàng<small class="pull-right">  sản phẩm trong giỏ hàng </small></h1>
			<hr class="soften"/>

			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>Sản phẩm</th>
						<th>Thông tin</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Tổng</th>
					</tr>
				</thead>
				<tbody>
					<?php  
						if (isset($_SESSION['cart'])) {
							$subtotal = 0;
							foreach ($_SESSION['cart'] as $key => $value) {
					?>
					<tr>
						<td><img width="100" src="<?php echo $value["item"]->url_image ?>" alt=""></td>
						<td><?php echo $value["item"]->name_product ?></td>
						
						
						<td><?php echo $value["item"]->price ?></td>
						<td>
							<input class="span1" style="max-width:34px" placeholder="1"  size="16" type="text" id="quantity_<?php echo $key ?>" name="quantity_<?php echo $key ?>" autocomplete="off" value="<?php echo $value["quantity"] ?>">
							<div class="input-append">
								<a href="javascript:void(0)"  onclick="downItem(<?php echo $key ?>)" class="btn btn-mini" >-</a>
								<a href="javascript:void(0)"  onclick="upItem(<?php echo $key ?>)" class="btn btn-mini" > + </a>
								<a class="btn btn-mini btn-danger"  onclick="deleteItem(<?php echo $key ?>)" href="javascript:void(0)" type="button"><span class="icon-remove"></span></a>
							</div>
						</td>
						<td><?php echo $total =  $value["item"]->price*$value["quantity"]; ?></td>
					</tr>
						
					<?php $subtotal += $total;
					}?>
					<tr>
						<td colspan="4" class="alignR">Tổng tiền:</td>
						<td class=""><?php echo $subtotal;?> </td>
					</tr>
					<?php } ?>
				</tbody>
			</table><br/>
			<a href="shop" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Tiếp tục mua hàng </a>
			<?php if (isset($_SESSION['cart']) && $_SESSION['cart']!=null){
				?>
			<a href="<?php if(!isset($_SESSION['user'])){echo "login";}else {echo "checkout";} ?>" class="shopBtn btn-large pull-right">Tiếp theo <span class="icon-arrow-right"></span></a>
			<?php } ?>
			
		</div>
	</div>
</div>