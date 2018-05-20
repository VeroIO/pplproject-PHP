<?php 
require_once '../includes/header.php';
?>
        <div class="col-md-6 col-md-offset-3">
            <div id="content">
                <div id="contentwrapper">
                    <div class="panel panel-default toggle panelClose panelRefresh panelMove" id="tokendiv" style="margin-top: 10px;">
                        <!-- Start .panel -->
                        <div class="panel-heading">
                            <h4 class="panel-title">Thông Tin Cơ Bản</h4>
                            <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="brocco-icon-refresh s12"></i></a><a href="#" class="toggle panel-minimize"><i class="icomoon-icon-plus"></i></a><a href="#" class="panel-close"><i class="icomoon-icon-close"></i></a></div>
                        </div>
                        <div class="panel-body">
                            <?php 
                            if($_POST && $user_info->fstLogin==0){
                                $fullName=urlencode($_POST['fullname']);
                                $role=$_POST['role'];
                                $update_role_url =API.'/api/user/changerole?role='.$role.'&fullName='.$fullName.'&access_token='.$_SESSION['jwt'];
                                file_get_contents($update_role_url);
                            ?>
                                <pre>Đã Cập Nhật Thành Công Vui Lòng Refresh</pre>
                            <?php
                            }
                            ?>                            
                            <?php 
                                if ($user_info->fstLogin==0 && !$_POST) {
                            ?>
                                <blockquote>
                                    <p>Hiện Tại Bạn Chưa Thiết Lập Loại Người Dùng</p>
                                </blockquote>
                                <form class="form-horizontal group-border stripped" method="POST">
                                    <div class="form-group">
                                        <div class="alert alert-warning">
                                            <strong>Warning!</strong> Bạn Chỉ Có Thể Chọn Loại User 1 Lần Nếu Muốn Thay Đổi Liên Hệ Admin Kèm Theo Lý Do.
                                        </div>
                                        <label class="col-lg-2 col-md-3 control-label" for="">Loại Người Dùng</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select name="role" id="role" class="form-control">
                                                <option value="user" selected>Guest</option>
                                                <option value="patient">Patient</option>
                                                <option value="doctor">Doctor</option>
                                                <option value="hospital">Hospital</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary center-block">Lưu</button>                                                                           
                                </form>
                            <?php
                                }else{
                            ?>
                            <form class="form-horizontal group-border stripped">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label" for="">Tài Khoản</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" class="form-control" name="username" value="<?php echo $user_info->userName ?>" disabled>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label" for="">Loại Người Dùng</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" class="form-control" name="role" value="<?php echo $user_info->role ?>" disabled>
                                    </div>
                                </div>
                            </form>                           
                            <?php        
                                }
                             ?>
                        </div>
                        <?php echo ($_SESSION['jwt']) ?>
                        <div class="panel-footer">Code By <a href="https://www.facebook.com/hellcat.info">HellCatVN</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / #wrapper -->
<?php 
require_once '../includes/footer.php';
 ?>