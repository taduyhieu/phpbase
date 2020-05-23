<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Add Province</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="id_province" class="col-sm-3 control-label">Tên quận/huyện</label>
            <div class="col-sm-9">
                <select class="form-control" id="id_province" name="id_province">
                  <option>---Chọn---</option>
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
            <label for="name_district" class="col-sm-3 control-label">Tên tỉnh/thành phố</label>
            <div class="col-sm-9">
              <input class="form-control" id="name_district" name="name_district" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-9 checkbox">
              <input class="" id="status" name="status" type="checkbox" value="1" checked style="margin-left: 0px;">
            </div>
          </div>
        </div>        
        <div class="box-footer">
          <div class="pull-right">
            <button type="Reset" class="btn btn-default">Đặt lại</button>
            <button type="submit" name="addNew" id="addNew" class="btn btn-info">Thêm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>