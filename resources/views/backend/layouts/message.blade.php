<div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            </div>
            <div class="modal-body">
                @if(Session::get('status'))
                    <img src="{{ asset('libbackend/img/message.jpg') }}" alt="picture 1" class="img-responsive">
                @else
                    <img src="{{ asset('libbackend/assets/global/images/gallery/transport2.jpg') }}" alt="picture 1" class="img-responsive">
                @endif
            </div>
            <div class="modal-footer">
                <p>Title of your image</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#modal-image').modal('show');
    });
</script>