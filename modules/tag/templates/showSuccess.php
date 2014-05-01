<div class="row margin-bottom phone-padding">
    <div class="span8">
        <h1 class="media-headline large-margin-bottom"><?php echo $name ?></h1>
        
        <?php include_partial('tag/results', array("result" => $result, "page" => 1, "tag" => $name)) ?> 
    </div>
    
    <div class="span1"></div>

    <div class="span3 hidden-phone com-bar">
        <h2 class="media-headline"><?php echo __('Novelties');?></h2>
        <?php include_component('novelty', 'novelties') ?>
        
        <h2 class="media-headline"><?php echo __('Vacancies'); ?></h2>
        <?php include_component('jobs', 'list') ?>
        
        <h2 class="media-headline"><?php echo __("Events")?></h2>
        <?php include_component('event', 'smallList', array("type" => "small")) ?>
    </div>

</div>