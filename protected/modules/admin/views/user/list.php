<h4><?php echo $this->adminTitle;?></h4>
<div class="btn-toolbar">
    <button class="btn btn-small" id="select-all">全选</button>
    <button class="btn btn-small" id="reverse-select">反选</button>
    <button class="btn btn-small btn-primary" id="batch-verify" data-src="<?php echo url('admin/user/multiVerify');?>">启用</button>
    <button class="btn btn-small btn-danger" id="batch-reject" data-src="<?php echo url('admin/user/multiForbidden');?>">禁用</button>
    <a class="btn btn-small btn-success" href=''>刷新</a>
</div>
<table class="table table-striped table-bordered beta-list-table">
    <thead>
        <tr>
            <th class="item-checkbox align-center">#</th>
            <th class="span1 align-center"><?php echo $sort->link('id');?></th>
            <th class="span3"><?php echo $sort->link('username');?></th>
            <th class="span3"><?php echo $sort->link('screen_name');?></th>
            <th class="span1"><?php echo $sort->link('source');?></th>
            <th class="span1 align-center"><?php echo $sort->link('state');?></th>
            <th class="span2 align-center"><?php echo $sort->link('create_time');?></th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($models as $model):?>
        <tr>
            <td class="item-checkbox"><input type="checkbox" name="itemid[]" value="<?php echo $model->id;?>" /></td>
            <td class="align-center"><?php echo $model->id;?></td>
            <td><?php echo l($model->username, $model->getInfoUrl());?></td>
            <td><?php echo $model->screen_name;?></td>
            <td><?php echo $model->sourceLabel;?></td>
            <td class="span1 align-center"><?php echo $model->stateAjaxLink;?></td>
            <td class="align-center"><?php echo $model->createTime;?></td>
            <td>
                <?php echo $model->editUrl;?>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php if ($pages):?>
<div class="pagination"><?php $this->widget('CLinkPager', array('pages'=>$pages));?></div>
<?php endif;?>


<script type="text/javascript">
$(function(){
	$(document).on('click', '.row-state', BetaAdmin.ajaxSetBooleanColumn);
	$(document).on('click', '#select-all', BetaAdmin.selectAll);
	$(document).on('click', '#reverse-select', BetaAdmin.reverseSelect);
	$(document).on('click', '#batch-verify, #batch-reject', BetaAdmin.switchMultiUserState);

});
</script>
