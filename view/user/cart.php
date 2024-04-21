<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a href="/index.html" class="text-decoration-none text-dark">Trang chủ</a></li>
          <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Giỏ hàng</li>
        </ol>
      </nav>
</div>
<div class="container p-0 mt-3">
    <div class="row">
        <div class="col-8">
            <div class="bg-light px-3 py-2 rounded-3">
                <table class="table table-hover">
                    <thead class="align-middle text-end">
                        <th class="text-start"> ID </th>
                        <th class="text-start">Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </thead>
                    <tbody class="align-middle text-end">
                        <tr ng-repeat="pro in cart">
                            <td class="text-start"> 1 </td>
                            <td class="text-start"> <?='name of PRODUCT'?> </td>
                            <td> <?='price of PRODUCT'?> </td>
                            <td><input class="form-control w-50 float-end" type="number" ng-model="pro.quantity" name="quantity" value="1" min="1" max="999"></td>
                            <td class="text-end"><?='price of PRODUCT'?></td>
                            <td><button ng-click="deleteCart($index)" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-center">Chưa có sản phẩm nào <a class="nav-link text-success" href="#!/san-pham">&rarr; Cửa hàng</a></td>
                        </tr>
                    </table>
                    <div ng-show="total()" class="text-end">
                        <button ng-click="deleteAllCart()" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i> tất cả</button>
                    </div>
            </div>
        </div>
        <div class="col-4">
            <div class="bg-light px-4 rounded-3">
                <div class="h5 w-100 py-3">Giỏ hàng</div>
                <div ng-repeat="pro in cart" class="w-100 d-flex justify-content-between py-2">
                    <div class=""><?='name of PRODUCT'?></div>
                    <div class=""><?='total of PRODUCT'?> đ</div>
                </div>
                <div class="h5 w-100 mt-3">Tổng thanh toán</div>
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="">Sản phẩm</div>
                    <div class=""><?='total of PRODUCT'?> đ</div>
                </div>
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="">Mã giảm giá</div>
                    <div class="">(không)</div>
                </div>
            </div>
            <div class="py-3">
                <button type="submit" class="w-100 btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal">Thanh toán</button>
            </div>
        </div>
    </div>
</div>
  
  <!-- Modal -->
  <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Thanh toán hóa đơn</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form name="formInvoice" ng-submit="addInvoice()">
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input ng-model="fullname" type="text" class="form-control" id="fullName" placeholder="name@example.com">
                            <label for="fullName">Họ và tên</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input ng-model="phone" type="text" class="form-control" id="phone" placeholder="name@example.com">
                            <label for="phone">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input ng-model="address" type="text" class="form-control" id="address" placeholder="name@example.com">
                            <label for="address">Địa chỉ giao hàng</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input ng-model="scription" type="text" class="form-control" id="scription" placeholder="name@example.com">
                            <label for="scription">Mô tả</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success">Tiếp tục</button>
            </form>
            </div>
      </div>
    </div>
  </div>