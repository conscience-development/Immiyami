<!--=====================================
                    SIDEBAR PART START
        =======================================-->
<aside class="sidebar-part">
    <div class="sidebar-body">
        <div class="sidebar-header">
            <a href="/" class="sidebar-logo"><img src="/front/images/logo.png" alt="logo"></a>
            <button class="sidebar-cross"><i class="fas fa-times"></i></button>
        </div>
        <div class="sidebar-content">
            <!--
                    <div class="sidebar-profile">
                        <a href="#" class="sidebar-avatar"><img src="/front/images/avatar/01.jpg" alt="avatar"></a>
                        <h4><a href="#" class="sidebar-name">Jackon Honson</a></h4>
                        <a href="ad-post.html" class="btn btn-inline sidebar-post">
                            <i class="fas fa-plus-circle"></i>
                            <span>post your ad</span>
                        </a>
                    </div>
-->
            <div class="sidebar-menu">
                <!--
                        <ul class="nav nav-tabs">
                            <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Main Menu</a></li>
                            <li><a href="#author-menu" class="nav-link" data-toggle="tab">Author Menu</a></li>
                        </ul>
-->

                <div class="tab-pane active" id="main-menu">
                    <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="/">Home</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="/pages/about">About Us</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="/pages/membership">Membership</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="/pages/articles">News</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="/list-posts">Classified Ads</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="/pages/post-add">Post Your Ads</a></li>

                        <!--
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>Advertise List</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li><a class="dropdown-link" href="ad-list-column3.html">ad list column 3</a></li>
                                        <li><a class="dropdown-link" href="ad-list-column2.html">ad list column 2</a></li>
                                        <li><a class="dropdown-link" href="ad-list-column1.html">ad list column 1</a></li>
                                    </ul>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>Advertise details</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li><a class="dropdown-link" href="ad-details-grid.html">ad details grid</a></li>
                                        <li><a class="dropdown-link" href="ad-details-left.html">ad details left</a></li>
                                        <li><a class="dropdown-link" href="ad-details-right.html">ad details right</a></li>
                                    </ul>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>Pages</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li><a class="dropdown-link" href="about.html">About Us</a></li>
                                        <li><a class="dropdown-link" href="compare.html">Ad Compare</a></li>
                                        <li><a class="dropdown-link" href="cities.html">Ad by Cities</a></li>
                                        <li><a class="dropdown-link" href="price.html">Pricing Plan</a></li>
                                        <li><a class="dropdown-link" href="user-form.html">User Form</a></li>
                                        <li><a class="dropdown-link" href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>blogs</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li><a class="dropdown-link" href="blog-list.html">Blog list</a></li>
                                        <li><a class="dropdown-link" href="blog-details.html">blog details</a></li>
                                    </ul>
                                </li>
-->
                        <li class="navbar-item"><a class="navbar-link" href="/pages/contact">Contact Us</a></li>
                    </ul>
                </div>

                <!--
                        <div class="tab-pane" id="author-menu">
                            <ul class="navbar-list">
                                <li class="navbar-item"><a class="navbar-link" href="dashboard.html">Dashboard</a></li>
                                <li class="navbar-item"><a class="navbar-link" href="profile.html">Profile</a></li>
                                <li class="navbar-item"><a class="navbar-link" href="ad-post.html">Ad Post</a></li>
                                <li class="navbar-item"><a class="navbar-link" href="my-ads.html">My Ads</a></li>
                                <li class="navbar-item"><a class="navbar-link" href="setting.html">Settings</a></li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="bookmark.html">
                                        <span>bookmark</span>
                                        <span>0</span>
                                    </a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="message.html">
                                        <span>Message</span>
                                        <span>0</span>
                                    </a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="notification.html">
                                        <span>Notification</span>
                                        <span>0</span>
                                    </a>
                                </li>
                                <li class="navbar-item"><a class="navbar-link" href="user-form.html">Logout</a></li>
                            </ul>
                        </div>
-->
            </div>

            <div class="sidebar-footer">
                <p>Copyright © <?=date('Y');?> ImmiYami All rights reserved</p>
                <!-- <p>Developed By <a href="https://conscienceintegrated.com">Conscience</a></p> -->
            </div>
        </div>
    </div>
</aside>
<!--=====================================
                    SIDEBAR PART END
        =======================================-->


<!--=====================================
                    MOBILE-NAV PART START
        =======================================-->
<nav class="mobile-nav">
    <div class="container">
        <div class="mobile-group">
            <a href="/" class="mobile-widget">
                <i class="fas fa-home"></i>
                <span>home</span>
            </a>
            <?

                            if(@$Auth->role == 'member'){
                                $url = '/memberProfile';
                            }elseif(@$Auth->role == 'supplier'){
                                $url = '/supplierProfile';
                            }else{
                                $url = '/Users/dashboard';
                            }
                            ?>
            <? if(empty(@$Auth->id)){ ?>
            <a href="/users/login" class="mobile-widget">
                <i class="fas fa-user"></i>
                <span>join me</span>
            </a>
            <?}else{?>

            <a href="<?=@$url;?>" class="mobile-widget">
                <i class="fas fa-user"></i>
                <span><?=@$Auth->first_name?></span>
            </a>

            <?}?>
            <a href="<?=@$url;?>" class="mobile-widget plus-btn">
                <i class="fas fa-plus"></i>
                <span>Enjoy</span>
            </a>
            <a href="/feesibility" class="mobile-widget">
                <i class="fas fa-bell"></i>
                <span>Eligibility</span>
            </a>
            <a href="/list-posts" class="mobile-widget">
                <i class="fas fa-plus-circle"></i>
                <span>Ads</span>
            </a>
        </div>
    </div>
</nav>
<!--=====================================
                    MOBILE-NAV PART END
        =======================================-->