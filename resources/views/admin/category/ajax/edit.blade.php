<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="">
                <input type="hidden" id="editId">
              <div class="form-group">
                  <label>Title</label>
                  <input type="text" id="catTitle" class="form-control">
              </div>

              <div class="form-group">
                  <label>Icon</label>
                  <input type="text" id="catIcon" class="form-control">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-info" id="updateCate">Update</button>

            <button class="btn btn-primary d-none" type="button" disabled id="spinner">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
            </button>
          </div>
      </div>
    </div>
  </div>
