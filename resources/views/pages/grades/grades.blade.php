@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.Grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('page-title')
    {{ trans('main_trans.Grades') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    @include('pages.grades.modals.create')
    @include('pages.grades.modals.edit')
    @include('pages.grades.modals.delete')


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
                                        data-target="#editGradeModal" data-id="{{ $grade->id }}"
                                        data-name_en="{{ $grade->getTranslation('name', 'en') }}"
                                        data-name_ar="{{ $grade->getTranslation('name', 'ar') }}"
                                        data-notes="{{ $grade->notes }}" title="{{ trans('grades_trans.edit') }}"><i
                                            class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteGradeModal" data-id="{{ $grade->id }}"
                                        title="{{ trans('grades_trans.delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editGradeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name_en = button.data('name_en')
            var name_ar = button.data('name_ar')
            var notes = button.data('notes')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name_en').val(name_en);
            modal.find('.modal-body #name_ar').val(name_ar);
            modal.find('.modal-body #notes').val(notes);
        })
    });
    $(document).ready(function() {
        $('#deleteGradeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    });
</script>
