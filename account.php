<?php
require_once 'main.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
} else {

    // Declared var
    $user_id                 = intval($_GET['edit_id']);
    $_SESSION['edit_user_id'] = intval($_GET['edit_id']);

    // check is user valid
    if ($user_id != $_SESSION['user_id']) {
        header("Location: index.php");
        exit();
    }

    // make db
    $db     = Db::getInstance();
    $result = $db->query("SELECT * FROM `x_user`   WHERE `user_id`='$user_id';");

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اطلاعات حساب کاربری</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="container-box">
            <div class="col-12">
                <div class="row">

                    <!-- Section right -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="profile">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <img src="img/avatar.png">
                                <p class="detail-profile">خوش امدید:  <strong><?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; ?></strong></p>
                            <?php endif; ?>

                            <ul class="menu-user">
                                <li><a href="index.php">صفحه اصلی</a></li>
                            </ul>

                        </div>
                    </div>

                    <!-- Section right -->

                    <!-- Section left -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="group-content">
                            <a href="logout.php" class="btn-exit">خروج</a>
                        </div>
                    </div>
                    <!-- Section left -->

                </div>
            </div>
        </div>
    </div>
</div>

<!-- show info user -->
<div class="container">
    <div class="row mt-5">

        <div class="col-12 col-md-4">
            <div class="card">
                <div class="nav flex-column nav-pills m-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" data-toggle="pill" href="#profile" role="tab">پروفایل</a>
                    <a class="nav-link" data-toggle="pill" href="#edit-profile" role="tab">ویرایش پروفایل</a>
                </div>
            </div>

        </div>

        <div class="col">
            <div class="card">
                <div class="tab-content p-3" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <div class="profile-show">
                            <ul>
                                <?php
                                $countNote =  $db->query("SELECT COUNT(*) AS `count` FROM x_note WHERE user_id = '$user_id';");
                                foreach ($countNote as $count) {
                                    $counts = $count['count'];
                                }
                                ?>
                                <?php foreach ($result as $row): ?>
                                    <div class="user-line">
                                        <li>
                                            تعداد یاداشت های شما : <span><?php echo $counts; ?></span>
                                        </li>
                                        <li>
                                            نام کاربری : <span><?php echo $row['email']; ?></span>
                                        </li>
                                        <li>
                                            نام کامل : <span><?php echo $row['fullname']; ?></span>
                                        </li>
                                        <li>
                                            نام مستعار شما : <span><?php echo $row['nickname']; ?></span>
                                        </li>
                                    </div>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="edit-profile" role="tabpanel">
                        <h3 class="title-profile">ویرایش پروفایل</h3>
                        <div class="profile-edit">
                            <form action="edit-profile.php" method="post">
                                <?php foreach ($result as $rows): ?>
                                    <div class="form-group mt-4">
                                        <label class="col-form-label">ایمیل :</label>
                                        <p><?php echo $rows['email']; ?></p>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label class="col-form-label">رمز جدید</label>
                                        <input type="password" class="input-box" name="password" placeholder="رمز جدید">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label class="col-form-label">نام کامل :</label>
                                        <input type="text" class="input-box" name="fullname" value="<?php echo $rows['fullname']; ?>">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label class="col-form-label">نام متسعار: </label>
                                        <input type="text" class="input-box" name="nickname" value="<?php echo $rows['nickname']; ?>">
                                    </div>
                                    <button type="submit" name="btn_edit_profile" class="btn-blue btn-block">ویرایش پروفایل</button>
                                <?php endforeach; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End show info user -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
</body>
</html>

