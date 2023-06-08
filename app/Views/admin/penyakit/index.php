<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Penyakit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">List Penyakit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid col-11">
            <!-- Small boxes (Stat box) -->
            <div class="row-12">
                <div class="col-md">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><?= $stres['nama_penyakit']; ?></h3>

                            <div class="card-tools" id="mini<?= $stres['id_penyakit']; ?>">
                                <a href="/admin/penyakit/<?= $stres['id_penyakit']; ?>">
                                    <button type="button" class="btn btn-tool">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-tool reply" data-card-widget="maximize" data-id="<?= $stres['id_penyakit']; ?>" onfocus="sendingReply()">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="reply<?= $stres['id_penyakit']; ?>">
                            <div class="widget-user-image">
                                <img class="float-left mr-3" style="object-fit:cover; width: 200px; height: 130px; border: 50px;" src="<?= base_url(); ?>/assets/img/<?= $stres['foto']; ?>" alt="stres">
                            </div>
                            <div>
                                <?= $stres['desk']; ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row-12">
                <div class="col-md">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><?= $cemas['nama_penyakit']; ?></h3>

                            <div class="card-tools" id="mini<?= $cemas['id_penyakit']; ?>">
                                <a href="/admin/penyakit/<?= $cemas['id_penyakit']; ?>">
                                    <button type="button" class="btn btn-tool">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-tool reply" data-card-widget="maximize" data-id="<?= $cemas['id_penyakit']; ?>" onfocus="sendingReply()">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="reply<?= $cemas['id_penyakit']; ?>">
                            <div class="widget-user-image">
                                <img class="float-left mr-3" style="object-fit:cover; width: 200px; height: 130px; border: 50px;" src="<?= base_url(); ?>/assets/img/<?= $cemas['foto']; ?>" alt="cemas">
                            </div>
                            <div>
                                <?= $cemas['desk']; ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row-12">
                <div class="col-md">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><?= $depresi['nama_penyakit']; ?></h3>

                            <div class="card-tools" id="mini<?= $depresi['id_penyakit']; ?>">
                                <a href="/admin/penyakit/<?= $depresi['id_penyakit']; ?>">
                                    <button type="button" class="btn btn-tool">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-tool reply" data-card-widget="maximize" data-id="<?= $depresi['id_penyakit']; ?>" onfocus="sendingReply()">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="reply<?= $depresi['id_penyakit']; ?>">
                            <div class="widget-user-image">
                                <img class="float-left mr-3" style="object-fit:cover; width: 200px; height: 130px; border: 50px;" src="<?= base_url(); ?>/assets/img/<?= $depresi['foto']; ?>" alt="depresi">
                            </div>
                            <div>
                                <?= $depresi['desk']; ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>

    </section>

</div>



<script>
    function sendingReply() {
        $('.reply').on('click', function() {
            const id = $(this).data('id');
            var data_id = id;
            $.ajax({
                url: '/admin/penyakit/autodata',
                data: 'data=' + data_id,
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    setTimeout(function() {
                        desk = ""
                        desk += '<div class="p-5"><p>' + data.desk + ' Gejalanya yaitu:</p><p class="pl-4" id="gejala' + data_id + '"></p><p>' + data.saran + '</p></div>';
                        $('#reply' + data.id_penyakit).html(desk);

                        mini = ""
                        mini += '<a href="/admin/penyakit/' + data.id_penyakit + '"> <button type = "button"class = "btn btn-tool" ><i class = "fas fa-pen" > </i> </button> </a><button type="button" class="btn btn-tool backmini" data-card-widget="maximize" data-id="' + data.id_penyakit + '" onfocus="backmini()"> <i class = "fas fa-expand"> </i> </button>';
                        $('#mini' + data.id_penyakit).html(mini);
                    }, 100);
                }
            });

            $.ajax({
                url: '/admin/penyakit/allgejala',
                data: 'data=' + data_id,
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    setTimeout(function() {
                        var no = 1;
                        datagejala = ""
                        data.forEach(function(alldata) {
                            datagejala += no++ + '.' + alldata.nama_gejala + '<br>';
                        });
                        $('#gejala' + data_id).html(datagejala)
                    }, 170);
                }
            });
        })
    };
</script>
<script>
    function backmini() {
        $('.backmini').on('click', function() {
            const id = $(this).data('id');
            var data_id = id;
            $.ajax({
                url: '/admin/penyakit/autodata',
                data: 'data=' + data_id,
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);

                    desk = ""
                    desk += '<div class="widget-user-image"><img class="float-left mr-3" style="object-fit:cover; width: 200px; height: 130px; border: 50px;" src="<?= base_url(); ?>/assets/img/' + data.foto + '" alt="depresi"></div><div>' + data.desk + '</div>';
                    $('#reply' + data.id_penyakit).html(desk);

                    mini = ""
                    mini += '<a href="/admin/penyakit/' + data.id_penyakit + '"> <button type = "button"class = "btn btn-tool" ><i class = "fas fa-pen" > </i> </button> </a><button type="button" class="btn btn-tool reply" data-card-widget="maximize" data-id="' + data.id_penyakit + '" onfocus="sendingReply()"> <i class = "fas fa-expand"> </i> </button>';
                    $('#mini' + data.id_penyakit).html(mini);
                }
            });
        })
    };
</script>

<?= $this->endSection(); ?>