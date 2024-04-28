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

# PATH
const PATH_UPLOAD_IMAGE_AVATAR = "../../uploads/user/avatar";
const PATH_UPLOAD_IMAGE_PRODUCT = "../../uploads/product/";
const PATH_UPLOAD_IMAGE_NEWS = "../../uploads/news/";

# PAGE ACTIVE
const PAGE_UPDATE = false;

# FUNCTION ACTIVE
const LOGIN_GOOGLE = true;
const LOGIN_FACEBOOK = false;

# EVENT ACTIVE
const FLASH_SALE = true;

# SETTING TIME
const TIME_CLOSE_ALERT = 3000;
const TIME_FLASH_SALE  = '2024/04/24 00:00:00';

# SETTING NUMBER
const MAX_PRICE_PRODUCT = 200000000;
const MAX_QUANTITY_PRODUCT = 99;

# SETTING ARRAY
const COLOR_FILTER = ['đen','đỏ','tím','vàng','trắng','xanh nước biển','hồng','xanh lá','xám'];
const PRICE_FILTER = 
    [
        ['un1M','dưới 1 triệu VNĐ',0,1000],
        ['1Mto2M','1 triệu VNĐ &rarr; 2 triệu VNĐ',1000,2000],
        ['2Mto4M','2 triệu VNĐ &rarr; 4 triệu VNĐ',2000,4000],
        ['4Mto8M','4 triệu VNĐ &rarr; 8 triệu VNĐ',4000,8000],
        ['8Mto15M','8 triệu VNĐ &rarr; 15 triệu VNĐ',8000,15000],
        ['15Mto25M','15 triệu VNĐ &rarr; 25 triệu VNĐ',15000,25000],
        ['up25M','trên 25 triệu VNĐ',25000,200000]
    ];
const SORTS_FILTER = 
    [
        ['nameAZ','Tên sản phẩm A &rarr; Z','ORDER BY pm.name ASC'],
        ['nameZA','Tên sản phẩm Z &rarr; A','ORDER BY pm.name DESC'],
        ['priceAZ','Giá sản phẩm thấp &rarr; cao','ORDER BY c.price ASC'],
        ['priceZA','Giá sản phẩm cao &rarr; thấp','ORDER BY c.price DESC'],
    ];

# KEY API FACEBOOK
const URL_CALL_BACK = 'https://subway90.vn/API/facebook/fb-callback.php';
const FB_SECRET_KEY = '1a229a5a0017b0532a4102398e3b881e';
const FB_ID_APP_KEY = '355775060263375';
const FB_VERS_GRAPH = 'v3.0';

# KEY API GOOGLE
const G_CLIENT_ID     = '385902976415-adli1mjbkio27thpn0g5vu34t58rnuu7.apps.googleusercontent.com';
const G_CLIENT_SECRET = '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';
const G_URI_LOGIN     = 'https://subway90.vn/dang-nhap';

# ICON
const ICON_CLOSE    = '<i class="fa fa-times-circle me-3"></i>';
const ICON_CHECK    = '<i class="fa fa-check-circle me-3"></i>';
const ICON_FACEBOOK = '<i class="fab fa-facebook me-3"></i>';
const ICON_GOOGLE   = '<i class="fab fa-google me-3"></i>';