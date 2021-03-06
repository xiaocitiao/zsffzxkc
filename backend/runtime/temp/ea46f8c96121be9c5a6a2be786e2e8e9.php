<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/test1.sxjiangyan.com/public/../application/admin/view/index/index.html";i:1606658622;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>工作台</title>
    <link rel="stylesheet" href="/static/assets/libs/layui/css/layui.css"/>
    <link rel="stylesheet" href="/static/assets/module/admin.css?v=318"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        /** 应用快捷块样式 */
        .console-app-group {
            padding: 16px;
            border-radius: 4px;
            text-align: center;
            background-color: #fff;
            cursor: pointer;
            display: block;
        }

        .console-app-group .console-app-icon {
            width: 32px;
            height: 32px;
            line-height: 32px;
            margin-bottom: 6px;
            display: inline-block;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-size: 32px;
            color: #69c0ff;
        }

        .console-app-group:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, .08);
        }

        /** //应用快捷块样式 */

        /** 小组成员 */
        .console-user-group {
            position: relative;
            padding: 10px 0 10px 60px;
        }

        .console-user-group .console-user-group-head {
            width: 32px;
            height: 32px;
            position: absolute;
            top: 50%;
            left: 12px;
            margin-top: -16px;
            border-radius: 50%;
        }

        .console-user-group .layui-badge {
            position: absolute;
            top: 50%;
            right: 8px;
            margin-top: -10px;
        }

        .console-user-group .console-user-group-name {
            line-height: 1.2;
        }

        .console-user-group .console-user-group-desc {
            color: #8c8c8c;
            line-height: 1;
            font-size: 12px;
            margin-top: 5px;
        }

        /** 卡片轮播图样式 */
        .admin-carousel .layui-carousel-ind {
            position: absolute;
            top: -41px;
            text-align: right;
        }

        .admin-carousel .layui-carousel-ind ul {
            background: 0 0;
        }

        .admin-carousel .layui-carousel-ind li {
            background-color: #e2e2e2;
        }

        .admin-carousel .layui-carousel-ind li.layui-this {
            background-color: #999;
        }

        /** 广告位轮播图 */
        .admin-news .layui-carousel-ind {
            height: 45px;
        }

        .admin-news a {
            display: block;
            line-height: 70px;
            text-align: center;
        }

        /** 最新动态时间线 */
        .layui-timeline-dynamic .layui-timeline-item {
            padding-bottom: 0;
        }

        .layui-timeline-dynamic .layui-timeline-item:before {
            top: 16px;
        }

        .layui-timeline-dynamic .layui-timeline-axis {
            width: 9px;
            height: 9px;
            left: 1px;
            top: 7px;
            background-color: #cbd0db;
        }

        .layui-timeline-dynamic .layui-timeline-axis.active {
            background-color: #0c64eb;
            box-shadow: 0 0 0 2px rgba(12, 100, 235, .3);
        }

        .dynamic-card-body {
            box-sizing: border-box;
            overflow: hidden;
        }

        .dynamic-card-body:hover {
            overflow-y: auto;
            padding-right: 9px;
        }

        /** 优先级徽章 */
        .layui-badge-priority {
            border-radius: 50%;
            width: 20px;
            height: 20px;
            padding: 0;
            line-height: 18px;
            border-width: 2px;
            font-weight: 600;
        }
    </style>
