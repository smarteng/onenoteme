<div class="fl cd-container">
	<h2 class="cd-catption">热门标签· · · · · · </h2>
	<div class="tag-list">
	<?php foreach($tags as $key => $tag):?>
        <?php echo CHtml::link($tag->name, $tag->getUrl(), array('target'=>$target, 'rel'=>'tag', 'class'=>$levels[$key]));?>
    <?php endforeach;?>
    </div>
</div>

<div class="fr cd-sidebar">
    <div class="cdc-block">
		<script type="text/javascript" src="http://union.163.com/gs2/union/adjs/6156606/0/1?w=336&h=280"></script>
	</div>
	<?php $this->widget('CDHotTags', array('title'=>'热门标签'));?>
</div>
<div class="clear"></div>