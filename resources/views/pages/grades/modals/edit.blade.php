<!-- edit_modal_Grade -->
<div class="modal fade" id="editGradeModal{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('grades_trans.edit_grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('grades.update') }}" method="post">
                    @method('patch')
                    @csrf
                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $grade->id }}">
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('grades_trans.grade_name_ar') }}
                                :</label>
                            <input type="text" name="name_ar" class="form-control"
                                value="{{ $grade->getTranslation('name', 'ar') }}">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('grades_trans.grade_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="name_en" value="{{$grade->getTranslation('name', 'en') }}" >
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleFormControlTextarea1">{{ trans('grades_trans.Notes') }}
                            :</label>
                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->notes }}</textarea>
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
