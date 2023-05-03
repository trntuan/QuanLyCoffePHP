<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/main.css"/>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo/logo_2.png">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
</head>
<body>
<?php
// {
    // $idNV=$_POST['idNV'];  
    // $hoNV=$_POST['hoNV'];
    // $tenNV=$_POST['tenNV'];
    // $gioitinh=$_POST['gioitinh'];
    // $sdt= $_POST['sdt'];
    // $diachi=$_POST['diachi'];
    // $anh=$_FILES['res']['name'];
    // $target_dir = "../../assets/Images/";
   
 
    // if ($anh_update!=""){
    //     move_uploaded_file($anh_update, $target_file);
    //     if ($gioitinh=="Nữ")
    //     {
    //         $sql="INSERT INTO `nhan_vien`( `ho_nv`, `ten_nv`, `gioi_tinh`, `sdt`, `dia_chi`, `hinh_anh`) 
    //         VALUES ('$hoNV','$tenNV','0','$sdt','$diachi','$anh')";
    //     }
    //     else if ($gioitinh=="Nam"){
    //         $sql="INSERT INTO `nhan_vien`( `ho_nv`, `ten_nv`, `gioi_tinh`, `sdt`, `dia_chi`, `hinh_anh`) 
    //         VALUES ('$hoNV','$tenNV','1','$sdt','$diachi','$anh')";

    //     }
    //     }
    // else {
    //     if ($gioitinh=="Nữ")
    //     {
    //         $sql="INSERT INTO `nhan_vien`( `ho_nv`, `ten_nv`, `gioi_tinh`, `sdt`, `dia_chi`) 
    //         VALUES ('$hoNV','$tenNV','0','$sdt','$diachi')";
    //     }
    //     else if ($gioitinh=="Nam"){
    //         $sql="INSERT INTO `nhan_vien`( `ho_nv`, `ten_nv`, `gioi_tinh`, `sdt`, `dia_chi`) 
    //         VALUES ('$hoNV','$tenNV','1','$sdt','$diachi')";

    //     }
    // }
    // $result=mysqli_query($conn,$sql);
    //         if ($result) 
    //         {
    //             header("Location:../../admin/nhan-vien/index.php");
    //             $notiPeople="Thêm nhân viên mới thành công";
    //             session_start();
    //             $_SESSION["noti-people"]=$notiPeople;
    //             session_write_close();
    //         }
    //         else 
    //         {
    //             echo 'không thể thêm';
    //         }
    // }
      session_start();
      ob_start();
    include("./block/connection.php");
    include("./block/global.php");
    include("./block/header.php");
    $err="";
        if(isset($_POST["submit"]))
        {
            $ho = $_POST["ho"];
            $ten = $_POST["ten"];
            $email = $_POST["email"];
            $Pass = $_POST["pass"];
            $checkPass = $_POST["checkPass"];
            $gt = $_POST["gt"];
            if($ho != "" && $ten !="" && $Pass!="" && $checkPass!="" && $gt!="" && $email!="")
            {
                if($Pass === $checkPass)
                {
                $queryIdMax = "SELECT MAX(idKH) FROM khachhang";
                $resulIdMax = mysqli_query($conn, $queryIdMax);
                $idMax=mysqli_fetch_assoc($resulIdMax);
                $idKH = $idMax['MAX(idKH)'] +1;
                $anh = "user.jpg";
                $sql="INSERT INTO `khachhang`(`idKH`, `TenKH`, `HoKH`, `GioiTinh`,`anh`)  VALUES ('$idKH','$ten','$ho','$gt','$anh')";
                $result=mysqli_query($conn,$sql);
                    if ($result) 
                    {
                        $sql="INSERT INTO `taikhoankh`(`IdKH`, `Email`, `password`)  VALUES ('$idKH','$email','$Pass')";
                        $result=mysqli_query($conn,$sql);
                        if ($result)
                        { 
                            $_SESSION['id_user'] = $idKH;
                           
                            header("location:./index.php");
                            
                         
                        }
                    }
                }
            else {
                $err="vui lòng nhập lại mật khẩu chính xác";
            }
            }else {
                $err="Vui lòng nhập đầy đủ thông tin";
            }
        }
       
        
        ob_end_flush();
    ?>
    <div class="login-body">
        <div class="login">
            <h3 class="login-title">Đăng ký</h3>
            <div class="login-content">
                <form action="" method="post">
                <div class="login-group">
                        <label class="login-label" aria-autocomplete="none">Nhập họ *</label>
                        <input type="text" name="ho" class="login-input" value="<?php
                        if (isset($ho)) echo $ho; ;
                        ?>">
                    </div>
                <div class="login-group">
                        <label class="login-label" aria-autocomplete="none">Nhập tên *</label>
                        <input type="text" name="ten" class="login-input" value="<?php
                        if (isset($ten)) echo $ten;;
                        ?>">
                    </div>
                    <div class="login-group">
                        <label class="login-label" aria-autocomplete="none">Nhập email đăng nhập *</label>
                        <input type="text" name="email" class="login-input" value="<?php
                        if (isset($email)) echo $email; else echo "";
                        ?>">
                    </div>
                    <div class="login-group">
                        <label class="login-label">Mật khẩu *</label>
                        <input type="password" name="pass" class="login-input" value="<?php
                        if (isset($mk)) echo $Pass; else echo "";
                        ?>">
                    </div>
                    <div class="login-group">
                        <label class="login-label">Nhập lại mật khẩu *</label>
                        <input type="password" name="checkPass" class="login-input" value="<?php
                        if (isset($checkPass)) echo $checkPass; else echo "";
                        ?>">
                    </div>
                    <div class='form-order--group'>
                        <div class='form-order-radius'>
                            <label for='nam'>
                                <input type='radio' value ='nam' checked name='gt' id='nam'>
                                <span>Anh</span>
                            </label>
                        </div>
                        <div class='form-order-radius'>
                            <label for='nu'>
                                <input type='radio' value ='nữ' name='gt' id='nu'>
                                <span>Chị</span>
                            </label>
                        </div>
                    </div>
                    <div class="login-group" style="color: red; font-weight: bold">
                        <?php if (isset($err)) echo $err; else echo "" ?>
                    </div>
                    <button type="submit" name="submit" class="login-btn">Đăng ký</button>
                </form>
                
            </div>
        </div>
    </div>
    <?php
        include("./block/footer.php");
    ?>
    <script src="./assets/js/main.js"></script>
</body>
</html>