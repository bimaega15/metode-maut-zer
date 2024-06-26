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
                         <input type="text" class="form-control kode_sub_kriteria" id="floatingInput"
                             placeholder="Kode kriteria..." name="kode_sub_kriteria" readonly>
                         <small class="error_kode_sub_kriteria text-danger"></small>
                         <label for="floatingInput">Kode</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <select name="kriteria_id" class="kriteria_id form-control select2" id="">
                             <option value="">-- Kriteria --</option>
                             @foreach ($kriteria as $item)
                                 <option value="{{ $item->id }}">{{ $item->nama_kriteria }}</option>
                             @endforeach
                         </select>
                         <small class="error_kriteria_id text-danger"></small>
                         <label for="floatingInput">Kriteria</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="text" class="form-control nama_sub_kriteria" id="floatingInput"
                             placeholder="Kode kriteria..." name="nama_sub_kriteria">
                         <small class="error_nama_sub_kriteria text-danger"></small>
                         <label for="floatingInput">Nama</label>
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
