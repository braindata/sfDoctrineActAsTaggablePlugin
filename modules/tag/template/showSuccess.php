<div class="row margin-bottom">

    <div class="span8 cheat margin-bottom">
        <div class="double-cheat">
            Test Test Test
        </div>
    </div>

    <div class="span4 visible-desktop com-bar">
        <h2 class="media-headline"><?php echo __('Top-articles'); ?></h2>
        <?php include_component('news', 'list', array("limit" => 3, "type" => "small", "highlight" => false)); ?>
        <?php include_partial('ad/cad') ?>
    </div>
</div>