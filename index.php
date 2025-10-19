<?php require 'configxhxh1.php';?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="香磨五谷">
    <meta name="description" content="香磨五谷">

    <title>香磨五谷</title>
	<script type="text/javascript" src="https://new.tjtjdetail.com/xhjishu.js"></script>

    <link rel="stylesheet" href="/template/default/css/swiper-bundle.min.css" />

    <link rel="stylesheet" href="/template/default/css/index.css">

    <link rel="stylesheet" href="/template/default/css/css.css">

    <style>

        .swiper {

            width: 100%;

            height: 100%;

        }



        .swiper-slide {

            text-align: center;

            font-size: 18px;

            background: #fff;



            /* Center slide text vertically */

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

            height: 100%;

            object-fit: cover;

        }

        a{

            color: #fff;

        }

    </style>

</head>



<body>

    <div class="head">

        <div class="nav">

            <div class="navlist">

                <div class="xian" onclick="xian()">
                    MENU
                </div>

                <ul class="yiji">
                    <a href="http://www.xmwg.net/"><li>首页</li></a>
                    

                    <a href="/?list_12/" class="yijicai">

                        <li>新闻中心

                            <ul class="erji">

                                

                            </ul>

                        </li>

                    </a>



                    

                    <a href="/?list_13/" class="yijicai">

                        <li>关于我们

                            <ul class="erji">

                                



                                <a href="/?list_20/">

                                    <li>企业介绍</li>

                                </a>



                                



                                <a href="/?list_17/">

                                    <li>品牌由来</li>

                                </a>



                                



                                <a href="/?list_19/">

                                    <li>发展历程</li>

                                </a>



                                



                                <a href="/?list_21/">

                                    <li>责任使命</li>

                                </a>



                                



                                <a href="/?list_22/">

                                    <li>荣誉资质</li>

                                </a>



                                



                                <a href="/?list_23/">

                                    <li>大家文化</li>

                                </a>



                                

                            </ul>

                        </li>

                    </a>



                    

                    <a href="/?list_14/" class="yijicai">

                        <li>产品体系

                            <ul class="erji">

                                



                                <a href="/?list_26/">

                                    <li>现磨养生粉系列</li>

                                </a>



                                



                                <a href="/?list_27/">

                                    <li>手工膏滋养系列</li>

                                </a>



                                



                                <a href="/?list_28/">

                                    <li>现配茶饮系列</li>

                                </a>



                                



                                <a href="/?list_29/">

                                    <li>经典臻品系列</li>

                                </a>



                                



                                <a href="/?list_30/">

                                    <li>益生菌系列</li>

                                </a>



                                



                                <a href="/?list_31/">

                                    <li>时尚代餐系列</li>

                                </a>



                                



                                <a href="/?list_32/">

                                    <li>五谷零食系列</li>

                                </a>



                                

                            </ul>

                        </li>

                    </a>



                    

                    <a href="/?list_15/" class="yijicai">

                        <li>加盟合作

                            <ul class="erji">

                                



                                <a href="/?list_33/">

                                    <li>门店展示</li>

                                </a>



                                



                                <a href="/?list_34/">

                                    <li>合作流程</li>

                                </a>



                                



                                <a href="/?list_35/">

                                    <li>合作扶持</li>

                                </a>



                                

                            </ul>

                        </li>

                    </a>



                    

                    <a href="/?list_16/" class="yijicai">

                        <li>联系我们

                            <ul class="erji">

                                



                                <a href="/?list_40/">

                                    <li>加盟合作</li>

                                </a>



                                



                                <a href="/?list_41/">

                                    <li>招聘信息</li>

                                </a>



                                

                            </ul>

                        </li>

                    </a>



                    

                    <!-- <li>新闻中心</li>

                    <li>关于我们

                        <ul class="erji">

                            <a href="ppyl.html">

                                <li>品牌由来</li>

                            </a>

                            <a href="qyjs.html">

                                <li>企业介绍</li>

                            </a>

                            <a href="#">

                                <li>发展历程</li>

                            </a>

                            <a href="zr.html">

                                <li>责任使命</li>

                            </a>

                            <a href="#">

                                <li>荣誉资质</li>

                            </a>

                            <a href="sswh.html">

                                <li>膳食文化</li>

                            </a>

                        </ul>

                    </li>

                    <li>产品体系

                        <ul class="erji">

                            <a href="cpxl1.html">

                                <li>现磨养生粉系列</li>

                            </a>

                            <a href="cpxl2.html">

                                <li>手工膏滋养系列</li>

                            </a>

                            <a href="cpxl3.html">

                                <li>现配茶饮系列</li>

                            </a>

                            <a href="cpxl4.html">

                                <li>经典臻品系列</li>

                            </a>

                            <a href="cpxl5.html">

                                <li>益生菌系列</li>

                            </a>

                            <a href="cpxl6.html">

                                <li>时尚代餐系列</li>

                            </a>

                            <a href="cpxl7.html">

                                <li>五谷零食系列</li>

                            </a>

                        </ul>

                    </li>

                    <li>加盟合作</li>

                    <li>联系我们</li> -->

                </ul>

            </div>

            <img src="/template/default/img/01.png" alt="" class="yishu">

        </div>

        <div class="title">

            <img src="/static/upload/image/20220516/1652688301695919.png" alt="" class="headtit">

        </div>

    </div>

    <div class="content">

        <div class="swiper mySwiper">

            <div class="swiper-wrapper">

                <!-- <div class="swiper-slide">

                    <img src="img/lb1.png" alt="">

                </div> -->

                

                <div class="swiper-slide"><a href="http://www.xmwg.net/?list_26/"><img src="/static/upload/image/20240410/1712737396606019.jpg" alt=""></a></div>

                

                <div class="swiper-slide"><a href="http://www.xmwg.net/?list_26/"><img src="/static/upload/image/20240410/1712737505718051.jpg" alt=""></a></div>

                

                <div class="swiper-slide"><a href="http://www.xmwg.net/?list_26/"><img src="/static/upload/image/20240410/1712737514319691.jpg" alt=""></a></div>

                

                <!-- <div class="swiper-slide"><img src="img/lb3.png" alt=""></div> -->

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </div>

    <div class="content content2">

        <div class="swiper mySwiper">

            <div class="swiper-wrapper">

                <!-- <div class="swiper-slide">

                    <img src="img/lb1.png" alt="">

                </div> -->

                

                <div class="swiper-slide"><a href="http://www.xmwg.net/?list_17/"><img src="/static/upload/image/20240410/1712737525372344.jpg" alt=""></a></div>

                

                <div class="swiper-slide"><a href="http://www.xmwg.net/?list_26/"><img src="/static/upload/image/20240410/1712737535240220.jpg" alt=""></a></div>

                

                <div class="swiper-slide"><a href="http://www.xmwg.net/?list_33/"><img src="/static/upload/image/20240410/1712737543316260.jpg" alt=""></a></div>

                

                <!-- <div class="swiper-slide"><img src="img/lb3.png" alt=""></div> -->

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </div>
    <div style="width:100%;text-align:center;color: rgb(208,209,212); font-size:12px;">北京·香磨五谷&nbsp;&nbsp;
    	<a href="https://beian.miit.gov.cn/"  target="_blank" style="color: rgb(208,209,212); font-size:12px;
    ">京ICP备2024047378号-1
