
<div class="col-lg-12 col-sm-12 col-xs-12 d-block d-sm-none">
<a href="/list-posts" class="add-red-bar"><div class="add-red-bardiv">Classified Ads</div></a>
</div>
<style>
	/* .product-card {
    width: 100%; /* Make the card responsive to its container */
}

.product-media {
    width: 100%;
    height: auto; /* Maintain aspect ratio */
}

.product-img {
    width: 100%;
    height: auto; /* Maintain aspect ratio */
    overflow: hidden;
}

.product-img img {
    width: 100%;
    height: auto; /* Make the image responsive */
    object-fit: cover; /* Maintain aspect ratio and cover the container */
} */

</style>
<!--
            <div class="container-fluid">
-->
                <div class="top-add-slider slider-arrow mt-5">
					<?
					foreach($home_banners as $hbanner){
						if($hbanner->position == 'top'){
					?>
					<a href="<?=$hbanner->url?>" target="_blank">
					<div class="product-card" >
						<div class="product-media" style="width:  1500px;
																	height: 158.825px;
																	overflow:hidden;">
							<div class="product-img" style="width:  1500px;
																	height: 158.825px;
																	overflow:hidden;">
								<img src="/files/banners/photo/<?=$hbanner->photo_dir;?>/ad_Top_<?=$hbanner->photo?>" alt="<?=$hbanner->title?>" style="
																							width:  100%;
																							height: 100%;
																							object-fit: cover;
								">
							</div>
						</div>
					</div>
					</a>
					<? }}?>

				</div>
<!--
            </div>
-->
