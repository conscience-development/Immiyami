
<?
use Cake\ORM\TableRegistry;
?>
<div class="posts index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Posts') ?></h4>
            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
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
                                <!-- <th><?= $this->Paginator->sort('photo') ?></th> -->
                                <!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
                                <!--
																<th><?= $this->Paginator->sort('url') ?></th>
-->
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <!-- <th><?= $this->Paginator->sort('clicks') ?></th> -->
                                <th><?= $this->Paginator->sort('user_id') ?></th>
                                <th><?= $this->Paginator->sort('approved_date') ?></th>
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$post->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($post->id) ?></td>
-->
                            <td><?= h($post->title) ?></td>
                            <!--
                    <td><?= h($post->short_description) ?></td>
                    <td><?= h($post->description) ?></td>
-->
                            <!-- <td><?= h($post->photo) ?></td> -->
                            <!--
                    <td><?= h($post->photo_dir) ?></td>
                    <td><?= h($post->url) ?></td>
-->
                            <td>
                                <? if($post->status == '0'){ ?>
                                Inactive
                                <?}else{?>
                                Active
                                <?}?>
                            </td>
                            <!-- <td><?= $post->clicks === null ? '' : $this->Number->format($post->clicks) ?></td> -->
                            <!-- <?if($post->supplier_id != null):?>
                                <td>Hehe</td>
                            <?else:?>
                                <td><?=  $this->Html->link($post->user->first_name, ['controller' => 'Users', 'action' => 'view', $post->user_id]) ?>
                            <?endif?> -->
                                <?
                                    $this->Users11 = TableRegistry::get('Users');
                                    $user11 = $this->Users11->get($post->user_id);
                                    $userName = $user11->first_name;
                                ?>
                                <td><?= $post->has('user') ? $this->Html->link($post->user->first_name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : $userName?>
                            </td>
                                
                            <? 
                                if($post->status == '0'){ ?>
                                    <td>-</td>
                                <?}
                            ?>
                            
                            <? 
                                if($post->status =='1' && ($post->user->role =='superuser' || $post->user->role =='admin') ){ ?>
                                    <td><?= date('Y/m/d',strtotime(($post->approved_date))) ?></td> <?
                                }
                                if($post->status == '1' && !(($post->user->role =='superuser' || $post->user->role =='admin'))){ ?>
                                    <td><?= date('Y/m/d',strtotime(($post->approved_date))) ?></td>
                                <?}
                            ?>
                            <td><?= date('Y/m/d H:i',strtotime(($post->created))) ?></td>
                            <td class="actions">
                                <div class="d-flex">
                                    <?
                                        $session = $this->getRequest()->getSession();
                                        $pIdsArrViewd = $session->read('Config.ArrPostIdViewd');
                                    ?>
                                    <? if($post->status == '0' || $post->c_status == '0'){ ?>
                                    <?= $this->Form->postLink('<i class="fa fa-check">'.__('').'</i>',
								['action' => 'changestatus', $post->id],
								['escape' => false, 'confirm' => __('Are you sure you want to update # {0}?', $post->id),'class' => 'btn btn-danger shadow btn-xs sharp me-1']) ?>

                                    <?}?>
                                    <?//= $this->Html->link(
							// '<i class="fas fa-eye">' . __('') . '</i>',
                            // /post-view?post_id=Test-title-details-1
							// ['action' => 'view', $post->id],
							// ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						// ) ?>

                                    <a href="post-view?post_id=post-view-<?=$post->id;?>&view_type=adminProfile"
                                        target="_blank" title="View" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                            class="fas fa-eye"></i></a>
                                    <!-- <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $post->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?> -->
                        <a href="supplierProfile?post-id=<?=$post->id;?>#edit-post"
                                        target="_blank" title="View" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                            class="fas fa-pencil-alt"></i></a>

                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $post->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this Ad?', $post->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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