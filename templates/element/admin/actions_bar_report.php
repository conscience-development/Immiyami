<div class="action_bar col-12">
    <div class="row page-titles">
        <? echo $this->Form->create(null,['type'=>'GET']); ?>
        <div class="row">
            <? if( in_array($controller,['Payments']) ){ ?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('package',['options' =>['free'=>'Free','gold'=>'Gold','platinum'=>'Platinum'] ,'value'=>@$this->request->getQuery('package'),'empty' => true,'class'=>'form-control']);?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('package',['options' =>['free'=>'Free','gold'=>'Gold','platinum'=>'Platinum'] ,'value'=>@$this->request->getQuery('package'),'empty' => true,'class'=>'form-control']);?>
            </div>
            <?}else{?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'],'value'=>@$this->request->getQuery('status') ,'empty' => true,'class'=>'form-control']);?>
            </div>
            <?}?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('start_date', ['type'=>'date','empty' => true,'value'=>@$this->request->getQuery('start_date'),'class'=>'form-control datepicker-default']);?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('end_date', ['type'=>'date','empty' => true,'value'=>@$this->request->getQuery('end_date'),'class'=>'form-control datepicker-default']);?>
            </div>
            <? if( in_array($controller,['Users','Payments']) ){ ?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('user_id', ['label'=>'Role','options' => $usersSets, 'empty' => true,'value'=>@$this->request->getQuery('user_id'),'class'=>'multi-select wide form-control']);?>
            </div>
            <?}?>
            <? if( in_array($controller,['Banners' ]) ){ ?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('user_id', ['label'=>'Sponsore','options' => $users, 'empty' => true,'value'=>@$this->request->getQuery('user_id'),'class'=>'multi-select wide form-control']);?>
            </div>
            <?}?>
            <? if( in_array($controller,['Articles']) ){ ?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('user_id', ['label'=>'User','options' => $users, 'empty' => true,'value'=>@$this->request->getQuery('user_id'),'class'=>'multi-select wide form-control']);?>
            </div>
            <?}?>
            <? if( in_array($controller,['Banners']) ){ ?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('banner_type_id', ['options' => $bannerTypes, 'empty' => true,'value'=>@$this->request->getQuery('banner_type_id'),'class'=>'multi-select wide form-control']);?>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('position',['options' =>['top'=>'Top','left_top'=>'Left Top','left_bottom'=>'Left Bottom','right_top'=>'Right Top','right_bottom'=>'Right Bottom'],'empty' => true,'value'=>@$this->request->getQuery('position') ,'class'=>'form-control']);?>
            </div>
            <?}?>
            <? if( in_array($controller,['Videos']) ){ ?>

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <?php echo $this->Form->control('type',['options' =>['upload'=>'Upload','youtube'=>'Youtube'],'empty' => true ,'value'=>@$this->request->getQuery('type'),'class'=>'form-control']);?>
            </div>
            <?}?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <br>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary mt-2','id'=>'']) ?>
                <a href="/<?=@$controller;?>/report" class="btn btn-primary mt-2">
                    Clear
                </a>
                <?//= $this->Form->button(__('Clear'),['class'=>'btn btn-primary mt-2','id'=>'']) ?>

            </div>
        </div>
        <? echo $this->Form->end(); ?>
    </div>

</div>