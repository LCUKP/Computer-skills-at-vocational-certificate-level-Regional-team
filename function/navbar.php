<?php if (isset($mainpage)):?>
<nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/GimyongConnect conflict2.svg" alt="..." height="36">
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="#homepage" class="nav-link active" data-bs-toggle="tab">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#info" class="nav-link" data-bs-toggle="tab">Account Info</a>
                </li>
            </ul>
        </div>
    </nav>
<?php else:?>
<nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">
                <img src="../img/LOGO gimyong connext.svg" alt="..." height="36">
            </a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="page.php" class="nav-link active">Home</a>
            </li>
            <!-- <li class="nav-item">
                <a href="" class="nav-link"></a>
            </li> -->
        </ul>
    </div>
</nav>
<?php endif;?>
