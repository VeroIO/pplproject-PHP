<?php 
require '../../module/m_giaodich.php';
$id=$_POST['id'];
$m_giaodich =new m_giaodich();
 ?>
 <div class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Giao Dịch</h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal group-border stripped">
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Tên Người Thuê</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="text" class="form-control" name="a_fullname">
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Facebook Người Thuê</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="text" class="form-control" name="a_fblink">
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Facebook ID Người Thuê</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="number" min="0" class="form-control" name="a_fbid">
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">SĐT Người Thuê</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="number" min="0" class="form-control" name="a_hirerphone">
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Dịch Vụ</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="text" class="form-control" name="service" value="BNS">
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Giá Trị GD</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="text" class="form-control" name="a_price">
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Ghi Chú</label>
			    <div class="col-lg-10 col-md-9">
			        <textarea name="a_note" class="form-control"></textarea>
			    </div>
			</div>
			<a id="a_gd" class="btn btn-success pull-right">Thêm</a>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>