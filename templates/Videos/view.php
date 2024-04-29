<!DOCTYPE html>
<html>

<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://www.youtube.com/iframe_api"></script>
</head>

<body>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between">
					<h4 class="card-title text-center">
					<?= substr_replace($video->title,"...",70) ?>
					</h4>
					<div class="status-details ">
						<div class="created">
							<strong>
								<?= __('Created') ?>:
							</strong>
							<span>
								<?= date('Y/m/d H:s', strtotime($video->created)) ?>
							</span>
						</div>
						<?php if ($video->status == 1): ?>
							<div class="status active">
								<strong>
									<?= __('Status') ?>:
								</strong>
								<span style="color: blue;">Active</span>
							</div>
						<?php else: ?>
							<div class="status inactive">
								<strong>
									<?= __('Status') ?>:
								</strong>
								<span style="color: red;">Inactive</span>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="card-body">
					<div class="videos view content">
						<div class="row">
							<div class="col-md-6">
								<?php if ($video->type == "upload"): ?>
									<strong>
										<?= __('Video') ?>
									</strong>
									<br />
									<br />
									<video width="600" height="340" controls>
										<source src="/files/videos/file/<?= $video->file_dir; ?>/<?= $video->file; ?>">
									</video>
								<?php else: ?>
									<?php
									$code = explode('=', $video->url);
									$code = explode('&', $code[1]);
									?>
									<iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $code[0]; ?>"
										title="YouTube video player" frameborder="0"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
										allowfullscreen></iframe>
									
									<strong>
										<?= __('Url') ?>
									</strong>
									<a href="<?= $video->url ?>">
										<blockquote>
											<?= $this->Text->autoParagraph(h($video->url)); ?>
										</blockquote>
									</a>

								<?php endif; ?>
								<?php if ($video->photo_dir): ?>
									<strong>
										<?= __('Image') ?>: <br/>
									</strong>
									<img src="/files/videos/photo/<?= $video->photo_dir; ?>/square_<?= $video->photo; ?>"
										alt="<?= h($video->title) ?>" />
								<?php endif; ?>
								<p><strong>
										<?= __('Type') ?>:
									</strong>
									<?= h($video->type) ?>
								</p>
								<p><strong>
										<?= __('Premium') ?>:
									</strong>
									<?if($video->premium == 1) : ?>
										Yes
									<?else:?>
										No
									<?endif?>
								</p>
								<!-- <p><strong><?= __('Id') ?>:</strong> <?= $this->Number->format($video->id) ?></p> -->
								<!-- <p><strong>
										<?= __('Created') ?>:
									</strong>
									<?= date('Y/m/d H:s', strtotime($video->created)) ?> -->
								</p>
							</div>
							<div class="col-md-6">
								
								<!-- <p><strong><?= __('Photo Dir') ?>:</strong> <?= h($video->photo_dir) ?></p>
			  <p><strong><?= __('File') ?>:</strong> <?= h($video->file) ?></p>
			  <p><strong><?= __('File Dir') ?>:</strong> <?= h($video->file_dir) ?></p> -->
							</div>
						</div>
						<div class="text">


						</div>
						<p><strong>
								<?= __('Featured') ?>:
							</strong>
							<?php if ($video->featured == 1): ?>
								Yes
							<?php else: ?>
								No
							<?php endif; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var player;
		function onYouTubeIframeAPIReady() {
			player = new YT.Player('player', {
				height: '390',
				width: '640',
				videoId: '',
			});
		}
	</script>
</body>

</html>