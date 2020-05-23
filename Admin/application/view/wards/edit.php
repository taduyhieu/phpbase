<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa phường/xã</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="province" class="col-sm-3 control-label">Tên tỉnh/thành phố</label>
            <div class="col-sm-9">
                <select class="form-control" id="id_province" name="id_province" onchange="getDistrict(this.value, 0, 'id_district')">
                  <option>---Chọn---</option>
                <?php  
                  foreach ($provinces as $province) {
                    $selected = "";
                    if($province->id_province == $ward[0]->id_province){
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
            <label for="id_district" class="col-sm-3 control-label">Tên quận/huyện</label>
            <div class="col-sm-9">
              <select class="form-control" id="id_district" name="id_district">
                 <option>---Chọn---</option>
                 <?php  
                  foreach ($districts as $district) {
                    $selected = "";
                    if($district->id_district == $ward[0]->id_district){
                        $selected = "selected";
                    }
                ?>
                  <option <?php echo $selected ?> value="<?php echo htmlspecialchars($district->id_district, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($district->name_district, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php   
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="name_ward" class="col-sm-3 control-label">Tên phường/xã</label>
            <div class="col-sm-9">
              <input class="form-control" id="name_ward" name="name_ward" type="text" value="<?php echo htmlspecialchars($ward[0]->name_ward, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-9 checkbox">
              <input class="" id="status" name="status" type="checkbox" value="1" <?php echo ($ward[0]->status)?"checked":"" ?> style="margin-left: 0px;">
            </div>
          </div>
        </div>        
        <div class="box-footer">
          <div class="pull-right">
            <button type="Reset" class="btn btn-default">Đặt lại</button>
            <!-- <button type="submit" name="listU" id="listU" class="btn btn-default">List User</button> -->
            <button type="submit" name="updateList" id="updateList" class="btn btn-info">Sửa</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>