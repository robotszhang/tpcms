<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimal-ui">
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <meta name="wap-font-scale" content="no">  <!--解决UC字体忽然变大-->
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    
        <?php if(!empty($page["title"])): ?><title><?php echo ($page["title"]); ?></title>
            <?php else: ?>
            <title><?php echo ($setting["sitename"]); ?></title><?php endif; ?>
    
    <?php if(!empty($page["keywords"])): ?><meta name="keywords" content="<?php echo ($page["keywords"]); ?>"/>
        <?php else: ?>
        <meta name="keywords" content="<?php echo ($setting["keywords"]); ?>"/><?php endif; ?>
    <?php if(!empty($page["description"])): ?><meta property="description" name="description" content="<?php echo ($page["description"]); ?>"/>
        <?php else: ?>
        <meta property="description" name="description" content="<?php echo ($setting["description"]); ?>"/><?php endif; ?>

    
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    
</head>
<body>

<div class="g-page-in">
    

    <div class="clearfix">
        <div class="float-left">
            <div class="u-breadcrumb">
                <a class="back" href="javascript:window.location.reload()" ><span class="fa fa-repeat"></span> 刷新</a>
                <span class="name">链接</span>
            </div>
        </div>
        <div class="float-right">
            <a href="<?php echo U('Map/add');?>?cate_id=<?php echo ($cate_id); ?>" role="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> 新增地图</a>
        </div>
    </div>
    <div class="h10"></div>

    <form action="<?php echo U('Map/index');?>" method="get" name="form1">
        <div class="form-inline">
            地图标题：
            <input class="form-control form-control-sm mr-1" name="title" placeholder="关键字" value="<?php echo ($_GET['title']); ?>" />
            <button class="btn btn-primary btn-sm" type="submit">筛选</button>
        </div>
    </form>

    <div class="h10"></div>
    <table class="table table-bb">
        <tr>
            <th width="30">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-all" id="checkbox-0">
                    <label class="custom-control-label"  for="checkbox-0"></label>
                </div>
            </th>
            <th>ID</th>
            <th>地图标题</th>
            <th>经纬度</th>
            <th>地址</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr_<?php echo ($vo["id"]); ?>">
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-item" id="checkbox-<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["id"]); ?>" data-print-url="<?php echo U('GoodsOrderPrint/print_view',array('id'=>$vo['id']));?>" data-id="<?php echo ($vo["id"]); ?>">
                        <label class="custom-control-label"  for="checkbox-<?php echo ($vo["id"]); ?>"></label>
                    </div>
                </td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["title"]); ?></td>
                <td>
                    <?php echo ($vo["lng"]); ?>-<?php echo ($vo["lat"]); ?>
                </td>
                <td><?php echo ($vo["address"]); ?></td>
                <td><?php echo (date('Y-m-d H:i',$vo["created_at"])); ?></td>
                <td>
                    <a class="btn btn-sm btn-outline-secondary" href="<?php echo U('Map/edit',array('id'=>$vo['id']));?>" role="button"><i class="fa fa-edit"></i> 编辑</a>
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            更多
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="return del_one('Map','<?php echo ($vo["id"]); ?>')"><i class="fa fa-trash"></i> 删除</a>
                        </div>
                    </div>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

    <div>
        <button type="button" class="btn btn-secondary btn-sm" onclick="return del_all('Map');"><i class="fa fa-trash"></i> 删除</button>
    </div>

    <?php if(!empty($pages)): ?><div class="h10"></div>
        <div class="g_pages"><div class="in"><?php echo ($pages); ?></div></div><?php endif; ?>


    <script>

    </script>

</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>