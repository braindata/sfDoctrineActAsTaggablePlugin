<div class="assigned-tags">
	<?php if (count($object->getTags())): ?>
		<ul>
			<?php foreach ($object->getTags() as $tag): ?>
				<li>
				<span><?php echo $tag ?></span>
				<?php echo jq_link_to_remote('x', array(
					'url' => url_for('taggable_remove_tag', array('object_id' => $object->id, 'object_class' => $object_class, 'tags' => $tag)),
					'complete' => '$(".assigned-tags").parent().html(XMLHttpRequest.responseText);'
					), array(
						'class' => 'a-btn icon a-close-small no-label nobg',
						'title' => 'Remove "'.$tag.'"', 
					))?>
			</li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>
</div>

<div class="add-tags">
  <div class="add-tags-input">
	<input id="tag-input-field" class="add-text tag-input" name="tags" type="text" />
	</div>
	<input type="button" class="a-btn icon a-submit a-add" value="Add" OnClick="jQuery.ajax({type:'POST',dataType:'html',data:{tags:$('#tag-input-field').val()},complete:function(XMLHttpRequest, textStatus){$(&quot;.assigned-tags&quot;).parent().html(XMLHttpRequest.responseText); $(&quot;tag-input&quot;).focus();},url:'<?php echo url_for('taggable_add_tag', array('object_id' => $object->id, 'object_class' => $object_class)) ?>'}); return false;" />
</div>

<div style="clear:both"></div>

<?php if (count($popular_tags)): ?>
	<div class="popular-tags">
	  <h5>Popular Tags</h5>
	  <ul>
	    <?php $n=1; foreach ($popular_tags as $tag => $count): ?>
				<li>
					<?php echo jq_link_to_remote($tag, array(
						'url' => url_for('taggable_add_tag', array('object_id' => $object->id, 'object_class' => $object_class, 'tags' => $tag)),
						'complete' => '$(".assigned-tags").parent().html(XMLHttpRequest.responseText);'
						), array(
							'class' => ''
						))?>
				</li>
	    <?php $n++; endforeach ?>
	  </ul>
	</div>
	<div style="clear:both"></div>
<?php endif ?>