 <!-- Modal -->
 <div class="modal fade" id="modalPenilaian" aria-labelledby="modalPenilaianLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalPenilaianLabel">Form Penilaian</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="#" class="form-submit">
                 <input type="hidden" name="_method" class="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <input type="hidden" name="alternatif_id" class="alternatif_id">
                 <div class="modal-body">
                     @foreach ($kriteria as $vKriteria)
                         <div class="row mb-3">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label for="">{{ $vKriteria->kode_kriteria }}
                                         {{ $vKriteria->nama_kriteria }}</label>
                                     <input type="hidden" name="kriteria_id[]" class="kriteria_id"
                                         value="{{ $vKriteria->id }}">
                                 </div>
                                 <div style="height: 10px;"></div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <select name="sub_kriteria_id[$vKriteria->id][]" id="" class="form-control">
                                         <option value="">-- Pilih Sub Kriteria --</option>
                                         @foreach ($subKriteria[$vKriteria->id] as $row)
                                             <option value="{{ $row->id }}">
                                                 {{ $row->nama_sub_kriteria }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                         </div>
                     @endforeach
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
