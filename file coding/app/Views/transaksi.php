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
                                <select class="form-control" name="keranjang" id="nama_barang" onchange="updateHargaAndTotal()">
                                <option value="">-</option>
                                    <?php foreach ($dt as $table) { ?>
                                        <option value="<?= $table->nama_barang ?>">
                                            <?= $table->nama_barang ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-people-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Pelanggan" name="pelanggan" required />
                            </div>
                            <div class="input-group">
    <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
    <input type="number" class="form-control" placeholder="Total pesan" name="total_pesan" id="total_pesan" oninput="updateHargaAndTotal()" required min="1" />
</div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                                <input type="text" class="form-control" placeholder="Harga" name="harga" id="harga" value="" readonly />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                                <input type="number" class="form-control" placeholder="Bayar" name="bayar" id="bayar" required />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                                <input type="number" class="form-control" placeholder="Kembalian" name="kembalian" id="kembalian" value="" readonly />
                            </div>
                            <div>
                                <button class="btn btn-primary form-control" type="submit" id="checkoutForm">
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
    var originalHarga; // Variable to store the original harga value

    function calculateTotal() {
    var totalPesan = parseFloat(document.getElementById("total_pesan").value);
    var harga = parseFloat(document.getElementById("harga").value);
    
    // Ensure both totalPesan and harga are valid numbers
    if (!isNaN(totalPesan) && !isNaN(harga)) {
        var totalHarga = 0;
        for (var i = 0; i < totalPesan; i++) {
            totalHarga += harga;
        }
        document.getElementById("harga").value = totalHarga.toFixed(2);
    }
}

function updateHargaAndTotal() {
    var namaBarang = document.getElementById("nama_barang").value;
    var totalPesan = parseFloat(document.getElementById("total_pesan").value);

    var barangData = <?php echo json_encode($dt); ?>;
    var harga;
    for (var i = 0; i < barangData.length; i++) {
        if (barangData[i].nama_barang === namaBarang) {
            harga = barangData[i].harga;
            if (originalHarga === undefined) {
                originalHarga = harga; // Store the original harga value if not already stored
            }
            break;
        }
    }

    // Calculate total harga
    if (!isNaN(totalPesan) && !isNaN(harga)) {
        var totalHarga = totalPesan * harga;
        document.getElementById("harga").value = totalHarga.toFixed(2);
    }
}

// Call the combined function when either total_pesan or nama_barang changes
document.getElementById("total_pesan").addEventListener("input", updateHargaAndTotal);
document.getElementById("nama_barang").addEventListener("change", updateHargaAndTotal);

    function getHarga() {
        var namaBarang = document.getElementById("nama_barang").value;
        // You may want to make an AJAX call here to fetch the price based on the selected nama_barang
        // For now, let's assume you have a JavaScript array 'barangData' containing the data
        var barangData = <?php echo json_encode($dt); ?>;
        var harga;
        for (var i = 0; i < barangData.length; i++) {
            if (barangData[i].nama_barang === namaBarang) {
                harga = barangData[i].harga;
                if (originalHarga === undefined) {
                    originalHarga = harga; // Store the original harga value if not already stored
                }
                break;
            }
        }
        document.getElementById("harga").value = harga;
    }
    

    // Add event listener for input events
    document.getElementById("total_pesan").addEventListener("input", function(event) {
        var input = event.target.value;
        if (input === "") {
            document.getElementById("harga").value = originalHarga; // Reset to the original harga value
        }
    });

      // Function to calculate kembalian
      function calculateKembalian() {
        var bayar = parseFloat(document.getElementById("bayar").value);
        var harga = parseFloat(document.getElementById("harga").value);

        if (!isNaN(bayar) && !isNaN(harga)) {
            var kembalian = bayar - harga;
            document.getElementById("kembalian").value = kembalian.toFixed(2);
        }
        if(bayar < harga)
        {
        }
    }

    // Add event listener for input events on the bayar input field
    document.getElementById("bayar").addEventListener("input", function(event) {
        calculateKembalian();
    });
</script>