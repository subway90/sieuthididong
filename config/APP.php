<?php
# DOMAIN
const DOMAIN = "https://subway90.vn";

# DATABASE
const HOST_DB = 'localhost';
const NAME_DB = 'vutrumobile';
const USER_DB = 'root';
const PASS_DB = '';

# WEBSITE
const WEB_TITLE = 'Vũ Trụ Mobile';
const WEB_IMAGE = 'publics/img/logo.png';
const WEB_PHONE = '0965 279 041';
const WEB_DESCR = '';
const WEB_ADDRS = 'Tầng 1 Tòa SGHouses,102/5/4 TTN 01, P.TTN, Q.12, TP.HCM';
const WEB_EMAIL = 'info@vutrumobile.com';
const WEB_SGPKD = 'TTCP/KD/40025013';
const WEB_COPYS = 'SUBWAY90 - HGROUP - 2024';
const WEB_COPYL = 'https://github.com/subway90';

# PAGE ACTIVE
const PAGE_LOADING = true;
const PAGE_UPDATE = false;
const LOGIN_GOOGLE = true;
const LOGIN_FACEBOOK = false;
const FLASH_SALE = true;

# SETTING TIME
const TIME_CLOSE_ALERT = 3000;
const TIME_FLASH_SALE  = '2024/04/24 00:00:00';

# SETTING ARRAY
const COLOR_FILTER = ['đen','đỏ','tím','vàng','trắng','xanh nước biển','hồng','xanh lá','xám'];
/**
 * syntax [ value option , name option , start x 1000 , end x 1000 ]
 */
const PRICE_FILTER = 
[
    ['un1M','dưới 1 triệu VNĐ',0,1000],
    ['1Mto2M','1 triệu VNĐ &rarr; 2 triệu VNĐ',1000,2000],
    ['2Mto4M','2 triệu VNĐ &rarr; 4 triệu VNĐ',2000,4000],
    ['4Mto10M','4 triệu VNĐ &rarr; 10 triệu VNĐ',4000,10000],
    ['4Mto10M','4 triệu VNĐ &rarr; 10 triệu VNĐ',4000,10000],
    ['up20M','trên 20 triệu VNĐ',20000,100000]
];
/**
 * syntax [ value option , name option , SQL tag ]
 */
const SORTS_FILTER = 
[
    ['nameAZ','Tên sản phẩm A &rarr; Z','ORDER BY pm.name ASC'],
    ['nameZA','Tên sản phẩm Z &rarr; A','ORDER BY pm.name DESC'],
    ['priceAZ','Giá sản phẩm thấp &rarr; cao','ORDER BY pm.price ASC'],
    ['priceZA','Giá sản phẩm cao &rarr; thấp','ORDER BY pm.price DESC'],
];

# KEY API FACEBOOK
const URL_CALL_BACK = 'https://subway90.vn/API/facebook/fb-callback.php';
const FB_SECRET_KEY = '1a229a5a0017b0532a4102398e3b881e';
const FB_ID_APP_KEY = '355775060263375';
const FB_VERS_GRAPH = 'v3.0';

#KEY API GOOGLE
const G_CLIENT_ID     = '385902976415-adli1mjbkio27thpn0g5vu34t58rnuu7.apps.googleusercontent.com';
const G_CLIENT_SECRET = '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';
const G_URI_LOGIN     = 'https://subway90.vn/dang-nhap';