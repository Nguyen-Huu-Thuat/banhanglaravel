@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                        <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                            if('$message')
                            {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">  <!-- muốn thêm ảnh đc gửi đi dùng enctype="multipart/form-data" -->
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập tên sản phẩm" name="product_name" class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text"  name="product_slug"
                                    class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" required onchange="previewFile(this);" name="product_image" class="form-control img-preview" id="exampleInputEmail1" >
                                    <img src="https://st4.depositphotos.com/14953852/24787/v/600/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" id="previewImg" width="30%" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" data-validation="number"  data-validation-error-msg="Vui lòng nhập số lượng" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="Số kượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Vui lòng nhập giá của sản phẩm (VNĐ)" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="2" class="form-control" id="8" name="product_desc"  placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="2" class="form-control" name="product_content" id="3" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tags sản phẩm</label>
                                    <input type="text"  data-role="tagsinput" name="product_tags" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                    <option value="{{$cate -> category_id}}">{{$cate -> category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputFile">Danh mục thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                    <option value="{{$brand -> brand_id}}">{{$brand -> brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputFile">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection
