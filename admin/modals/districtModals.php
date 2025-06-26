<div class="modal fade " id="addDistrictModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:75vw; right:22.5vw !important;">
                <div class="modal-header">
                        <h5 class="modal-title text-success m-auto">Manage Districts</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <table id="district_table" class=" w-100 table-rounded">
                                <thead class="bg-success text-white">
                                        <tr>
                                            <th>No.</th>
                                            <th>District Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="district_table_data">
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-12"> <button class="btn btn-success" id="btn_save_district">Add District</button></div>
                </div>
            </div>
        </div>
    </div>
</div>