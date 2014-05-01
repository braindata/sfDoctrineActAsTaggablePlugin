<ul class="tag-list no-margin">
    <?php foreach ($tags as $key => $value): ?>
        <li class="tag-button"><a href="<?php echo url_for('tag_detail', array('name' => $key)) ?>" class="btn btn-mini btn-info"><?php echo $key->getName(); ?></a></li>
    <?php endforeach; ?>
</ul>