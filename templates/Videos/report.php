<div class="videos index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Videos Reports') ?></h4>
            <?= $this->Form->create(null, ['type'=>'POST']); ?>
            <?= $this->Form->control('export',['type'=>'hidden','value'=>'1','class'=>'form-control']);?>
            <?= $this->Form->button(__('Export XLSX'), ['class' => 'btn btn-primary float-right']) ?>
            <?= $this->Form->end() ?>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <!-- <th id="th_checkbox"> </th> -->
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('featured') ?></th>
                                <th><?= $this->Paginator->sort('premium') ?></th>
                                <th><?= $this->Paginator->sort('type') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('url') ?></th>
-->
                                <th><?= $this->Paginator->sort('photo') ?></th>
                                <!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
                                <!--
																<th><?= $this->Paginator->sort('file') ?></th>
																<th><?= $this->Paginator->sort('file_dir') ?></th>
-->
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($videos as $video): ?>
                        <tr>
                            <!-- <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$video->id?>"></td> -->
                            <!--
                    <td><?= $this->Number->format($video->id) ?></td>
-->
                            <td><?= h($video->title) ?></td>
                            <td>
                                <? if($video->featured == '0'){ ?>
                                No
                                <?}else{?>
                                Yes
                                <?}?>
                            </td>
                            <td>
                                <? if($video->premium == '0'){ ?>
                                No
                                <?}else{?>
                                Yes
                                <?}?>
                            </td>
                            <td><?= h($video->type) ?></td>
                            <!--
                    <td><?= h($video->url) ?></td>
-->
                            <td>
                                <? if($video->photo_dir){ ?>
                                <div class="table-pic">
                                    <img src="/files/videos/photo/<?=$video->photo_dir;?>/square_<?=$video->photo;?>" />
                                </div>
                                <?}?>
                            </td>
                            <!--
                    <td><?= h($video->photo_dir) ?></td>
                    <td><?= h($video->file) ?></td>
                    <td><?= h($video->file_dir) ?></td>
-->
                            <td>
                                <? if($video->status == '0'){ ?>
                                Inactive
                                <?}else{?>
                                Active
                                <?}?>
                            </td>

                            <td><?= date('Y/m/d H:s', strtotime($video->created)) ?></td>


                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $video->id],
							['escape' => false, 'title' => __('View'),'target'=>'_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $video->id],
							['escape' => false, 'title' => __('Edit'),'target'=>'_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <!-- <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $video->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this video ?', $video->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?> -->
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="paginator">
    <ul class="pagination  pagination-circle">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </p>
</div>