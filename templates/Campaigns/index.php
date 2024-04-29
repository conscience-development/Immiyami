<div class="campaigns index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Campaigns') ?></h4>
            <?= $this->Html->link(__('New Campaign'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <!-- <th><?= $this->Paginator->sort('start_date') ?></th>
																<th><?= $this->Paginator->sort('end_date') ?></th> -->
                                <!-- <th><?= $this->Paginator->sort('url') ?></th> -->
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('clicks') ?></th>
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($campaigns as $campaign): ?>
                        <tr id="copytrc<?=$campaign->id;?>">
                            <!-- <td><?= $this->Number->format($campaign->id) ?></td> -->
                            <?if(strlen($campaign->title)>10):?>
                                <td><?= substr_replace($campaign->title,"...",10) ?></td>
                            <?else:?>
                                <td><?=h($campaign->title)?></td>
                            <?endif?>
                            <!-- <td><?= h($campaign->start_date) ?></td>
                    <td><?= h($campaign->end_date) ?></td> -->
                            <!-- <td><?= h($campaign->url) ?></td> -->
                            <td>
                                <? if($campaign->status == '0'){ ?>
                                Inactive
                                <?}else{?>
                                Active
                                <?}?>
                            </td>
                            <td><?= $campaign->clicks === null ? '' : $this->Number->format($campaign->clicks) ?></td>
                            <td style="margin-left:10px"><?= date('Y/m/d H:s ',strtotime(h($campaign->created))) ?></td>

                            <td class="actions">
                                <div class="d-flex">
                                    <?
                            // Store a string into the variable which
                            // $user_string = $campaign->url;
                            $user_string = $campaign->id.'-'.preg_replace('/[^\da-z ]/i', '', $campaign->title);

                            // Store the cipher method
                            $ciphering = "AES-128-CTR";

                            // Use OpenSSl Encryption method
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;

                            // Non-NULL Initialization Vector for encryption
                            $encryption_iv = '1234567891011121';

                            // Store the encryption key
                            $encryption_key = "ImmiYamiCampaignKey";

                            // Use openssl_encrypt() function to encrypt the data
                            $encryption = openssl_encrypt($user_string, $ciphering,
                                        $encryption_key, $options, $encryption_iv);
                            $url = "https://".$_SERVER['SERVER_NAME']."?encryption=".$encryption;
                        ?>
                                    <p class="d-none" id="copy<?=$campaign->id;?>"><?=$url;?></p>
                                    <a href="#"
                                        onclick='copyToClipboard(document.getElementById("copy<?=$campaign->id;?>"));document.getElementById("copytrc<?=$campaign->id;?>").style.color="red";'
                                        title="Copy" class="btn btn-primary shadow btn-xs sharp me-1">
                                        <i class="fas fa-copy"></i></a>
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $campaign->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $campaign->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $campaign->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this Campaign?', $campaign->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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



<script>
function copyToClipboard(elem) {
    // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);

    // copy the selection
    var succeed;
    try {
        succeed = document.execCommand("copy");
    } catch (e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }

    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}
</script>