<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Thêm mới San Pham
        </div>
        <div class="card-body">
            <form action="{{route('product.store')}}" method="post">
                @csrf
                <label class="form-label">Mã số sản phẩm </label>
                <input class="form-control" @if($errors->any()) value="{{old('code')}}"
                       @endif name="code">
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first('code') }}</p>
                @endif
                <label class="form-label ">Tên sản phẩm </label>
                <input class="form-control" @if($errors->any()) value="{{old('name')}}"
                       @endif name="name">
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
                <label class="form-label">Giá</label>
                <input class="form-control" @if($errors->any()) value="{{old('price')}}"
                       @endif name="phone">
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first('price') }}</p>
                @endif
                <label class="form-label">image</label>
                <input class="form-control" @if($errors->any()) value="{{old('image')}}"
                       @endif name="image">
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                @endif
                <label class="form-label">Mã Loại </label>
                <input class="form-control" @if($errors->any()) value="{{old('type_code')}}"
                       @endif name="type_code">
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first('type_code') }}</p>
                @endif
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-control">
                    <option>Hoạt động</option>
                    <option>Ngừng hoạt động</option>
                </select>
                <input type="submit" value="Thêm mới" class="btn btn-success mt-4">
                <a href="{{route('product.index')}}" class="btn btn-secondary mt-4 ml-5">Back</a>
            </form>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

