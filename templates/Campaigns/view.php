<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= substr_replace($campaign->title,"...",80) ?></h4>
            </div>
            <div class="card-body">
                <div class="campaigns view content">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Title:</strong></td>
                                <td><?= substr_replace($campaign->title,"...",100) ?></td>
                            </tr>
                            <tr>
                                <td><strong>URL:</strong></td>
                                <td>
                                    <a href="<?= h($campaign->url) ?>">
                                        <blockquote>
                                            <?= $this->Text->autoParagraph(h($campaign->url)); ?>
                                        </blockquote>
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><strong>Clicks:</strong></td>
                                <td><?= $campaign->clicks === null ? '' : $this->Number->format($campaign->clicks) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    <?php if ($campaign->status): ?>
                                        <span style="color: blue;">Active</span>
                                    <?php else: ?>
                                        <span style="color: red;">Inactive</span>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td><?= date('Y/m/d H:s', strtotime(h($campaign->created))) ?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
