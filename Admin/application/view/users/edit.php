<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa người dùng</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="name_user" class="col-sm-3 control-label">Tên đăng nhập</label>
            <div class="col-sm-9">
              <input class="form-control" id="name_user" name="name_user" type="text" required = "true" value="<?php echo htmlspecialchars($user[0]->name_user, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="mail_user" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input class="form-control" id="mail_user" name="mail_user" type="email" required = "true" value="<?php echo htmlspecialchars($user[0]->mail_user, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Giới tính</label>
            <div class="col-sm-9">
              <label class="radio-inline"><input type="radio" id="male" name="gender" value="1" required = "true" <?php echo $user[0]->gender?"checked":"" ?>>Nam</label>
              <label class="radio-inline"><input type="radio" id="female" name="gender" value="0" required = "true" <?php echo $user[0]->gender?"":"checked" ?>>Nữ</label>
            </div>
          </div>
          <div class="form-group">
            <label for="phone_user" class="col-sm-3 control-label">Số điện thoại</label>
            <div class="col-sm-9">
              <input class="form-control" name="phone_user" id="phone_user" type="text" required = "true" value="<?php echo htmlspecialchars($user[0]->phone_user, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="birthday" class="col-sm-3 control-label">Ngày sinh</label>
            <div class="col-sm-9">
              <input class="form-control" name="birthday" id="birthday" type="text" required = "true" value="<?php echo htmlspecialchars($user[0]->birthday, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="address_user" class="col-sm-3 control-label">Địa chỉ</label>
            <div class="col-sm-9">
              <textarea name="address_user" id="address_user" rows="3" style="width: 100%; resize: none;" required = "true"><?php echo htmlspecialchars($user[0]->address_user, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="province_user" class="col-sm-3 control-label">Tỉnh/Thành phố</label>
            <div class="col-sm-9">
                <select class="form-control" id="province_user" name="province_user" onchange="getDistrict(this.value, 0, 'district_user')" required = "true">
                  <option value="">---Chọn---</option>
                <?php  
                  foreach ($provinces as $province) {
                    $selected = "";
                    if($province->id_province == $user[0]->province_user){
                        $selected = "selected";
                    }
                ?>
                  <option <?php echo $selected ?> value="<?php echo htmlspecialchars($province->id_province, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($province->name_province, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="district_user" class="col-sm-3 control-label">Quận/Huyện</label>
            <div class="col-sm-9">
              <select class="form-control" id="district_user" name="district_user" onchange="getWard(this.value, 0, 'ward_user')"  required = "true">
                 <option value="">---Chọn---</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="ward_user" class="col-sm-3 control-label">Phường/Xã</label>
            <div class="col-sm-9">
              <select class="form-control" id="ward_user" name="ward_user" required = "true">
                <option value="">---Chọn---</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-9 checkbox">
              <input class="" id="status" name="status" type="checkbox" value="1" <?php echo ($user[0]->status)?"checked":"" ?> style="margin-left: 0px;">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Vai trò</label>
            <div class="col-sm-9">
              <label class="radio-inline"><input type="radio" id="user" name="role" value="0" required = "true" <?php if($user[0]->role == "0" ) echo "checked='true'" ?>>Người dùng</label>
              <label class="radio-inline"><input type="radio" id="admin" name="role" value="1" required = "true" <?php if($user[0]->role == "1" ) echo "checked='true'" ?>>Quản trị</label>
            </div>
          </div>
        </div>        
        <div class="box-footer">
          <div class="pull-right">
            <button type="Reset" class="btn btn-default">Đặt lại</button>
            <button type="submit" name="updateList" id="updateList" class="btn btn-info">Sửa</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>