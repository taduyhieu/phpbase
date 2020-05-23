<div class="col-xs-12 detail">
  <div class="box">
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
               <tr role="row">
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Nhãn hiệu</th>
                <th>Miêu tả</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  $orderDetails = $_SESSION['orderDetail'];
                  foreach ($orderDetails as $orderDetail) {
                ?>
                 <tr>
                   <td><?php if (isset($orderDetail->id_product)) echo htmlspecialchars($orderDetail->id_product, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($orderDetail->name_product)) echo htmlspecialchars($orderDetail->name_product, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td><?php if (isset($orderDetail->name_category)) echo htmlspecialchars($orderDetail->name_category, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td><?php if (isset($orderDetail->name_brand)) echo htmlspecialchars($orderDetail->name_brand, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td width="30%"><?php if (isset($orderDetail->description)) echo htmlspecialchars($orderDetail->description, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td><?php if (isset($orderDetail->amount)) echo htmlspecialchars($orderDetail->amount, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td><?php if (isset($orderDetail->price)) echo htmlspecialchars($orderDetail->price, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                      <button class="btn btn-danger btn-xs" onclick="cfdelete(<?php echo htmlspecialchars($orderDetail->id_detail, ENT_QUOTES, 'UTF-8') ?>);">Xóa</button>
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
</div>
