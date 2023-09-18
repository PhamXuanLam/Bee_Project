<div class="col-sm-3">
    <div class="card text-center">
        <div class="card-header">
            <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->avatar) }}" class="card-img-top" alt="avatar">
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="/account">Thông tin cá nhân</a>
                </li>
                <li class="list-group-item">
                    <a href="/account/orders">Đơn hàng của bạn</a>
                </li>
                <li class="list-group-item">
                    <a>Sản phẩm yêu thích</a>
                </li>
                <li class="list-group-item">
                    <a href="/account/changePassword">Đổi mật khẩu</a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="btn btn-danger" style="width: 100%">Thoát</a>
                </li>
            </ul>
        </div>
    </div>
</div>
