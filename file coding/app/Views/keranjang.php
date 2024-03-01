<a href="<?= base_url('home/invoice') ?>" style="padding-left : 25px; padding-top : 10px;">
                        <button class="btn btn-success">
                            Print Struk
                        </button>
                    </a>
<div class="container" style="padding-top : 20px;">
<div class="card">
                <h5 class="card-header">Data Keranjang</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Keranjang</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Pesan</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Action</th>
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
                            <?= $table->keranjang ?>
                        </td>
                        <td>
                            <?= $table->pelanggan ?>
                        </td>
                        <td>
                            <?= $table->total_pesan ?>
                        </td>
                        <td>
                        <?= $table->harga ?>
                        </td>
                        <td>
                        <?= $table->tanggal ?>
                        </td>
                        <td>
                           <a href="<?= base_url('home/edit_keranjang/' . $table->id_keranjang) ?> ">
                            <button class="btn btn-primary">
                                <i class="bi bi-pen"></i>
                            </button>
                           </a>
                           <a href="<?= base_url('home/delete_keranjang/'. $table->id_keranjang) ?>">
                            <button class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                           </a>
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
              <div style="padding-top : 20px;">
              <a href="<?= base_url('home/transaksi') ?>">
                            <button class="btn btn-primary">
                               Back
                            </button>
                           </a>
                        </div>
</div>

<script>
    function printInvoice() {
        // Make AJAX request to run the invoice code
        $.ajax({
            url: '<?= base_url('home/invoice') ?>',
            method: 'GET',
            success: function(response) {
                // Invoice code executed successfully

                // Make AJAX request to delete all data from the 'keranjang' table
                $.ajax({
                    url: '<?= base_url('home/delete_keranjang/') ?>', // Update the URL accordingly
                    method: 'POST', // or 'GET' depending on your server configuration
                    success: function(response) {
                        // Data in 'keranjang' table deleted successfully
                        // Redirect to the 'keranjang' page
                        window.location.href = '<?= base_url('keranjang') ?>';
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if any during deletion
                        console.error(xhr.responseText);
                    }
                });
            },
            error: function(xhr, status, error) {
                // Handle errors if any during invoice code execution
                console.error(xhr.responseText);
            }
        });
    }
</script>