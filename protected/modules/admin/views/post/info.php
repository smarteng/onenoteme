<h4><?php echo user()->getFlash('table_caption', $this->adminTitle);?></h4>
<table class="table table-striped table-bordered post-info">
    <tbody>
        <tr>
            <td>ID</td>
            <td><span class="badge badge-success"><?php echo $model->id;?></span></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'title');?></td>
            <td><?php echo $model->titleLink;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'channel_id');?></td>
            <td><?php echo $model->channel_id . ' - ' . CDBase::channelLabels($model->channel_id);?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'source');?></td>
            <td><?php echo $model->sourceLink;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'tags');?></td>
            <td><?php echo $model->tagText;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'create_time');?></td>
            <td><?php echo $model->createTime;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'create_ip');?></td>
            <td><?php echo $model->create_ip;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'thumbnail_pic');?></td>
            <td><?php echo $model->getThumbnailImage();?></td>
        </tr>
    </tbody>
</table>

<table class="table table-striped table-bordered post-info">
    <tbody>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'score');?></td>
            <td><span class="badge "><?php echo $model->score;?></span></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'score_nums');?></td>
            <td><span class="badge "><?php echo $model->score_nums;?></span></td>
        </tr>
        <tr>
            <td><?php echo t('avg_score', 'admin');?></td>
            <td><span class="badge "><?php echo $model->rating;?></span></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'comment_nums');?></td>
            <td>
                <span class="badge "><?php echo $model->comment_nums;?></span>&nbsp;&nbsp;
                <?php echo l(t('post_info_view', 'admin'), $model->commentUrl);?>
            </td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'visit_nums');?></td>
            <td><span class="badge "><?php echo $model->visit_nums;?></span></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'digg_nums');?></td>
            <td><span class="badge "><?php echo $model->digg_nums;?></span></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'state');?></td>
            <td><?php echo $model->state;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'istop');?></td>
            <td><?php echo $model->istop;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'disable_comment');?></td>
            <td><?php echo $model->disable_comment;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'recommend');?></td>
            <td><?php echo $model->recommend;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'hottest');?></td>
            <td><?php echo $model->hottest;?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($model, 'homeshow');?></td>
            <td><?php echo $model->homeshow;?></td>
        </tr>
    </tbody>
</table>
