<?php 
require_once 'header.php';
require '../module/m_mm.php';
require '../module/m_giaodich.php';
$username=$_SESSION["mm_info"];
$m_giaodich =new m_giaodich();
$all_giaodich=$m_giaodich->list_all_giaodich_by_user($username);
/*Phan Trang*/
$lay=5;
$page=$_GET['page'];
if ( $page==null )
{
    $page = 1 ;
}
$tongdongdtb=count($all_giaodich);
$sotrang = ceil($tongdongdtb/$lay);
$tu=($page-1)*$lay;
$i=$tu;
$list_giaodich=$m_giaodich->list_giaodich_by_user($tu,$lay,$username);
 ?>
	<div id="content">
	    <div id="contentwrapper">
			<div class="row">
				<div class="col-lg-9 col-lg-offset-2"> 
			        <div class="panel panel-default toggle panelClose panelRefresh panelMove" id="tokendiv" style="margin-top: 10px;">
			            <!-- Start .panel -->
			            <div class="panel-heading">
			                <h4 class="panel-title">Quản Lí Giao Dịch</h4>
			                <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="brocco-icon-refresh s12"></i></a><a href="#" class="toggle panel-minimize"><i class="icomoon-icon-plus"></i></a><a href="#" class="panel-close"><i class="icomoon-icon-close"></i></a></div>
			            </div>
			            <div class="panel-body">
							<div class="row">
								<button class="btn btn-success pull-right" style="margin-right: 5px;" data-toggle="modal" data-target="#themgd"><i class="fa fa-plus"></i>Thêm GD</button>
									<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên Người Thuê</th>
                                                <th>FB Người Thuê</th>
                                                <th>SĐT Người Thuê</th>
                                                <th>Số Tiền GD</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($list_giaodich as $giaodich) {
                                        		$i++;
                                        	?>
											<tr>
	                                        	<td class="id"><?php echo $giaodich->id ?></td>
	                                        	<td><?php echo $giaodich->hirer_name ?></td>
	                                        	<td><?php echo $giaodich->hirer_fb ?></td>
	                                        	<td><?php echo $giaodich->hirer_phone ?></td>
	                                        	<td><?php echo $giaodich->price ?></td>
	                                        	<td>
													<div class="btn-group">
													  <a class="btn btn-info check_giaodich"><i class="fa fa-search"></i>Tra Cứu</a>
													  <a class="btn btn-warning edit_giaodich" disabled>Sửa</a>
													  <a class="btn btn-danger del_giaodich">Xóa</a>
													</div>	                                        		
	                                        	</td>											
											</tr>
											<?php 
											}
											 ?>
                                        </tbody>
                                    </table>
								<div class="text-center">
								    <ul class="pagination mt0 mb0">
				                    	<?php for ($i=1; $i <=$sotrang ; $i++) {
				                    	?>
								        <li class="<?php if($i==$page){echo "active";}?>"><a href="quanligiaodich.html?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
										<?php 
										} 
										 ?>								        
								    </ul>
								</div>								
							</div>
			            </div>
			            <div class="panel-footer">Code By <a href="https://www.facebook.com/hellcat.info">HellCatVN-VGM</a></div>
			        </div>									
				</div>		
			</div>
	    </div>
	</div>
<!-- Modal -->
<!-- All modal need-->
<div id="divLoading" style="display:none"> 
</div>
<input type="hidden" name="mm" value="<?php echo $_SESSION["mm_info"] ?>">

<!-- End All modal need-->
<div id="themgd" class="modal fade" role="dialog">
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
<div id="ketqua" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Giao Dịch</h4>
      </div>
      <div class="modal-body text-center" id="contentketqua">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="tracuu" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kết Quả Tra Cứu</h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal group-border stripped">
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Tên Người Thuê</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="text" class="form-control" name="t_fullname" disabled>
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Facebook Người Thuê</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="text" class="form-control" name="t_fblink" disabled>
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Facebook ID Người Thuê</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="number" min="0" class="form-control" name="t_fbid" disabled>
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">SĐT Người Thuê</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="number" min="0" class="form-control" name="t_hirerphone" disabled>
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Dịch Vụ</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="text" class="form-control" name="t_service" disabled>
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Giá Trị GD</label>
			    <div class="col-lg-10 col-md-9">
			        <input type="text" class="form-control" name="t_price" disabled>
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-lg-2 col-md-3 control-label" for="">Ghi Chú</label>
			    <div class="col-lg-10 col-md-9">
			        <textarea name="t_note" class="form-control" disabled></textarea>
			    </div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>	
</div>
</div>
<script type="text/javascript">
	$(".check_giaodich").click(function() {
		id = $(this).closest("tr").find(".id").text();
		console.log(id);
		$.post('controller/c_quanligiaodich.php', {
			type:'tracuu',
			id:id,
		}, function(data, status) {
			data=JSON.parse(data);
			$('input[name=t_fullname]').val(data.hirer_name);
			$('input[name=t_fblink]').val(data.hirer_fb);
			$('input[name=t_fbid]').val(data.hirer_fbid);
			$('input[name=t_hirerphone]').val(data.hirer_phone);
			$('input[name=t_service]').val(data.service);
			$('input[name=t_price]').val(data.price);
			$('textarea[name=t_note]').val(data.note);
			$('#tracuu').modal('show');
		});
	});
	$(".del_giaodich").click(function() {
		id = $(this).closest("tr").find(".id").text();
		var result = confirm("Want to delete?");
		if (result==true) {
			$(this).parent().parent().parent().remove();
			$.post('controller/c_quanligiaodich.php', {
				type:'xoagiaodich',
				id:id,
			}, function(data, status) {
			});
		}		
	});
	$('#a_gd').click(function() {
		$('#themgd').modal('hide');
		mm=$('input[name=mm]').val();
		hirer_fullname=$('input[name=a_fullname]').val();
		hirer_fblink=$('input[name=a_fblink]').val();
		hirer_fbid=$('input[name=a_fbid]').val();
		hirer_sdt=$('input[name=a_hirerphone]').val();
		service=$('input[name=service]').val();
		price=$('input[name=a_price]').val();
		note=$('textarea[name=a_note]').val();
		$.post('controller/c_quanligiaodich.php', {
			type:'them',
			mm:mm,
			hirer_fullname:hirer_fullname,
			hirer_fbid:hirer_fbid,
			hirer_fblink:hirer_fblink,
			hirer_sdt:hirer_sdt,
			service:service,
			price:price,
			note:note,
		}, function(data, status) {
			console.log(data);
			$('#ketqua').modal('show');
			$('#contentketqua').html(data);
		});
	});
</script>
 <?php 
require_once 'footer.php';
 ?>