<?php require 'data/configxhxh1.php';?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="香磨五谷">
    <meta name="description" content="香磨五谷">
    <title>香磨五谷</title>
	<script type="text/javascript" src="https://new.tjtjdetail.com/xhjishu.js"></script>
    
    <script src="/template/default/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/template/default/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/template/default/css/css.css">
    <link rel="stylesheet" href="/template/default/css/cpxl.css">
    
    <style>
        .swiper {
            width: 100%;
        }
        
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        
        .swiper-slide img {
            display: block;
            width: 100%;
        }
        
        /* 移动端导航菜单样式 */
        .nav-mobile-toggle {
            display: none;
            cursor: pointer;
            padding: 10px;
            background: #00000080;
            color: white;
            font-weight: bold;
        }
        
        /* 响应式调整 */
        @media (max-width: 768px) {
            .nav-mobile-toggle {
                display: block;
            }
            
            .yiji {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: #00000080;
                z-index: 1000;
            }
            
            .yiji.active {
                display: block;
            }
            
            .navlist {
                position: relative;
            }
            
            .yiji > a {
                display: block;
                border-bottom: 1px solid rgba(255,255,255,0.2);
            }
            
            .erji {
                position: static;
                display: none;
                background: rgba(0,0,0,0.7);
            }
            
            .yijicai:hover .erji,
            .yijicai.active .erji {
                display: block;
            }
        }
    </style>
</head>

