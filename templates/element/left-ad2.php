<!-- <div class="left-top-add-slider slider-arrow mt-5">
	<?
	foreach($home_banners as $hbanner){
		if($hbanner->position == 'left_top'){
	?>
	<a href="<?=$hbanner->url?>" target="_blank">
	<div class="product-card">
		<div class="product-media">
			<div class="product-img">
				<img src="/files/banners/photo/<?=$hbanner->photo_dir;?>/<?=$hbanner->photo?>" alt="<?=$hbanner->title?>">
			</div>
		</div>
	</div>
	</a>
	<? }}?>
</div> -->
 <div class="left-bottom-add-slider slider-arrow mt-5">
	<?
	foreach($home_banners as $hbanner){
		if($hbanner->position == 'left_bottom'){
	?>
	<a href="<?=$hbanner->url?>" target="_blank">
	<div class="product-card">
		<div class="product-media">
			<div class="product-img">
				<img src="/files/banners/photo/<?=$hbanner->photo_dir;?>/<?=$hbanner->photo?>" alt="<?=$hbanner->title?>">
			</div>
		</div>
	</div>
	</a>
	<? }}?>
</div>
