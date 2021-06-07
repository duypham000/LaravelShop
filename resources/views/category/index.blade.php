@extends('layouts.admin')

@section('title', 'Trang Chủ')

@section('content')

    <div class="content-wrapper">
    @include('partials.contentHeader', [
        'parents'=> [
          ['url'=>'/', 'name'=> 'Home']
          ],
          'currentPage' => 'Category', 'title'=> 'Danh mục sản phẩm'
    ])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['id'=> $category->id]) }}" class="btn btn--success">Edit</a>
                                        <a href="{{ route('categories.delete', ['id'=> $category->id]) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

