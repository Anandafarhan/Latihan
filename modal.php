  <!-- Edit Product Modal Start -->
  <div class="modal fade" id="modalEdit" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="title"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="function.php?func=editproduct">
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="cost" class="form-label">Cost Price</label>
                          <input type="number" step="50000" class="form-control" id="cost" name="cost" required>
                      </div>
                      <div class="mb-3">
                          <label for="sale" class="form-label">Sale Price</label>
                          <input type="number" step="50000" class="form-control" id="sale" name="sale" required>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary" id="edid" name="editproduct">Save</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <!-- Edit Product Modal End -->

  <!-- Delete Product Modal Start -->
  <div class="modal fade" id="modalDelete" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Delete Confirmation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="function.php?func=deleteproduct">
                  <div class="modal-body">
                      <p>Are you sure want to delete <strong id="product"></strong> ?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger" id="delid" name="deleteproduct">Delete!</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <!-- Delete Product Modal End -->