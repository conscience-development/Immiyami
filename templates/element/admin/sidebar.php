<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="/Users/dashboard" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="/Articles" aria-expanded="false">
                    <i class="flaticon-381-newspaper"></i>
                    <span class="nav-text">Articles</span>
                </a>
            </li>
            <li><a href="/Videos" aria-expanded="false">
                    <i class="flaticon-381-video-clip"></i>
                    <span class="nav-text">Videos</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Suppliers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/Users/supplier">Suppliers</a></li>
                    <li><a href="/Users/supplierp">Premium Suppliers</a></li>
                    <li><a href="/Users/supplierq">Suppliers In Queue</a></li>

                </ul>
            </li>


            <li><a href="/Users/sponsor" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Sponsors</span>
                </a>
            </li>

            <li><a class="" href="/Posts" aria-expanded="false">
                    <i class="flaticon-381-newspaper"></i>
                    <span class="nav-text">Advertisements</span>
                </a>
                <!-- <ul aria-expanded="false">
							<li><a href="/Posts">Advertisements</a></li> -->
                <!-- <li><a href="/PostImages">Advertisement Images</a></li> -->
                <!-- </ul> -->
            </li>

            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Banners</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/Banners">Banners</a></li>
                    <li><a href="/BannerTypes">Banner Types</a></li>

                </ul>
            </li>

            <li><a href="/Users/member" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Members</span>
                </a>
            </li>

            <li><a href="/Campaigns" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Campaigns</span>
                </a>
            </li>
            
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-locations"></i>
                    <span class="nav-text">Countries</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/Countries">Countries</a></li>
                    <li><a href="/PreferredCountries">Preferred Countries</a></li>

                </ul>
            </li>

            

            

            
            <li><a href="/Coupons" aria-expanded="false">
                    <i class="flaticon-381-list"></i>
                    <span class="nav-text">Coupons</span>
                </a>

            </li>

            <?php if($Auth->role == 'superuser'):?>
                <li>
                    <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-user-7"></i>
                        <span class="nav-text">Users</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/Users">Users</a></li>
                        <!-- <li><a href="/Payments">Member Payments</a></li>
                                <li><a href="/Payments/indexSponsor">Sponsor Payments</a></li> -->
                        <!-- <li><a href="/Galleries">Galleries</a></li> -->
                    </ul>
                </li>
            <?endif?>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-id-card"></i>
                    <span class="nav-text">Payments</span>
                </a>
                <ul aria-expanded="false">
                    <!-- <li><a href="/Users">Users</a></li> -->
                    <li><a href="/Payments">Member Payments</a></li>
                    <li><a href="/Payments/indexSponsor">Sponsor Payments</a></li>
                    <!-- <li><a href="/Galleries">Galleries</a></li> -->
                </ul>
            </li>
            <li><a href="/Subscriptions" aria-expanded="false">
                    <i class="flaticon-381-user-8"></i>
                    <span class="nav-text">Subscriptions</span>
                </a>
            </li>

            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-folder"></i>
                    <span class="nav-text">Reports</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/videos/report">Videos Reports</a></li>
                    <li><a href="/QueueSubmissions/report">Queue Submission Reports</a></li>
                    <li><a href="/articles/report">Articles Reports</a></li>
                    <li><a href="/posts/report">Advertisements Reports</a></li>
                    <li><a href="/Payments/report">Payments Reports</a></li>
                    <li><a href="/users/report">Members /Suppliers /Sponsors Reports</a></li>
                    <li><a href="/banners/report">Banner Reports</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-6"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/Discussions">Discussions</a></li>
                    <!-- <li><a href="/QueueSubmissions">Queue Submissions</a></li> -->
                    <li><a href="/XmlSheets">Xml Sheets</a></li>
                    <li><a href="/Categories">Categories</a></li>
                    <li><a href="/Helps">Help</a></li>
                    <li><a href="/Flags">Flags</a></li>
                    <li><a href="/ActivityLogs">ActivityLogs</a></li>
                    <li><a href="/Settings/errorfile">Error Log</a></li>
                    <li><a href="/Settings/debugfile">Debug Log</a></li>
                    <li><a href="/Settings">Settings</a></li>
                </ul>
            </li>

        </ul>
        <div class="dropdown header-profile2 ">
            <a href="/Users/dashboard" aria-expanded="false">
                <div class="header-info2 text-center">
                    <?if($Auth->photo) :?>
                        <img src="/files/users/photo/<?=$Auth->photo_dir; ?>/<?= $Auth->photo; ?>" width="20" alt=""/>
                    <?else:?>
                        <img src="/backend/images/profile/5.jpg" alt="" />
                    <?endif?>
                    <div class="sidebar-info">
                        <div>
                            <h5 class="font-w500 mb-0"><?=$Auth->first_name.' '.$Auth->last_name;?></h5>
                            <span class="fs-12"><?=$Auth->email;?></span>
                        </div>
                    </div>
                    <div>
                        <a href="/Users/dashboard" class="btn btn-md text-secondary">Contact Us</a>
                    </div>
                </div>

            </a>
        </div>
        <div class="copyright">
            <p class="text-center"><strong>Immiyami Admin Dashboard</strong> © <?=date("Y");?> All Rights Reserved</p>
            <!-- <p class="fs-12 text-center">Made with <span class="heart"></span> by Conscience</p> -->
        </div>
    </div>
</div>