<style>
    .table
    {
        border-radius: 20px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        align-items: center;
        position: relative;

    }
    .terima
    {
        color:blue;
    }
    </style>


<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 mx-auto">
                    <div class="card-body">
                        <table border="1" class="table">
                        <h5 class="card-title" align='center'>Transaksi</h5>
                        <hr>
                        </hr>
                        <h6 class="card-subtitle text-muted">Tanggal: <?= date('Y-m-d')?></h6>
                        <h6 class="card-subtitle text-muted mt-2">Details: </h6>
                        <ul>
                            <?php 
                                $grandTotal = 0;
                                foreach($dt as $data){
                            ?>
                            <li>
                                <?=$data->nm_makanan?> (<?=$data->keranjang?>)
                            </li>
                            <ul>
                                <li>Rp<?= number_format(floor($data->harga), 0, ',', '.') ?></li>
                            </ul>
                            <?php 
                                $grandTotal += floor($data->harga);
                                }
                            ?>

                        </ul>
                        <h6 class="card-subtitle text-muted mt-4">Grand Total:
                            Rp<?= number_format($grandTotal, 0, ',', '.') ?></h6>
                        <h6 class="card-subtitle text-muted mt-4 terima" align="center">Terima Kasih Sudah 
                            Mengunjungi Penjualan Kami
                        </h6>
                        

                        <!-- Added text-center class to center the button -->
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
