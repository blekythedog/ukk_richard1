<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span>Barang</h4>

              <div class="row">
                <!-- Basic -->
                <form action="<?= base_url('home/aksi_edit_barang') ?>" method="post">   
                <input type="hidden" name="id" value="<?= $dt->id_barang ?>">
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Edit Barang</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-box"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="nama barang"
                          name="nama_barang"
                          value="<?php echo $dt->nama_barang ?>"
                        />
                      </div>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="kode barang"
                          name="kode_barang"
                          value="<?php echo $dt->kode_barang ?>"
                        />
                      </div>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="harga"
                          name="harga"
                          value="<?php echo $dt->harga ?>"
                        />
                      </div>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="Stok"
                          name="stok"
                          value="<?php echo $dt->stok ?>"
                        />
                      </div>
                      <div>
                        <a>
                        <button class="btn btn-primary form-control" type="submit">
                            Submit
                        </button>
                        </a>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>