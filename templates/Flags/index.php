
<div class="flags index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Flags') ?></h4>
			<?= $this->Html->link(__('New Flag'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
																<!-- <th><?= $this->Paginator->sort('id') ?></th> -->
																<th><?= $this->Paginator->sort('name') ?></th>
																<!-- <th><?= $this->Paginator->sort('photo') ?></th> -->
																<!-- <th><?= $this->Paginator->sort('photo_dir') ?></th> -->
																<!-- <th><?= $this->Paginator->sort('created', 'Created Date') ?></th> -->
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($flags as $flag): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($flag->id) ?></td> -->
                    <td><?= h($flag->name) ?></td>
                    <!-- <td><?= h($flag->photo) ?></td>
                    <td><?= h($flag->photo_dir) ?></td>
                    <td><?= h($flag->created) ?></td> -->
                    <?php
                    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
                    // var_dump($actual_link);
                    $url = $actual_link.'/files/flags/photo/'.$flag->photo_dir.'/'.$flag->photo;
                    ?>
                    <p class="d-none" id="copy<?=$flag->id;?>"><?=$url;?></p>
                    <td class="actions">
						<div class="d-flex">
                        <a href="#" onclick='copyToClipboard(document.getElementById("copy<?=$flag->id;?>"));document.getElementById("copytrc<?=$flag->id;?>").style.color="red";' title="Copy" class="btn btn-primary shadow btn-xs sharp me-1">
                            <i class="fas fa-copy"></i></a>

						<!-- <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $flag->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?> -->
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $flag->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $flag->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this Flag', $flag->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
	<p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
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
    } catch(e) {
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
