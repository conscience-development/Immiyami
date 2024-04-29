<div class="action_bar col-12">
	<div class="row page-titles">
		<div class="bulk_actions col-xs-12 col-sm-6 col-md-8 col-lg-8 no-side-padding">
			<div class="newest ms-3">
				<!-- <?php echo $this->Form->control('status',['label'=>false,'options' =>['0'=>'Inactive','1'=>'Active','2'=>'Delete'] ,'class'=>'default-select']);?> -->
			</div>
			<!-- <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary ml-5px','id'=>'multiAction']) ?> -->
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<? echo $this->Form->create(null, ['valueSources' => 'query' , 'id'=>'searchinput']); ?>
			<div class="nav-item d-flex align-items-center">
				<div class="input-group search-area">
					<input type="text" name="q" class="form-control" placeholder="Search Here">
					<span class="input-group-text"><a onclick="document.getElementById('searchinput').submit();" href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
					<span class="input-group-text"><a href="/<?=@$controller;?>/<?=@$controller_action;?>"><i class="flaticon-381-turn-off"></i></a></span>

				</div>
			</div>
			<? echo $this->Form->end(); ?>
		</div>

	</div>

</div>