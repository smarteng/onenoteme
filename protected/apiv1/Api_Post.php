<?php
/**
 * Post Api接口
 * @author Chris
 * @copyright cdcchen@gmail.com
 * @package api
 */

define('APP_STORE_VERIFY', false);

class Api_Post extends ApiBase
{
    public function create()
    {
    	self::requirePost();
//        	$this->requireLogin();
    	$this->requiredParams(array('title', 'content', 'token', 'channel_id'));
    	$params = $this->filterParams(array('title', 'content', 'tags', 'channel_id', 'category_id', 'pic', 'token', 'onreferer', 'padding_top', 'padding_bottom', 'water_position', 'media_type'));
    	
    	$vestUser = self::randomVestAuthor();
    	$post = new Post();
    	$post->channel_id = (int)$params['channel_id'];
    	$post->media_type = (int)$params['media_type'];
    	$post->content = nl2br($params['content']);
    	$post->tags = $params['tags'];
    	$post->create_time = $_SERVER['REQUEST_TIME'];
    	$post->state = POST_STATE_DISABLED;
        $post->up_score = mt_rand(param('init_up_score_min'), param('init_up_score_max'));
        $post->down_score = mt_rand(param('init_down_score_min'), param('init_down_score_max'));
        $post->view_nums = mt_rand(param('init_view_nums_min'), param('init_view_nums_max'));
        $post->homeshow = CD_YES;
    	$post->original_pic = $params['pic'];
    	$post->title = $params['title'];
    	$post->user_id = $vestUser[0];
    	$post->user_name = $vestUser[1];
    	if (empty($post->title))
    	    $post->title = mb_substr(strip_tags($post->content), 0, 30, app()->charset);
    	
    	try {
    	    $referer = strip_tags(trim($params['onreferer']));
    	    if (empty($referer))
    	        $referer = $params['pic'];
    	    
    	    $opts = array();
    	    $opts['water_position'] = (int)$params['water_position'];
    	    $top = (int)$params['padding_top'];
    	    $bottom = (int)$params['padding_bottom'];
    	    if ($top > 0 || $bottom > 0) {
    	        $opts['padding_top'] = $top;
    	        $opts['padding_bottom'] = $bottom;
    	    }
    	    
    		$result = $post->fetchRemoteImagesBeforeSave($referer, $opts) && $post->save();
    		return (int)$result;
    	}
    	catch (ApiException $e) {
    		throw new ApiException('系统错误', ApiError::SYSTEM_ERROR);
    	}
    }
    
    private static function randomVestAuthor()
    {
        $accounts = array(
            64 => '超邪恶',
            65 => '中高艺',
            66 => '笑料百科',
            67 => '邪恶漫画大湿',
            68 => '糗事万科',
            69 => '画画吃',
            70 => '叉叉小明',
            71 => '段子大湿',
            72 => '二逼青年世界',
            73 => '萌漫画',
            74 => '邪恶微漫画',
        );
        
        $userID = mt_rand(64, 74);
        
        return array($userID, $accounts[$userID]);
    }

}


