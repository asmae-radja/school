<!-- edit_modal_Grade -->
<div class="modal fade" id="editClassroomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classrooms_trans.edit_classroom') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('classrooms.update') }}" method="post">
                    @method('patch')
                    @csrf
                    <input id="id" type="hidden" name="id" class="form-control" value="">
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('classrooms_trans.classroom_name_ar') }}
                                :</label>
                            <input type="text" name="name_ar" id="name_ar" class="form-control" value="">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('classrooms_trans.classroom_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="name_en" id="name_en" value="">
                        </div>
                    </div>
                    <div class="col mt-4">
                        <label for="Name_en" class="mr-sm-2">{{ trans('classrooms_trans.grade_name') }}
                            :</label>

                        
                            <select class="form-control" name="grade_id" id="grade_id">
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>

                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('grades_trans.close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('grades_trans.edit') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>
