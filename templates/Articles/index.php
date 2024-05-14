<!-- 
    Modified by sehan 
    changes : change the formate of the time and date 
-->
<div class="articles index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Articles') ?></h4>
            <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('short_description') ?></th>
																<th><?= $this->Paginator->sort('description') ?></th>
-->
                                <th><?= $this->Paginator->sort('photo') ?></th>
                                <!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('user_id') ?></th>
                                <th style="width: 100px;"><?= $this->Paginator->sort('created','Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$article->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($article->id) ?></td>
-->                     
                            <td><?=h($article->title)?></td>
                    
                            <!--
                    <td><?= h($article->short_description) ?></td>
                    <td><?= h($article->description) ?></td>
-->
                            <td>
                                <? if($article->short_description){ ?>
                                     <img src="<?=$article->short_description;?>" style="width: 200px;height: 112px;"/>
                                <? }else if($article->photo_dir){ ?>
                                <div class="table-pic">
                                    <img
                                        src="/files/articles/photo/<?=$article->photo_dir;?>/square_<?=$article->photo;?>" />
                                </div>
                                <?} else {
                                    ?>
                                    <div class="table-pic">
                                    <img
                                        src="/files/articles/photo/newsview.jpg" style="width: 200px;height: 112px;" />
                                    </div>
                                <?}?>
                            </td>
                            <!--
                    <td><?= h($article->photo_dir) ?></td>
-->
                            <td>
                                <? if($article->status == '0'){ ?>
                                Inactive
                                <?}else{?>
                                Active
                                <?}?>
                            </td>
                            <td><?= $article->has('user') ? $this->Html->link($article->user->first_name, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?>
                            </td>

                            <td>
                                <div style="display: inline-block;">
                                    <?=  date('Y/m/d H:i',strtotime($article->created)) ?>
                                </div>
                            </td>

                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $article->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $article->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                            <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $article->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this Article ', $article->title),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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