<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-6 mt-3">
                <h2>
                    <a href="<?php echo BASE_URL ?>">Система учёта успеваемости </a>
                </h2>
            </div>
            <nav class="col-6">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['login']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
