<!-- add_modal_class -->
<div class="modal fade" id="addClassroomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classrooms_trans.add_classroom') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('classrooms_trans.classroom_name_ar') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_ar" />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('classrooms_trans.classroom_name_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" />
                                        </div>


                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('classrooms_trans.grade_name') }}
                                                :</label>

                                            <div class="box">
                                                <select class="form-control" name="grade_id">
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('grades_trans.processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                value="{{ trans('grades_trans.delete') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button"
                                        value="{{ trans('classrooms_trans.add_other_class') }}" />
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('grades_trans.close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('grades_trans.submit') }}</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>
</div>
