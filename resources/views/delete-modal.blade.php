<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger fw-bold" id="deleteModalLabel">
                    {{ $user->first_name . ' ' . $user->last_name }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                <a href="{{ url('user/delete') . '/' . $user->id }}" type="button" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
