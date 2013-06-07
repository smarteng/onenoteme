<?php
class ApiPost extends Post
{
    /**
     * Returns the static model of the specified AR class.
     * @return ApiPost the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function relations()
    {
        return array_merge(parent::relations(), array(
            'user' => array(self::BELONGS_TO, 'ApiUser', 'user_id',
    		        'select' => array('id', 'username', 'screen_name', 'create_time', 'create_ip', 'state', 'token', 'token_time', 'source')),
            'comments' => array(self::HAS_MANY, 'ApiComment', 'post_id', 'limit'=>10),
        ));
    }
    
    public function getApiCreateTime()
    {
        $format = 'd日 H:i';
        return parent::getCreateTime($format);
    }
    
    public function getApiTitle()
    {
        return trim(strip_tags($this->title));
    }
    
    public function getApiContent()
    {
        $content = strip_tags($this->content);
        $lines = explode("\n", $content);
        $lines = array_map('trim', $lines);
        $lines = array_filter($lines);
        $content = join("\n", $lines);
        return $content;
    }
}