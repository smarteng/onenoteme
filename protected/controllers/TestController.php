<?php
class TestController extends Controller
{
    public function init()
    {
        $this->redirect('/');
        exit(0);
    }
    
    public function actionIndex($page = 1)
    {
        exit;
    }
    
    public function actionImage()
    {
        $uploader = app()->getComponent('upyuntest');
//         $uploader = upyunUploader(true);
        $file = '/data/web/waduanzi.com/uploads/01.jpg';

        $urls = $uploader->autoFilename('.jpg');
        $file = file_get_contents($file);
        $infos = $uploader->save($file);
        var_dump($urls);
        var_dump($infos);

        exit(0);
    }

    public function actionLocal()
    {
        $domains = array(
            'wabao.me',
            'waduanzi.com',
            'waduanzi.cn',
        );
        $url = 'http://f.waduanzi.cn/wp-content/uploads/2013a/04/30/04.jpg';
        
        foreach ($domains as $domain) {
            $pos = stripos($url, $domain);
            var_dump($pos);
//             if ($pos === false)
//                 var_dump($pos);
        }
        
        exit;
        $result = CDBase::externalUrl($url, $domains);
        var_dump($result);
        exit;
        
        echo $_SERVER['HTTP_HOST'];
        exit;
        
        $fetch = new CDFileLocal(uploader(true), 'pics');
        
//         $url = 'http://i2.ieplan.com/wp-content/uploads/2013a/04/30/04.jpg';
//         $row = $fetch->fetchOne($url);
//         var_dump($row);
//         exit;
        
        $html = <<<EOD
        <p>
	<img alt="480×718" onload="AXImg(this)" src="http://i2.ieplan.com/wp-content/uploads/2013a/04/30/01.jpg" title="南宫雪琪蓝色比基尼秀酥胸美腿" width="480" height="718" data-pinit="registered"><br>
	<img alt="480×720" onload="AXImg(this)" src="http://i2.ieplan.com/wp-content/uploads/2013a/04/30/02.jpg" title="南宫雪琪蓝色比基尼秀酥胸美腿" width="480" height="720" data-pinit="registered"><br>
	<img alt="480×718" onload="AXImg(this)" src="http://i2.ieplan.com/wp-content/uploads/2013a/04/30/03.jpg" title="南宫雪琪蓝色比基尼秀酥胸美腿" width="480" height="718" data-pinit="registered"><br>
	<img alt="728×531" onload="AXImg(this)" src="http://i2.ieplan.com/wp-content/uploads/2013a/04/30/04.jpg" title="南宫雪琪蓝色比基尼秀酥胸美腿" data-pinit="registered" width="600" height="437"></p>
EOD;
        
        $rows = $fetch->fetchReplacedHtml($html);
        echo $rows;
        exit;
    }

    public function actionThumb($id)
    {
        $post = Post::model()->findByPk($id);
        $images = $post->getUploadImageSquareThumbs();
        
        var_dump($images);
        exit;
    }
    
    public function actionWater()
    {
        $file = '/data/web/waduanzi.com/uploads/01.jpg';
        $im = new CDImage();
        $im1 = $im->loadFromFile($file);
        
        $font = '/data/web/waduanzi.com/protected/fonts/msyh.ttf';
        $color = array(255, 255, 255);
        $red = array(255, 0, 0);
        $water = new CDWaterMark(CDWaterMark::TYPE_TEXT);
        $water->color($color)
            ->setText('陈东是个傻逼')
            ->position(CDWaterMark::POS_BOTTOM_LEFT)
            ->font($font)
            ->fontsize(50)
            ->apply($im1, 10)
            ->color($red)
            ->setText('傻逼22')
            ->position(CDWaterMark::POS_TOP_RIGHT)
            ->apply($im1, 10);
        
//         $im->output();
        header('content-type:image/jpeg');
        imagejpeg($im1);
    }
    
    public function actionWater1()
    {
        $file = '/data/web/waduanzi.com/uploads/01.jpg';
        $mark = '/data/web/waduanzi.com/uploads/rect.jpg';
        $im = new CDImage();
        $im->load($file);
//         $im1 = $im->loadFromFile($file);
        
        $font = '/data/web/waduanzi.com/protected/fonts/msyh.ttf';
        $color = array(255, 255, 255);
        $red = array(255, 0, 0);
        $water = new CDWaterMark(CDWaterMark::TYPE_IMAGE);
        $water->position(CDWaterMark::POS_CENTER_MIDDLE)
            ->setImage($mark)
            ->apply($im, 10, 50)
            ->position(array(50, 50))
            ->apply($im, 10, 50)
            ->type(CDWaterMark::TYPE_TEXT)
            ->color($color)
            ->setText('陈东是个傻逼')
            ->position(CDWaterMark::POS_BOTTOM_LEFT)
            ->font($font)
            ->fontsize(50)
            ->apply($im, 10, 50);

        $im->output();
//         header('content-type:image/jpeg');
//         imagejpeg($im1);
    }
}