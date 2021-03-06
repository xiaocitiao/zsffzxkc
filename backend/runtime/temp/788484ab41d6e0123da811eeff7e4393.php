<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/www/wwwroot/test1.sxjiangyan.com/public/../application/admin/view/plugin/creditadd.html";i:1606658624;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>基础表单</title>
    <link rel="stylesheet" href="/static/assets/libs/layui/css/layui.css" />
    <link rel="stylesheet" href="/static/assets/module/admin.css?v=317" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #formBasForm {
            max-width: 800px;
            margin: 30px 200px 50px;
        }

        .layui-form-item {
            display: flex ;
        }

        .layui-form-label {
            flex: 3;
        }

        .layui-input-block {
            flex: 14;
        }

        .layui-input-block {
            margin-left: 20px !important;
            min-height: 36px;
        }

        #formBasForm .layui-form-item {
            margin-bottom: 25px;
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
            <ul class="layui-tab-title" style="margin-bottom: 20px;">
                <li ><a ew-href="<?php echo url('credit'); ?>" ew-title="积分商城管理">积分商城</a></li>
                <li class="layui-this"><a href="javascript:location.reload();">添加积分商品</a></li>
            </ul>
            <div class="layui-card-body">
                <!-- 表单开始 -->
                <form class="layui-form" id="formBasForm" lay-filter="formBasForm">
                    <input type="hidden" name="id" value="<?php echo !empty($item['id'])?$item['id']:''; ?>">
                    <input type="hidden" name="status" value="<?php echo !empty($item['status'])?$item['status']:''; ?>">
                    <input type="hidden" name="goodsid" >

                    <div class="layui-form-item">
                        <label class="layui-form-label layui-form-required">所需积分:</label>
                        <div class="layui-input-block">
                            <input name="credit" class="layui-input" required lay-verify="required" />
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-form-required">库存:</label>
                        <div class="layui-input-block">
                            <input name="stock" class="layui-input" required lay-verify="required" />
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-form-required">选择商品类型:</label>
                        <div class="layui-input-block">
                            <select name="goodstype" required lay-verify="required" lay-filter="selecttype" lay-skin="select">
                                <option value="">选择商品类型</option>
                                <option value="course">知识课程</option>
                                <option value="mall">实物商品</option>
                                <option value="pxb">培训班报名</option>
                              </select>
                        </div>
                    </div>
                    <div class="layui-form-item " id="course_check" style="display: none;">
                        <label class="layui-form-label layui-form-required">选择课程:</label>
                        <div class="layui-input-block">
                            <input type="text" class="layui-input" id="layTables" name="goodsname">
                        </div>
                    </div>
                    <div class="layui-form-item " id="mall_check" style="display: none;">
                        <label class="layui-form-label layui-form-required">选择商品:</label>
                        <div class="layui-input-block">
                            <input type="text" class="layui-input" id="layTables1" name="goodsname">
                        </div>
                    </div>
                    <div class="layui-form-item " id="pxb_check" style="display: none;">
                        <label class="layui-form-label layui-form-required">选择培训班课程:</label>
                        <div class="layui-input-block">
                            <input type="text" class="layui-input" id="layTables2" name="goodsname">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否上架:</label>
                        <div class="layui-input-block">
                            <?php if($item): ?>
                            <input type="checkbox" <?php if($item['status']==1): ?>checked<?php endif; ?> name="status" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
                            <?php else: ?>
                            <input type="checkbox" checked name="status" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block" style="display: flex;
                    justify-content: space-around;
                ">
                            <button id="btnDemoEdtGetContent" class="layui-btn" lay-filter="formBasSubmit" lay-submit>&emsp;提交&emsp;</button>
                            <button type="reset" class="layui-btn layui-btn-primary">&emsp;重置&emsp;</button>
                        </div>
                    </div>
                </form>
                <!-- //表单结束 -->
            </div>
        </div>
    </div>

    <!-- js部分 -->
    <script type="text/javascript" src="/static/assets/libs/layui/layui.js"></script>
    <script type="text/javascript" src="/static/assets/js/common.js?v=317"></script>
    <script type="text/javascript" src="/static/assets/libs/tinymce/tinymce.min.js"></script>
    <script src="/static/assets/libs/jquery/jquery-3.2.1.min.js"></script>
    <script>
        layui.use(['layer', 'form', 'laydate','jquery','admin','tableSelect'], function () {
            var $ = layui.jquery;
            var layer = layui.layer;
            var form = layui.form;
            var admin = layui.admin;
            var laydate = layui.laydate;
            var tableSelect = layui.tableSelect;
            tableSelect.render({
                elem: '#layTables',	//定义输入框input对象
                checkedKey: 'id',//表格的唯一建值，非常重要，影响到选中状态 必填
                searchKey: 'keyword',	//搜索输入框的name值 默认keyword
                searchPlaceholder: '课程名称',	//搜索输入框的提示文字 默认关键词搜索
                table: {	//定义表格参数，与LAYUI的TABLE模块一致，只是无需再定义表格elem
                    url:"<?php echo url('admin/plugin/search_goods'); ?>?goodstype=course",
                    page: true,
                    cols:[[
                        {type: 'radio'},
                        {field: 'id', width: '', title: 'ID', align: 'center'},
                        {field: 'menuname', width: '', title: '商品名', align: 'center'},
                        {field: 'price', width: '', title: '价格', align: 'center'}
                        ]]
                },
                done: function (elem, data) {
                    elem.val(data.data[0].menuname)
                    $("input[name='goodsname']").val(data.data[0].menuname)
                    $("input[name='goodsid']").val(data.data[0].id)
                }
            })
            tableSelect.render({
                elem: '#layTables1',	//定义输入框input对象
                checkedKey: 'id',//表格的唯一建值，非常重要，影响到选中状态 必填
                searchKey: 'keyword',	//搜索输入框的name值 默认keyword
                searchPlaceholder: '商品名称',	//搜索输入框的提示文字 默认关键词搜索
                table: {	//定义表格参数，与LAYUI的TABLE模块一致，只是无需再定义表格elem
                    url:"<?php echo url('admin/plugin/search_goods'); ?>?goodstype=mall",
                    page: true,
                    cols:[[
                        {type: 'radio'},
                        {field: 'id', width: '', title: 'ID', align: 'center'},
                        {field: 'name', width: '', title: '商品名', align: 'center'},
                        {field: 'price', width: '', title: '价格', align: 'center'}
                    ]]
                },
                done: function (elem, data) {
                    elem.val(data.data[0].name)
                    $("input[name='goodsid']").val(data.data[0].id)
                    $("input[name='goodsname']").val(data.data[0].name)
                }
            })
            tableSelect.render({
                elem: '#layTables2',	//定义输入框input对象
                checkedKey: 'id',//表格的唯一建值，非常重要，影响到选中状态 必填
                searchKey: 'keyword',	//搜索输入框的name值 默认keyword
                searchPlaceholder: '培训班课程名称',	//搜索输入框的提示文字 默认关键词搜索
                table: {	//定义表格参数，与LAYUI的TABLE模块一致，只是无需再定义表格elem
                    url:"<?php echo url('admin/plugin/search_goods'); ?>?goodstype=pxb",
                    page: true,
                    cols:[[
                        {type: 'radio'},
                        {field: 'id', width: '', title: 'ID', align: 'center'},
                        {field: 'name', width: '', title: '商品名', align: 'center'},
                        {field: 'price', width: '', title: '价格', align: 'center'}
                    ]]
                },
                done: function (elem, data) {
                    elem.val(data.data[0].name)
                    $("input[name='goodsid']").val(data.data[0].id)
                    $("input[name='goodsname']").val(data.data[0].name)
                }
            })
            form.on('select(selecttype)', function(res){
                console.log(res)
                if(res.value=='course'){
                    $('#course_check').show()
                    $('#mall_check').hide()
                    $('#pxb_check').hide()
                }else if(res.value=='mall'){
                    $('#course_check').hide()
                    $('#mall_check').show()
                    $('#pxb_check').hide()
                }else if(res.value=='pxb'){
                    $('#course_check').hide()
                    $('#mall_check').hide()
                    $('#pxb_check').show()
                }
            });
            form.verify({
                shuliang : function(v) {
                    if (v<1 || v>99999) {
                        return "请输入1-99999之间的数值";
                    }
                },
                weishu:function (v) {
                    if (v<6 || v>15) {
                        return "请输入6-15之间的数值";
                    }
                }
            });
            laydate.render({
                elem: '#formAdvDateSel2',
                range: true
            });
            /* 监听表单提交 */
            form.on('submit(formBasSubmit)', function (data) {
                $('.layui-btn').addClass('layui-disabled').attr('disabled','disabled');
                $.ajax({
                    url:"<?php echo url('creditadd'); ?>",
                    type:'POST',
                    dataType:'json',
                    data:data.field,
                    success:function(res){
                        //console.log(res)
                        if (res.code == 0) {
                            layer.msg(res.msg,{icon:1,time:1500,shade:0.1})
                            setTimeout(function () {
                                admin.closeThisTabs();
                            }, 1000);
                        } else {
                            $(".layui-btn").removeClass('layui-disabled').removeAttr('disabled');
                            wk.error(res.msg);
                            return false;
                        }
                    }
                })
            });
        });
    </script>
</body>

</html>