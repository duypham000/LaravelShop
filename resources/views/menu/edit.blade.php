@extends('layouts.admin')

@section('title', 'Thêm mới')

@section('content')

    <div class="content-wrapper">

        @include('partials.contentHeader', [
        'parents'=> [
            ['url'=>'/', 'name'=> 'Home'],
            ['url' =>'/menus', 'name' => 'Menu']
            ],
            'currentPage' => 'edit', 'title'=> 'Chỉnh sửa menu'
        ])

        <div class="content">
            <form action="{{ route('menus.update', ['id'=>$menu->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="add-menu-name">Tên menu</label>
                    <input
                        type="text"
                        class="form-control"
                        id="add-menu-name"
                        placeholder="Nhập tên Menu"
                        name="name"
                        value="{{ $menu->name }}"
                    >
                </div>
                <div class="form-group">
                    <label for="add-menu-parent">Thẻ cha</label>
                    <select
                        class="form-control"
                        id="add-menu-parent"
                        name="parent_id"
                    >
                        <option value="0">-</option>
                        {!! $htmlOption !!}
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>

@endsection

