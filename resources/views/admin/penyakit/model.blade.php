 <!-- Modal -->
 <div class="modal fade" id="modalForm" aria-labelledby="modalFormLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalFormLabel">Form penyakit</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('admin.penyakit.store') }}" class="form-submit">
                 <input type="hidden" name="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                     <div class="form-floating">
                         <input type="text" class="form-control kode_penyakit" id="floatingInput"
                             placeholder="Kode penyakit..." name="kode_penyakit">
                         <small class="error_kode_penyakit text-danger"></small>
                         <label for="floatingInput">Kode penyakit</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="text" class="form-control nama_penyakit" id="floatingInput"
                             placeholder="Nama penyakit..." name="nama_penyakit">
                         <small class="error_nama_penyakit text-danger"></small>
                         <label for="floatingInput">Nama penyakit</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <textarea class="form-control deskripsi_penyakit" id="floatingInput" placeholder="Deskripsi penyakit..."
                             name="deskripsi_penyakit" style="height: 80px;"></textarea>
                         <small class="error_deskripsi_penyakit text-danger"></small>
                         <label for="floatingInput">Deskripsi</label>
                     </div>
                     <div style="height: 10px;"></div>
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
