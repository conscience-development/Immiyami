<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <?= h($user->name) ?>
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th><?= __('First Name') ?></th>
                            <td><?= substr_replace($user->first_name,"...",120) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Last Name') ?></th>
                            <td><?= substr_replace($user->last_name,"...",120) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($user->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact') ?></th>
                            <td><?= h($user->contact) ?></td>
                        </tr>
                        <?php if ($user->role == 'supplier' || $user->role == 'member' ): ?>
                            <tr>
                                <th><?= __('Country') ?></th>
                                <td><?= h($user->country->name) ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ( $user->role == 'member'): ?>
                            <tr>
                                <th><?= __('Preferred Country') ?></th>
                                <td><?= h($user->preferred_country->name) ?></td>
                            </tr>
                        <? if(false):?>
                            <tr>
                                <th><?= __('Coupon') ?></th>
                                <td><?= h($user->coupon->name) ?></td>
                            </tr>
                        <?endif;?>
                        <?php endif; ?>
                        <?php if ( $user->role == 'sponsor'): ?>
                            <tr>
                                <th><?= __('Company Name') ?></th>
                                <td><?= h($user->company_name) ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th><?= __('Role') ?></th>
                            <td><?= h($user->role) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= date('Y/m/d H:m',strtotime($user->created)) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td>
                                <?if($user->status=='1'):?>
                                    <span style="color: blue;">Active</span>
                                <?elseif($user->status=='0'):?>
                                    <span style="color: red;">Inactive</span>
                                <?endif?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="profile-pic">
                    <strong class="profile-pic-label">
                        Profile Picture
                    </strong>
                    <br />
                    <span>
                        <img id="preview-image" src="/files/users/photo/<?= $user->photo_dir; ?>/<?= $user->photo; ?>"
                            alt="Preview Image" width="300px" length="300px">
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
