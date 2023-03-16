<div class="modal fade" id="todoModal" tabindex="-1" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content table-admin">
            <div class="modal-header">
                <h5 class="modal-title" id="todoModal">Add new todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('admin/to-do-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div>
                        <div class="form-group"><label for="inputDate" class="form-label">Date</label>
                            <input type="date" id="inputDate" class="form-control" name="date">
                        </div>
                    </div>
                    <br>
                    <div class="form-group"><label for="inputDate" class="form-label">Content</label>
                        <input type="text" id="inputDate" class="form-control" name="content">
                    </div>
                    <br>
                    <select id="userChoose" name="user[]" multiple="multiple">
                        @foreach ($Staffs as $Staff)
                        <option value="{{ $Staff->id }}">{{ $Staff->name }}</option>
                        @endforeach
                    </select>
                    <div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Save Changes" class="btn btn-primary" id="store">
                </div>
                    </div>
            </form>
        </div>
    </div>
</div>
