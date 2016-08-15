<header class="header" style="position:fixed;" ng-controller="headController">
    <div class="header-block header-block-nav">
        <ul class="nav-profile">
            <li class="profile dropdown">
                Selamat Datang, <span class="name">{{data.user_name}}</span>
            </li>
            <li class="profile dropdown">
                <a class="dropdown-item" href="#"> <i class="fa fa-gear icon"></i> Ubah Password </a>
            </li>
            <li class="profile dropdown">
                <a class="dropdown-item" ng-click="logout()"> <i class="fa fa-power-off icon"></i> Keluar </a>
            </li>
        </ul>
    </div>
</header>