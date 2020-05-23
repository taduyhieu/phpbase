<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Sửa ảnh</h3>
      </div>
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="id_product" class="col-sm-3 control-label">Sản phẩm</label>
            <div class="col-sm-9">
                <select class="form-control" id="id_product" name="id_product">
                  <option value="0">---Chọn---</option>
                <?php  
                  foreach ($products as $product) {
                    $selected = "";
                    if($province->id_province == $user[0]->province_user){
                        $selected = "selected";
                    }
                ?>
                  <option <?php echo $selected ?> value="<?php if (isset($product->id_product)) echo htmlspecialchars($product->id_product, ENT_QUOTES, 'UTF-8'); ?>"><?php if (isset($product->id_product)) echo htmlspecialchars($product->name_product, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php    
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="image_url_1" class="col-sm-3 control-label">Đường dẫn</label>
            <div class="col-sm-9">
              <input class="form-control" id="url_image" name="url_image" type="text" value="<?php if (isset($image[0]->url_image)) echo htmlspecialchars($image[0]->url_image, ENT_QUOTES, 'UTF-8'); ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-9 checkbox">
              <input class="" id="status" name="status" type="checkbox" value="1" <?php echo ($image[0]->status)?"checked":"" ?> style="margin-left: 0px;">
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