<div class="payments index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Sponsor Payments') ?></h4>
            <?= $this->Html->link(__('New Payment'), ['action' => 'padd'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <!-- <th><?= $this->Paginator->sort('Invoice No') ?></th> -->
                                <th><?= $this->Paginator->sort('price') ?></th>
                                <th><?= $this->Paginator->sort('payment_date') ?></th>
                                <!-- <th><?= $this->Paginator->sort('payment_status') ?></th> -->
                                <!-- <th><?= $this->Paginator->sort('package') ?></th> -->
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('user_id') ?></th>
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment): ?>
                        <tr id="copytrc<?=$payment->id;?>">
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$payment->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($payment->id) ?></td>
-->
                            <td><?= h($payment->title) ?></td>
                            <!-- <td><?= h($payment->txn_id) ?></td> -->
                            <td><?= $payment->price === null ? '' : $this->Number->format($payment->price) ?></td>
                            <td><?=  date('Y/m/d H:i ', strtotime($payment->payment_date)) ?></td>
                            <!-- <td><?= h($payment->payment_status) ?></td> -->
                            <td>
                                <?

                        if($payment->status == '0'){
                            echo "Not Paid";
                        }else{
                            echo "Paid";
                        }
                    //echo h($payment->status) ?>
                            </td>
                            <td><?= $payment->has('user') ? $this->Html->link($payment->user->first_name, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?>
                            </td>

                            <td><?= date('Y/m/d H:i ' ,strtotime($payment->created)) ?></td>


                            <td class="actions">
                                <div class="d-flex">
                                    <?
                            // Store a string into the variable which
                            $user_string = $payment->user->id.'-'.$payment->id.'-'.preg_replace('/[^\da-z ]/i', '', $payment->title);

                            // Store the cipher method
                            $ciphering = "AES-128-CTR";

                            // Use OpenSSl Encryption method
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;

                            // Non-NULL Initialization Vector for encryption
                            $encryption_iv = '1234567891011121';

                            // Store the encryption key
                            $encryption_key = "ImmiYamiPaymentKey";

                            // Use openssl_encrypt() function to encrypt the data
                            $encryption = openssl_encrypt($user_string, $ciphering,
                                        $encryption_key, $options, $encryption_iv);
                            $url = "https://".$_SERVER['SERVER_NAME']."/payments/pay/".$payment->user->id."/sponsor_payment?key=".$encryption;
                        ?>
                                    <p class="d-none" id="copy<?=$payment->id;?>"><?=$url;?></p>
                                    <a href="#"
                                        onclick='copyToClipboard(document.getElementById("copy<?=$payment->id;?>"));document.getElementById("copytrc<?=$payment->id;?>").style.color="red";'
                                        title="Copy" class="btn btn-primary shadow btn-xs sharp me-1">
                                        <i class="fas fa-copy"></i></a>
                                    <!-- <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $payment->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?> -->
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'pedit', $payment->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $payment->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this Payment?', $payment->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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