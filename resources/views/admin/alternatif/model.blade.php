 <!-- Modal -->
 <div class="modal fade" id="modalForm" aria-labelledby="modalFormLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalFormLabel">Form Alternatif</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('admin.alternatif.store') }}" class="form-submit">
                 <input type="hidden" name="_method" value="post">
                 <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                     <div class="form-floating">
                         <input type="text" class="form-control nama_alternatif" id="floatingInput"
                             placeholder="Kode alternatif..." name="nama_alternatif">
                         <small class="error_nama_alternatif text-danger"></small>
                         <label for="floatingInput">Nama</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="text" class="form-control nip_alternatif" id="floatingInput"
                             placeholder="Nama alternatif..." name="nip_alternatif">
                         <small class="error_nip_alternatif text-danger"></small>
                         <label for="floatingInput">NIP</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="text" class="form-control email_alternatif" id="floatingInput"
                             placeholder="Nama alternatif..." name="email_alternatif">
                         <small class="error_email_alternatif text-danger"></small>
                         <label for="floatingInput">Email</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <textarea class="form-control alamat_alternatif" id="floatingInput" placeholder="Alamat..." name="alamat_alternatif"
                             style="height: 80px;"></textarea>
                         <small class="error_alamat_alternatif text-danger"></small>
                         <label for="floatingInput">Alamat</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-floating">
                         <input type="number" class="form-control nohp_alternatif" id="floatingInput"
                             placeholder="No. HP..." name="nohp_alternatif">
                         <small class="error_nohp_alternatif text-danger"></small>
                         <label for="floatingInput">No. handphone</label>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-group">
                         <label for="jenis_kelamin_alternatif" class="form-label">Jenis
                             kelamin</label>
                         <div class="form-check">
                             <input class="form-check-input jenis_kelamin_alternatif" type="radio"
                                 name="jenis_kelamin_alternatif" id="jenis_kelamin_alternatif_l" value="L">
                             <label class="form-check-label" for="jenis_kelamin_alternatif_l">
                                 Laki-laki
                             </label>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input jenis_kelamin_alternatif" type="radio"
                                 name="jenis_kelamin_alternatif" id="jenis_kelamin_alternatif_p" value="P">
                             <label class="form-check-label" for="jenis_kelamin_alternatif_p">
                                 Perempuan
                             </label>
                         </div>
                         <small class="error_jenis_kelamin_alternatif text-danger"></small>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-group">
                         <label for="formFile" class="form-label">Upload poto</label>
                         <input class="form-control gambar_alternatif" type="file" id="formFile"
                             name="gambar_alternatif">
                         <span id="load_gambar_alternatif"></span>
                         <small class="error_gambar_alternatif text-danger"></small>
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
