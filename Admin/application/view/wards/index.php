
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Danh sách phường/xã</h3>
    </div>
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <div class="" style="width: 36%; margin: 0px auto;">
                    <button type="button" class="btn btn-default <?php if($limit == 0) echo "active" ?>" id="1" onclick="list(this.id)">1</button>
                    <button type="button" class="btn btn-default <?php if($limit == 1) echo "active" ?>" id="2" onclick="list(this.id)">2</button>
                    <button type="button" class="btn btn-default <?php if($limit == 2) echo "active" ?>" id="3" onclick="list(this.id)">3</button>
                    <button type="button" class="btn btn-default <?php if($limit == 3) echo "active" ?>" id="4" onclick="list(this.id)">4</button>
                    <button type="button" class="btn btn-default <?php if($limit == 4) echo "active" ?>" id="5" onclick="list(this.id)">5</button>
                    <button type="button" class="btn btn-default <?php if($limit == 5) echo "active" ?>" id="6" onclick="list(this.id)">6</button>
                    <button type="button" class="btn btn-default <?php if($limit == 6) echo "active" ?>" id="7" onclick="list(this.id)">7</button>
                    <button type="button" class="btn btn-default <?php if($limit == 7) echo "active" ?>" id="8" onclick="list(this.id)">8</button>
                    <button type="button" class="btn btn-default <?php if($limit == 8) echo "active" ?>" id="9" onclick="list(this.id)">9</button>
                    <button type="button" class="btn btn-default <?php if($limit == 9) echo "active" ?>" id="10" onclick="list(this.id)">10</button>
                    <button type="button" class="btn btn-default <?php if($limit == 10) echo "active" ?>" id="11" onclick="list(this.id)">11</button>
                    <button type="button" class="btn btn-default <?php if($limit == 11) echo "active" ?>" id="12" onclick="list(this.id)">12</button>
            </div>
            <br/>
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
               <tr role="row">
                <th>ID</th>
                <th>Tên phường/xã</th>
                <th>Tên quận/huyện</th>
                <th>Tên tỉnh/thành phố</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                <?php  
                  $i = -1;
                  foreach ($wards as $ward) {
                    $i++;
                ?>
                 <tr>
                   <td><?php if (isset($ward->id_ward)) echo htmlspecialchars($ward->id_ward, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td><?php if (isset($ward->name_ward)) echo htmlspecialchars($ward->name_ward, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td><?php if (isset($ward->id_district)) echo htmlspecialchars($districts[$i]->name_district, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td><?php if (isset($ward->id_province)) echo htmlspecialchars($provinces[$i]->name_province, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td><?php if (isset($ward->status)) echo $ward->status?"Hiện":"Ẩn"; ?></td>
                    <td>
                        <a href="<?php echo URL . 'wards/editward/' . htmlspecialchars($ward->id_ward, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary btn-xs">Sửa</a>
                          <button class="btn btn-danger btn-xs" onclick="cfdelete(<?php echo htmlspecialchars($ward->id_ward, ENT_QUOTES, 'UTF-8') ?>);">Xóa</button>
                    </td>
                </tr> 
                <?php
                  }
                ?>
              </tbody>
            </table>
            <!-- nút dùng để phân trang  -->
            <div class="" style="width: 36%; margin: 0px auto;">
                    <button type="button" class="btn btn-default <?php if($limit == 0) echo "active" ?>" id="1" onclick="list(this.id)">1</button>
                    <button type="button" class="btn btn-default <?php if($limit == 1) echo "active" ?>" id="2" onclick="list(this.id)">2</button>
                    <button type="button" class="btn btn-default <?php if($limit == 2) echo "active" ?>" id="3" onclick="list(this.id)">3</button>
                    <button type="button" class="btn btn-default <?php if($limit == 3) echo "active" ?>" id="4" onclick="list(this.id)">4</button>
                    <button type="button" class="btn btn-default <?php if($limit == 4) echo "active" ?>" id="5" onclick="list(this.id)">5</button>
                    <button type="button" class="btn btn-default <?php if($limit == 5) echo "active" ?>" id="6" onclick="list(this.id)">6</button>
                    <button type="button" class="btn btn-default <?php if($limit == 6) echo "active" ?>" id="7" onclick="list(this.id)">7</button>
                    <button type="button" class="btn btn-default <?php if($limit == 7) echo "active" ?>" id="8" onclick="list(this.id)">8</button>
                    <button type="button" class="btn btn-default <?php if($limit == 8) echo "active" ?>" id="9" onclick="list(this.id)">9</button>
                    <button type="button" class="btn btn-default <?php if($limit == 9) echo "active" ?>" id="10" onclick="list(this.id)">10</button>
                    <button type="button" class="btn btn-default <?php if($limit == 10) echo "active" ?>" id="11" onclick="list(this.id)">11</button>
                    <button type="button" class="btn btn-default <?php if($limit == 11) echo "active" ?>" id="12" onclick="list(this.id)">12</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function list(id){
    window.location.href="<?php echo URL . 'wards/list/'?>"+id;
  }
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
              window.location.href="<?php echo URL . 'wards/deleteWard/'?>"+id;

          }
        },
        Hủy: function(){

        },
      }
    });
  }
</script>
