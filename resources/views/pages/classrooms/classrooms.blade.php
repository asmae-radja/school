@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.Classrooms') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.Classrooms') }} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"> {{ trans('grades_trans.home') }} </a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Classrooms') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row mb-4 mt-2 mr-15 ml-15">
                    <div class="d-flex justify-content-between w-100">
                        <div class="col-6 input-group rounded">
                            <input type="text" class="form-control rounded"
                                placeholder="{{ trans('grades_trans.search') }}">
                            <span class="input-group-text border-0">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <div>
                            <button class="button x-small" data-toggle="modal" data-target="#addGradeModal"><i
                                    class="fa fa-plus" aria-hidden="true"></i>
                                {{ trans('classrooms_trans.add_classroom') }}</button>
                        </div>

                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('classrooms_trans.Name_classroom') }}</th>
                            <th scope="col">{{ trans('grades_trans.Notes') }}</th>
                            <th scope="col">{{ trans('grades_trans.processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
