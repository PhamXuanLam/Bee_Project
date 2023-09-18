<script src="{{url("/asset/vendor/jquery-3.6.1.min.js")}}"></script>
<script src="{{url("/asset/vendor/bootstrap-5.2.2-dist/js/bootstrap.min.js")}}"></script>
<script src="{{url("/asset/vendor/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{url("/asset/js/main.js")}}"></script>
<script src="{{ asset("/vendor/jquery-confirm/dist/jquery-confirm.min.js") }}"></script>
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    const token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
</script>
