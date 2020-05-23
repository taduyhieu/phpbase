<?php  
// echo("<pre>");
// print_r($_SESSION['user']);
// die();
?>
<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li><a href="home">Trang chủ</a> <span class="divider">/</span></li>
			<li class="active">Thông tin tài khoản</li>
		</ul>
		<div class="well well-small" id="cartList">
			<div class="well">
				<h3>Thông tin tài khoản</h3>
				<table class="table">
					<tr>
						<td>Tên tài khoản</td>
						<td><?php echo($_SESSION['user']->name_user); ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo($_SESSION['user']->mail_user); ?></td>
					</tr>
					<tr>
						<td>Số điện thoại</td>
						<td><?php echo($_SESSION['user']->phone_user); ?></td>
					</tr>
					<tr>
						<td>Địa chỉ</td>
						<td><?php 
					  		echo($_SESSION['user']->address_user);
					  		echo " ,<br> Xã: ". $ward->name_ward;
					  		echo " ,<br> Quận/Huyện: ".$district->name_district; 
					  		echo " ,<br> Tỉnh/Thành phố: ". $province->name_province;
					   	?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="span12">
		<div class="well">
			<h3>Lịch sử mua hàng</h3>

			<table class=" table table-hover">
				<thead>
					<tr>
						<th>Mã đơn hàng</th>
						<th>Tổng tiền</th>
						<th>Người nhận</th>
						<th>Địa chỉ nhận</th>
						<th>Số điện thoại</th>
						<th>Ngày đặt</th>
						<th>Tình trạng đơn</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					foreach ($order as $key => $value) {
						// echo "<pre>";
						// print_r($order);
						$temTime = strtotime($value->date_order);
                  		$value->date_order = date("d-m-Y",$temTime);
					?>
					<tr>
						<td> <?php echo "#". $value->id_order; ?></td>
						<td> <?php echo $value->total; ?></td>
						<td> <?php echo $value->name_receiver; ?></td>
						<td width="30%"> <?php echo $value->address_receiver; ?></td>
						<td> <?php echo $value->phone_receiver; ?></td>
						<td> <?php echo $value->date_order; ?></td>
						<td width="15%">
							<?php
			                  if (isset($value->status)){
			                    if($value->status == "1"){
			                      echo "Chưa thanh toán, chưa giao hàng";
			                    } else if($value->status == "2"){
			                      echo "Đã thanh toán, chưa giao hàng";
			                    } else if($value->status == "3"){
			                      echo "Đã xong";
			                    } else {
			                      echo "Hủy đơn";
			                    }
			                  }
                  			?>
                  	
                  		</td>
					</tr>
				<?php } ?>
				</tbody>

			</table>
</div>