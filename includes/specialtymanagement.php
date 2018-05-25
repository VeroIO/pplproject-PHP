<?php 
    require_once '../includes/header.php';
    //Pagination
    $limit=10;
    if($_GET['page'] != null){
        $page=$_GET['page']-1;
    }else{
        $page=0;
    }
    $offset = $page*$limit;
    $datas = json_decode(file_get_contents(API.'/api/specialty/specialtylist?offset='.$offset.'&limit='.$limit.'&access_token='.$_SESSION['jwt']));
    $total_page = ceil($datas->count/$limit);
?>
        <div class="col-md-9 col-md-offset-2">
            <div id="content">
                <div id="contentwrapper">
                    <div class="panel panel-default toggle panelClose panelRefresh panelMove" id="tokendiv" style="margin-top: 10px;">
                        <!-- Start .panel -->
                        <div class="panel-heading">
                            <h4 class="panel-title">Danh Sách Người Dùng</h4>
                            <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="brocco-icon-refresh s12"></i></a><a href="#" class="toggle panel-minimize"><i class="icomoon-icon-plus"></i></a><a href="#" class="panel-close"><i class="icomoon-icon-close"></i></a></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <button class="btn btn-success pull-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"> Thêm Specialty</i></button>
                            </div>
                            <div class="row">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: auto;"><div class="table-responsive" style="overflow: hidden; width: 100%; height: auto;"><table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name Type</th>
                                            <th>Acction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datas->rows as $data) {
                                        ?>
                                        <tr>
                                            <td class="idSpec"><?php echo $data->id; ?></td>
                                            <td class="typeName"><?php echo $data->type; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-warning edit_specialty" data-toggle="modal" data-target="#editModal">Sửa</a>
                                                    <a class="btn btn-danger del_specialty">Xóa</a>                                                    
                                                </div>                                               
                                            </td>
                                        </tr> 
                                        <?php } ?>                             
                                    </tbody>
                                </table></div><div class="slimScrollBar ui-draggable ui-draggable-handle" style="background: rgb(243, 243, 243); height: 5px; position: absolute; bottom: 3px; opacity: 0.4; display: none; border-radius: 5px; z-index: 99; width: 931px;"></div><div class="slimScrollRail" style="width: 100%; height: 5px; position: absolute; bottom: 3px; display: none; border-radius: 5px; background: rgb(51, 51, 51); opacity: 0.3; z-index: 90;"></div></div>
                                <div class="text-center">
                                    <ul class="pagination mt0 mb0">
                                        <?php for ($i=0; $i < $total_page  ; $i++) { 
                                        ?>
                                        <li class="<?php if($page == $i){ echo 'active';} ?>"><a href="specialtycategories.html?page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <?php var_dump($_SESSION['jwt']) ?> -->
                        <div class="panel-footer">Code By <a href="https://www.facebook.com/hellcat.info">HellCatVN</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="ketqua" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="location.reload();">&times;</button>
        <h4 class="modal-title">Specialty Management</h4>
      </div>
      <div class="modal-body text-center" id="contentketqua">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload();">Tắt</button>
      </div>
    </div>
  </div>
</div>
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Specialty Management</h4>
      </div>
      <div class="modal-body text-center">
        <div class="form-group">
            <label class="col-lg-2 col-md-3 control-label" for="">Type Name</label>
            <div class="col-lg-10 col-md-9">
               <input type="text" class="form-control" name="typeName" value="">
            </div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addSpecialty">Thêm</button>
      </div>
    </div>
  </div>
</div>
    <script>
        access_token = '<?php echo $_SESSION['jwt']; ?>';
        $("#addSpecialty").click(()=>{
            $('#addModal').modal('hide');
            typeName = $('input[name=typeName]').val();
            $.post('<?php echo API ?>/api/specialty/add', {
                typeName: typeName,
                access_token:access_token,
            }, function(data, status) {
                $('#ketqua').modal('show');
                $('#contentketqua').html(data.message);
            });            
        })
        $(".del_specialty").click(function() {
            id = $(this).closest("tr").find(".idSpec").text();
            $.post('<?php echo API ?>/api/specialty/del', {
                specialtyId: id,
                access_token:access_token,
            }, function(data, status) {
                $('#ketqua').modal('show');
                $('#contentketqua').html(data.message);
            });            
        });                 
    </script>
<?php 
    require_once '../includes/footer.php';
?>