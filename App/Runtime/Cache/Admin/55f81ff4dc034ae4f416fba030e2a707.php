<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/minipetmrschool/Public/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/minipetmrschool/Public/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/minipetmrschool/Public/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/minipetmrschool/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/minipetmrschool/Public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/minipetmrschool/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/minipetmrschool/Public/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/minipetmrschool/Public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <script type="text/javascript" src="/minipetmrschool/Public/admin/js/jquery.js"></script>
    <script type="text/javascript" src="/minipetmrschool/Public/admin/js/action.js"></script>

    <title>全部优惠券</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 优惠券管理 <span class="c-gray en">&gt;</span> 全部优惠券 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">


    <table class="table table-border table-bordered table-bg">
        <thead>

        <tr class="text-c">
            <th width="40">ID</th>
            <th width="100">满减金额</th>
            <th width="130">开始时间</th>
            <th width="130">过期时间</th>
            <th width="50">所需积分</th>
            <th width="50">发行数量</th>
            <th width="50">已领取</th>

            <th width="100">使用属性</th>
            <th width="80">操作</th>
        </tr>
        </thead>


        <tbody id="news_option">
        <!-- 遍历 -->
        <?php if(is_array($voucher_list)): $i = 0; $__LIST__ = $voucher_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
                <td><?php echo ($v["id"]); ?></td>
                <td>满<span style="color:red;"><?php echo ($v["full_money"]); ?></span>减<span style="color:red;"><?php echo ($v["amount"]); ?></span></td>
                <td><?php echo ($v["start_time"]); ?></td>
                <td><?php echo ($v["end_time"]); ?></td>
                <td><?php if($v["point"] == 0): ?>免费领取<?php else: echo ($v["point"]); endif; ?></td>
                <td><?php echo ($v["count"]); ?></td>
                <td><?php echo ($v["receive_num"]); ?></td>
                <td>
                    <?php if($v["proid"] == 'all'): ?><a class="label succ">店内通用</a><?php else: ?><a class="label fail">限定商品</a><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo U('add');?>?id=<?php echo ($v["id"]); ?>&page=<?php echo ($page); ?>&keyword=<?php echo ($keyword); ?>">修改</a> |
                    <a onclick="del_id_url2(<?php echo ($v["id"]); ?>)">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
        <!-- 遍历 -->
        </tbody>
        <tr>
            <td colspan="10" class="td_2">
                <?php echo ($page_index); ?>
            </td>
        </tr>
    </table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/minipetmrschool/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/minipetmrschool/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/minipetmrschool/Public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/minipetmrschool/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/minipetmrschool/Public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/minipetmrschool/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/minipetmrschool/Public/admin/lib/laypage/1.2/laypage.js"></script>

<script>
    function product_option(page){
        var obj={
            "name":$("#name").val(),
        }
        //alert(obj);exit();
        var url='?page='+page;
        $.each(obj,function(a,b){
            url+='&'+a+'='+b;
        });
        location=url;
    }

    function del_id_url2(id){
        if (confirm('您确定要删除吗？')) {
            window.location.href="<?php echo U('del');?>?did="+id;
        };

    }

    //推荐设置
    function pro_tj(id,type){
        if (!id) {
            return;
        }
        $.post("<?php echo U('set_grouptj');?>",{id:id},function(data){
            if (data.status==1) {
                if (type==1) {
                    document.getElementById('spans_'+id).innerHTML='<a class="label succ" onclick="pro_tj('+id+',0);">已推荐</a>';
                }else{
                    document.getElementById('spans_'+id).innerHTML='<a class="label err" onclick="pro_tj('+id+',1);">前台推荐</a>';
                }
            }else{
                alert(data.err);
                return false;
            }
        },'json');
    }
</script>


</body>
</html>