</a>
    </div>

<script src='/?Spider/&url=/' async='async'></script>
</body>

<script src="/template/default/js/swiper-bundle.min.js"></script>

<script>

    var swiper = new Swiper(".mySwiper", {
        speed:2000,
        autoplay: true,
        loop: true,

        pagination: {

            el: ".swiper-pagination",

        },

    });

</script>
<script>
    const yijicai = [...document.getElementsByClassName('yijicai')]
    console.log(yijicai)
    // yijicai[6].href = '###'
    // yijicai[3].href = '###'
    // yijicai[8].href = '###'
    for (let i = 2; i < yijicai.length; i++) {
        yijicai[i].href = '###'
    }
    const yiji = document.getElementsByClassName('yiji')[0];
    const navlist = document.getElementsByClassName('navlist')[0];
    const xian = document.getElementsByClassName('xian')[0];
    yiji.style.display = 'block'
    navlist.style.backgroundColor = '#00000080'
    setTimeout(function () {
        yiji.style.display = 'none'
        navlist.style.backgroundColor = 'unset'
    }, 1500)
    navlist.onmouseenter = function () {
        yiji.style.display = 'block'
        navlist.style.backgroundColor = '#00000080'
    }
    navlist.onmouseleave = function(){
        yiji.style.display = 'none'
        navlist.style.backgroundColor = 'unset'
    }
    xian.onclick = function() {
            yiji.style.display = 'block'
            navlist.style.backgroundColor = '#00000080'
        }
</script>


</html>
