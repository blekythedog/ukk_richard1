<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 mx-auto">
                    <div class="card-body">
                        <h5 class="card-title" align='center'><?=$a?></h5>
                        <hr>
                        </hr>
                        <h6 class="card-subtitle text-muted">Tanggal: <?= $tgl?></h6>
                        <h6 class="card-subtitle text-muted mt-2">Details: </h6>
                        <ul>
                            <?php 
                                $grandTotal = 0;
                                foreach($t as $data){
                            ?>
                            <li>
                                <?=$data->nm_makanan?> (<?=$data->jumlah?>)
                            </li>
                            <ul>
                                <li>Rp<?= number_format(floor($data->price), 0, ',', '.') ?></li>
                            </ul>
                            <?php 
                                $grandTotal += floor($data->price);
                                }
                            ?>

                        </ul>
                        <h6 class="card-subtitle text-muted mt-4">Grand Total:
                            Rp<?= number_format($grandTotal, 0, ',', '.') ?></h6>
                        <h6 class="card-subtitle text-muted mt-4" align="center">Please Bring the E-Receipt to the
                            Cashier for payment
                        </h6>

                        <!-- Added text-center class to center the button -->
                    </div>
                </div>
                <div class="text-center">
                    <a href="#" onclick="openModal('<?= base_url('/Home/mpg')?>')">
                        <button class="btn btn-m btn-primary mr-1 mb-1 mt-2">
                            Done
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Double Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to continue?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="Link" href="#">
                    <button type="button" class="btn btn-primary">Finish</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
function openModal(Link) {
    document.getElementById('Link').href = Link;
    $('#Modal').modal('show');
}
</script>