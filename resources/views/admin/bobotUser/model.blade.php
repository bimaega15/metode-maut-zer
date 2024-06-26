 <!-- Modal -->
 <div class="modal fade" id="modalForm" aria-labelledby="modalFormLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalFormLabel">Form Bobot User</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('admin.bobotUser.store') }}" class="form-submit">
                 <input type="hidden" name="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                     <div class="form-floating">
                         <input type="text" class="form-control bobot_user" id="floatingInput"
                             placeholder="Bobot user..." name="bobot_user">
                         <small class="error_bobot_user text-danger"></small>
                         <label for="floatingInput">Nama bobot</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="number" step="any" class="form-control nilai_bobot_user" id="floatingInput"
                             placeholder="Nilai bobot..." name="nilai_bobot_user">
                         <small class="error_nilai_bobot_user text-danger"></small>
                         <label for="floatingInput">Nilai bobot</label>
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
