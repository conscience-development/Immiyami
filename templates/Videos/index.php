<div class="videos index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Videos') ?></h4>
            <?= $this->Html->link(__('New Video'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('type') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('url') ?></th>
-->
                                <th><?= $this->Paginator->sort('photo') ?></th>
                                <th><?= $this->Paginator->sort('featured') ?></th>
                                <th><?= $this->Paginator->sort('premium') ?></th>
                                <!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
                                <!--
																<th><?= $this->Paginator->sort('file') ?></th>
																<th><?= $this->Paginator->sort('file_dir') ?></th>
-->
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th style="width: 100px;"><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($videos as $video): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$video->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($video->id) ?></td>
-->                         
                            <?if(strlen($video->title)>30) :?>
                                <td><?= substr_replace($video->title,"...",30) ?></td>
                            <?else:?>
                                <td><?= h($video->title) ?></td>
                            <?endif?>
                            
                            <td><?= h($video->type) ?></td>
                            <!--
                    <td><?= h($video->url) ?></td>
-->                         
                            <?php if ($video->type == 'youtube'): ?>
                                <?php 
                                  
                                    $code = explode('=',$video->url);
                                    $code = explode('&',$code[1]);  
                                ?>
                                    <td>
                                        <div class="table-pic">
                                            <img src="https://img.youtube.com/vi/<?=$code[0]; ?>/0.jpg" style="width: 67%; object-fit: cover; height: 55%;">
                                        </div>
                                    </td>
                                

                                <?php else : ?>
                                    <td>
                                        <? if($video->photo_dir){ ?>
                                            <div class="table-pic">
                                                <img src="/files/videos/photo/<?=$video->photo_dir;?>/square_<?=$video->photo;?>" />
                                            </div>
                                <?}?>
                                <?php endif;?>
                            </td>
                                
                            
                            <!--
                    <td><?= h($video->photo_dir) ?></td>
                    <td><?= h($video->file) ?></td>
                    <td><?= h($video->file_dir) ?></td>
-->
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
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $video->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $video->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this video ?', $video->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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