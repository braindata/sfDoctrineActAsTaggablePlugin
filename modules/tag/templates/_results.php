<div id="search_box">
<?php foreach ($result as $model => $data): ?>
    <?php if (count($data)): ?> 
    
    <h2 class="media-headline"><?php echo sprintf("%s (%s)",__("Result ".$model), count($data))?></h2>
    <div id="expandable" class="media">
    <?php include_partial('tag/resultsItem', array("model" => $model, "data" => $data, "page" => $page, "tag" => $tag)) ?> 
    </div>
    
  <?php endif; ?>
<?php endforeach; ?>
</div>