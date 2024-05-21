<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h6 class="page-title">{{ $page_title }}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name', 'Laravel') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $subtitle }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
            </ol>
        </div>
        <div class="col-md-4 float-end">
            <form class="app-search d-none d-lg-block" method="GET" action="{{ $search_action }}">
                <div class="position-relative">
                    <input type="text" name="keyword" class="form-control" placeholder="Search...">
                    <span class="fa fa-search"></span>
                </div>
            </form>
        </div>
        <div class="col-md-2">
            <div class="float-end d-none d-md-block">
                <a class="btn btn-primary" href="{{ $action }}">{{ $action_title }}</a>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
