<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
								<? if($controller_action == 'dashboard'){
										echo @ucfirst($controller_action);
									}else{
										if(@$controller == 'BannerTypes'){
											$name = "Banner Type";
											echo '<i class="fa fa-arrow-left" id="backbtn"></i> &nbsp;'.@$name;
										}
										else{
											echo '<i class="fa fa-arrow-left" id="backbtn"></i> &nbsp; '. @$controller;
										} 
									}
								?>
							</div>
						</div>

						<ul class="navbar-nav header-right">
<!--
							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="26.309" height="23.678" viewBox="0 0 26.309 23.678">
								  <path id="Path_1955" data-name="Path 1955" d="M163.217,78.043a7.409,7.409,0,0,1,10.5-10.454l.506.506.507-.506a7.409,7.409,0,0,1,10.5,10.454L175.181,88.686a1.316,1.316,0,0,1-1.912,0Zm11.008,7.823,9.1-9.632.027-.027a4.779,4.779,0,1,0-6.759-6.757l-1.435,1.437a1.317,1.317,0,0,1-1.861,0l-1.437-1.437a4.778,4.778,0,0,0-6.758,6.757l.026.027Z" transform="translate(-161.07 -65.42)" fill="#135846" fill-rule="evenodd"/>
								</svg>
								</a>
							</li>
-->
							<!-- <li class="nav-item dropdown notification_dropdown">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="19.375" height="24" viewBox="0 0 19.375 24">
									  <g id="_006-notification" data-name="006-notification" transform="translate(-341.252 -61.547)">
										<path id="Path_1954" data-name="Path 1954" d="M349.741,65.233V62.747a1.2,1.2,0,1,1,2.4,0v2.486a8.4,8.4,0,0,1,7.2,8.314v4.517l.971,1.942a3,3,0,0,1-2.683,4.342h-5.488a1.2,1.2,0,1,1-2.4,0h-5.488a3,3,0,0,1-2.683-4.342l.971-1.942V73.547a8.4,8.4,0,0,1,7.2-8.314Zm1.2,2.314a6,6,0,0,0-6,6v4.8a1.208,1.208,0,0,1-.127.536l-1.1,2.195a.6.6,0,0,0,.538.869h13.375a.6.6,0,0,0,.536-.869l-1.1-2.195a1.206,1.206,0,0,1-.126-.536v-4.8a6,6,0,0,0-6-6Z" transform="translate(0 0)" fill="#135846" fill-rule="evenodd"/>
									  </g>
									</svg>

									<span class="badge light text-white bg-primary rounded-circle">0</span>
								</a>
<!--
								<div class="dropdown-menu dropdown-menu-end">
									<div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="/backend/images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-info">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-success">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											 <li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="/backend/images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-danger">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-primary">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
								</div>

							</li> -->
							<!-- <li class="nav-item dropdown notification_dropdown">
								<a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="21.6" viewBox="0 0 24 21.6">
									  <g id="_008-chat" data-name="008-chat" transform="translate(-250.397 -62.547)">
										<path id="Path_1956" data-name="Path 1956" d="M274.4,67.347a4.8,4.8,0,0,0-4.8-4.8H255.2a4.8,4.8,0,0,0-4.8,4.8v15.6a1.2,1.2,0,0,0,2.048.848l3.746-3.745a2.4,2.4,0,0,1,1.7-.7H269.6a4.8,4.8,0,0,0,4.8-4.8Zm-2.4,0a2.4,2.4,0,0,0-2.4-2.4H255.2a2.4,2.4,0,0,0-2.4,2.4v12.7l1.7-1.7a4.8,4.8,0,0,1,3.395-1.406H269.6a2.4,2.4,0,0,0,2.4-2.4Zm-15.6,7.2H266a1.2,1.2,0,1,0,0-2.4h-9.6a1.2,1.2,0,0,0,0,2.4Zm0-4.8h12a1.2,1.2,0,1,0,0-2.4h-12a1.2,1.2,0,0,0,0,2.4Z" fill="#135846" fill-rule="evenodd"/>
									  </g>
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">0</span>
								</a>
<!--
								<div class="dropdown-menu dropdown-menu-end">
									<div id="DZ_W_TimeLine02" class="widget-timeline dlab-scroll style-1 ps ps--active-y p-3 height370">
									<ul class="timeline">
										<li>
											<div class="timeline-badge primary"></div>
											<a class="timeline-panel text-muted" href="javascript:void(0);">
												<span>10 minutes ago</span>
												<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
											</a>
										</li>
										<li>
											<div class="timeline-badge info">
											</div>
											<a class="timeline-panel text-muted" href="javascript:void(0);">
												<span>20 minutes ago</span>
												<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
												<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
											</a>
										</li>
										<li>
											<div class="timeline-badge danger">
											</div>
											<a class="timeline-panel text-muted" href="javascript:void(0);">
												<span>30 minutes ago</span>
												<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
											</a>
										</li>
										<li>
											<div class="timeline-badge success">
											</div>
											<a class="timeline-panel text-muted" href="javascript:void(0);">
												<span>15 minutes ago</span>
												<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
											</a>
										</li>
										<li>
											<div class="timeline-badge warning">
											</div>
											<a class="timeline-panel text-muted" href="javascript:void(0);">
												<span>20 minutes ago</span>
												<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
											</a>
										</li>
										<li>
											<div class="timeline-badge dark">
											</div>
											<a class="timeline-panel text-muted" href="javascript:void(0);">
												<span>20 minutes ago</span>
												<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
											</a>
										</li>
									</ul>
								</div>
								</div>

							</li> -->
							<li class="nav-item dropdown header-profile">
								<?php if($Auth->photo) : ?>
									<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="/files/users/photo/<?=$Auth->photo_dir; ?>/<?= $Auth->photo; ?>" width="20" alt=""/>
									</a>
								<?php else :?>
									<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
										<img src="/backend/images/profile/5.jpg" width="20" alt=""/>
									</a>
								<?php endif?>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="/users/view/<?php echo $Auth->id;?>" class="dropdown-item ai-icon">
										<svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										<span class="ms-2">Profile </span>
									</a>
<!--
									<a href="./email-inbox.html" class="dropdown-item ai-icon">
										<svg id="icon-inbox1" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
										<span class="ms-2">Inbox </span>
									</a>
-->
									<a href="/users/logout" class="dropdown-item ai-icon">
										<svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
