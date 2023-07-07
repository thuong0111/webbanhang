<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/template/css/contact.css">
    <title>Document</title>
</head>
<body>
    @include('admin.alert')
    @include('header')
    <div class="site_page" style="padding: 125px 0 0 0;">
        
    </div>

    <div class="about-content col-sm-12 col-md-12" style="padding-bottom:7px;padding-left:0px;padding-right:0px;padding-top:7px">
    <div id="mapsdiv">
                <div class="tabcontents">
                    <div><strong>Google Map</strong></div>
                    <div id="view_tab">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="450" frameborder="0" style="border:1px" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
    </div>		
            

    <div style="padding-top:7px;padding-left:0px;display:flex;" class="about-content col-sm-12 col-md-12">
        <div class="col-md-6" style="padding-left:0px">
            <p><span><strong>SHOP STORE</strong></span></p>
            <p><span>MST: 41C8017275</span></p>
            <p><span>Địa chỉ: Chung cư Nguyễn Văn Lượng 2 - 417 Thống Nhất P.11 Q.G&ograve; Vấp TP.HCM. HCM</span></p>
            <p><span>Hotline:&nbsp;09.16.18.16.14&nbsp;</span></p>
            <p><span>Zalo - Viber:&nbsp;09.16.18.16.14</span></p>
            <p><span>Email:&nbsp;<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="acc8cfdd82c2cdc1eccbc1cdc5c082cfc3c1">[email&#160;protected]</a></span></p>
            <p>Website:&nbsp;<a href="http://www.78store.vn">www.78store.vn</a>&nbsp;<a href="https://vietnamcredit-ranking.com/">-</a>&nbsp;<a href="http://www.78store.com.vn">www.78store.com.vn</a></p>
            <p><a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=39917"><span><img src="https://78store.vn/upload/20150827110756-dathongbao.png" alt="" width="300" height="114" /></span></a></p>      
        </div>
        <div class="col-md-6">
            <div>
                <form action="/contactadd" method="POST">
                    <div class="form-group">
                        <p>
                            Quý khách có thể liên hệ với chúng tôi bằng việc điền đầy đủ các thông tin
                            dưới đây. Chúng tôi sẽ liên hệ lại sau khi đã nhận được thư liên hệ của quý
                            khách. Cảm ơn!
                        </p>
                    </div>
                    <div class="form-group">
                        <input name="ten" type="text" class="form-control" id="name" size="50"
                            placeholder="Họ và tên *"/>
                    </div>
                    <div class="form-group">
                        <input name="diachi" type="text" class="form-control" id="diachi" size="50"
                            placeholder="Địa chỉ *"/>
                    </div>
                    <div class="form-group">
                        <input name="dienthoai" type="text" class="form-control" id="dienthoai" size="50"
                            placeholder="Số điện thoại *"/>
                    </div>
                    <div class="form-group">
                        <input name="email" id='email' type="email" class="form-control" size="50"
                            placeholder="Email *"/>
                    </div>
                    <div class="form-group">
                        <input name="tieude" type="text" class="form-control" id="tieude" size="50"
                            placeholder="Chủ đề *"/>
                    </div>
                    <div class="form-group">
                        <textarea name="noidung" cols="1" rows="5" class="form-control" class="noidung"
                                style="background-color:#FFFFFF;" placeholder="Nội dung *"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="flex-c-m stext-101 cl0 size-30 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                            Gửi
                        </button>
                        {{-- <input type="submit" name="btn_lienhe" value="Gửi" class="btn btn-success"
                            style="margin-right:20px;"/> --}}
                        <input type="reset" name="btn_Reset" value="Nhập lại" class="btn btn-warning"/>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    
    <style type="text/css">
    
    .lehieuit-bottom-contact 
    {
    display: none;
    }
        @media screen and (max-width: 1199px){


    .lehieuit-bottom-contact {
        display: block;
        position: fixed;
        bottom: 0;
        left: 0;
        background: #fff;
        width: 100%;
        z-index: 9999;
        box-shadow: 2px 1px 9px #dedede;
        border-top: 1px solid #eaeaea;
    }
    .lehieuit-bottom-contact ul li {
        font-size: 72%!important;
        font-weight: 500;
    }
    .lehieuit-bottom-contact ul li {
        width: 25%;
        float: left;
        list-style: none;
        text-align: center;
        font-size: 13.5px;
    }
    .lehieuit-bottom-contact ul li img {
        width: 35px;
        margin-top: 10px;
        margin-bottom: 0;
    }
    .lehieuit-bottom-contact ul li span {
        color: #000;
    }
        }
    </style>

    {{-- <div class="lehieuit-bottom-contact">
    <ul>
        <li>
            <a id="goidien" href="tel: 09.16.18.16.14">
            <img src="img/icon-phone2.png">
            <br>
            <span>Gọi điện</span>
            </a>
        </li>
        <li>
            <a id="nhantin" href="sms: 09.16.18.16.14">
            <img src="img/icon-sms2.png">
            <br>
            <span>Nhắn tin</span>
            </a>
        </li>
        <li>
            <a id="chatzalo" href="https://zalo.me/0916181614" target="_blank">
            <img src="img/icon-zalo2.png">
            <br>
            <span>Chat zalo</span>
            </a>
        </li>
        <li>
            <a id="chatfb" href="https://m.me/78store.giaychinhhang" target="_blank">
            <img src="img/icon-mesenger2.png">
            <br>
            <span>Chat Facebook</span>
            </a>
        </li>
    </ul>
    </div> --}}

    <style>
        .overflow_my_body_popup{position: relative;}
        /*popup*/
    #my_popup{position: fixed;top:0px;left: 0px;bottom: 0px;right: 0px;background: rgba(0,0,0,0.2);z-index: 9999;overflow: hidden;text-align: center;display: none;}
    .my_box_popup{display: inline-block;height: auto;margin-top: 8%;max-width: 500px;position: relative; width: 80%}
    .content_popup{position: relative;top:50%;max-height: 100%;}
    .inner_content_popup img{max-width: 100%;height: auto;    border: 3px solid #fff;
        border-radius: 5px;}
    .close_my_popup {
        position: absolute;
        width: 30px;
        height: 35px;
        background: url(closebutton.png);
        display: block;
        top: -15px;
        right: -15px;
        cursor: pointer;
        background-size: cover;
    }
    #fanpagea {
        background: ;
        margin-top: -3px;
        position: relative;
        border: solid 3px #fff;
        border-top: none;
    }
    .fade{opacity: 1; display: block;}
    #mess
    {
        position: fixed;bottom: 40px;
        right: 10px;-webkit-animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
        -moz-animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
        -ms-animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
        -o-animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
        animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
        -webkit-transform-origin: 50% 50%;
        -moz-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        -o-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
    }
    @-moz-keyframes quick-alo-circle-img-anim {
        0% {
            transform: rotate(0) scale(1) skew(1deg)
        }
        10% {
            -moz-transform: rotate(-25deg) scale(1) skew(1deg)
        }
        20% {
            -moz-transform: rotate(25deg) scale(1) skew(1deg)
        }
        30% {
            -moz-transform: rotate(-25deg) scale(1) skew(1deg)
        }
        40% {
            -moz-transform: rotate(25deg) scale(1) skew(1deg)
        }
        50% {
            -moz-transform: rotate(0) scale(1) skew(1deg)
        }
        100% {
            -moz-transform: rotate(0) scale(1) skew(1deg)
        }
    }

    @-webkit-keyframes quick-alo-circle-img-anim {
        0% {
            -webkit-transform: rotate(0) scale(1) skew(1deg)
        }
        10% {
            -webkit-transform: rotate(-25deg) scale(1) skew(1deg)
        }
        20% {
            -webkit-transform: rotate(25deg) scale(1) skew(1deg)
        }
        30% {
            -webkit-transform: rotate(-25deg) scale(1) skew(1deg)
        }
        40% {
            -webkit-transform: rotate(25deg) scale(1) skew(1deg)
        }
        50% {
            -webkit-transform: rotate(0) scale(1) skew(1deg)
        }
        100% {
            -webkit-transform: rotate(0) scale(1) skew(1deg)
        }
    }

    @-o-keyframes quick-alo-circle-img-anim {
        0% {
            -o-transform: rotate(0) scale(1) skew(1deg)
        }
        10% {
            -o-transform: rotate(-25deg) scale(1) skew(1deg)
        }
        20% {
            -o-transform: rotate(25deg) scale(1) skew(1deg)
        }
        30% {
            -o-transform: rotate(-25deg) scale(1) skew(1deg)
        }
        40% {
            -o-transform: rotate(25deg) scale(1) skew(1deg)
        }
        50% {
            -o-transform: rotate(0) scale(1) skew(1deg)
        }
        100% {
            -o-transform: rotate(0) scale(1) skew(1deg)
        }
    }
    #mess img
    {
        width: 60px;
    }
    @media only screen and (max-width: 1199px){
        #mess
        {
            display: none;
        }
    }
    </style>
    @include('footer')
</body>
</html>