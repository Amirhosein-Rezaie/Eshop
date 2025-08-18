<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" id="ProName" href="./">فروشگاه</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="User">
                <div>
                    <li class="nav-item">
                        <a data-bs-toggle="modal" data-bs-target="#myModal" href="#" class="btn">درباره ما</a>
                    </li>
                    <!-- The Modal of about us -->
                    <div class="modal" id="myModal" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header" >
                                    <h4 class="modal-title">ارتباط با ما</h4>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="text-align: center;">
                                    <div>
                                        <span class="text-secondary">شماره تلفن : </span>
                                        <span>090000000000</span>
                                    </div>
                                    <br>
                                    <div>
                                        <span class="text-secondary">ایمیل : </span>
                                        <span>example@gmail.com</span>
                                    </div>
                                </div>
                                <hr>
                                <!-- Modal Header -->
                                <div class="modal-header" >
                                    <h4 class="modal-title">درباره سایت</h4>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="text-align: center;">
                                    <p style="text-align: justify;">
                                        شما در این وب اپلیکیشن می توانیم انواع کالا ها را خریداری کنید
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php session_start(); ?>
                <?php if (empty($_SESSION['User'])) : ?>
                    <div id="loginBtn" style="display: contents;">
                        <li class="nav-item" id="">
                            <a href="./login.php" class="btn">ورود</a>
                        </li>
                        <li class="nav-item" id="">
                            <a href="./signin.php" class="btn">ثبت نام</a>
                        </li>
                    </div>
                    <?php else : ?>
                    <div>
                        <li class="nav-item dropdown" id="UserDpmenu">
                            <span class="nav-link btnUser" id="navbarDropdownOpen" role="button">
                                <span id="Uesrname"><?= $_SESSION['User']['Username']; ?></span>
                                <img width="25px" height="25px" src="../resources/images/profiles/<?= $_SESSION['User']['ProfileName'] ?>" alt="">
                            </span>
                            <ul id="dropDownMenu" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="./cart.php" class="dropdown-item">
                                        <i class="bi bi-basket"></i>
                                        <span class="dpItem">سبد خرید</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="#" class="text-danger dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span id="logoutBtn">خروج از حساب</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>
                <?php endif; ?>
            </ul>
            <form class="d-flex" style="display: none !important;">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<script>
    // log out
    $('#logoutBtn').on('click', function () {
        $.ajax({
            type: "post",
            url: "./php/logout.php",
            success: function (response) {
                console.log('ok');
                window.location.reload();
            },
            error: function() {
                console.log('DisConnected ... !');
            },
        });
    });

    // open the dropdown menu
    var display = 'none';
    $('#navbarDropdownOpen').on('click', function () {
        if (display == 'none') {
            display = 'block';
        }
        else {
            display = 'none';
        }
        $('#dropDownMenu').css('display', display);
    });
</script>