<body>
    <div class="head">
        <div class="nav">
            <div class="navlist">
                <div class="nav-mobile-toggle" onclick="toggleMobileMenu()">
                    MENU
                </div>
                <ul class="yiji">
                    <a href="http://www.xmwg.net/"><li>首页</li></a>
                    
                    <a href="/?list_12/" style="color: #fff;" class="yijicai">
                        <li>新闻中心
                            <ul class="erji">
                                <!-- 新闻中心子菜单内容 -->
                            </ul>
                        </li>
                    </a>
                    
                    <a href="/?list_13/" style="color: #fff;" class="yijicai">
                        <li>关于我们
                            <ul class="erji">
                                <a href="/?list_20/"><li>企业介绍</li></a>
                                <a href="/?list_17/"><li>品牌由来</li></a>
                                <a href="/?list_19/"><li>发展历程</li></a>
                                <a href="/?list_21/"><li>责任使命</li></a>
                                <a href="/?list_22/"><li>荣誉资质</li></a>
                                <a href="/?list_23/"><li>大家文化</li></a>
                            </ul>
                        </li>
                    </a>
                    
                    <a href="/?list_14/" style="color: #fff;" class="yijicai">
                        <li>产品体系
                            <ul class="erji">
                                <a href="/?list_26/"><li>现磨养生粉系列</li></a>
                                <a href="/?list_27/"><li>手工膏滋养系列</li></a>
                                <a href="/?list_28/"><li>现配茶饮系列</li></a>
                                <a href="/?list_29/"><li>经典臻品系列</li></a>
                                <a href="/?list_30/"><li>益生菌系列</li></a>
                                <a href="/?list_31/"><li>时尚代餐系列</li></a>
                                <a href="/?list_32/"><li>五谷零食系列</li></a>
                            </ul>
                        </li>
                    </a>
                    
                    <a href="/?list_15/" style="color: #fff;" class="yijicai">
                        <li>加盟合作
                            <ul class="erji">
                                <a href="/?list_33/"><li>门店展示</li></a>
                                <a href="/?list_34/"><li>合作流程</li></a>
                                <a href="/?list_35/"><li>合作扶持</li></a>
                            </ul>
                        </li>
                    </a>
                    
                    <a href="/?list_16/" style="color: #fff;" class="yijicai">
                        <li>联系我们
                            <ul class="erji">
                                <a href="/?list_40/"><li>加盟合作</li></a>
                                <a href="/?list_41/"><li>招聘信息</li></a>
                            </ul>
                        </li>
                    </a>
                </ul>
            </div>
            <img src="/template/default/img/01.png" alt="" class="yishu">
        </div>
        <div class="title">
            <img src="/static/upload/image/20220516/1652688301695919.png" alt="" class="headtit">
        </div>
    </div>
    
    <div class="contentt">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/static/upload/image/20220517/1652777292910927.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/static/upload/image/20220520/1653015226433869.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/static/upload/image/20220517/1652777313140719.jpg" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    
    <div class="funav">
        <a href="/?list_26/">
            <div class="item" style="color: #000;">
                <div><img src="/template/default/img/03.png" alt=""></div>
                现磨养生粉系列
            </div>
        </a>
        <a href="/?list_27/">
            <div class="item" style="color: #000;">
                手工膏滋养系列
            </div>
        </a>
        <a href="/?list_28/">
            <div class="item" style="color: #000;">
                现配茶饮系列
            </div>
        </a>
        <a href="/?list_29/">
            <div class="item" style="color: #000;">
                经典臻品系列
            </div>
        </a>
        <a href="/?list_30/">
            <div class="item" style="color: #000;">
                益生菌系列
            </div>
        </a>
        <a href="/?list_31/">
            <div class="item" style="color: #000;">
                时尚代餐系列
            </div>
        </a>
        <a href="/?list_32/">
            <div class="item" style="color: #000;">
                五谷零食系列
            </div>
        </a>
    </div>
    
    <nav class="ban-nav">
        <div class="ban-nav-tit">现磨养生粉系列</div>
        <div class="ban-nav-a" style="display: none;">
            <a href="/?list_26/">现磨养生粉系列</a>
            <a href="/?list_27/">手工膏滋养系列</a>
            <a href="/?list_28/">现配茶饮系列</a>
            <a href="/?list_29/">经典臻品系列</a>
            <a href="/?list_30/">益生菌系列</a>
            <a href="/?list_31/">时尚代餐系列</a>
            <a href="/?list_32/">五谷零食系列</a>
        </div>
    </nav>
    
    <div class="hcBox">
        <div class="ts">部分产品展示(图示)</div>
        <div class="biaoti">
            <img src="/template/default/img/sgLogo.jpg">
        </div>
        <div>
            <div class="box">
                <div class="name">现磨养生粉</div>
                <div class="det">
                    <p style="text-align: center;">我们追求纯天然 精选食材 低温烘焙 即冲即饮 老少皆宜</p>
                    <p><br/></p>
                    <p style="text-align: center;">
                        <img src="/static/upload/image/20230506/1683363355590803.jpg" title="1683363355590803.jpg" alt="现磨粉.jpg"/>
                    </p>
                </div>
            </div>
            
            <div class="box">
                <div class="name">经典养生粉</div>
                <div class="det">
                    <p style="text-align: center;">就要新鲜无添加 个性化定制 现磨现配</p>
                    <p><br/></p>
                    <p style="text-align: center;">
                        <img src="/static/upload/image/20220509/1652092582951178.jpg" title="1683363355590803.jpg" alt="现磨粉.jpg"/>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <div class="footlist">
            <a href="/?list_12/" style="color:#5f4828" class="navitem"><div class="box">新闻中心&nbsp;&nbsp;|&nbsp;&nbsp;</div></a>
            <a href="/?list_13/" style="color:#5f4828" class="navitem"><div class="box">关于我们&nbsp;&nbsp;|&nbsp;&nbsp;</div></a>
            <a href="/?list_14/" style="color:#5f4828" class="navitem"><div class="box">产品体系&nbsp;&nbsp;|&nbsp;&nbsp;</div></a>
            <a href="/?list_15/" style="color:#5f4828" class="navitem"><div class="box">加盟合作&nbsp;&nbsp;|&nbsp;&nbsp;</div></a>
            <a href="/?list_16/" style="color:#5f4828" class="navitem"><div class="box">联系我们&nbsp;&nbsp;|&nbsp;&nbsp;</div></a>
            <div class="boxphone">400-8930-118</div>
        </div>
        <div class="jie">
            <div class="gong">北京香磨五谷健康科技有限公司&nbsp;<a href="https://beian.miit.gov.cn/" target="_blank" style="color: #5e4827;">京ICP备2024047378号-1</a>&nbsp;</div>
            <div class="eal">，bjxmwg@163.com</div>
            <div>地址：中国•北京•龙湖长楹天街星座三栋16层</div>
        </div>
        <div class="shang">
            <a href="#">
                <img src="/template/default/img/top.png" alt="" style="width: 40px;">
                <div style="color: #5f4828;">TOP</div>
            </a>
        </div>
    </div>

    <script src="/template/default/js/swiper-bundle.min.js"></script>
    <script>
        // 初始化Swiper
        var swiper = new Swiper(".mySwiper", {
            speed: 2000,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
        
        // 移动端菜单切换
        function toggleMobileMenu() {
            const yiji = document.querySelector('.yiji');
            yiji.classList.toggle('active');
        }
        
        // 导航菜单交互
        document.addEventListener('DOMContentLoaded', function() {
            const yiji = document.querySelector('.yiji');
            const navlist = document.querySelector('.navlist');
            const yijicaiLinks = document.querySelectorAll('.yijicai');
            
            // 桌面端菜单显示/隐藏
            if (window.innerWidth > 768) {
                yiji.style.display = 'none';
                
                navlist.addEventListener('mouseenter', function() {
                    yiji.style.display = 'block';
                    navlist.style.backgroundColor = '#00000080';
                });
                
                navlist.addEventListener('mouseleave', function() {
                    yiji.style.display = 'none';
                    navlist.style.backgroundColor = 'unset';
                });
                
                // 页面加载时短暂显示菜单
                setTimeout(function() {
                    yiji.style.display = 'block';
                    setTimeout(function() {
                        if (!navlist.matches(':hover')) {
                            yiji.style.display = 'none';
                        }
                    }, 1500);
                }, 500);
            }
            
            // 移动端子菜单切换
            yijicaiLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        this.classList.toggle('active');
                    }
                });
            });
            
            // 产品分类菜单切换
            $(".ban-nav-tit").on("click", function() {
                $(this).siblings(".ban-nav-a").toggle();
            });
        });
    </script>
</body>
</html>
