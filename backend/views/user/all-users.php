<?php

use yii\helpers\Url;
?>
<section class="nogamu-content-header content-header">
    <h3>
        <span class="nogamu-header-text">All Registered Users</span>
        <small>All the registered Users in the system</small>
    </h3>
</section>

<div class="box box-success">
<div style="margin: 20px">
<table class="table table-striped" id="records_list">
    <thead>
        <tr>
            <th>
                First Name
            </th>
            <th>Last Name</th>
            <th>
                Email
            </th>
            <th>
                Category
            </th>
            <th>
                Phone Number
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users AS $user) { ?>
            <tr>
                <th><?= $user['firstname']; ?></th>
                <td> <?= $user['lastname']; ?>  </td>
                <td> <?= $user['email']; ?>  </td>
                <td> <?= $user['category']; ?>  </td>
                <td> <?= $user['telephone']; ?>  </td>
                <td>
                    <a href='<?= Url::to(['user/update', 'id' => $user['id']]); ?>' class='btn btn-default'>
                        <i class='fa fa-pencil'></i> Edit
                    </a>
                </td>
            </tr> 
        <?php } ?>
    </tbody>
</table>
</div>
</div>