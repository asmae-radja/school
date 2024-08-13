<!-- delete_modal -->
<div class="modal fade" id="deleteClassroomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classrooms_trans.delete_classroom') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action=" {{ route('classrooms.delete') }}" method="post">
                    @method('delete')
                    @csrf
                    <input id="id" type="hidden" name="id" class="form-control"
                        value="">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control"
                                value="{{ trans('grades_trans.warning_grade') }}" disabled>
                        </div>
                       
                    </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('grades_trans.close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('grades_trans.delete') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>
