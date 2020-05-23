<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Danh sách hình ảnh</h3>
    </div>
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
               <tr role="row">
                <th>ID</th>
                <th>Mã sản phẩm</th>
                <th>Đường dẫn</th>
                <th>Xem ảnh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  $i=-1;
                  foreach ($images as $image) {
                    $i++;
                ?>
                 <tr>
                    <td><?php if (isset($image->id_image)) echo htmlspecialchars($image->id_image, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($image->id_product)) echo htmlspecialchars($products[$i]->name_product, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($image->url_image)) echo htmlspecialchars($image->url_image, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                      <a id="zoom_img" href="javascript:void(0)" data-toggle="modal" data-target="#myModal-<?php echo $i ?>">
                         <img src="<?php echo PJ.'public/'; if(isset($image->url_image)) echo htmlspecialchars($image->url_image, ENT_QUOTES, 'UTF-8'); ?>" alt="" width="100px" heigh="100px">
                        &nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-zoom-in"></span>
                      </a>
                      <div id="myModal-<?php echo $i ?>" class="modal fade" role="dialog"">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body" align="center">
                              <img src="<?php echo PJ.'public/'; if(isset($image->url_image)) echo htmlspecialchars($image->url_image, ENT_QUOTES, 'UTF-8'); ?>" alt="" style = "max-width: 100%; height: auto;">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default"><a href="<?php echo PJ.'public/'; if(isset($image->url_image)) echo htmlspecialchars($image->url_image, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">Xem toàn ảnh</a></button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                          </div>

                        </div>
                      </div>
                    </td>
                    <td><?php if (isset($image->status)) echo $image->status?"Hiện":"Ẩn" ?></td>
                    <td>
                      <a href="<?php echo URL . 'images/editimage/' . htmlspecialchars($image->id_image, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary btn-xs">Sửa</a>
                    <button class="btn btn-danger btn-xs" onclick="cfdelete(<?php echo htmlspecialchars($image->id_image, ENT_QUOTES, 'UTF-8') ?>);">Xóa</button>
                  </td>
                </tr> 
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function cfdelete(id){
    $.confirm({
      title: "Xác nhận!",
      content: "Bạn có chắc chắn muốn xóa không?",
      backgroundDismiss: true,
      type: 'red',
      typeAnimated: false,
      buttons: {
        OK: {
          btnClass: 'btn-red',
          action: function(){
              window.location.href="<?php echo URL . 'images/deleteImage/'?>"+id;
          }
        },
        Hủy: function(){

        },
      }
    });
  }
</script>