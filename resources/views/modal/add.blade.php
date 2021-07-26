<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subscriber</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addSubscriberForm">
            <div class="form-group">
              <label for="subscriberName">Name</label>
              <input type="text" onkeydown="clearMsg('messageName')" class="form-control" id="subscriberName">
              <span id="messageName"></span>
            </div>
            <div class="form-group">
              <label for="subscriberEmail">Email</label>
              <input type="email" onkeydown="clearMsg('messageEmail')" class="form-control" id="subscriberEmail">
              <span id="messageEmail"></span>
            </div>
            <div class="form-group">
              <label for="subscriberCountry">Country</label>
              <input type="text" onkeydown="clearMsg('messageCountry')" class="form-control" id="subscriberCountry">
              <span id="messageCountry"></span>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="saveSubscriber()" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>