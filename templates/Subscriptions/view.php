<!--**********************************
    Content body start
***********************************-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= h($subscription->name) ?></h4>
            </div>
            <div class="card-body">
                <div class="subscriptions view content">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Email</th>
                                <td><?= h($subscription->email) ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                <?if($subscription->status=='1'):?>
                                    <span style="color: blue;">Active</span>
                                <?elseif($subscription->status=='0'):?>
                                    <span style="color: red;">Inactive</span>
                                <?endif?>
                            </td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td><?= date('Y/m/d H:s', strtotime(h($subscription->created))) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
