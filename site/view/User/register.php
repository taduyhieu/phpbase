<div class="row">
    <div class="span12">
  <ul class="breadcrumb">
    <li><a href="home">Trang chủ</a> <span class="divider">/</span></li>
    <li class="active">Đăng ký</li>
  </ul>
  <h3>ĐĂNG KÝ TÀI KHOẢN</h3>  
  <hr class="soft"/>
  <div class="well">
    <form class="form-horizontal" method="post">
      <h3>Thông tin cá nhân</h3>
      <div class="control-group">
        <label class="control-label">Danh xưng <sup>*</sup></label>
        <div class="controls">
          <select class="span1" name="gender" id="gender">
            <option value="">-</option>
            <option value="1">Anh</option>
            <option value="0">Chị</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="name_user">Họ và tên <sup>*</sup></label>
        <div class="controls">
          <input type="text" id="name_user" name="name_user" placeholder="Họ và tên">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="phone_user">Số điện thoại <sup>*</sup></label>
        <div class="controls">
          <input type="text" id="phone_user" name="phone_user" placeholder="Số điện thoại">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="mail_user">Email <sup>*</sup></label>
        <div class="controls">
          <input type="text" id="mail_user" name="mail_user" placeholder="Email" value="<?php if(isset($_SESSION['register_mail'])) echo $_SESSION['register_mail']; unset($_SESSION['register_mail']); ?>">
        </div>
      </div>    
      <div class="control-group">
        <label class="control-label" for="password">Mật khẩu <sup>*</sup></label>
        <div class="controls">
          <input type="password" id="password" name="password" placeholder="Mật khẩu">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Ngày sinh <sup>*</sup></label>
        <div class="controls">
          <div class="form-group">
            <div class='input-group date' >
                <input type='date' id='birthday' name="birthday" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Địa chỉ <sup>*</sup></label>

        <div class="controls">
          <select class="span2" id="province_user" name="province_user" onchange="getDistrict(this.value, 0)" required = "true">
            <option value="">Thành phố</option>
            <?php foreach ($province as $province) {
               ?>
            <option value="<?php echo $province->id_province ?>"><?php echo $province->name_province; ?></option>
            <?php } ?>
          </select>
          <select class="span2" id="district_user" name="district_user" onchange="getWard(this.value, 0)"  required = "true">
            <option value="">Quận/Huyện</option>
          </select>
          <select class="span2" id="ward_user" name="ward_user">
            <option value="">Phường/Xã</option>
          </select> <br> <br>
          <input type="text" name="address_user" id="address_user" placeholder="Số nhà...">
          <input type="hidden" name="status" id="status" value="1">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <input type="submit" name="addNew" id="addNew" value="Đăng ký" class="exclusive shopBtn">
        </div>
      </div>
    </form>
  </div>
</div>
</div>