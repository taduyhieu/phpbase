<footer class="footer">
	<div class="row-fluid">
		<div class="span2">
			<h5>Tài khoản của bạn</h5>
			<a href="#">Thông tin</a><br>
			<a href="#">Lịch sử mua hàng</a><br>
		</div>
		<div class="span2">
			<h5>Về chúng tôi</h5>
			<a href="<?php echo URL ?>contact">Liên hệ</a><br>
			<a href="<?php echo URL ?>contact">Bản đồ</a><br>
			<a href="#">Giấy phép hoạt động</a><br>
		</div>
		<div class="span2">
			<h5>Gợi ý</h5>
			<a href="<?php echo URL ?>shop">Sản phẩm mới</a> <br>
			<a href="<?php echo URL ?>shop">Bán chạy</a><br>
			<a href="#">Nhà cung cấp</a><br>
		</div>
		<div class="span6">
			<h5>Thông tin thêm</h5>
			Mọi thắc mắc, hỏi đáp, khiếu nại, vui lòng liên hệ với chúng tôi qua địa chỉ email: support@gmail.com. Xin cảm ơn!
		</div>
	</div>
</footer>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing-1.3.min.js"></script>
<script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="js/shop.js"></script>
<script src="jquery-confirm/dist/jquery-confirm.min.js"></script>
<script>  
	function getList(id){
		$.post('<?php echo URL."shop" ?>/getList', {'id': id}, function(data) {
			$("#list").load("shop #list");
		});
	}
	function shop(){
		$.post('<?php echo URL."shop" ?>/unsetShop', {}, function(data) {
			window.location.href = "<?php echo URL.'shop' ?>"
		});
	}
	function isChecked(id){
			if($("#"+id).is(':checked')){
				userName = $("#userName").val();
				email = $("#email").val();
				mobile = $("#mobile").val();
				address = $("#address").val();

				$("#name_receive").val(userName);
				$("#phone_receive").val(mobile);
				$("#address_receive").val(address);
			}else{
				$("#name_receive").val("");
				$("#phone_receive").val("");
				$("#address_receive").val("");
			}
		}
	function downItem(id){
			quantity = $("#quantity_"+id).val();
			quantity =   parseInt(quantity) - 1;
			$("#quantity_"+id).val(quantity);
			$.post("<?php echo URL."cart/" ?>updateCart", {'id':id,'quantity':quantity}, function(data) {
				$("#cartList").load("cart #cartList");
				$("#cartBtn").load("home #cartNum");
			});
		}
	function upItem(id){
			quantity = $("#quantity_"+id).val();
			quantity =   parseInt(quantity) + 1;
			$("#quantity_"+id).val(quantity);
			$.post("<?php echo URL."cart/" ?>updateCart", {'id':id,'quantity':quantity}, function(data) {
				$("#cartList").load("cart #cartList");
			});
		}
	function deleteItem(id){
			$.post("<?php echo URL."cart/" ?>deleteCart", {'id':id}, function(data) {
				$("#cartList").load("cart #cartList");
				$("#cartBtn").load("home #cartNum");
			});
		}
	function getDistrict(id, tmp){
		$("#ward_user").html('<option value="">---Chọn---</option>');
		$.post("<?php echo URL."register/" ?>getdistrict", {'id':id, 'tmp':tmp}, function(data) {
			$("#district_user").html(data);
		});
	}
	function getWard(id, tmp){
		$.post('<?php echo URL."register/" ?>getward', {'id':id, 'tmp':tmp}, function(data) {
			$("#ward_user").html(data);
		});
	}	function addCart(id){
			$.post('<?php echo URL."cart/" ?>addCart', {'id': id}, function() {
				$.confirm({
					title: "Xác nhận",
				    content: "Thêm vào giỏ hàng thành công",
				    backgroundDismiss: true,
				    boxWidth: '20%',
    				useBootstrap: false,
    				autoClose: 'OK|3000',
				    buttons: {
				    	OK: {
				    		text: "OK",
				    		
				        },
				    }
			    });
			    $("#cartBtn").load("home #cartNum");
			});
		}
</script>
</body>
</html>