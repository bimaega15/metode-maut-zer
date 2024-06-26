 <!-- Modal -->
 <div class="modal fade" id="modalForm" aria-labelledby="modalFormLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalFormLabel">Form access</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('admin.access.store') }}" class="form-submit">
                 <input type="hidden" name="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                     <div class="form-floating">
                         <select class="form-control roles_id" id="floatingInput" name="roles_id">
                             <option value="">-- Roles --</option>
                             @foreach ($role as $item)
                                 <option value="{{ $item->id }}">{{ $item->nama_roles }}</option>
                             @endforeach
                         </select>
                         <small class="error_roles_id text-danger"></small>
                         <label for="floatingInput">Roles</label>
                     </div>
                     <div style="height: 20px;"></div>
                     <h5>Daftar menu</h5>
                     <small class="error_management_menu_id text-danger"></small>
                     <div class="row">
                         <div class="col-lg-5">
                             <div class="shadow-sm border border-dark"
                                 style="height: 600px; width: 100%; overflow: scroll;" id="loadManagementMenu">
                             </div>
                         </div>
                         <div class="col-lg-2">
                             <div class="d-flex flex-column justify-content-center align-items-center"
                                 style="height: 100%; width: 100%;">
                                 <div class="p-2 bd-highlight">
                                     <button type="button" class="btn btn-dark m-b-xs chooseValueMenu">Pilih menu<i
                                             data-feather="arrow-right"></i>
                                     </button>
                                 </div>

                                 <div class="p-2 bd-highlight">
                                     <button type="button" class="btn btn-dark m-b-xs backValueMenu"><i
                                             data-feather="arrow-left"></i> Kembali</button>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-5">
                             <div class="shadow-sm border border-dark"
                                 style="height: 600px; width: 100%; overflow: scroll;" id="loadManagementMenuChoose">
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                         Close</button>
                     <button type="submit" class="btn btn-primary"><i data-feather="send"></i>
                         Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <div class="modal fade" id="modalAccessMenu" aria-labelledby="modalAccessMenuLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalAccessMenuLabel">Form Menu</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ url('/admin/access/managementMenuById') }}" class="form-submit-access">
                 <input type="hidden" name="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" style="width: 100%;">
                             <thead>
                                 <tr>
                                     <th>No.</th>
                                     <th>Menu</th>
                                     <th>Create</th>
                                     <th>Update</th>
                                     <th>Delete</th>
                                 </tr>
                             </thead>
                             <tbody>

                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                             data-feather="check"></i>
                         OK</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
