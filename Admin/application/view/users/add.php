<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Thêm người dùng</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="user_name" class="col-sm-3 control-label">Tên đăng nhập</label>
            <div class="col-sm-9">
              <input class="form-control" id="name_user" name="name_user" type="text" required = "true">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input class="form-control" id="mail_user" name="mail_user" type="email" required = "true">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Mật khẩu</label>
            <div class="col-sm-9">
              <input class="form-control" id="password" name="password" type="password" required = "true">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Giới tính</label>
            <div class="col-sm-9">
              <label class="radio-inline"><input type="radio" id="male" name="gender" value="1" required = "true">Male</label>
              <label class="radio-inline"><input type="radio" id="female" name="gender" value="0" required = "true">Female</label>
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Số điện thoại</label>
            <div class="col-sm-9">
              <input class="form-control" name="phone_user" id="phone_user" type="text" required = "true">
            </div>
          </div>
          <div class="form-group">
            <label for="birthday" class="col-sm-3 control-label">Ngày sinh</label>
            <div class="col-sm-9">
              <input class="form-control" name="birthday" id="birthday" type="text" required = "true">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Địa chỉ</label>
            <div class="col-sm-9">
              <textarea name="address_user" id="address_user" rows="3" style="width: 100%; resize: none;" required = "true"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="province" class="col-sm-3 control-label">Tỉnh/Thành phố</label>
            <div class="col-sm-9">
                <select class="form-control" id="province_user" name="province_user" onchange="getDistrict(this.value, 0, 'district_user')" required = "true">
                  <option value="">---Chọn---</option>
                <?php  
                  foreach ($provinces as $province) {
                ?>
                  <option value="<?php echo htmlspecialchars($province->id_province, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($province->name_province, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="district_id" class="col-sm-3 control-label">Quận/Huyện</label>
            <div class="col-sm-9">
              <select class="form-control" id="district_user" name="district_user" onchange="getWard(this.value, 0, 'ward_user')"  required = "true">
                 <option value="">---Chọn---</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="ward" class="col-sm-3 control-label">Phường/Xã</label>
            <div class="col-sm-9">
              <select class="form-control" id="ward_user" name="ward_user" required = "true">
                <option value="">---Chọn---</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-9 checkbox">
              <input class="" id="status" name="status" type="checkbox" value="1" checked style="margin-left: 0px;">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Vai trò</label>
            <div class="col-sm-9">
              <label class="radio-inline"><input type="radio" id="user" name="role" value="0" required = "true" checked="">Người dùng</label>
              <label class="radio-inline"><input type="radio" id="admin" name="role" value="1" required = "true">Quản trị</label>
            </div>
          </div>
        </div>        
        <div class="box-footer">
          <div class="pull-right">
            <button type="Reset" class="btn btn-default">Đặt lại</button>
            <!-- <button type="submit" name="listU" id="listU" class="btn btn-default">List User</button> -->
            <button type="submit" name="addNew" id="addNew" class="btn btn-info">Thêm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>