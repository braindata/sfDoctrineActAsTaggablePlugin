<div class="margin-bottom media">
    <?php foreach ($data->getResults() as $item): ?>
            <?php include_partial("product/normalItem", array('item' => $item)) ?>
    <?php endforeach; ?>
</div>