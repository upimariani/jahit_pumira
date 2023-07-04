<main id="main" class="main">

	<div class="pagetitle">
		<h1>Data Pesanan Transaksi Langsung</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item">Tables</li>
				<li class="breadcrumb-item active">Transaksi</li>
			</ol>
		</nav>


	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body m-sm-3 m-md-5">
						<div class="row">
							<div class="col-md-6">
								<div class="text-muted">Payment No.</div>
								<strong><?= $detail['transaksi']->id_transaksi ?></strong>
							</div>
							<div class="col-md-6 text-md-right">
								<div class="text-muted">Payment Date</div>
								<strong><?= $detail['transaksi']->update_at ?></strong>
							</div>
						</div>
						<hr class="my-4" />

						<table class="table table-sm">
							<thead>
								<tr>
									<th>Nama Produk</th>
									<th>Quantity</th>
									<th>Harga</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($detail['produk'] as $key => $value) {
								?>
									<tr>
										<td><?= $value->nama_produk ?></td>
										<td><?= $value->qty ?></td>
										<td>Rp. <?= number_format($value->harga)  ?></td>
										<td>Rp. <?= number_format($value->harga * $value->qty)  ?></td>
									</tr>
								<?php
								}
								?>

								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Subtotal </th>
									<th class="text-right">Rp. <?= number_format($detail['transaksi']->total_bayar)  ?></th>
								</tr>
							</tbody>
						</table>
						<a class="btn btn-danger" href="<?= base_url('admin/transaksilangsung') ?>">Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
