@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> الاقسام الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة قسم رئيسي
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> Edi Offers </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.offers.update', $offer-> id)}}"
                                              method="POST">
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>  </h4>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">From date</label>
                                                            <input type="date" value="{{ $offer -> from_date}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="from_date">
                                                            @error("from_date")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>




                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">To Date</label>
                                                            <input type="date" value="{{ $offer -> to_date}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="to_date">
                                                            @error("to_date")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">discount</label>
                                                            <input type="text" value="{{ $offer -> discount}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="discount">
                                                            @error("discount")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">content</label>
                                                            <input type="text" value="{{ $offer -> conten}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="conten">
                                                            @error("conten")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Items </label>
                                                        <select name="item_id" class="select2 form-control">
                                                            <optgroup label="من فضلك أختر عنصر ">
                                                                @if($items && $items -> count() > 0)
                                                                    @foreach($items as $item)
                                                                        <option
                                                                            value="{{$item -> id }}">
                                                                          @if($offer -> item_id == $item -> id) selected @endif
                                                                            </option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('item_id')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mt-1">
                                                <label for="switcheryColor4"
                                                       class="card-title ml-1">stetus  </label>
                                                <input type="checkbox" value="1"
                                                       name="active"
                                                       id="switcheryColor4"
                                                       class="switchery" data-color="success"
                                                       checked/>


                                                @error("active")
                                                <span class="text-danger"> </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="button" class="btn btn-warning mr-1"
                                            onclick="history.back();">
                                        <i class="ft-x"></i> تراجع
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> save
                                    </button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
