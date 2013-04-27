<div class="panel panel10 bottom15px">
    <ul class="fleft hot-keyword">
        <li><span class="cred announce">24小时更新：<?php echo Post::todayUpdateCount();?>篇。&nbsp;&nbsp;&nbsp;QQ群：49401589</span></li>
        <li><a href="<?php echo aurl('app/taijiong');?>" target="_blank">王宝强超贱表情制作器</a></li>
    </ul>
    <ul class="mode-switch fright">
        <li class="fall on"><a href="<?php echo CDBaseUrl::fallStyleUrl($this);?>">瀑布流</a></li>
        <li class="grid"><a href="<?php echo CDBaseUrl::gridStyleUrl($this);?>">表格</a></li>
        <li class="list"><a href="<?php echo CDBaseUrl::lineStyleUrl($this);?>">列表</a></li>
    </ul>
    <div class="clear"></div>
</div>

<?php if ($fallTitle):?><h2 class="cd-caption">与标签“<?php echo $fallTitle;?>”相关的内容</h2><?php endif;?>
<div id="waterfall-container">
    <?php foreach ((array)$models as $index => $model):?>
    <div class="waterfall-item">
        <div class="waterfall-item-box">
            <?php if ($model->getThumbnail()):?><div class="pic-block"><?php echo $model->getThumbnailLink('_blank' ,159);?></div><?php endif;?>
            <p><?php echo l($model->getFilterTitle(), $model->getUrl(), array('target'=>'_blank'));?></p>
        </div>
    </div>
    <?php endforeach;?>
    <div class="clear"></div>
</div>
<div class="clear"></div>

<div class="panel-rect panel-pages" id="page-nav">
<?php if($pages->pageCount > 1):?>
<div id="page-nav" class="cd-pages"><?php $this->widget('CLinkPager', array('pages'=>$pages));?></div>
<?php endif;?>
</div>

<div id="manual-load" class="radius5px hide">载入更多内容</div>
<div id="loading-box"></div>

<script type="text/javascript">
$(function(){
    var container = $('#waterfall-container');
    container.imagesLoaded(function(){
    	var itemCount = $('.waterfall-item').length;
    	var manual = $('#manual-load');
    	container.masonry({
    		columnWidth: 179,
    		gutterWidth: 15,
            itemSelector: '.waterfall-item'
        });
        
        container.infinitescroll({
        	navSelector: '#page-nav',
        	nextSelector: '#page-nav .next a',
        	itemSelector: '.waterfall-item',
        	animate: false,
        	dataType: 'html',
        	loading: {
            	speed: 0,
            	selector: $('#loading-box'),
        		msg: $('<img src="<?php echo sbu('images/loading2.gif');?>" />')
        	}
        },
        function(newElements, opts) {
        	var tthis = $(this);
            var newElems = $(newElements).css({opacity:0});
            newElems.imagesLoaded(function(){
                newElems.animate({opacity:1});
                tthis.masonry('appended', newElems, true);
            });

            var page = opts.state.currPage;
            if (page == 3) {
            	tthis.infinitescroll('pause');
            	$(document).on('click', '#manual-load', function(event){
                    tthis.infinitescroll('retrieve');
                    return false;
          	    });
            	$('#manual-load').show();
            }
            
            if (newElements.length < itemCount) {
        		$(document).off('click', '#manual-load');
    			tthis.infinitescroll('unbind');
    			manual.html('没有更多内容啦！');
    		}
        });
    });
    $(document).ajaxError(function(event, xhr, opt) {
    	if (xhr.status == 404) $('div.pages').remove();
	});
	
    $('#waterfall-container').on('hover', '.waterfall-item', function(event){
        $(this).toggleClass('item-bg');
    });
});
</script>

<?php cs()->registerScriptFile(sbu('libs/jquery.masonry.min.js'), CClientScript::POS_END);?>
<?php cs()->registerScriptFile(sbu('libs/jquery.infinitescroll.min.js'), CClientScript::POS_END);?>

