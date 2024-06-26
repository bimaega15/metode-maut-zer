  <!-- Modal -->
  <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalFormLabel">Hasil Perhitungan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ url('/admin/perhitungan') }}" method="post" class="form-submit">
                  <input type="hidden" name="_method" value="post">
                  <div class="modal-body">
                      <div class="form-floating">
                          <input type="text" class="form-control judul_selesai_test" id="floatingInput"
                              placeholder="Judul..." name="judul_selesai_test">
                          <small class="error_judul_selesai_test text-danger"></small>
                          <label for="floatingInput">Judul test</label>
                      </div>
                      <div style="height: 10px;"></div>
                      <div class="form-floating">
                          <input type="text" class="form-control tanggal_selesai_test datepicker" id="floatingInput"
                              placeholder="Tanggal..." name="tanggal_selesai_test">
                          <small class="error_tanggal_selesai_test text-danger"></small>
                          <label for="floatingInput">Tanggal test</label>
                      </div>
                      <div style="height: 10px;"></div>
                      <div class="form-floating">
                          <textarea class="form-control keterangan_selesai_test" id="floatingInput" placeholder="Keterangan..."
                              name="keterangan_selesai_test" style="height: 80px;"></textarea>
                          <small class="error_keterangan_selesai_test text-danger"></small>
                          <label for="floatingInput">Keterangan</label>
                      </div>
                      <div style="height: 10px;"></div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i
                              class="fas fa-window-close"></i> Close</button>
                      <button type="button" class="btn btn-primary btn-submit"> <i class="fas fa-paper-plane"></i>
                          Kirim
                          Hasil</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
