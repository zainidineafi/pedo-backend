<?php include($_SERVER['DOCUMENT_ROOT'] . '/template/header.inc.php') ?>
<?php

use Models\UserUpgradeRequest;

$upgradeRequests = UserUpgradeRequest::with(['user'])->get();

?>
<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/template/message.inc.php') ?>
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center mb-4">
                                <div class="col">
                                    <h5 class="card-title">Form Data Admin</h5>
                                </div>
                                <div class="col">
                                    <?php if ($auth->level == 'Developer') : ?>
                                        <a href="<?= base_url('admin/tambah.php') ?>" class="btn btn-primary float-right ">Tambah</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($upgradeRequests as $upgradeRequest) : ?>
                                            <tr>
                                                <td> <?= $upgradeRequest->id ?></td>
                                                <td> <?= $upgradeRequest->user->name ?></td>
                                                <td> <span class="badge badge-<?= $upgradeRequest->status == 'pending' ? 'warning' : ($upgradeRequest->status == 'accepted' ? 'success' : 'danger') ?>"> <?= $upgradeRequest->getRawOriginal('status') ?></span></td>
                                                <td> <?= $upgradeRequest->created_at ?></td>
                                                <td>
                                                    <a href="<?= base_url('users/upgrade/detail.php?id=' . $upgradeRequest->id) ?>" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/template/footer.inc.php') ?>