<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Sửa đơn hàng</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">
          <div class="form-group" style="text-align: left;">
            <label for="" class="col-sm-3 control-label">Người mua</label>
            <div class="col-sm-9">
              <input class="form-control" id="" name="" type="text" value="<?php echo htmlspecialchars($user[0]->mail_user, ENT_QUOTES, 'UTF-8'); ?>" disabled>
              <input type="hidden" name="id_user" id="id_user" value="<?php echo htmlspecialchars($order[0]->id_user, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="total" class="col-sm-3 control-label">Tổng tiền</label>
            <div class="col-sm-9">
              <input class="form-control" id="total" name="total" type="text" value="<?php echo htmlspecialchars($order[0]->total, ENT_QUOTES, 'UTF-8'); ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="date_order" class="col-sm-3 control-label">Ngày đặt</label>
            <div class="col-sm-9">
              <input class="form-control" id="date_order" name="date_order" type="text" value="<?php echo htmlspecialchars($order[0]->date_order, ENT_QUOTES, 'UTF-8'); ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="name_receiver" class="col-sm-3 control-label">Tên người nhận</label>
            <div class="col-sm-9">
              <input class="form-control" id="name_receiver" name="name_receiver" type="text" value="<?php echo htmlspecialchars($order[0]->name_receiver, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="address_receiver" class="col-sm-3 control-label">Địa chỉ người nhận</label>
            <div class="col-sm-9">
              <textarea name="address_receiver" id="address_receiver" rows="6" style="width: 100%; resize: none;"><?php echo htmlspecialchars($order[0]->address_receiver, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="phone_receiver" class="col-sm-3 control-label">Tên người nhận</label>
            <div class="col-sm-9">
              <input class="form-control" id="phone_receiver" name="phone_receiver" type="text" value="<?php echo htmlspecialchars($order[0]->phone_receiver, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
          </div>          
          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-9">
                <select class="form-control" id="status" name="status">
                <?php  
                        $selected = "selected";
                ?>
                  <option <?php if($order[0]->status == "1") echo $selected ?> value="1">Chưa thanh toán, chưa giao hàng</option>
                  <option <?php if($order[0]->status == "2") echo $selected ?> value="2">Đã thanh toán, chưa giao hàng</option>
                  <option <?php if($order[0]->status == "3") echo $selected ?> value="3">Đã xong</option>
                  <option <?php if($order[0]->status == "0") echo $selected ?> value="0">Hủy đơn</option>
              </select>
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