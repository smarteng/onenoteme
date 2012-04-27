<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->pageTitle;?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="waduanzi.com" />
<meta name="copyright" content="Copyright (c) 2011-2012 waduanzi.com All Rights Reserved." />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<link rel="shortcut icon" href="<?php echo sbu('images/favicon.ico');?>" type="image/vnd.microsoft.icon" />
<link media="screen" rel="stylesheet" type="text/css" href="<?php echo sbu('styles/cd-basic.css');?>" />
<link media="screen" rel="stylesheet" type="text/css" href="<?php echo sbu('styles/cd-mobile.css?v=20120110.01');?>" />
<script type="text/javascript" src="<?php echo sbu('libs/jquery-1.7.1.min.js');?>"></script>
</head>
<body>
<a name="top"></a>
<div class="m-wrapper">
	<h1 class="m-logo"><a href="<?php echo aurl('mobile/index');?>" title="返回挖段子首页">挖段子</a></h1>
</div>
<div class="m-wrapper m-nav">
	<a href="<?php echo aurl('mobile/index');?>">首页</a>
	<a href="<?php echo aurl('mobile/channel', array('id'=>CHANNEL_GIRL));?>">福利</a>
	<a href="<?php echo aurl('mobile/channel', array('id'=>CHANNEL_DUANZI));?>">段子</a>
	<a href="<?php echo aurl('mobile/channel', array('id'=>CHANNEL_LENGTU));?>">冷图</a>
	&nbsp;|&nbsp;
	<a href="<?php echo aurl('mobile/index');?>">最新</a>
	<a href="<?php echo aurl('mobile/week');?>">最热</a>
</div>
<div class="app-link">
    <a href="http://s.waduanzi.com/android/waduanzi.apk" target="_blank">Android版正式上线啦！！点击直接下载。</a>
</div>
<div class="admob">
	<script type="text/javascript">/*wdz_300*250，创建于2012-4-25*/ var cpro_id = 'u866941';</script><script src="http://cpro.baidu.com/cpro/ui/c.js" type="text/javascript"></script>
</div>
<div class="m-wrapper"><?php echo $content;?></div>

<div class="admob">
	<script type="text/javascript" src="http://union.163.com/gs2/union/adjs/6156606/0/1?w=300&h=40"></script>
</div>

<div class="m-wrapper m-footer">
	<p class="fl">版权所有 &copy;2011-2012&nbsp;冀ICP备12006196号-5<a href="<?php echo aurl('mobile');?>">waduanzi.com</a></p><p class="fr"><a href="#top">TOP</a></p>
	<div class="clear"></div>
</div>
<script type="text/javascript">
$(function(){
	changeImageSize();
	window.onresize = changeImageSize;
	function changeImageSize()
	{
		var width = parseInt($('.post-item').width());
		$('.post-item img').css('max-width', width);
	}
});
</script>
<?php $this->renderPartial('/public/tongji');?>
</body>
</html>