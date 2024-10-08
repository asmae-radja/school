@extends('layouts.master')

@section('title')
    {{ trans('main_trans.Classrooms') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('page-title')
    {{ trans('main_trans.Classrooms') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="row">
    @include('pages.classrooms.modals.create')
    @include('pages.classrooms.modals.delete')
    @include('pages.classrooms.modals.update')

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
                            <button class="button x-small" data-toggle="modal" data-target="#addClassroomModal"><i
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
                            <th scope="col">{{ trans('grades_trans.Name_grade') }}</th>
                            <th scope="col">{{ trans('grades_trans.processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classrooms as $classroom)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $classroom->name }}</td>
                                <td>{{ $classroom->grade->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#editClassroomModal" data-id="{{ $classroom->id }}"
                                        data-name_en="{{ $classroom->getTranslation('name', 'en') }}"
                                        data-name_ar="{{ $classroom->getTranslation('name', 'ar') }}"
                                        data-grade_id="{{ $classroom->grade_id }}"
                                        title="{{ trans('grades_trans.edit') }}"><i class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteClassroomModal" data-id="{{ $classroom->id }}"
                                        title="{{ trans('grades_trans.delete') }}"><i class="fa fa-trash"></i></button>

                                </td>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editClassroomModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name_en = button.data('name_en')
            var name_ar = button.data('name_ar')
            var grade_id = button.data('grade_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name_en').val(name_en);
            modal.find('.modal-body #name_ar').val(name_ar);
            modal.find('.modal-body #grade_id').val(grade_id);

        })
    });
    $(document).ready(function() {
        $('#deleteClassroomModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    });
</script>
@endsection
