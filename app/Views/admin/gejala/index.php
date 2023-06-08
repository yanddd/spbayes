<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Gejala</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">List Gejala</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <div class="container-fluid col-11">
            <!-- Small boxes (Stat box) -->
            <div class="row-12">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List Gejala</h3>

                            <div class="card-tools">

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="formubah" onsubmit="return formubahg()">
                                <div id="reload">
                                    <?php foreach ($gejala as $g) : ?>

                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend col" id="list<?= $g['id_gejala']; ?>">
                                                <span class="input-group-text"><?= $g['id_gejala']; ?></span>

                                                <input type="text" class="form-control" placeholder="<?= $g['nama_gejala']; ?>" disabled>

                                            </div>
                                            <div class="input-group-prepend" id="listB<?= $g['id_gejala']; ?>">
                                                <form action="">
                                                    <button type="button" style="border-radius: 5pt;" class="btn btn-block btn-warning listg" data-id="<?= $g['id_gejala']; ?>" onfocus="editgejala()"><i class="fas fa-pen text-white"></i></button>
                                                </form>
                                                <form action="">
                                                    <button type="button" class="btn btn-block btn-danger deleteg" data-id="<?= $g['id_gejala']; ?>" onfocus="deletegejala()"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>

                                        </div>
                                    <?php endforeach; ?>
                            </form>
                        </div>
                        <form id="formtambah" onsubmit="return tambahsgejala()">
                            <div class="tambahgejala" id="inputbaru">

                            </div>
                            <div id="tombolsavess">

                            </div>
                        </form>
                        <div class="input-group mt-2" style="display: flex; justify-content: center;">
                            <form action="">
                                <button type="button" class="btn btn-block btn-primary tambahg savess" onfocus="tambah()"><i class="fas fa-plus"></i></button>
                            </form>

                        </div>

                    </div>


                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
</div><!-- /.container-fluid -->

</section>
</div>

<!-- <script>
    function tambahgejala() {
        $('.tambahg').on('click', function() {
            // console.log('test');
            document.getElementById("gejalabaru").innerHTML = '<div class="input-group mb-1"><div class="input-group-prepend col" id=""><input type="text" class="form-control" autofocus placeholder="Input nama gejala"></div><div class="input-group-prepend" id=""><form action=""><button type="button" class="btn btn-block btn-danger" data-id="" onfocus=""><i class="fas fa-trash"></i></button></form></div></div>';
        })
    }
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var wrapper = $(".tambahgejala");
        var add_button = $(".tambahg");
        count = 0

        $(add_button).click(function(e) {
            e.preventDefault();
            $(wrapper).append('<div class="input-group mb-1"><div class="input-group-prepend col" id=""><input type="text" class="form-control" placeholder="Input nama gejala" id="newgejala[]" name="newgejala[]" required></div><a href="#" class="btn btn-danger delete"><i class="fas fa-trash"></i></a></div>');
            count++
        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent().remove();
            count--
            if (count < 1) {
                $('#tombolsavess').html('');
            }
        })

    });
</script>

<script>
    function tambah() {
        $('.savess').on('click', function() {
            document.getElementById("tombolsavess").innerHTML = '<button type="submit" class="btn btn-block btn-success col-1 mt-2 mb-2 float-right tambahs">Save</button>'
        })
    };
</script>

<script>
    function tambahsgejala() {
        var form = document.getElementById("formtambah");
        var data = new FormData(form)

        fetch("/admin/gejala/autosave", {
            method: "post",
            body: data,
        })

        setTimeout(function() {
            $.ajax({
                url: '/admin/gejala/autoallgejala',
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    datagejala = "";
                    data.forEach(function(alldata) {
                        datagejala += '<div class="input-group mb-1"><div class = "input-group-prepend col" id = "list' + alldata.id_gejala + '"><span class = "input-group-text">' + alldata.id_gejala + '</span><input type = "text" class = "form-control" placeholder = "' + alldata.nama_gejala + '" disabled></div> <div class = "input-group-prepend" id = "listB' + alldata.id_gejala + '"><form action = ""><button type = "button" style="border-radius: 5pt;" class = "btn btn-block btn-warning listg" data-id = "' + alldata.id_gejala + '" onfocus ="editgejala()"><i class = "fas fa-pen text-white"></i></button></form><form action = ""><button type = "button" class = "btn btn-block btn-danger deleteg" data-id = "' + alldata.id_gejala + '" onfocus = "deletegejala()"><i class = "fas fa-trash"></i></button></form></div></div>';
                    });
                    $('#reload').html(datagejala)
                    $('#inputbaru').html('')
                    $('#tombolsavess').html('')
                }
            });
            Swal.fire(
                'Berhasil!',
                'Data gejala berhasil ditambah',
                'success'
            )
        }, 100);

        return false;
    }
</script>

<script>
    function editgejala() {
        $('.listg').on('click', function() {
            const id = $(this).data('id');
            var data_id = id;
            $.ajax({
                url: '/admin/gejala/autodata',
                data: 'data=' + data_id,
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    document.getElementById("list" + data_id).innerHTML = '<span class="input-group-text">' + data.id_gejala + '</span><input type="hidden" id="id_gejala" name="id_gejala" value="' + data_id + '"><input type="text" class="form-control" id="nama_gejala" name="nama_gejala" value="' + data.nama_gejala + '" autofocus required>';
                    document.getElementById("listB" + data_id).innerHTML = '<form action=""><button type="submit" class="btn btn-block btn-success" style="border-radius: 5pt;" data-id="' + data.id_gejala + '"><i class="fas fa-check"></i></button></form><form action=""><button type="button" class = "btn btn-block btn-danger closeg" data-id="' + data.id_gejala + '" onfocus="closegejala()"><i class = "fas fa-times fa-lg"></i></button></form>';
                }
            });
        })
    };
