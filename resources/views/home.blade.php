@extends('layouts.admin')

{{--kiểu 1: chỉ text, không cần phải endsection--}}
@section('title', 'Trang Chủ')

{{--kiểu 2: html, phải có endsection--}}
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

    @include('partials.contentHeader', [
            'currentPage' => 'Home', 'title'=> 'Trang chủ'
    ])

    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <a href="{{ route('categories.create') }}" class="btn btn-success m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

