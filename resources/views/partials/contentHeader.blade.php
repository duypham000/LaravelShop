<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @isset($parents)
                        @foreach ($parents as $parent)
                            <li class="breadcrumb-item"><a href="{{ $parent["url"] }}">{{ $parent['name'] }}</a></li>
                        @endforeach
                    @endisset
                    <li class="breadcrumb-item active">{{ $currentPage }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
