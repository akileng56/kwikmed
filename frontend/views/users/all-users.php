<?php

use yii\helpers\Url;

$this->title = "All Registered Users";
$this->params['page_description'] = "All the registered users in this system";

?>
<a href='<?= Url::to(['users/register']); ?>' class='btn btn-primary'><i class='fa fa-plus'></i> Register new user
</a>

<div class="box box-primary" style="margin-top: 10px">
<div style="margin: 20px">
<table class="table table-striped" id="records_list">
    <thead>
        <tr>
            <th>
                First Name
            </th>
            <th>Last Name</th>
            <th>User Name</th>
            <th>
                Email
            </th>
            <th>
                Category
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users AS $user) { ?>
            <tr>
                <th><?= $user['firstname']; ?></th>
                <td> <?= $user['lastname']; ?>  </td>
                <td> <?= $user['username']; ?>  </td>
                <td> <?= $user['email']; ?>  </td>
                <td> <?= $user['category']; ?>  </td>
                <td>
                    <a href='<?= Url::to(['users/update', 'id' => $user['id']]); ?>' class='btn btn-warning'>
                        <i class='fa fa-pencil'></i> Edit
                    </a>
                </td>
            </tr> 
        <?php } ?>
    </tbody>
</table>
</div>
</div>