@extends('backend.layout.main')

@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập Nhật Danh Mục <a href="{{ route('admin.category.index') }}" class="btn btn-success"> Danh sách</a>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin thương hiệu</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data" role="form" method="post" action="{{ route('admin.category.update', ['id' => $data->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input value="{{ $data->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên thương hiệu">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <input name="image" type="file" id="exampleInputFile">
                                <img style=" margin-top:15px; max-width:200px;" src="{{ asset($data->image) }}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh Mục Cha</label>
                                <select class="form-control" name="parent_id">
                                    @foreach($list as $item)
                                        <option {{ $item->id == $data->parent_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input value="{{ $data->position }}" name="position" type="number" class="form-control" id="exampleInputEmail1"  min="1" value="1">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input {{ $data->is_active == 1 ? 'checked' : '' }} type="checkbox" name="is_active" value="1"> Hiển thị
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->



            </div>



            </form>
        </div>
        <!-- /.box-body -->

        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

