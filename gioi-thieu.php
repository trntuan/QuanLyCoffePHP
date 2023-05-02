<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuan</title>
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="icon" type="image/x-icon" href="./assets/images/logo/logo_2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <?php
    include("./block/connection.php");
    include("./block/global.php");
    include("./block/header.php");
    ?>
    <div class="container">
        <div class="info">
            <h3 class="info-header">
                Thông tin :
            </h3>
            <div class="info-main">
                <div class="info-item">
                    <img src="./assets/images/team/tuan.jpg" alt="" class="info-img">
                    <h4 class="info-content">
                        Trương Ngọc Tuấn
                    </h4>
                    <h4 class="info-content">github: <a href="https://github.com/trntuan?tab=repositories">https://github.com/trntuan</a></h4>
                    <h4 class="info-content">Gmail: <span>tntuan202@gmail.com</span></h4>
                    <h4 class="info-content">SĐT: <span>0344705573</span></h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("./block/footer.php");
    ?>
</body>
<script src="./assets/js/main.js"></script>

</html>