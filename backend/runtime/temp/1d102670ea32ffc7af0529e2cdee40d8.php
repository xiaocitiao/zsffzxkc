<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/test1.sxjiangyan.com/public/../application/admin/view/teacher/dsh.html";i:1606658624;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>表格缩略图</title>
    <link rel="stylesheet" href="/static/assets/libs/layui/css/layui.css"/>
    <link rel="stylesheet" href="/static/assets/module/admin.css?v=317"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #tbImgTable + .layui-table-view .layui-table-body tbody > tr > td {
            padding: 0;
        }

        #tbImgTable + .layui-table-view .layui-table-body tbody > tr > td > .layui-table-cell {
            height: 48px;
            line-height: 48px;
        }

        .tb-img-circle {
            width: 400px;
            /*height: 40px;*/
            cursor: zoom-in;
            /*border-radius: 50%;*/
            /*border: 2px solid #dddddd;*/
        }
    </style>
</head>
<body>
<!-- 加载动画 -->
<div class="page-loading">
    <div class="ball-loader">
        <span></span><span></span><span></span><span></span>
    </div>
</div>
<!-- 正文开始 -->
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-body">
            <!-- 表格工具栏 -->
            <div class="layui-form toolbar">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label w-auto">搜索:</label>
                        <div class="layui-input-inline">
                            <input name="keyword" class="layui-input" placeholder="输入关键字"/>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn icon-btn" lay-filter="imgTbSearch" lay-submit>
                            <i class="layui-icon">&#xe615;</i>搜索
                        </button>
                    </div>
                </div>
            </div>
            <!-- 数据表格 -->
            <table id="tbImgTable" lay-filter="tbImgTable"></table>
        </div>
    </div>
</div>
<!-- 表格操作列 -->
<script type="text/html" id="tbBasicTbBar">
    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="sh">审核</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

<script type="text/javascript" src="/static/assets/libs/layui/layui.js"></script>
<script type="text/javascript" src="/static/assets/js/common.js?v=317"></script>
<script>
    layui.use(['layer', 'table','index'], function () {
        var $ = layui.jquery;
        var layer = layui.layer;
        var table = layui.table;
        var index = layui.index;
        /* 渲染表格 */
        var insTb=table.render({
            elem: '#tbImgTable',
            url: "<?php echo url('admin/teacher/dsh'); ?>",
            page: true,
            cellMinWidth: 100,
            cols: [[
                {field: 'id', title: '编号', align: 'center',width:100,sort: true},
                {field: 'imgname', title: '姓名', align: 'center', sort: true},
                {
                    title: '照片', templet: function (d) {
                        var url = d.img || '../../../assets/images/head.jpg';
                        return '<img src="' + url + '" class="tb-img-circle" tb-img alt=""/>';
                    }, align: 'center', unresize: true
                },
                {field: 'tphone', title: '联系电话', align: 'center', sort: true},
                {title: '操作', toolbar: '#tbBasicTbBar',align: 'center', minWidth: 200}
            ]]
        });

        /* 点击图片放大 */
        $(document).off('click.tbImg').on('click.tbImg', '[tb-img]', function () {
            layer.photos({photos: {data: [{src: $(this).attr('src')}]}, shade: .1, closeBtn: true});
        });
        // 工具条点击事件
        table.on('tool(tbImgTable)', function (obj) {
            var data = obj.data;
            var layEvent = obj.event;
            if (layEvent == 'sh') {
                layer.confirm('确定要审核通过吗？', {
                    shade: .1,
                    skin: 'layui-layer-admin'
                }, function (i) {
                    layer.close(i);
                    layer.load(2);
                    $.post("<?php echo url('sh_teacher'); ?>", {
                        id: data.id
                    }, function (res) {
                        layer.closeAll('loading');
                        if (res.code == 0) {
                            layer.msg(res.msg, {icon: 1});
                            insTb.reload({page: {curr: 1}});
                        } else {
                            layer.msg(res.msg, {icon: 2});
                        }
                    }, 'json');
                });
            } else if (layEvent == 'del') {
                doDel(data.id);
            }
        });
        // 删除
        function doDel(id) {
            layer.confirm('确定要删除吗？', {
                shade: .1,
                skin: 'layui-layer-admin'
            }, function (i) {
                layer.close(i);
                layer.load(2);
                $.post("<?php echo url('teacher_del'); ?>", {
                    id: id
                }, function (res) {
                    layer.closeAll('loading');
                    if (res.code == 0) {
                        layer.msg(res.msg, {icon: 1});
                        insTb.reload({page: {curr: 1}});
                    } else {
                        layer.msg(res.msg, {icon: 2});
                    }
                }, 'json');
            });
        }
    });
</script>
</body>
</html>
