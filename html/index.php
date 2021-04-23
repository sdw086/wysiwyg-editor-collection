<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>
<div class="page-header">
    <h2>wysiwyg editor list</h2>
</div>
<div class="container-fluid">
    <div style="padding: 1px 1px 10px 1px;">
    <!-- Standard button -->
    <button type="button" class="btn btn-default" id="write">
        <span class="glyphicon glyphicon-plus btn-lg" aria-hidden="true"></span>
    </button>
    </div>
    <table class="table table-hover table-bordered ">
        <thead>
            <tr>
                <th>no</th>
                <?php foreach ($EDITOR_NAME as $editor) { ?>
                    <th><?= $editor ?></th>
                <?php } ?>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td><button type="button" class="btn btn-info">view</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td><button type="button" class="btn btn-info">view</button></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
$(function () {
    // write go
    $(document).on("click", "#write", function() {
        location.href = "write.php";
    });
});
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/down.php';
?>