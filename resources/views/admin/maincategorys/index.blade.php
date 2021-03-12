@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0 text-dark">{{__('messages.dashboard')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{__('messages.home')}}</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    @include('admin.includes.alerts.success')
    @include('admin.includes.alerts.errors')
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class=" text-center">Main Category</h3>
                                <h3 class="card-title">
                                    <a href="{{route('admin.maincategorys.create')}}"
                                       class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                        Craete Main Category
                                    </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>name Arabic </th>
                                        <th>name Engltion</th>
                                        <th>stetus</th>
                                        <th>control</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($mains as $main)
                                            <tr>
                                        <td>{{$main->name_ar}}</td>
                                        <td>{{$main->name_en}}</td>
                                        <td>{{$main->getActive()}}</td>
                                        <td>
                                            <div class="btn-group" role="group"
                                                 aria-label="Basic example">
                                                <a href="{{route('admin.maincategorys.edit',$main -> id)}}"
                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                <a href="{{route('admin.maincategorys.destroy',$main -> id)}}"
                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                <a href="{{route('admin.maincategorys.status',$main -> id)}}"
                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                    @if($main -> active == 1)
                                                        تفعيل
                                                    @else
                                                        الغاء تفعيل
                                                    @endif
                                                </a>


                                            </div>
                                        </td>
                                            </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>name Arabic </th>
                                        <th>name Engltion</th>
                                        <th>stetus</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content -->

@endsection
