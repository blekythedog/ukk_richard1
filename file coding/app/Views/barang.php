<a href="<?= base_url('home/t_barang') ?>" style="padding-left : 25px; padding-top : 10px;">
                        <button class="btn btn-success">
                            <i class="bi bi-bag-plus"></i>
                        </button>
                    </a>
<div class="container" style="padding-top : 20px;">
<div class="card">
                <h5 class="card-header">Data Barang</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tanggal</th>
                        <?php if(session()->get('level') == 1) { ?>
                        <th>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php 
                        $no = 1;
                        foreach ($dt as $table)
                        { ?>
                      <tr>
                        <td> 
                            <strong><?php echo $no++; ?></strong>
                        </td>
                        <td>
                            <?= $table->nama_barang ?>
                        </td>
                        <td>
                            <?= $table->kode_barang ?>
                        </td>
                        <td>
                        <?= $table->harga ?>
                        </td>
                        <td>
                        <?= $table->stok ?>
                        </td>
                        <td>
                        <?= $table->tanggal ?>
                        </td>
                        <td>
                          <?php if(session()->get('level') == 1) { ?>
                           <a href="<?= base_url('home/edit_barang/'. $table->id_barang) ?>">
                            <button class="btn btn-primary">
                                <i class="bi bi-pen"></i>
                            </button>
                           </a>
                           <?php } ?>
                           <?php if(session()->get('level') == 1) { ?>
                           <a href="<?= base_url('home/delete_barang/'. $table->id_barang) ?>">
                            <button class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                           </a>
                           <?php } ?>
                        </td>
                        </tr>
                        <?php } ?>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
</div>