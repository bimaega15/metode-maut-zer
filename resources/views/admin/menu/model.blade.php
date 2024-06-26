 <!-- Modal -->
 <div class="modal fade" id="modalForm" aria-labelledby="modalFormLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalFormLabel">Form menu</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('admin.menu.store') }}" class="form-submit">
                 <input type="hidden" name="_method" value="post">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="form-floating">
                                 <input type="text" class="form-control no_management_menu" id="floatingInput"
                                     placeholder="No. menu..." name="no_management_menu">
                                 <small class="error_no_management_menu text-danger"></small>
                                 <label for="floatingInput">No. urut</label>
                             </div>
                         </div>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="row">
                         <div class="col-lg-6">
                             <div class="form-floating">
                                 <input type="text" class="form-control icon_management_menu" id="floatingInput"
                                     placeholder="Icon menu..." name="icon_management_menu">
                                 <small class="error_icon_management_menu text-danger"></small>
                                 <label for="floatingInput">Icon</label>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="form-floating">
                                 <input type="text" class="form-control nama_management_menu" id="floatingInput"
                                     placeholder="Nama menu..." name="nama_management_menu">
                                 <small class="error_nama_management_menu text-danger"></small>
                                 <label for="floatingInput">Nama menu</label>
                             </div>
                         </div>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="form-floating">
                                 <input type="text" class="form-control link_management_menu" id="floatingInput"
                                     placeholder="Icon menu..." name="link_management_menu">
                                 <small class="error_link_management_menu text-danger"></small>
                                 <label for="floatingInput">Link</label>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                         Close</button>
                     <button type="submit" class="btn btn-primary btn-submit"><i data-feather="send"></i>
                         Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>


 <!-- Modal -->
 <div class="modal fade" id="modalSubMenu" tabindex="-1" aria-labelledby="modalSubMenuLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalSubMenuLabel">Daftar Menu</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="#" class="form-submit-sub-menu">
                 <div class="modal-body">
                     <select class="form-control management_menu_id multiple-select-field" id="floatingInput"
                         name="management_menu_id[]" data-placeholder="-- Menu --" multiple>
                         <option value="">-- Menu --</option>
                     </select>
                     <small class="error_management_menu_id text-danger"></small>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                         Close</button>
                     <button type="submit" class="btn btn-primary btn-submit-sub-menu"><i data-feather="send"></i>
                         Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
