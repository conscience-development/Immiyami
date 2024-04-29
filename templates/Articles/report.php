<div class="articles index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Articles Reports') ?></h4>
            <?= $this->Form->create(null, ['type' => 'POST']); ?>
                <?= $this->Form->control('export', ['type' => 'hidden', 'value' => '1', 'class' => 'form-control']); ?>
                <?= $this->Form->button(__('Export XLSX'), ['class' => 'btn btn-primary float-right']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('title') ?></th>
                            <th><?= $this->Paginator->sort('photo') ?></th>
                            <th><?= $this->Paginator->sort('status') ?></th>
                            <th><?= $this->Paginator->sort('user_id') ?></th>
                            <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= h($article->title) ?></td>
                                <td>
                                    <?php if ($article->photo_dir): ?>
                                        <div class="table-pic">
                                            <img src="/files/articles/photo/<?=$article->photo_dir;?>/square_<?=$article->photo;?>" />
                                        </div>
                                    <?else:?>
                                        <div class="table-pic">
                                            <img src="/files/articles/photo/newsview.jpg" style="width: 50%;"  />
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($article->status == '0'): ?>
                                        Inactive
                                    <?php else: ?>
                                        Active
                                    <?php endif; ?>
                                </td>
                                <td><?= $article->has('user') ? $this->Html->link($article->user->first_name, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                                <td><?= date('Y/m/d H:s', strtotime($article->created)) ?></td>
                                <td class="actions">
                                    <div class="d-flex">
                                        <?= $this->Html->link(
                                            '<i class="fas fa-eye">' . __('') . '</i>',
                                            ['action' => 'view', $article->id],
                                            ['escape' => false, 'title' => __('View'), 'target' => '_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
                                        ) ?>
                                        <?= $this->Html->link(
                                            '<i class="fas fa-pencil-alt">' . __('') . '</i>',
                                            ['action' => 'edit', $article->id],
                                            ['escape' => false, 'title' => __('Edit'), 'target' => '_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
                                        ) ?>
                                        <!--
                                        <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
                                            ['action' => 'delete', $article->id],
                                            ['escape' => false, 'confirm' => __('Are you sure you want to delete this article', $article->id), 'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
                                        -->
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
    <ul class="pagination pagination-circle">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
