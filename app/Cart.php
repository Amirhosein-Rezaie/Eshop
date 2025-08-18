<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserName - سبد خرید</title>

    <!-- css -->
    <link rel="stylesheet" href="./resources/css/cart.css">
    <link rel="stylesheet" href="../resources/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../resources/assets/css/style.css">
</head>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">سبد خرید <span>UserName</span></h4>
                    <span class="text-muted">3 کالا</span>
                </div>

                <!-- Cart Items -->
                <div class="cart-item p-3" id="products">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <img src="../resources/images/products/deafult.jpg" alt="Product image"
                                class="product-image">
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <h6 class="mb-1 fw-bold">نام محصول</h6>
                            </div>
                            <div class="d-flex align-items-center mb-2 text-primary">
                                <span class="me-2 fw-bold">قیمت</span>
                                <span class="me-2">تومان</span>
                            </div>
                            <div class="text-success">
                                <span class="text-success">موجودی : </span>
                                <span class="text-success fw-bold">عدد</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="input-group" style="width: 120px;">
                                    <button class="btn btn-outline-primary" style="border-radius: 0px 5px 5px 0px;"
                                        type="button">-</button>
                                    <input type="text" class="form-control text-center border-primary"
                                        style="margin-right: -1px;" value="1" min="1">
                                    <button class="btn btn-outline-primary" style="border-radius: 5px 0px 0px 5px;"
                                        type="button">+</button>
                                </div>
                                <button class="btn btn-outline-danger">حذف</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="text-center alert alert-primary">
                        محصولی موجود نیست ... !
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="summary-card p-3 mb-4">
                    <h5 class="mb-3">خلاصه سفارش</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <span>مبلغ کل </span>
                            <span class="fw-bold">(تعداد کالا)</span>
                        </div>
                        <div>
                            <span class="fw-bold">قیمت کل</span>
                            <span>تومان</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span>مبلغ قابل پرداخت</span>
                        <div class="text-primary">
                            <span class="fw-bold">قیمت</span>
                            <span> تومان</span>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary w-100 py-2">
                        ادامه فرآیند خرید
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>