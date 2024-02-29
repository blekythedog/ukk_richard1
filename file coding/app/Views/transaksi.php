<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pay / </span>Transaksi</h4>
        <div class="row">
            <!-- Basic -->
            <form id="checkoutForm" action="<?= base_url('home/proses_pembayaran') ?>" method="post">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Checkout</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-box" disabled value="<?= $dt->nama_barang ?>"></i></span>
                                <select class="form-control" name="keranjang" id="nama_barang" onchange="getHarga()">
                                    <?php foreach ($dt as $table) { ?>
                                        <option value="<?= $table->nama_barang ?>">
                                            <?= $table->nama_barang ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-people-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Pelanggan" name="pelanggan" />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                                <input type="number" class="form-control" placeholder="Total pesan" name="total_pesan" id="total_pesan" oninput="calculateTotal()" />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                                <input type="text" class="form-control" placeholder="Harga" name="harga" id="harga" value="" readonly />
                            </div>
                            <div>
                                <button class="btn btn-primary form-control" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function calculateTotal() {
        var totalPesan = document.getElementById("total_pesan").value;
        var harga = document.getElementById("harga").value;
        var totalHarga = totalPesan * harga;
        document.getElementById("harga").value = totalHarga.toFixed(2);
    }

    function getHarga() {
        var namaBarang = document.getElementById("nama_barang").value;
        // You may want to make an AJAX call here to fetch the price based on the selected nama_barang
        // For now, let's assume you have a JavaScript array 'barangData' containing the data
        var barangData = <?php echo json_encode($dt); ?>;
        var harga;
        for (var i = 0; i < barangData.length; i++) {
            if (barangData[i].nama_barang === namaBarang) {
                harga = barangData[i].harga;
                break;
            }
        }
        document.getElementById("harga").value = harga;
    }
</script>
