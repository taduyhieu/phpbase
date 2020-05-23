<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li><a href="home">Trang chủ</a> <span class="divider">/</span></li>
			<li class="active">Thông tin thanh toán</li>
		</ul>
		<div class="well well-small" id="cartList" style="height: 450px">
			<form action="" method="post" class="span12">
				<div class="span6" style="margin: 0px;">
					<h3>Thông tin người mua hàng</h3>
					<?php  
					if(isset($_SESSION['user'])){
						$address = $_SESSION['user']->address_user;
						$address.=", xã ". $ward->name_ward;
						$address.=", huyện ". $district->name_district;
						$address.=", tỉnh/thành phố ". $province->name_province;
						?>
						<div class="form-group">
							<label for="userName">Họ và tên:</label>
							<input type="text" class="form-control" name="userName" id="userName" value="<?php echo $_SESSION['user']->name_user ?>" />
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['user']->mail_user ?>" />
						</div>
						<div class="form-group">
							<label for="mobile">Số điện thoại:</label>
							<input type="text" class="form-control" name=mobile"" id="mobile" value="<?php echo $_SESSION['user']->phone_user ?>" />
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ:</label>
							<textarea name="address" id="address" cols="20" rows="5" value="<?php echo $address ?>"><?php echo $address ?></textarea>
						</div>
						<?php } ?>					
						<div class="checkbox">
							<label>
								<input type="checkbox" name="isSame" id="isSame" onchange="isChecked(this.id)">Thông tin mua hàng và nhận hàng giống nhau
							</label>
						</div>
						<div class="form-group">
							<a href="cart" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Quay lại </a>
						</div>
					</div>

					<div class="span6" style="margin: 0px;">
						<h3>Thông tin người nhận hàng</h3>
						<div class="form-group">
							<label for="name_receive">Họ và tên:</label>
							<input type="text" class="form-control" id="name_receive" name="name_receive" placeholder="Tên" />
						</div>
					<!-- <div class="form-group">
						<label for="email">Email:</label>
					    <input type="text" class="form-control" name="email_receive" id="email_receive" value="" />
					</div> -->
					<div class="form-group">
						<label for="phone_receive">Số điện thoại:</label>
						<input type="text" class="form-control" id="phone_receive" name="phone_receive" placeholder="Điện thoại" />
					</div>

					<div class="form-group">
						<label for="address_receive">Địa chỉ:</label>

						<textarea name="address_receive" id="address_receive" cols="20" rows="5" ></textarea>
					</div>
				</div>
				<input type="submit" name="checkout" id="checkout" value="Thanh toán" class="exclusive shopBtn btn-large" style="margin-top: 90px">
			</form>
		</div>
	</div>
</div>