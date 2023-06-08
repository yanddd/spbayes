<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Basis Pengetahuan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Basis Pengetahuan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <div class="container-fluid col-11">
            <!-- Small boxes (Stat box) -->

            <div class="col" style="margin-bottom: -21px;">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><?= $stres['id_penyakit']; ?> (<?= $stres['nama_penyakit']; ?>)</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="reload<?= $stres['id_penyakit']; ?>">
                            <?php foreach ($bStres as $bs) : ?>
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend col">
                                        <span class="input-group-text"><?= $bs['kodeGejala']; ?></span>

                                        <input type="text" class="form-control" placeholder="<?= $bs['nama_gejala']; ?>" disabled>

                                    </div>
                                    <div class="input-group-prepend">
                                        <form action="">
                                            <button type="button" class="btn btn-block btn-danger deleteg" data-id="<?= $bs['id_pengetahuan']; ?>.<?= $stres['id_penyakit']; ?>" onfocus="deletegejala()"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="input-group mb-1" id="selectG<?= $stres['id_penyakit']; ?>" style="display: none;">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend col">
                                    <select class="select2" id="Gbaru<?= $stres['id_penyakit']; ?>" name="Gbaru<?= $stres['id_penyakit']; ?>" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        <?php foreach ($nStres as $ns) : ?>
                                            <option value="<?= $ns['id_gejala']; ?>"><?= $ns['id_gejala']; ?> (<?= $ns['nama_gejala']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-group-prepend">
                                    <form action="">
                                        <button type="button" class="btn btn-block btn-success tambahGB" data-id="<?= $stres['id_penyakit']; ?>" style=" border-radius: 5px;" data-id=""><i class="fas fa-check"></i></button>
                                    </form>
                                    <form action="">
                                        <button type="button" class="btn btn-block btn-danger deletes" onfocus="hapusSelect()" data-id="<?= $stres['id_penyakit']; ?>"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-2" style="display: flex; justify-content: center;">
                            <form action="">
                                <button type="button" class="btn btn-block btn-primary tambahg save" onfocus="tambah()" data-id="<?= $stres['id_penyakit']; ?>"><i class="fas fa-plus"></i></button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <div class="col" style="margin-bottom: -21px;">
                <div class="card card-warning collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title text-white"><?= $cemas['id_penyakit']; ?> (<?= $cemas['nama_penyakit']; ?>)</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus text-white"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="reload<?= $cemas['id_penyakit']; ?>">
                            <?php foreach ($bCemas as $bc) : ?>
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend col">
                                        <span class="input-group-text"><?= $bc['kodeGejala']; ?></span>

                                        <input type="text" class="form-control" placeholder="<?= $bc['nama_gejala']; ?>" disabled>

                                    </div>
                                    <div class="input-group-prepend">
                                        <form action="">
                                            <button type="button" class="btn btn-block btn-danger deleteg" data-id="<?= $bc['id_pengetahuan']; ?>.<?= $cemas['id_penyakit']; ?>" onfocus="deletegejala()"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="input-group mb-1" id="selectG<?= $cemas['id_penyakit']; ?>" style="display: none;">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend col">
                                    <select class="select2" id="Gbaru<?= $cemas['id_penyakit']; ?>" name="Gbaru<?= $cemas['id_penyakit']; ?>" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        <?php foreach ($nCemas as $nc) : ?>
                                            <option value="<?= $nc['id_gejala']; ?>"><?= $nc['id_gejala']; ?> (<?= $nc['nama_gejala']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <div class="input-group-prepend">
                                    <form action="">
                                        <button type="button" class="btn btn-block btn-success tambahGB" data-id="<?= $cemas['id_penyakit']; ?>" style=" border-radius: 5px;" data-id=""><i class="fas fa-check"></i></button>
                                    </form>
                                    <form action="">
                                        <button type="button" class="btn btn-block btn-danger deletes" onfocus="hapusSelect()" data-id="<?= $cemas['id_penyakit']; ?>"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-2" style="display: flex; justify-content: center;">
                            <form action="">
                                <button type="button" class="btn btn-block btn-primary tambahg save" onfocus="tambah()" data-id="<?= $cemas['id_penyakit']; ?>"><i class="fas fa-plus"></i></button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card card-danger collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $depresi['id_penyakit']; ?> (<?= $depresi['nama_penyakit']; ?>)</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="reload<?= $depresi['id_penyakit']; ?>">
                            <?php foreach ($bDepresi as $bd) : ?>
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend col">
                                        <span class="input-group-text"><?= $bd['kodeGejala']; ?></span>

                                        <input type="text" class="form-control" placeholder="<?= $bd['nama_gejala']; ?>" disabled>

                                    </div>
                                    <div class="input-group-prepend">
                                        <form action="">
                                            <button type="button" class="btn btn-block btn-danger deleteg" data-id="<?= $bd['id_pengetahuan']; ?>.<?= $depresi['id_penyakit']; ?>" onfocus="deletegejala()"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="input-group mb-1" id="selectG<?= $depresi['id_penyakit']; ?>" style="display: none;">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend col">
                                    <select class="select2" id="Gbaru<?= $depresi['id_penyakit']; ?>" name="Gbaru<?= $depresi['id_penyakit']; ?>" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        <?php foreach ($nDepresi as $nd) : ?>
                                            <option value="<?= $nd['id_gejala']; ?>"><?= $nd['id_gejala']; ?> (<?= $nd['nama_gejala']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <div class="input-group-prepend">
                                    <form action="">
                                        <button type="button" class="btn btn-block btn-success tambahGB" data-id="<?= $depresi['id_penyakit']; ?>" style=" border-radius: 5px;" data-id=""><i class="fas fa-check"></i></button>
                                    </form>
                                    <form action="">
                                        <button type="button" class="btn btn-block btn-danger deletes" onfocus="hapusSelect()" data-id="<?= $depresi['id_penyakit']; ?>"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-2" style="display: flex; justify-content: center;">
                            <form action="">
                                <button type="button" class="btn btn-block btn-primary tambahg save" onfocus="tambah()" data-id="<?= $depresi['id_penyakit']; ?>"><i class="fas fa-plus"></i></button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->

    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    function tambah() {
        $('.save').on('click', function() {
            const id = $(this).data('id');
            document.getElementById("selectG" + id).style.display = "block";
            // document.getElementById("selectD").style.display = "block";
        })
    };
</script>

<script>
    function hapusSelect() {
        $('.deletes').on('click', function() {
            const id = $(this).data('id');
            document.getElementById("selectG" + id).style.display = "none";
            $('.select2').val(null).trigger('change');
        })
    };
</script>

<script>
    $('.tambahGB').on('click', function() {
        const id = $(this).data('id');
        var nilai = $("#Gbaru" + id).val();
        var data = id + '.' + nilai;
        document.getElementById("selectG" + id).style.display = "none";
        if (nilai != '') {
            $.ajax({
                url: '/admin/basisp/basisbaru',
                method: 'post',
                data: 'data=' + data,
                dataType: 'json',
                success: function(data) {
                    dataall = "";
                    data.forEach(function(alldata) {
                        dataall += '<div class="input-group mb-1"><div class="input-group-prepend col"><span class="input-group-text">' + alldata.kodeGejala + '</span><input type="text" class="form-control" placeholder="' + alldata.nama_gejala + '" disabled></div><div class="input-group-prepend"><form action=""><button type="button" class="btn btn-block btn-danger deleteg" onfocus="deletegejala()" data-id="' + alldata.id_pengetahuan + '.' + id + '"><i class="fas fa-trash"></i></button></form></div></div>';
                    });
                    $('#reload' + id).html(dataall);

                }
            });

            Swal.fire(
                'Berhasil!',
                'Data basis pengetahuan berhasil ditambah',
                'success'
            )

            setTimeout(function() {
                $.ajax({
                    url: '/admin/basisp/reloadg',
                    method: 'post',
                    data: 'data=' + id,
                    dataType: 'json',
                    success: function(data) {
                        option = '';
                        data.forEach(function(alldata) {
                            option += '<option value="' + alldata.id_gejala + '">' + alldata.id_gejala + ' (' + alldata.nama_gejala + ')</option>'
                        });
                        $('#Gbaru' + id).html(option);
                    }
                });
            }, 100);
        } else {
            Swal.fire(
                'Hmmm...??',
                'Tidak ada data yang ditambah',
                'question'
            )
        }
        $('.select2').val(null).trigger('change');
    })
</script>

<script>
    function deletegejala() {
        $('.deleteg').on('click', function() {
            const data_id = $(this).data('id');
            var id = data_id.split(".")[1];

            Swal.fire({
                title: 'Yakin ingin menghapus data?',
                text: "Data basis pengetahuan akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/basisp/autodelete',
                        data: 'data=' + data_id,
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                            dataall = "";
                            data.forEach(function(alldata) {
                                dataall += '<div class="input-group mb-1"><div class="input-group-prepend col"><span class="input-group-text">' + alldata.kodeGejala + '</span><input type="text" class="form-control" placeholder="' + alldata.nama_gejala + '" disabled></div><div class="input-group-prepend"><form action=""><button type="button" class="btn btn-block btn-danger deleteg" onfocus="deletegejala()" data-id="' + alldata.id_pengetahuan + '.' + id + '"><i class="fas fa-trash"></i></button></form></div></div>';
                            });
                            $('#reload' + id).html(dataall);
                        }
                    });
                    Swal.fire(
                        'Terhapus!',
                        'Data basis pengetahuan berhasil dihapus',
                        'success'
                    )

                    setTimeout(function() {
                        $.ajax({
                            url: '/admin/basisp/reloadg',
                            method: 'post',
                            data: 'data=' + id,
                            dataType: 'json',
                            success: function(data) {
                                option = '';
                                data.forEach(function(alldata) {
                                    option += '<option value="' + alldata.id_gejala + '">' + alldata.id_gejala + ' (' + alldata.nama_gejala + ')</option>'
                                });
                                $('#Gbaru' + id).html(option);
                            }
                        });
                    }, 100);
                    $('.select2').val(null).trigger('change');

                }
            })
        })
    };
</script>

<?= $this->endSection(); ?>