<?php foreach ($data->getResults() as $item): ?>
  <?php include_partial("news/normalItem", array('item' => $item)); ?>
<?php endforeach; ?>