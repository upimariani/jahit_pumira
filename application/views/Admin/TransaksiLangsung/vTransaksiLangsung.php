<main id="main" class="main">

	<div class="pagetitle">
		<h1>Informasi Transaksi Langsung</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item">Tables</li>
				<li class="breadcrumb-item active">Data</li>
			</ol>
		</nav>
		<?php
		if ($this->session->userdata('error')) {
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				<?= $this->session->userdata('error') ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php
		}
		?>
		<?php
		if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				<?= $this->session->userdata('success') ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php
		}
		?>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">

			<div class="col-lg-5">
				<form action="<?= base_url('Admin/TransaksiLangsung/add_to_cart') ?>" method="POST">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Pilih Produk</h5>
							<?php echo form_open_multipart('Admin/KelolaDataMaster/produk'); ?>

							<label for="inputPassword" class="col-sm-5 col-form-label">Nama Produk</label>
							<div class="col-sm-12">
								<select class="form-control" name="produk" id="produk">
									<option value="">---Pilih Produk---</option>
									<?php
									foreach ($produk as $key => $value) {
									?>
										<option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
									<?php
									}
									?>

								</select>
								<?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="row mb-3 mt-3">
								<label for="inputPassword" class="col-sm-5 col-form-label">Size Produk</label>
								<div class="col-sm-12">
									<select class="form-control" name="size" id="size">
										<option value="">---Pilih Size---</option>


									</select>
									<?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label for="inputPassword" class="col-sm-5 col-form-label">Harga Produk</label>
									<div class="col-sm-12">
										<input type="number" name="harga" class="harga form-control" placeholder="Harga Produk" readonly>
										<input type="hidden" name="nama" class="nama form-control" placeholder="Harga Produk" readonly>
										<input type="hidden" name="size_t" class="size_t form-control" placeholder="Harga Produk" readonly>
										<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<label for="inputPassword" class="col-sm-5 col-form-label">Stok Produk</label>
									<div class="col-sm-12">
										<input type="number" name="stok" class="stok form-control" placeholder="Stok Produk" readonly>
										<?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>


							<div class="row mb-3 mt-3">
								<label for="inputPassword" class="col-sm-5 col-form-label">Quantity Produk</label>
								<div class="col-sm-12">
									<input type="number" name="qty" class="form-control" placeholder="Masukkan Quantity Produk">
									<?= form_error('qty', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
							<div class="row mb-3 mt-5">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-warning"><i class="bi bi-cart"></i> Add To Cart</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-7">
				<form action="<?= base_url('admin/transaksilangsung/order') ?>" method="POST">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Keranjang Order</h5>
							<!-- Table with stripped rows -->
							<table class="table datatable">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Produk</th>
										<th scope="col">Harga</th>
										<th scope="col">Quantity</th>
										<th scope="col">SubTotal</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($this->cart->contents() as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value['name'] ?></td>
											<td>Rp. <?= number_format($value['price']) ?></td>
											<td><?= $value['qty'] ?></td>
											<td>Rp. <?= number_format($value['qty'] * $value['price'])  ?></td>
											<td><a href="<?= base_url('Admin/TransaksiLangsung/delete/' . $value['rowid']) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
							<!-- End Table with stripped rows -->
							<input name="subtotal" value="<?= $this->cart->total() ?>" hidden>
							<?php $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
							?>
							<input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
							<!-- simpan detail pembelian -->
							<?php
							$i = 1;
							foreach ($this->cart->contents() as $items) {
								echo form_hidden('qty' . $i++, $items['qty']);
							}
							?>
							<button type="submit" class="btn btn-success"><i class="bi bi-cart"></i> Selesai</button>

						</div>
					</div>
				</form>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Transaksi Langsung</h5>
						<!-- Table with stripped rows -->
						<table class="table datatable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Id Transaksi</th>
									<th scope="col">Tanggal Transaksi</th>
									<th scope="col">Total Bayar</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($transaksi as $key => $value) {
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value->id_transaksi ?></td>
										<td><?= $value->tgl_transaksi ?></td>
										<td>Rp. <?= number_format($value->total_bayar)  ?></td>
										<td><a href="<?= base_url('admin/transaksilangsung/detail_order/' . $value->id_transaksi) ?>" class="btn btn-info"> Detail</a>
										</td>
									</tr>
								<?php
								}
								?>

							</tbody>
						</table>
						<!-- End Table with stripped rows -->

					</div>
				</div>

			</div>
		</div>
	</section>

</main><!-- End #main -->
