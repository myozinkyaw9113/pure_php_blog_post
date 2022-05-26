<header class="header">

        <div class="logoSearch">
            <div class="logo">
                <i class="fab fa-facebook-f"></i>
            </div>
            <div class="search">
                <div class="svg">
                    <img src="./svg/search.svg" alt="Search">
                </div>
                <input type="text" placeholder="Search Facebook">
            </div>
        </div>

        <div class="mainMenu">
            <div class="svg active">
                <img src="./svg/home.svg" alt="Facebook Home" srcset="">
            </div>
            <div class="svg">
                <img src="./svg/tv.svg" alt="Facebook Watch" srcset="">
            </div>
            <div class="svg">
                <img src="./svg/store.svg" alt="Facebook Store" srcset="">
            </div>
            <div class="svg">
                <img src="./svg/users.svg" alt="Facebook Groups" srcset="">
            </div>
            <div class="svg">
                <img src="./svg/map.svg" alt="Facebook Play" srcset="">
            </div>
        </div>

        <div class="profileTools">
            <div class="profile">
                <div class="img" style="background-image: url(./img/profile.jpg);"></div>
                <div class="username"><?php echo $thisUser['name']; ?></div>
            </div>
            <div class="tools">
                <div class="svg">
                    <img src="./svg/plus.svg" alt="Add">
                </div>
                <div class="svg">
                    <img src="./svg/blackberry-messenger.svg" alt="Messages">
                </div>
                <div class="svg">
                    <img src="./svg/bell.svg" alt="Notifications">
                </div>
                <div class="svg position-relative">
                    <div class="btn-group">
                        <i class='bx bxs-down-arrow' data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" style="width: 300px;">
                            <li><a class="dropdown-item" href="#">
                                <div class="d-flex gap-2">
                                    <div>
                                        <img style="border-radius: 50%;width:50px;height:auto;" src="https://scontent-kut2-1.xx.fbcdn.net/v/t39.30808-6/279779554_1079523809575847_5263109778331876648_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=bawUCcFIVwYAX9KYmCY&tn=f5ax0JGFAsvgBKu6&_nc_ht=scontent-kut2-1.xx&oh=00_AT-m_9hhG9WO4gYKS4LJK8N7ufsMF20Hpzg2-wWdFMJHWQ&oe=62931F8F">
                                    </div>
                                    <div>
                                        <h5 style="font-size: 1.1rem;" class="m-0"><?php echo $thisUser['name']; ?></h5>
                                        <p class="m-0">See Your Profile</p>
                                    </div>
                                </div>
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="../logout/logout.php"><i class='bx bx-log-out'></i> Logo Out</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </header>