</script>

<script>
    function formubahg() {
        const data_id = $("#id_gejala").val();
        var nama = $("#nama_gejala").val();
        dataAll = data_id + '.' + nama;
        var form = document.getElementById("formubah");
        var data = new FormData(form)
        // console.log(data_id);
        $.ajax({
            url: '/admin/gejala/autodata',
            data: 'data=' + data_id,
            method: 'post',
            dataType: 'json',
            success: function(cekdata) {
                if (cekdata.nama_gejala == nama) {
                    document.getElementById("list" + data_id).innerHTML = '<span class="input-group-text">' + cekdata.id_gejala + '</span><input type="text" class="form-control" placeholder="' + cekdata.nama_gejala + '" disabled>';
                    document.getElementById("listB" + data_id).innerHTML = '<form action=""><button type="button" style="border-radius: 5pt;" class="btn btn-block btn-warning listg" data-id="' + cekdata.id_gejala + '" onfocus="editgejala()"><i class="fas fa-pen text-white"></i></button></form><form action=""><button type = "button" class = "btn btn-block btn-danger deleteg" data-id="' + cekdata.id_gejala + '" onfocus="deletegejala()"><i class = "fas fa-trash"></i></button ></form>';
                    Swal.fire({
                        icon: 'question',
                        title: 'Hmmm...??',
                        text: 'Tidak ada data yang diubah',
                    })
                } else if (cekdata.nama_gejala != nama) {
                    fetch("/admin/gejala/autoupdate", {
                        method: "post",
                        body: data,
                    });
                    setTimeout(function() {
                        $.ajax({
                            url: '/admin/gejala/autodata',
                            data: 'data=' + data_id,
                            method: 'post',
                            dataType: 'json',
                            success: function(data) {
                                // console.log(data);
                                document.getElementById("list" + data_id).innerHTML = '<span class="input-group-text">' + data.id_gejala + '</span><input type="text" class="form-control" placeholder="' + data.nama_gejala + '" disabled>';
                                document.getElementById("listB" + data_id).innerHTML = '<form action=""><button type="button" style="border-radius: 5pt;" class="btn btn-block btn-warning listg" data-id="' + data.id_gejala + '" onfocus="editgejala()"><i class="fas fa-pen text-white"></i></button></form><form action=""><button type = "button" class = "btn btn-block btn-danger deleteg" data-id="' + data.id_gejala + '" onfocus="deletegejala()"><i class = "fas fa-trash"></i></button ></form>';
                            }
                        });
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil...',
                            text: 'Data gejala berhasil diubah',
                        })
                    }, 100);

                }
            }
        });

        return false;
    }
</script>

<script>
    function closegejala() {
        $('.closeg').on('click', function() {
            const id = $(this).data('id');
            var data_id = id;
            $.ajax({
                url: '/admin/gejala/autodata',
                data: 'data=' + data_id,
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    document.getElementById("list" + data_id).innerHTML = '<span class="input-group-text">' + data.id_gejala + '</span><input type="text" class="form-control" placeholder="' + data.nama_gejala + '" disabled>';
                    document.getElementById("listB" + data_id).innerHTML = '<form action=""><button style="border-radius: 5pt;" type="button" class="btn btn-block btn-warning listg" data-id="' + data.id_gejala + '" onfocus="editgejala()"><i class="fas fa-pen text-white"></i></button></form><form action=""><button type = "button" class = "btn btn-block btn-danger deleteg" data-id="' + data.id_gejala + '" onfocus="deletegejala()"><i class = "fas fa-trash"></i></button ></form>';
                }
            });
        })
    };
</script>

<script>
    function deletegejala() {
        $('.deleteg').on('click', function() {
            const data_id = $(this).data('id');
            Swal.fire({
                title: 'Yakin ingin menghapus data?',
                text: "Data gejala akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: '/admin/gejala/autodelete',
                        data: 'data=' + data_id,
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                            if (data == false) {
                                Swal.fire(
                                    'Gagal dihapus!',
                                    'Gejala terdapat pada basis pengetahuan',
                                    'error'
                                )
                            } else {
                                setTimeout(function() {
                                    $.ajax({
                                        url: '/admin/gejala/autoallgejala',
                                        method: 'post',
                                        dataType: 'json',
                                        success: function(data) {
                                            datagejala = ""
                                            data.forEach(function(alldata) {
                                                datagejala += '<div class="input-group mb-1"> <div class = "input-group-prepend col" id = "list' + alldata.id_gejala + '"><span class = "input-group-text"> ' + alldata.id_gejala + ' </span> <input type = "text" class = "form-control" placeholder = "' + alldata.nama_gejala + '" disabled></div> <div class = "input-group-prepend" id = "listB' + alldata.id_gejala + '"><form action = ""><button style="border-radius: 5pt;" type = "button" class = "btn btn-block btn-warning listg" data-id = "' + alldata.id_gejala + '" onfocus ="editgejala()"> <i class = "fas fa-pen text-white"> </i></button></form> <form action = ""><button type = "button" class = "btn btn-block btn-danger deleteg" data-id = "' + alldata.id_gejala + '" onfocus = "deletegejala()"> <i class = "fas fa-trash"> </i></button ></form> </div></div>';
                                            });
                                            $('#reload').html(datagejala)
                                        }
                                    });
                                }, 100);
                                Swal.fire(
                                    'Terhapus!',
                                    'Data gejala berhasil dihapus',
                                    'success'
                                )
                            }
                        }
                    });
                }
            })
        })
    };
</script>

<?= $this->endSection(); ?>