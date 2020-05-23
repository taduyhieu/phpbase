<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Thêm ảnh</h3>
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
                ?>
                  <option value="<?php if (isset($product->id_product)) echo htmlspecialchars($product->id_product, ENT_QUOTES, 'UTF-8'); ?>"><?php if (isset($product->id_product)) echo htmlspecialchars($product->name_product, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php    
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="image_url_1" class="col-sm-3 control-label">Đường dẫn</label>
            <div class="col-sm-9">
              <input type="file" id="image_url_1" name="image_url_1" style="width: 100%">
              <input type="hidden" name="num" id="num" value="1" />
              <br/>
              <div id="idfile"></div>
              <div>
                <a href="javascript:void(0)" onclick="addItem()" class="control-label">[Thêm]</a>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-9 checkbox">
              <input class="" id="status" name="status" type="checkbox" style="margin-left: 0px;" value="1" checked>
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
<script>
    i=1;
    function addItem(){
      i++;
      $("#num").val(i);
      htmlText = '<input type="file" name="image_url_'+i+'" id="image_url_'+i+'" ><br/>';
      $("#idfile").append(htmlText);
    }
</script>