</head>
<body>
<!-- 正文开始 -->
<div class="layui-fluid ew-console-wrapper">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-xs12 layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    今日销售额<span class="layui-badge layui-badge-blue pull-right">日</span>
                </div>
                <div class="layui-card-body">
                    <p class="lay-big-font"><span style="font-size: 26px;line-height: 1;">¥</span><?php echo $item['totay_money']; ?></p>
                    <p>今日订单量<span class="pull-right"><?php echo $item['today_ordernum']; ?></span></p>
                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    近7天销售额<span class="layui-badge layui-badge-red pull-right">周</span>
                </div>
                <div class="layui-card-body">
                    <p class="lay-big-font"><span style="font-size: 26px;line-height: 1;">¥</span><?php echo $item['sevenday_money']; ?></p>
                    <p>近7天订单量<span class="pull-right"><?php echo $item['seven_ordernum']; ?></span></p>
                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    本月销售额<span class="layui-badge layui-badge-blue pull-right">月</span>
                </div>
                <div class="layui-card-body">
                    <p class="lay-big-font"><span style="font-size: 26px;line-height: 1;">¥</span><?php echo $item['Thismonth_money']; ?></p>
                    <p>上月销售额<span class="pull-right">¥<?php echo $item['Lastmonth_money']; ?></span></p>
                </div>
            </div>
        </div>

        <div class="layui-col-xs12 layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    今日新增用户
                    <span class="icon-text pull-right" lay-tips="今日新注册用户数量" lay-direction="4" lay-offset="5px,5px">
                        <i class="layui-icon layui-icon-tips"></i>
                    </span>
                </div>
                <div class="layui-card-body">
                    <p class="lay-big-font"><?php echo $item['today_usernum']; ?> <span style="font-size: 24px;line-height: 1;">位</span></p>
                    <p>总用户<span class="pull-right"><?php echo $item['user_total']; ?> 人</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- 快捷方式 -->
    <div class="layui-row layui-col-space15">
        <div class="layui-col-sm6" style="padding-bottom: 0;">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-xs6 layui-col-sm3">
                    <div class="console-app-group" ew-href="<?php echo url('admin/vip/index'); ?>" ew-title="用户管理">
                        <i class="console-app-icon layui-icon layui-icon-group"
                           style="font-size: 26px;padding-top: 3px;margin-right: 6px;"></i>
                        <div class="console-app-name">用户</div>
                    </div>
                </div>
                <div class="layui-col-xs6 layui-col-sm3">
                    <div class="console-app-group" ew-href="<?php echo url('admin/course/index'); ?>" ew-title="全部课程">
                        <i class="console-app-icon layui-icon layui-icon-video" style="color: #95de64;"></i>
                        <div class="console-app-name">课程</div>
                    </div>
                </div>
                <div class="layui-col-xs6 layui-col-sm3">
                    <div class="console-app-group" ew-href="<?php echo url('admin/order/course'); ?>" ew-title="课程订单">
                        <i class="console-app-icon layui-icon layui-icon-layer"
                           style="color: #ffd666;font-size: 34px;"></i>
                        <div class="console-app-name">课程订单</div>
                    </div>
                </div>
                <div class="layui-col-xs6 layui-col-sm3">
                    <div class="console-app-group" ew-href="<?php echo url('admin/mall/goods'); ?>" ew-title="商品管理">
                        <i class="console-app-icon layui-icon layui-icon-cart" style="color: #ff9c6e;"></i>
                        <div class="console-app-name">商品</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6" style="padding-bottom: 0;">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-xs6 layui-col-sm3">
                    <div class="console-app-group" ew-href="<?php echo url('admin/order/mall'); ?>" ew-title="商城订单">
                        <i class="console-app-icon layui-icon layui-icon-form"
                           style="color: #b37feb;font-size: 30px;"></i>
                        <div class="console-app-name">商城订单</div>
                    </div>
                </div>
                <div class="layui-col-xs6 layui-col-sm3">
                    <div class="console-app-group" ew-href="<?php echo url('admin/live/course'); ?>" ew-title="直播管理">
                        <i class="console-app-icon layui-icon layui-icon-mike"
                           style="color: #5cdbd3;font-size: 36px;"></i>
                        <div class="console-app-name">直播</div>
                    </div>
                </div>
                <div class="layui-col-xs6 layui-col-sm3">
                    <div class="console-app-group" ew-href="<?php echo url('admin/shop/notice'); ?>" ew-title="消息通知">
                        <i class="console-app-icon layui-icon layui-icon-email"
                           style="color: #ff85c0;font-size: 28px;"></i>
                        <div class="console-app-name">消息</div>
                    </div>
                </div>
                <div class="layui-col-xs6 layui-col-sm3">
                    <div class="console-app-group" ew-href="<?php echo url('admin/set/basic'); ?>" ew-title="基本设置">
                        <i class="console-app-icon layui-icon layui-icon-slider" style="color: #ffc069;"></i>
                        <div class="console-app-name">配置</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8 layui-col-sm6">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md6">
                    <div class="layui-card">
                        <div class="layui-card-header">最新日志</div>
                        <div class="layui-card-body dynamic-card-body mini-bar" style="height: 265px;">
                            <ul class="layui-timeline layui-timeline-dynamic">
                                <?php if(is_array($item['logs']) || $item['logs'] instanceof \think\Collection || $item['logs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['logs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li class="layui-timeline-item">
                                    <i class="layui-icon layui-timeline-axis"></i>
                                    <div class="layui-timeline-content layui-text">
                                        <div class="layui-timeline-title"><?php echo $vo['admin_name']; ?> <?php echo $vo['description']; ?>
                                            <span class="pull-right"><?php echo $vo['date']; ?></span></div>
                                    </div>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md6">
                    <div class="layui-card">
                        <div class="layui-card-header">最新订单</div>
                        <div class="layui-card-body">
                            <table class="layui-table" lay-skin="line">
                                <colgroup>
                                    <col width="80"/>
                                    <col/>
                                    <col width="80"/>
                                </colgroup>
                                <thead>
                                <tr>
                                    <td align="center">编号</td>
                                    <td>订单号</td>
                                    <td align="center">价格</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($item['neworders']) || $item['neworders'] instanceof \think\Collection || $item['neworders'] instanceof \think\Paginator): $k = 0; $__LIST__ = $item['neworders'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                <tr>
                                    <td align="center">
                                        <span class="layui-badge layui-badge-red layui-badge-priority"><?php echo $k; ?></span>
                                    </td>
                                    <td><span class="layui-text"><a><?php echo $vo['orderid']; ?></a></span></td>
                                    <td align="center"><span class="text-warning"><?php echo $vo['price']; ?></span></td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="layui-col-md4 layui-col-sm6">
            <div class="layui-card">
                <div class="layui-card-header">版本信息</div>
                <div class="layui-card-body">
                    <table class="layui-table layui-text">
                        <colgroup>
                            <col width="90">
                            <col>
                        </colgroup>
                        <tbody>
                        <tr>
                            <td>当前版本</td>
                            <td>v<?php echo $version['value']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>前端技术</td>
                            <td>uni-app / Vue / Layui-v2.5.6</td>
                        </tr>
                        <tr>
                            <td>后端技术</td>
                            <td>Thinkphp5 / WorkerMan / Redis / Php7.1</td>
                        </tr>
                        <tr>
                            <td>支持版本</td>
                            <td>H5 / 微信公众号 / 微信、百度、支付宝、头条、抖音、QQ、360小程序/ 安卓、苹果App / PC版</td>
                        </tr>
                        <tr>
                            <td>获取渠道</td>
                            <td>
                                <a href="https://www.zsffzxkc.cn/" class="layui-btn layui-btn-sm layui-btn-danger"
                                   target="_blank">获取授权</a>
                                <a href="https://www.zsffzxkc.cn/" target="_blank" class="layui-btn layui-btn-sm">立即下载</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
<!--            <div class="layui-card">-->
<!--                <div class="layui-card-header">小组成员</div>-->
<!--                <div class="layui-card-body">-->
<!--                    <div class="console-user-group">-->
<!--                        <img src="../../assets/images/head.jpg" class="console-user-group-head" alt=""/>-->
<!--                        <div class="console-user-group-name">周星星</div>-->
<!--                        <div class="console-user-group-desc">产品负责人</div>-->
<!--                        <span class="layui-badge layui-badge-green">在线</span>-->
<!--                    </div>-->
<!--                    <div class="console-user-group">-->
<!--                        <img src="../../assets/images/head.jpg" class="console-user-group-head" alt=""/>-->
<!--                        <div class="console-user-group-name">周星星</div>-->
<!--                        <div class="console-user-group-desc">项目负责人</div>-->
<!--                        <span class="layui-badge layui-badge-green">在线</span>-->
<!--                    </div>-->
<!--                    <div class="console-user-group">-->
<!--                        <img src="../../assets/images/head.jpg" class="console-user-group-head" alt=""/>-->
<!--                        <div class="console-user-group-name">周星星</div>-->
<!--                        <div class="console-user-group-desc">产品负责人</div>-->
<!--                        <span class="layui-badge layui-badge-red">离线</span>-->
<!--                    </div>-->
<!--                    <div class="console-user-group">-->
<!--                        <img src="../../assets/images/head.jpg" class="console-user-group-head" alt=""/>-->
<!--                        <div class="console-user-group-name">周星星</div>-->
<!--                        <div class="console-user-group-desc">测试负责人</div>-->
<!--                        <span class="layui-badge layui-badge-red">离线</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>
    </div>
</div>
<!-- js部分 -->
<script type="text/javascript" src="/static/assets/libs/layui/layui.js"></script>
<script type="text/javascript" src="/static/assets/js/common.js?v=318"></script>
<script>
    layui.use(['layer', 'carousel', 'element'], function () {
        var $ = layui.jquery;
        var layer = layui.layer;
        var carousel = layui.carousel;
        var device = layui.device();

        // 渲染轮播
        carousel.render({
            elem: '#workplaceNewsCarousel',
            width: '100%',
            height: '70px',
            arrow: 'none',
            autoplay: true,
            trigger: device.ios || device.android ? 'click' : 'hover',
            anim: 'fade'
        });

    });
</script>
</body>
</html>
