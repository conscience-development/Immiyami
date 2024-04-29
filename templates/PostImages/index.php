<div class="postImages index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Post Images') ?></h4>
            <?= $this->Html->link(__('New Post Image'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('photo') ?></th>
                                <!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
                                <th><?= $this->Paginator->sort('post_id') ?></th>
                                <th><?= $this->Paginator->sort('created','Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($postImages as $postImage): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$postImage->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($postImage->id) ?></td>
-->
                            <td><?= h($postImage->photo) ?></td>
                            <!--
                    <td><?= h($postImage->photo_dir) ?></td>
-->
                            <td><?= $postImage->has('post') ? $this->Html->link($postImage->post->title, ['controller' => 'Posts', 'action' => 'view', $postImage->post->id]) : '' ?>
                            </td>

                            <td><?= h($postImage->created) ?></td>


                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $postImage->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $postImage->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $postImage->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this post image?', $postImage->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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