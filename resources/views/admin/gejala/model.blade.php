 <!-- Modal -->
 <div class="modal fade" id="modalForm" aria-labelledby="modalFormLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalFormLabel">Form Gejala</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('admin.gejala.store') }}" class="form-submit">
                 <input type="hidden" name="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                     <div class="form-floating">
                         <input type="text" class="form-control kode_gejala" id="floatingInput"
                             placeholder="Kode gejala..." name="kode_gejala">
                         <small class="error_kode_gejala text-danger"></small>
                         <label for="floatingInput">Kode gejala</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="text" class="form-control nama_gejala" id="floatingInput"
                             placeholder="Nama gejala..." name="nama_gejala">
                         <small class="error_nama_gejala text-danger"></small>
                         <label for="floatingInput">Nama gejala</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input step="any" type="number" class="form-control cfpakar_gejala" id="floatingInput"
                             placeholder="CF pakar..." name="cfpakar_gejala">
                         <small class="error_cfpakar_gejala text-danger"></small>
                         <label for="floatingInput">CF. Pakar</label>
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
