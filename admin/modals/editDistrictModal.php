<div class="modal fade " id="editDistrictModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success m-auto">EDIT DISTRICT</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <h4 class="h4">District: </h4>
                            </div>
                            <div class="row">
                                <h4 class="h3" id="edit_district_number"></h4>
                            </div>
                        </div>
                        <div class="col-8">
                            <input type="hidden" id="edit_district_id">
                            <label for="edit_district_new_number" class="form-label">New Number</label>
                            <input type="number" id="edit_district_new_number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-12"> <button class="btn btn-success" id="btn_confirm_edit">Save</button></div>
                </div>
            </div>
        </div>
    </div>
</div>