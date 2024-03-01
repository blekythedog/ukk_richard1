<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span>Barang</h4>
        <div class="row">
            <!-- Basic -->
            <form action="<?= base_url('home/aksi_edit_keranjang') ?>" method="post">
                <input type="hidden" name="id" value="<?= $dt->id_keranjang ?>">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Edit Keranjang</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-box"></i></span>
                                <input type="text" class="form-control" placeholder="keranjang" name="keranjang"
                                    disabled value="<?= $dt->keranjang ?>" />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                                <input type="text" class="form-control" placeholder="Nama pelanggan"
                                    name="pelanggan" value="<?= $dt->pelanggan ?>" />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i
                                        class="bi bi-eyedropper"></i></span>
                                <input type="number" class="form-control" placeholder="Total Pesan"
                                    name="total_pesan" id="total_pesan" value="<?= $dt->total_pesan ?>" />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i
                                        class="bi bi-eyedropper"></i></span>
                                <input type="number" class="form-control" placeholder="Harga" name="harga"
                                    id="harga" value="<?= $dt->harga ?>" readonly />
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
    var originalHarga; // Variable to store the original harga value

    // Function to update harga and total
    function updateHargaAndTotal() {
        var totalPesan = parseFloat(document.getElementById("total_pesan").value);
        var harga = parseFloat(document.getElementById("harga").value);

        if (isNaN(totalPesan) || totalPesan === 0) {
            // If totalPesan is not a number or 0, set harga to 0
            document.getElementById("harga").value = '0.00';
        } else if (!isNaN(totalPesan)) {
            // Calculate total harga by multiplying total_pesan with a fixed value (3300)
            var totalHarga = totalPesan * 3300;
            document.getElementById("harga").value = totalHarga.toFixed(2);
        } else if (!isNaN(harga)) {
            // Calculate total harga
            var totalHarga = totalPesan * harga;
            document.getElementById("harga").value = totalHarga.toFixed(2);
        } else {
            // If harga is not a number, reset it to the original value
            document.getElementById("harga").value = originalHarga.toFixed(2);
        }
    }

    // Function to set the input value and trigger updateHargaAndTotal()
    function set() {
        updateHargaAndTotal();
    }

    // Event listener for total_pesan input field
    document.getElementById("total_pesan").addEventListener("input", set);

    // Event listener for keranjang select field
    document.getElementById("keranjang").addEventListener("change", getHarga);

    // Function to fetch harga based on selected keranjang
    function getHarga() {
        var namaBarang = document.getElementById("keranjang").value;
        // You may want to make an AJAX call here to fetch the price based on the selected nama_barang
        // For now, let's assume you have a JavaScript array 'barangData' containing the data
        var barangData = <?php echo json_encode($dt); ?>;
        var harga;
        for (var i = 0; i < barangData.length; i++) {
            if (barangData[i].keranjang === namaBarang) {
                harga = barangData[i].harga;
                if (originalHarga === undefined) {
                    originalHarga = harga; // Store the original harga value if not already stored
                }
                break;
            }
        }
        document.getElementById("harga").value = harga;
        // Set the originalHarga only if total_pesan is 0
        if (parseFloat(document.getElementById("total_pesan").value) === 0) {
            originalHarga = harga;
        }
    }

    // Function to fetch harga from database when total_pesan is 0
    function getHargaFromDatabase() {
        // Make an AJAX request to your backend to fetch the harga from the database
        // Replace this placeholder code with your actual AJAX call
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_harga_from_database.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                // Assuming the response contains the harga value
                var hargaFromDatabase = response.harga;
                document.getElementById("harga").value = hargaFromDatabase.toFixed(2);
                originalHarga = hargaFromDatabase; // Set the originalHarga
            }
        };
        xhr.send();
    }

    // Initial call to fetch harga based on selected keranjang
    getHarga();
</script>


