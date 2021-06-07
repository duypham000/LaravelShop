@extends('layouts.admin')

@section('title', 'Thêm mới')

@section('content')

    <div class="content-wrapper">

    @include('partials.contentHeader', [
    'parents'=> [
        ['url'=>'/', 'name'=> 'Home'],
        ['url' =>'/categories', 'name' => 'Category']
        ],
        'currentPage' => 'add', 'title'=> 'Thêm mới danh mục'
    ])

        <div class="content">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="add-category-name">Tên sản phẩm</label>
                    <input
                        type="text"
                        class="form-control"
                        id="add-category-name"
                        placeholder="Nhập tên danh mục"
                        name="name"
                    >
                </div>
                <div class="form-group">
                    <label for="add-category-parent">Thẻ cha</label>
                    <select
                        class="form-control"
                        id="add-category-parent"
                        name="parent_id"
                    >
                        <option value="0">-</option>
                        {!! $htmlOption !!}
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tạo</button>
            </form>
        </div>
    </div>

@endsection

