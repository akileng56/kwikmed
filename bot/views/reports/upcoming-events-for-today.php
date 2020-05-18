<?php
/*
 * Sample reports
 */
?>
<!-- include Bootstrap CSS -->
<style>
    @import url('<?= PATH_BOOTSTRAP_CSS; ?>');
    @import url('<?= PATH_CUSTOM_CSS; ?>');
</style>
<h2>Events coming up today</h2>
<p>Testing out bootstrap tables</p>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>FILE NO</th>
            <th>ACTIVITY</th>
            <th>COURT</th>
            <th>OFFICER</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 1; $i < 99; $i++) { ?>
            <tr>
                <th><?= $i; ?></th>
                <td>1.0</td>
                <td>2.0</td>
                <td>3.0</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
