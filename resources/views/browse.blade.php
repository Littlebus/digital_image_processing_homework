@extends('layouts.head')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Image Browsers Gallery</h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <h2>Image Browsers Gallery</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="select2_demo_1 form-control" name="subclass" id="subclass">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="lightBoxGallery">
                        @if($images)
                        @foreach($images as $image)
                        <a href="{{$image->path}}" title="{{$image->title}}" data-gallery=""><img src="{{$image->path}}"></a>
                        @endforeach
                        @endif
                        <!-- <a href="assets/img/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/1s.jpg"></a>
                        <a href="assets/img/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/2s.jpg"></a>
                        <a href="assets/img/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/3s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/6s.jpg"></a>
                        <a href="assets/img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/7s.jpg"></a>
                        <a href="assets/img/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/8s.jpg"></a>
                        <a href="assets/img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/9s.jpg"></a>
                        <a href="assets/img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/10s.jpg"></a>
                        <a href="assets/img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/12s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/6s.jpg"></a>
                        <a href="assets/img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/7s.jpg"></a>
                        <a href="assets/img/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/2s.jpg"></a>
                        <a href="assets/img/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/3s.jpg"></a>
                        <a href="assets/img/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/1s.jpg"></a>
                        <a href="assets/img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/9s.jpg"></a>
                        <a href="assets/img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/10s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/12s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/6s.jpg"></a>
                        <a href="assets/img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/12s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/10s.jpg"></a>
                        <a href="assets/img/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/1s.jpg"></a>
                        <a href="assets/img/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/2s.jpg"></a>
                        <a href="assets/img/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/3s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/6s.jpg"></a>
                        <a href="assets/img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/7s.jpg"></a>
                        <a href="assets/img/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/8s.jpg"></a>
                        <a href="assets/img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/9s.jpg"></a>
                        <a href="assets/img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/10s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/12s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/6s.jpg"></a>
                        <a href="assets/img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/7s.jpg"></a>
                        <a href="assets/img/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/2s.jpg"></a>
                        <a href="assets/img/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/3s.jpg"></a>
                        <a href="assets/img/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/1s.jpg"></a>
                        <a href="assets/img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/9s.jpg"></a>
                        <a href="assets/img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/10s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/12s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/7s.jpg"></a>
                        <a href="assets/img/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/8s.jpg"></a>
                        <a href="assets/img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/9s.jpg"></a>
                        <a href="assets/img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/10s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/12s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/6s.jpg"></a>
                        <a href="assets/img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/12s.jpg"></a>
                        <a href="assets/img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/4s.jpg"></a>
                        <a href="assets/img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/5s.jpg"></a>
                        <a href="assets/img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/10s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a> -->

                        <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <form method="get">
        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="amount">选择子类</label>
                        <select class="select2_demo_1 form-control" name="subclass" id="subclass">
                            <option></option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;查询</button>
        </div>
    </form>

</div> -->
</div>
</div>

<!-- Mainly scripts -->
<script src="/assets/js/jquery-2.1.1.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/assets/js/inspinia.js"></script>
<script src="/assets/js/plugins/pace/pace.min.js"></script>

<!-- Data picker -->
<script src="/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- FooTable -->
<script src="/assets/js/plugins/footable/footable.all.min.js"></script>
<script src="/assets/js/plugins/select2/select2.full.min.js"></script>

<script src="/assets/js/plugins/dataTables/datatables.min.js"></script>
<!-- Flot -->
<script src="/assets/js/plugins/flot/jquery.flot.js"></script>
<script src="/assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/assets/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/assets/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="/assets/js/plugins/flot/jquery.flot.time.js"></script>

<!-- Custom and plugin javascript -->
<script src="/assets/js/inspinia.js"></script>
<script src="/assets/js/plugins/pace/pace.min.js"></script>
<!-- Page-Level Scripts -->

<!-- blueimp gallery -->
<script src="/assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<script>
    $('#MM1').addClass("active");
    $(document).ready(function() {
        $('.footable').footable();

        $(".select2_demo_1").select2({
            placeholder: "选择一个子类",
            allowClear: true
        });
    });
</script>
@endsection