<!-- edit_modal_Grade -->
<div class="modal fade" id="editGradeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        value="">
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('grades_trans.grade_name_ar') }}
                                :</label>
                            <input type="text" name="name_ar" id="name_ar" class="form-control"
                                value="">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('grades_trans.grade_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="name_en" id="name_en" value="" >
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="notes">{{ trans('grades_trans.Notes') }}
                            :</label>
                        <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
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
