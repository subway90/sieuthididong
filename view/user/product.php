<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a href="/index.html" class="text-decoration-none text-dark">Trang chủ</a></li>
          <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Điện thoại</li>
        </ol>
      </nav>
</div>
<!--[PHONE] Ads Box Image -->
<div class="container py-3 p-0">
    <a href="#!/chi-tiet/1">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 p-lg-0 ps-lg-3  p-md-0 ps-md-3">
                <img class="w-100" src="publics/img/ads/ads-zflip-1.png" alt="">
            </div>
            <div class="col-12 col-md-6 col-lg-6 p-lg-0 pe-lg-3 p-md-0 pe-md-3">
                <img class="w-100" src="publics/img/ads/ads-zflip-2.png" alt="">
            </div>
        </div>
    </a>
</div>

<div class="container bg-light rounded py-3">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-2">
            <span class="text-success h6">
                Lọc danh sách:
            </span>
        </div>
        <div class="col-12 col-md-12 col-lg-2">
            <label for="brand">Thương hiệu:</label>
            <select class="form-control" id="brand" ng-model="filter.brand" ng-change="filterProducts()">
              <option value="all">Tất cả</option>
              <option value="samsung">Samsung</option>
              <option value="iphone">iPhone</option>
              <option value="nokia">Nokia</option>
            </select>
        </div>
        <div class="col-12 col-md-12 col-lg-2">
            <label for="priceMin">Price Min:</label>
            <input  class="form-control" type="number" id="priceMin" ng-model="filter.priceMin" ng-change="filterProducts()">
        </div>
        
        <div class="col-12 col-md-12 col-lg-2">
            <label for="priceMax">Price Max:</label>
            <input class="form-control" type="number" id="priceMax" ng-model="filter.priceMax" ng-change="filterProducts()">
        </div>
        
        <div class="col-12 col-md-12 col-lg-2">
            <label for="color">Màu:</label>
            <select class="form-control" id="color" ng-model="filter.color" ng-change="filterProducts()">
              <option value="all">Tất cả</option>
              <option value="black">Đen</option>
              <option value="green">Xanh lá</option>
              <option value="blue">Xanh da trời</option>
            </select>
        </div>
        
        <div class="col-12 col-md-12 col-lg-2">
            <label for="sortBy">Sắp:</label>
            <select class="form-control" id="sortBy" ng-model="filter.sortBy" ng-change="filterProducts()">
              <option value="">Không</option>
              <option value="priceLowToHigh">Thấp &rarr; Cao</option>
              <option value="priceHighToLow">Cao &rarr; Thấp</option>
            </select>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        <!-- Product Start -->
        <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
            <div style="min-height: 100%;" class="card shadow">
                <div class="position-relative hover-trigger">
                    <img src="publics/img/phone/samsung/a34-3.jpg" class="card-img img-product" alt="imageproduct">
                    <span style="left: 84%; top: -4%; width: 45px; height: 45px" class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">51%</span>
                    <span class="show-hover position-absolute end-0 bottom-0 w-100">
                        <div class="d-flex justify-content-evenly">
                            <button class="btn btn-success">
                                <i class="far fa-heart"></i>
                            </button>
                            <button ng-click="addCart(product)" class="btn btn-success">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-success">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </button>
                        </div>
                    </span>
                </div>
                <div class="ms-2">
                    <span class="badge bg-warning">KM</span>
                    <span class="badge bg-success">Trả góp 0%</span>
                </div>
                <a class="text-decoration-none" href="#!/chi-tiet/??">
                    <div class="card-body">
                        <h5 class="card-title fs-6 fw-bold text-dark"> Galaxy A34 </h5>
                        <p class="card-text">
                            <span ng-if="product.priceSale!=0">
                                <span class="text-danger fw-bold me-1">8.888.000 đ</span>
                                <span class="text-secondary small"><del><small>9.999.000 đ</small></del></span>
                            </span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- Page Start -->
        <div class="col-12">
            <div class="input-group d-flex justify-content-center">
                <div class="btn btn-small btn-outline-success disabled">Prev</div>
                <div class="btn btn-small btn-outline-success active">1</div>
                <div class="btn btn-small btn-outline-success">2</div>
                <div class="btn btn-small btn-outline-success">3</div>
                <div class="btn btn-small btn-outline-success">Next</div>
            </div>
        </div>
    </div>
</div>