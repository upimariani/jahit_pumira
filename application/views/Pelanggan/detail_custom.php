<!-- Contact Start -->
<div class="container-fluid pt-5">
	<div class="text-center mb-4">
		<h2 class="section-title px-5"><span class="px-2">Detail Pesanan Custom</span></h2>
	</div>
	<div class="row px-xl-5">
		<div class="col-lg-7 mb-5">
			<div class="contact-form ">
				<p>Detail Transaksi</p>
				<p>Id Transaksi : <strong><?= $dcustom->id_transaksi ?></strong></p>
				<p>Tanggal Pesan : <strong><?= $dcustom->tgl_transaksi ?></strong></p>
				<p>Quantity : <strong><?= $dcustom->qty_custom ?></strong></p>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nama Bahan</th>
							<td><?= $dcustom->nama_kain ?></td>
						</tr>
						<tr>
							<th>Panjang Baju</th>
							<td><?= $dcustom->pjng_baju ?> cm</td>
						</tr>
						<tr>
							<th>Panjang Lengan</th>
							<td><?= $dcustom->pjng_lengan ?> cm</td>
						</tr>
						<tr>
							<th>Bahu</th>
							<td><?= $dcustom->bahu ?> cm</td>
						</tr>
						<tr>
							<th>Pundak</th>
							<td><?= $dcustom->pundak ?> cm</td>
						</tr>
						<tr>
							<th>Pinggang</th>
							<td><?= $dcustom->pinggang ?> cm</td>
						</tr>
					</thead>
				</table>
				<a class="btn btn-primary" href="<?= base_url('pelanggan/katalog/status_order') ?>">Kembali</a>
			</div>
		</div>
		<div class="col-lg-3">
			<img style="width: 250px;" src="<?= base_url('asset/model-baju/' . $dcustom->gambar_model) ?>">
		</div>
	</div>
</div>
<!-- Contact End -->