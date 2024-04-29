<div class="countries index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                <?= __('Countries') ?>
            </h4>
            <?= $this->Html->link(__('New Country'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th>
                                    <?= $this->Paginator->sort('name') ?>
                                </th>
                                <th>
                                    <?= $this->Paginator->sort('status') ?>
                                </th>
                                <!--
                                                                <th><?= $this->Paginator->sort('phone_code') ?></th>
-->
                                <th>
                                    <?= $this->Paginator->sort('created') ?>
                                </th>
                                <th class="actions">
                                    <?= __('Actions') ?>
                                </th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($countries as $country): ?>
                            <tr>
                                <td><input type="checkbox" class="checkbox_check_ind" val_id="<?= $country->id ?>"></td>
                                <!--
                    <td><?= $this->Number->format($country->id) ?></td>
-->
                                <td>
                                    <?= h($country->name) ?>
                                </td>
                                <td>
                                    <? if ($country->status == '0') { ?>
                                        Inactive
                                    <? } elseif ($country->status == '1') { ?>
                                        Active
                                    <? } ?>

                                </td>
                                <!--
                    <td><?= h($country->phone_code) ?></td>
-->

                                <td>
                                    <?= date('Y/m/d H:s', strtotime($country->created)) ?>
                                </td>


                                <td class="actions">
                                    <div class="d-flex">
                                        <?= $this->Html->link(
                                            '<i class="fas fa-eye">' . __('') . '</i>',
                                            ['action' => 'view', $country->id],
                                            ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
                                        ) ?>
                                        <?= $this->Html->link(
                                            '<i class="fas fa-pencil-alt">' . __('') . '</i>',
                                            ['action' => 'edit', $country->id],
                                            ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
                                        ) ?>
                                        <?= $this->Form->postLink(
                                            '<i class="fa fa-trash">' . __('') . '</i>',
                                            ['action' => 'delete', $country->id],
                                            ['escape' => false, 'confirm' => __('Are you sure you want to delete this country', $country->id), 'class' => 'btn btn-danger shadow btn-xs sharp']
                                        ) ?>
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
    <p>
        <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </p>
</div>