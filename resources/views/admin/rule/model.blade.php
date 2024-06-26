 <!-- Modal -->
 <div class="modal fade" id="modalForm" aria-labelledby="modalFormLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalFormLabel">Form rule</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('admin.rule.store') }}" class="form-submit">
                 <input type="hidden" name="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                     <div class="form-floating">
                         <input type="text" class="form-control kode_rule" id="floatingInput"
                             placeholder="Kode rule..." name="kode_rule">
                         <small class="error_kode_rule text-danger"></small>
                         <label for="floatingInput">Kode Rule</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <select class="form-control penyakit_id" id="floatingInput" name="penyakit_id">
                             <option value="">-- Penyakit --</option>
                             @foreach ($penyakit as $item)
                                 <option value="{{ $item->id }}">{{ $item->kode_penyakit }} |
                                     {{ $item->nama_penyakit }}</option>
                             @endforeach
                         </select>
                         <small class="error_penyakit_id text-danger"></small>
                         <label for="floatingInput">Penyakit</label>
                     </div>
                     <div style="height: 20px;"></div>
                     <h5>Daftar gejala</h5>
                     <small class="error_gejala_id text-danger"></small>
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTableGejala" style="width: 100%;">
                                     <thead>
                                         <tr>
                                             <th>
                                                 <div class="form-check">
                                                     <input
                                                         style="width: 15px;
                                                     height: 15px;"
                                                         name="checkBoxAll" id="checkBoxAll"
                                                         class="form-check-input checkBoxAll" type="checkbox"
                                                         value="#" id="checkBoxAll">
                                                     <label class="form-check-label" for="checkBoxAll">
                                                     </label>
                                                 </div>
                                             </th>
                                             <th>No.</th>
                                             <th>Kode</th>
                                             <th>Nama</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                     </tbody>
                                 </table>
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
