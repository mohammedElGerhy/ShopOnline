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
                                <h3 class=" text-center">Offers</h3>
                                <h3 class="card-title">
                                    <a href="{{route('admin.offers.create')}}"
                                       class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                        Craete Offers
                                    </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th> From date </th>
                                        <th>To date</th>
                                        <th>discount</th>
                                        <th>content</th>
                                        <th>stetus</th>
                                        <th>Item</th>
                                        <th>control</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offers as $offer)
                                        <tr>

                                            <td>{{$offer -> from_date}}</td>
                                            <td>{{$offer -> to_date}}</td>
                                            <td>{{$offer -> discount}}</td>
                                            <td>{{$offer -> conten}}</td>
                                            <td>{{$offer -> getActive()}}</td>
                                            <td>{{$offer -> itemof -> name_en}}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                     aria-label="Basic example">
                                                    <a href="{{route('admin.offers.edit',$offer -> id)}}"
                                                       class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                    <a href="{{route('admin.offers.destroy',$offer -> id)}}"
                                                       class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                    <a href="{{route('admin.offers.status',$offer -> id)}}"
                                                       class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                        @if($offer -> active == 1)
                                                            تفعيل
                                                        @else
                                                            الغاء تفعيل
                                                        @endif
                                                    </a>


                                                </div>
                                            </td>
                                            @endforeach



                                        </tr>

                                    </tbody>

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
