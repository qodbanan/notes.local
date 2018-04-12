<?php
require_once 'main.php';
$isGuest = !isset($_SESSION['user_id']);
// fetch data user
if (!$isGuest) {
    $user_id = $_SESSION['user_id'];
    // fetch
    $db = Db::getInstance();
    $result = $db->query("SELECT * FROM `x_note` WHERE `user_id`='$user_id' ORDER BY `note_id` DESC;");
} else {
    $result = null;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account user</title>
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
						<?php if (!$isGuest): ?>
							<img src="img/avatar.png">
                            <p class="detail-profile">خوش امدید:  <strong><?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; ?></strong></p>
						<?php  else: ?>
                            <p class="detail-profile"><strong>شما یک کاربر عادی هستید</strong></p>
						<?php endif; ?>
                        </div>
                    </div>

                    <!-- Section right -->

                    <!-- Section left -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="group-content">
						<?php if (!$isGuest): ?>
							<a href="logout.php" class="btn-exit">خروج</a>
                            <?php if ($result == null) { $result = array(); } ?>
                            <?php foreach ($result as $row1) { $id = $row1['user_id']; } ?>
                            <span class="setting"><a href="account.php?edit_id=<?php echo $user_id; ?>"><i class="ico-cog2"></i></a></span>
						<?php  else: ?>
                            <a href="login.php" class="btn-exit">ورود</a>
                            <a href="register.php" class="btn-blue">ثبت نام</a>
						<?php endif; ?>
                        </div>
                    </div>
                    <!-- Section left -->

                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($isGuest): ?>
    <!-- Is for Guest -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <p class="text-center text-warning pt-5 display-2">
                    <i class="ico-user-plus2"></i>
                </p>
                <p class="text-center text-secondary pt-3">برای استفاده از سیستم ثبت نام کنید یا وارد اکانت خود شوید</p>
            </div>
        </div>
    </div>
    <!-- End Is for Guest -->
    <?php else: ?>
    <!-- Is for User -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="action-user">
                    <a href="note-register.php" class="btn-blue d-inline-block mt-3">درج یاداشت جدید</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mt-3">
                        <thead class="thead-light text-center">
                            <?php if ($result == null): ?>
                                <p class="text-center text-secondary mt-5 fz-15">شما هیچ یاداشتی ندارید لطفا یک یاداشت جدید بسازید.</p>
                            <?php else: ?>
                                <tr>
                                    <th scope="col">وضیعت</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">محتوا</th>
                                    <th scope="col">تاریخ</th>
                                </tr>
                            <?php endif; ?>
                        </thead>
                        <tbody>
                        <?php if ($result == null) { $result = array(); } ?>
                        <?php foreach ($result as $row): ?>
                        <?php
                            if ($row['isDone'] == 1) {
                                $addClass= 'active';
                            } else {
                                $addClass = 'pending';
                            }
                        ?>
                            <tr class="text-center <?php echo $addClass; ?>">
                                <td class="w-160">
                                    <a href="isdone.php?id=<?php echo $row['note_id']; ?>" class="btn-grey"><i class="ico-plus3"></i></a>
                                    <a href="del-note.php?id=<?php echo $row['note_id']; ?>" class="btn-grey"><i class="ico-minus3"></i></a>
                                </td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['text']; ?></td>
                                <td class="tbl_date"><?php echo $row['created_at']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Is for User -->
<?php endif; ?>

</body>
</html>