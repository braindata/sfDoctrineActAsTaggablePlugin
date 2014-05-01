<?php foreach ($data->getResults() as $item): ?>
  <?php include_partial("event/searchResultItem", array('item' => $item)); ?>
<?php endforeach; ?>