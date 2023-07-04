<main id="main" class="main">

	<div class="pagetitle">
		<h1>Informasi Transaksi Custom Langsung</h1>
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
		<?php echo form_open_multipart('Admin/CustomLangsung'); ?>

		<div class="row">

			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Masukkan Ukuran Baju</h5>

						<div class="row">
							<div class="col-lg-6">
								<label for="inputPassword" class="col-sm-5 col-form-label">Panjang Baju</label>
								<div class="col-sm-12">
									<input type="number" name="baju" class="harga form-control" placeholder="Panjang Baju">
									<?= form_error('baju', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
							<div class="col-lg-6">
								<label for="inputPassword" class="col-sm-12 col-form-label">Panjang Lengan</label>
								<div class="col-sm-12">
									<input type="number" name="lengan" class="stok form-control" placeholder="Panjang Lengan">
									<?= form_error('lengan', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="inputPassword" class="col-sm-5 col-form-label">Bahu</label>
								<div class="col-sm-12">
									<input type="number" name="bahu" class="harga form-control" placeholder="Lebar Bahu">
									<?= form_error('bahu', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
							<div class="col-lg-6">
								<label for="inputPassword" class="col-sm-5 col-form-label">Pundak</label>
								<div class="col-sm-12">
									<input type="number" name="pundak" class="stok form-control" placeholder="Lebar Pundak">
									<?= form_error('pundak', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
						</div>


						<div class="row mb-3 mt-3">
							<label for="inputPassword" class="col-sm-5 col-form-label">Gambar Desain Baju</label>
							<div class="col-sm-12">
								<input type="file" name="desain" class="form-control" placeholder="Masukkan Quantity Produk">
							</div>
						</div>
						<div class="col-lg-12">
							<label for="inputPassword" class="col-sm-5 col-form-label">Quantity</label>
							<div class="col-sm-12">
								<input type="number" name="qty" class="form-control" placeholder="Masukkan Quantity">
								<?= form_error('qty', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Total Pembayaran</h5>
						<?php echo form_open_multipart('Admin/KelolaDataMaster/produk'); ?>

						<div class="row">
							<div class="col-lg-12">
								<label for="inputPassword" class="col-sm-12 col-form-label">Total Pembayaran</label>
								<div class="col-sm-12">
									<input type="number" name="harga" class="form-control" placeholder="Masukkan Total Pembayaran">
									<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
						</div>
						<div class="row mb-3 mt-5">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-warning"><i class="bi bi-cart"></i> Pesan Custom</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Transaksi Custom Langsung</h5>
						<!-- Table with stripped rows -->
						<table class="table datatable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Id Transaksi</th>
									<th scope="col">Tanggal Transaksi</th>
									<th scope="col">Total Bayar</th>
									<th scope="col">Panjang Bahu</th>
									<th scope="col">Panjang Lengan</th>
									<th scope="col">Lebar Bahu</th>
									<th scope="col">Lebar Pundak</th>
									<th scope="col">Gambar Desain</th>
									<th scope="col">Quantity</th>
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
										<td><?= $value->pjng_baju ?></td>
										<td><?= $value->pjng_lengan ?></td>
										<td><?= $value->bahu ?></td>
										<td><?= $value->pundak ?></td>
										<td><img style="width: 170px;" src="<?= base_url('asset/model-baju/' . $value->gambar_model) ?>"></td>
										<td><?= $value->qty_custom ?></td>
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
