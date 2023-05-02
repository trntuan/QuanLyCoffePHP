<?php
include("../../block/connection.php");
if (isset($_POST["submit"])){
    $maLoai=$_POST['maLoai'];
    $tenLoai=$_POST['tenLoai'];    
    // thêm sản phẩm mới

   
    $sql="INSERT INTO loaisp(TenLoai) 
        VALUES ('$tenLoai')";
    $result=mysqli_query($conn,$sql);
            if ($result) 
            {
                header("Location:../../admin/loai-sp/index.php");
                $notiProduct="Thêm loại sản phẩm mới thành công";
                session_start();
                $_SESSION["noti-category"]=$notiCategory;
                session_write_close();
            }
            else 
            {
                echo 'không thể thêm sản phẩm mới';
            }
    }
?>
<?php
include("../../block/admin-block.php");
function adminContent(){
    echo "<div class='container'>";
    echo "<div class='category-content--link' align='left' style='margin-bottom: 30px'>";
    echo "<h1 class='admin-category--title'>THÊM LOAI SẢN PHẨM MỚI</h1>
    <a href='../../admin/loai-sp/index.php' class='category-link--edit'>
    <i class='fa-solid fa-arrow-left'></i><span> Quay lại</span>
    </a>
    </div>";
?>
<form method='post' action="" enctype="multipart/form-data" class="category-update--form"> 
<div class="category-form--content">
    <table class="category-update--table">
    
    <tr>
        <td>
            Nhập tên loại sản phẩm muốn thêm: 
        </td>
        <td colspan="3">
        <input type='text' name='tenLoai' value="<?php
            if (isset($tenLoai)) echo $tenLoai; else echo "";?>" class="category-update--input">
        </td>
    </tr>
    </table>
</div>
    <input type="submit"  name="submit" value="Thêm loại sản phẩm mới" class="btn-update">
</form>
<?php
    echo "</div>";
}
?>
<script>
    const btnUpdateImg = document.querySelector("#updateImg");
    btnUpdateImg.addEventListener("change", function(){
        const img= document.querySelector("#img");
        img.src=window.URL.createObjectURL(btnUpdateImg.files[0]);
    });
</script>