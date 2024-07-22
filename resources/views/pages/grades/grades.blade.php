@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.Grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.Grades') }} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"> {{ trans('grades_trans.home') }} </a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Grades') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    @include('pages.grades.modals.create')

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
                                {{ trans('grades_trans.add_grade') }}</button>
                        </div>

                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('grades_trans.Name_grade') }}</th>
                            <th scope="col">{{ trans('grades_trans.Notes') }}</th>
                            <th scope="col">{{ trans('grades_trans.processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $grade->name }}</td>
                                <td>{{ $grade->notes }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#editGradeModal{{ $grade->id }}"
                                        title="{{ trans('grades_trans.edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteGradeModal{{ $grade->id }}"
                                        title="{{ trans('grades_trans.delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <!-- Edit Grade -->
                            @include('pages.grades.modals.edit')
                            <!-- delete Grade -->
                            @include('pages.grades.modals.delete')
                        @endforeach

                    </tbody>
                </table>

                @if ($grades->isEmpty())
                    <p class="text-center py-2">{{ trans('grades_trans.not_found') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
