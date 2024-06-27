 <!-- Modal -->
 <div class="modal fade" id="modalForm" aria-labelledby="modalFormLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalFormLabel">Form Kriteria</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('admin.kriteria.store') }}" class="form-submit">
                 <input type="hidden" name="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                     <div class="form-floating">
                         <input type="text" class="form-control kode_kriteria" id="floatingInput"
                             placeholder="Kode kriteria..." name="kode_kriteria" readonly>
                         <small class="error_kode_kriteria text-danger"></small>
                         <label for="floatingInput">Kode</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="text" class="form-control nama_kriteria" id="floatingInput"
                             placeholder="Kode kriteria..." name="nama_kriteria">
                         <small class="error_nama_kriteria text-danger"></small>
                         <label for="floatingInput">Nama</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <textarea class="form-control definisi_kriteria" id="floatingInput" placeholder="Definisi..." name="definisi_kriteria"
                             style="height: 80px;"></textarea>
                         <small class="error_definisi_kriteria text-danger"></small>
                         <label for="floatingInput">Definisi</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="number" class="form-control bobot_kriteria" id="floatingInput"
                             placeholder="No. HP..." name="bobot_kriteria" step="any">
                         <small class="error_bobot_kriteria text-danger"></small>
                         <label for="floatingInput">Prioritas</label>
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
