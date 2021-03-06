<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('admin/siswa/insert') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Foto Siswa</label>
						<div class="col-sm-10">
							<input type="file" name="foto" required class="form-control" placeholder="Foto Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Siswa</label>
						<div class="col-sm-10">
							<input type="text" name="nama_siswa" required class="form-control" placeholder="Nama Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Orang Tua</label>
						<div class="col-sm-5">
							<input type="text" name="nama_ayah" required class="form-control" placeholder="Nama Ayah">
						</div>
						<div class="col-sm-5">
							<input type="text" name="nama_ibu" required class="form-control" placeholder="Nama Ibu">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tanggal Lahir Siswa</label>
						<div class="col-sm-10">
							<input type="date" name="tgl_lahir_siswa" required class="form-control" placeholder="Tanggal Lahir Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Agama</label>
						<div class="col-sm-10">
							<select class="form-control" name="agama" required>
								<option>-- Pilih Agama --</option>
								<option value="ISLAM">ISLAM</option>
								<option value="KRISTEN">KRISTEN</option>
								<option value="HINDU">HINDU</option>
								<option value="BUDA">BUDA</option>
								<option value="KATOLIK">KATOLIK</option>
								<option value="LAINNYA">LAINNYA</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email Siswa</label>
						<div class="col-sm-10">
							<input type="email" name="email_siswa" required class="form-control" placeholder="Email Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Telepon Siswa</label>
						<div class="col-sm-10">
							<input type="text" name="telepon_siswa" required class="form-control" placeholder="Telepon Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat Siswa</label>
						<div class="col-sm-10">
							<textarea name="alamat_siswa" required class="form-control" placeholder="Alamat Siswa"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password_siswa" required class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Guru/Motivator</label>
						<div class="col-sm-10">
							<select class="form-control" name="id_guru" required>
								<option>-- Pilih Guru/Motivator --</option>
								<?php foreach ($dguru as $g): ?>
								<option value="<?= x($g->id_guru) ?>"><?= x($g->nama_guru) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- End modal tambah -->

<script type="text/javascript">
    $(document).ready(function(){
        $(".btn-edit").on("click", function(){
            var id = $(this).attr('data-id');
            $('#loading').modal({backdrop: 'static', keyboard: false});
            $('#loading').modal('show');
            $.ajax({
                type : "POST",
                url  : "<?= site_url('admin/siswa/data') ?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('#loading').modal('hide');
                    $("#nama_siswa").val(data.nama_siswa);
                    $("#email_siswa").val(data.email_siswa);
                    $("#telepon_siswa").val(data.telepon_siswa);
                    $("#alamat_siswa").val(data.alamat_siswa);
                    $("#username").val(data.username);
                    $("#id_siswa").val(data.id_siswa);
                    $("#nama_ayah").val(data.nama_ayah);
                    $("#nama_ibu").val(data.nama_ibu);
                    $("#tgl_lahir_siswa").val(data.tgl_lahir_siswa);
                    $("#agama").val(data.agama);
                    $("#id_guru").val(data.id_guru);
                    $("#foto").attr("src", data.thumb_siswa);
                    $('#modal-edit').modal({backdrop: 'static', keyboard: false});
                    $('#modal-edit').modal('show');
                    // console.log(data);
                }
            });
        });
    });
</script>

<!-- Modal Edit-->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('admin/siswa/update') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Foto Siswa</label>
						<div class="col-sm-10">
                            <img src="" id="foto"><br>
                            <input type="file" name="foto" class="form-control" placeholder="Foto Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Siswa</label>
						<div class="col-sm-10">
							<input type="text" id="nama_siswa" name="nama_siswa" required class="form-control" placeholder="Nama Siswa">
							<input type="hidden" id="id_siswa" name="id_siswa" required class="form-control" placeholder="Id Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Orang Tua</label>
						<div class="col-sm-5">
							<input type="text" name="nama_ayah" id="nama_ayah" required class="form-control" placeholder="Nama Ayah">
						</div>
						<div class="col-sm-5">
							<input type="text" name="nama_ibu" id="nama_ibu" required class="form-control" placeholder="Nama Ibu">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tanggal Lahir Siswa</label>
						<div class="col-sm-10">
							<input type="date" name="tgl_lahir_siswa" id="tgl_lahir_siswa" required class="form-control" placeholder="Tanggal Lahir Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Agama</label>
						<div class="col-sm-10">
							<select class="form-control" name="agama" id="agama" required>
								<option>-- Pilih Agama --</option>
								<option value="ISLAM">ISLAM</option>
								<option value="KRISTEN">KRISTEN</option>
								<option value="HINDU">HINDU</option>
								<option value="BUDA">BUDA</option>
								<option value="KATOLIK">KATOLIK</option>
								<option value="LAINNYA">LAINNYA</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email Siswa</label>
						<div class="col-sm-10">
							<input type="email" id="email_siswa"  name="email_siswa" required class="form-control" placeholder="Email Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Telepon Siswa</label>
						<div class="col-sm-10">
							<input type="text" id="telepon_siswa" name="telepon_siswa" required class="form-control" placeholder="Telepon Siswa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat Siswa</label>
						<div class="col-sm-10">
							<textarea id="alamat_siswa" name="alamat_siswa" required class="form-control" placeholder="Alamat Siswa"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password_siswa" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Guru/Motivator</label>
						<div class="col-sm-10">
							<select class="form-control" name="id_guru" id="id_guru" required>
								<option>-- Pilih Guru/Motivator --</option>
								<?php foreach ($dguru as $g): ?>
								<option value="<?= x($g->id_guru) ?>"><?= x($g->nama_guru) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- End modal edit -->
