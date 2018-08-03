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
    
必选字段：
inputname
inputvalue
可选字段：
placeholder
-->

<?php
 $placeholder = "发布时间"; $placeholder = $placeholder?$placeholder:'选择时间'; ?>
<div class="input-group" style="width: 200px;">
    <input type="text" class="form-control form-control-sm" name="created_at" placeholder="<?php echo ($placeholder); ?>" value="<?php echo (date('Y-m-d H:i',$page["created_at"])); ?>" >
    <div class="input-group-append">
        <span class="input-group-text">
            <i class="fa fa-calendar" aria-hidden="true"></i>
        </span>
    </div>
</div>
<script>
    //日期选择器
    $("input[name='created_at']").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        locale: "zh"
    });
</script>
必填参数：
inputname
inputvalue
可选参数：
editsize = [1,2,3,4]
-->

<?php
 $editsize1 = [editsize]; $editsize1 = count($editsize1) == 1?['100%','560','800','1000']:$editsize1; ?>
<div id="body_editor">
    <div class="g_editsize">
        <?php if(is_array($editsize1)): $k = 0; $__LIST__ = $editsize1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if(($k) == "1"): ?><div class="size_item"><a class="on" href="#"><?php echo ($vo); ?></a></div>
                <?php else: ?>
                <div class="size_item"><a href="#"><?php echo ($vo); ?></a></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <textarea id="body_content" name="body" style="height:500px;width:100%;position:relative;z-index:1;"><?php echo ($page["body"]); ?></textarea>
</div>

<script>
    (function(){
        //实例化编辑器
        var editor = UE.getEditor('body_content');
        //改变编辑器大小
        $("#body_editor .size_item a").click(function(){
            $("#body_editor .size_item a").removeClass('on');
            $(this).addClass('on');
            var $val = $(this).text();
            if($val == '100%'){
                $val = $("body").width()-40;
            }
            var $content = editor.getContent();
            editor.destroy();
            editor = UE.getEditor('body_content',{
                'initialContent':$content,
                'initialFrameWidth':$val
            });
            return false;
        });
    })();

</script>
</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>