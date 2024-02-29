<!-- <div class="container" style="padding-top: 50px;">
  <div class="card">
    <?php 
    foreach ($dt as $table) {
        // Check if supplier exists in barang_masuk
        if ($table->supplier_exists_in_barang_masuk) { // You need to replace 'supplier_exists_in_barang_masuk' with the actual check you need to perform
    ?>
      <h5 class="card-header">Baru saja terinput</h5>
      <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
          <div class="card-title">
            <h5 class="text-nowrap mb-2"></h5>
            <span class="badge bg-label-warning rounded-pill"><?= $table->nama_supplier ?></span>
          </div>
          <div class="mt-sm-auto">
            <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 68.2%</small>
            <h3 class="mb-0">$84,686k</h3>
          </div>
        </div>
        <div id="profileReportChart"></div>
      </div>
    <?php 
        } // end if
    } // end foreach
    ?>
  </div>
</div> -->





<div class="container" style="padding-top : 50px;">
<div class="card">
                <h5 class="card-header">Data Log Activity</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Data</th>
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
                            <?= $table->nama_supplier ?>
                        </td>
                        <td>
                            <?php echo 'baru saja terinput, ' . date('Y-m-d H:i:s'); ?>
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
