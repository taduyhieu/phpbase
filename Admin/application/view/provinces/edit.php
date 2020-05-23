<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa tỉnh/thành phố</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="name_province" class="col-sm-2 control-label">Tên tỉnh</label>
            <div class="col-sm-10">
              <input class="form-control" id="name_province" name="name_province" type="text" value="<?php echo htmlspecialchars($province[0]->name_province, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Trạng thái</label>
            <div class="col-sm-10 checkbox">
              <input class="" id="status" name="status" type="checkbox" value="1" <?php echo ($province[0]->status)?"checked":"" ?> style="margin-left: 0px;">
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