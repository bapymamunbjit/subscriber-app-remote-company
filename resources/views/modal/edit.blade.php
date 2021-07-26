<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Subscriber</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editSubscriberForm">
            <input type="hidden" id="editRowId">
            <div class="form-group">
              <label for="editSubscriberName">Name</label>
              <input type="text" onkeydown="clearMsg('editMessageName')" class="form-control" id="editSubscriberName">
              <span id="editMessageName"></span>
            </div>
            <div class="form-group">
              <label for="editSubscriberEmail">Email</label>
              <input type="email" onkeydown="clearMsg('editMessageEmail')" class="form-control" id="editSubscriberEmail" disabled>
              <span id="editMessageEmail"></span>
            </div>
            <div class="form-group">
              <label for="editSubscriberCountry">Country</label>
              <input type="text" onkeydown="clearMsg('editMessageCountry')" class="form-control" id="editSubscriberCountry">
              <span id="editMessageCountry"></span>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="updateSubscriber()" type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>