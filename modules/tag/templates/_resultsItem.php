<?php if (count($data)): ?> 
    <?php include_partial('tag/results_' . $model, array("model" => $model, "data" => $data)) ?> 
    <div class="clear"></div>
    <?php if ($data->getPage() < $data->getLastPage()): ?>
        <div class="center-element <?php if ($page > 1) echo "expand_items auto_expand_items";else echo "more_items" ?>" rel="<?php echo $page ?>"><a class="btn" request-url="<?php echo url_for("tag_search_expand", array("name" => $tag, "modul" => $model, "page" => $page)) ?>" rel="<?php echo $model ?>"><?php echo __("Show more") ?></a></div>
    <?php endif; ?>
<?php endif; ?>