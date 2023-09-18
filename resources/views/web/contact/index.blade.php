@extends("web.layouts.master")
@section("title", "Contact Page")
@section("content")
    <div class="contact-form container my-5">
        <div class="contact-title my-4 d-flex ">
            <h4 class="me-5">LIÊN HỆ VỚI CHÚNG TÔI</h4>
            <span>------------------------------------------</span>
        </div>
        <div class="row">
            <!--LEFT-->
            <div class="left col-sm-8">
                <form action="/contact" method="POST" class="form-container">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="username" name="full_name"
                               class="form-control mt-3 @if($errors->has('full_name')) is-invalid @endif"
                               placeholder="Họ và tên">
                        @if($errors->has('full_name'))
                            <p class="text-danger">{{ $errors->first("full_name") }}</p>
                        @endif
                        <input type="email" id="email" name="email"
                               class="form-control mt-3 @if($errors->has('email')) is-invalid @endif"
                               placeholder="Email">
                        @if($errors->has('email'))
                            <p class="text-danger">{{ $errors->first("email") }}</p>
                        @endif
                        <input type="text" id="subject" name="subject"
                               class="form-control mt-3 @if($errors->has('subject')) is-invalid @endif"
                               placeholder="Chủ đề">
                        @if($errors->has('subject'))
                            <p class="text-danger">{{ $errors->first("subject") }}</p>
                        @endif
                        <textarea name="content" id="content" cols="30" rows="10" class=" form-control mt-3"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Send Message</button>
                    </div>
                </form>
            </div>
            <!-- RIGHT -->
            <div class="right col-sm-4 ms-4">
                <div class=" row top ">
                    <div class="map my-1">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.078642324019!2d105.79910421485371!3d20.98948448601972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acbf5fb576ef%3A0x2ab6afb9315516d!2sT%C3%B2a%20nh%C3%A0%20Vinaconex6%20H10!5e0!3m2!1svi!2s!4v1671000025669!5m2!1svi!2s"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row bottom my-5">
                    <div class="address mt-3">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        475 Nguyen Trai
                    </div>
                    <div class="contact mt-3">
                        <i class="fa-solid fa-envelope  me-2"></i>
                        Beetech@gmail.com
                    </div>
                    <div class="phone mt-3">
                        <i class="fa-solid fa-phone  me-2"></i>
                        012345689
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
