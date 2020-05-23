<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
			 <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			 </a>
		  <div class="nav-collapse">
				<ul class="nav">
				 	<li  class="<?php if($this->url_active[2] == "" || $this->url_active[2] == "home") echo "active" ?>"><a href="home">Trang chủ</a></li>
				 	<li  class="<?php if($this->url_active[2] == "shop") echo "active" ?>"><a href="javascript:void(0)" onclick = "shop()">Cửa hàng</a></li>
					<li  class="<?php if($this->url_active[2] == "contact") echo "active" ?>"><a href="contact">Liên hệ với chúng tôi</a></li>
				</ul>
				<form class="navbar-search pull-left" method="POST">
				 	<input type="text" placeholder="Tìm kiếm" class="search-query span2" autofocus="true" name="key-search" id="key-search">
				 	<button type="submit" class="btn-search btn" id="btn-search" name = "search" value="search">Tìm kiếm</button>
				 	<!-- <input type="submit" value="Tìm Kiếm" class="btn-search btn" id="btn-search" name = "search"> -->
				</form>
				<ul class="nav pull-right">
					<?php 
						if(!isset($_SESSION['user'])){
					?>
					<li class=""><a  href="register"><span class="icon-user"></span> Đăng ký </a></li>
					<li class="dropdown">
						<a  href="login"><span class="icon-lock"></span> Đăng nhập </a>
						<?php }else {?>
								<li class=""><a  href="account"><span class="icon-user"></span> Tài khoản </a></li>
							<li class="dropdown">
								<a  href="logout" name="logout"><span class="icon-lock"></span> Đăng xuất </a>
							<?php } ?>
					</li>
				</ul>
		  </div>
		  
		</div>
	</div>
</div>