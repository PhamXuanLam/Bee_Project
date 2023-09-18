<div class="container-fluid footer d-block mt-5">
    <div class="container footer-top">
        <div class="row">
            <div class="col-sm-4">
                <h3>Thông tin</h3>
                <p>
                    Đây là trang bán điện thoại di động
                </p>
                <div class="contact">
                    <div>
                        <i class="fa-solid fa-location-dot"></i> <span>123 Street, New York, USA</span>
                    </div>
                    <div>
                        <i class="fa-solid fa-envelope"></i> <span>info@example.com</span>
                    </div>
                    <div>
                        <i class="fa-solid fa-phone"></i> <span>+012 345 67890</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h3>Menu</h3>
                <ul>
                    <li>
                        <a href="/">
                            <i class="fa-solid fa-angle-right"></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-angle-right"></i>
                            <span>Cửa hàng của chúng tôi</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-angle-right"></i>
                            <span>cửa hàng chi tiết</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-angle-right"></i>
                            <span>giỏ hàng</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-angle-right"></i>
                            <span>Thủ tục thanh toán</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-angle-right"></i>
                            <span>liên hệ chúng tôi</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3>Bản tin</h3>
                <p>
                    Đăng kí để nhận những thông tin mới nhất về của hàng của chúng tôi
                </p>
                <div class="d-flex">
                    <input type="text" name="email" id="sign-up" class="sign-up" placeholder="Địa chỉ email của bạn">
                    <button class="sign-up btn-sign-up" type="button">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row footer-bottom">
        <div class="col-sm-6">
            <i class="fa-brands fa-creative-commons-pd"></i>
            <span>Phát triển học viên</span>
            <span><a href="">Beetech Academy</a></span>
        </div>
        <div class="col-sm-6 text-end">
            <img src="./asset/img/payments.png" alt="">
        </div>
    </div>
</div>
<button id="btn-scroll-top">
    <i class="fa-solid fa-up-long"></i>
</button>
<script>
    $(document).ready(function() {
        $('.btn-sign-up').on('click', function() {
            const email = $('#sign-up').val();
            console.log(email);
            const that = this;
            $(that).addClass('disabled');
            $.ajax({
                url: '/subscribes',
                method: 'POST',
                data: {
                    email: email,
                },
                success: function(response) {
                    $.alert(response.message);
                    $('#sign-up').val('');
                },
                error: function(errors) {
                    console.log(errors.responseJSON.message);
                    $.alert('Đăng ký thất bại! ' + errors.responseJSON.message);
                },
                complete: function() {
                    $(that).removeClass('disabled');
                }
            });
        });
    });
</script>
