<div class="fleft cd-container">
    <div class="post-list">
        <?php foreach ((array)$models as $key => $model):?>
        <div class="panel panel20 post-item">
        	<div class="post-author"><?php echo $model->authorName . '&nbsp;' . $model->createTime;?></div>
            <div class="item-detail">
                <div class="item-content"><?php echo $model->content;?></div>
                <?php if ($model->thumbnail):?>
                <div class="post-image">
                    <div class="thumbnail">
                        <a href="<?php echo $model->bmiddlePic;?>" target="_blank">
                            <?php echo CHtml::image($model->thumbnail, $model->title, array('class'=>'thumb'));?>
                            <img class="original hide" />
                        </a>
                        <div class="thumb-pall"></div>
                    </div>
                    <div class="thumbnail-more">
                        <div class="lines">
                            <?php for ($i=0; $i<$model->lineCount; $i++):?>
                            <div class="line3"></div>
                            <?php endfor;?>
                            <div class="sjx"></div>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            </div>
            <?php if ($model->tags):?><div class="post-tags"><span class="cgray">标签：</span><?php echo $model->tagLinks;?></div><?php endif;?>
            <ul class="item-toolbar cgray" postid="<?php echo $model->id;?>">
            	<li class="upscore fleft" pid="<?php echo $model->id;?>"><?php echo $model->up_score;?></li>
            	<li class="downscore fleft" pid="<?php echo $model->id;?>"><?php echo $model->down_score;?></li>
            	<li class="fright"><span class="sns-share qzone"></span></li>
            	<li class="fright"><span class="sns-share qqt"></span></li>
            	<li class="fright"><span class="sns-share weibo"></span></li>
            	<li class="comment-nums fright">
            	    <a href="javascript:void(0);" url="<?php echo aurl('comment/list', array('pid'=>$model->id));?>" title="查看评论" class="view-comments" pid="<?php echo $model->id;?>"><?php echo $model->comment_nums;?>条评论</a>
            	    <a href="<?php echo aurl('post/show', array('id'=>$model->id), '', 'comment-list');?>" title="新窗口中查看查看评论" target="_blank">: :</a>
            	</li>
            	<div class="clear"></div>
            </ul>
            <div class="comment-list comment-list-<?php echo $model->id;?> hide"></div>
        </div>
        <?php endforeach;?>
    </div>
    
    <?php if ($pages->pageCount > 1):?>
    <div class="panel panel-pages"><div class="pages"><?php $this->widget('CLinkPager', array('pages'=>$pages));?></div></div>
    <?php endif;?>
</div>
<div class="fright cd-sidebar">
    <div class="cdc-block">
        <script type="text/javascript">
        alimama_pid="mm_12551250_2904829_10392377";
        alimama_width=300;
        alimama_height=250;
        </script>
        <script src="http://a.alimama.cn/inf.js" type="text/javascript"></script>
    </div>
	<div class="panel panel15"><?php $this->widget('CDHotTags', array('title'=>'热门标签'));?></div>
</div>
<div class="clear"></div>

<script type="text/javascript">
$(function(){
	$('.post-image').on('click', '.thumbnail-more, .thumbnail a', function(event){
	    event.preventDefault();
	    var itemDiv = $(this).parents('.post-item');
	    itemDiv.find('.post-image .thumbnail-more').toggle();
	    itemDiv.find('.post-image .thumbnail a .thumb').toggle();
	    var originalUrl = itemDiv.find('.post-image .thumbnail a').attr('href');
	    itemDiv.find('.post-image .thumbnail a .original').attr('src', originalUrl).toggle();
	    var itemPos = itemDiv.position();
	    $('body').scrollTop(itemPos.top);
	});
});
</script>




