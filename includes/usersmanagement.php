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
    $datas = json_decode(file_get_contents(API.'/api/admin/userlist?offset='.$offset.'&limit='.$limit.'&access_token='.$_SESSION['jwt']));
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
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: auto;"><div class="table-responsive" style="overflow: hidden; width: 100%; height: auto;"><table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>UserName</th>
                                            <th>Role</th>
                                            <th>Acction</th>
                                            <th>Trạng Thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datas->rows as $data) {
                                        ?>
                                        <tr>
                                            <td class="id"><?php echo $data->id; ?></td>
                                            <td class="username"><?php echo $data->userName; ?></td>
                                            <td><?php echo $data->role; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-warning edit_cate">Sửa</a>
                                                    <a class="btn btn-danger del_cate disabled">Xóa</a>                                                    
                                                </div>                                               
                                            </td>
                                            <td>
                                                <div class="toggle-custom toggle-inline">
                                                    <label class="toggle" data-on="ON" data-off="OFF">
                                                        <input type="checkbox" class="status" id="checkbox-toggle3" name="checkbox-toggle" <?php if($data->active == 1){ echo "checked";}?>>
                                                        <span class="button-checkbox"></span>
                                                    </label>
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
                                        <li class="<?php if($page == $i){ echo 'active';} ?>"><a href="usersmanagetment.html?page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a>
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
        <h4 class="modal-title">User Management</h4>
      </div>
      <div class="modal-body text-center" id="contentketqua">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload();">Tắt</button>
      </div>
    </div>
  </div>
</div>
    <script>
        $(".status").change(function() {
            username = $(this).closest("tr").find(".username").text();
            access_token = '<?php echo $_SESSION['jwt']; ?>';
            if(this.checked){
                $.post('http://localhost:3000/api/user/active', {
                    active_user: username,
                    access_token:access_token,
                }, function(data, status) {
                    $('#ketqua').modal('show');
                    $('#contentketqua').html(data.message);
                });
            }else{
                $.post('http://localhost:3000/api/user/deactive', {
                    deactive_user: username,
                    access_token:access_token,
                }, function(data, status) {
                    $('#ketqua').modal('show');
                    $('#contentketqua').html(data.message);
                });
            }            
        });    
    </script>
<?php 
    require_once '../includes/footer.php';
?>