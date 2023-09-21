<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- cdn sweetalert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert2/sweetalert2.min.css'); ?>">

    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .hapus {
            color: white;
            font-size: 15px;
        }

        .edit {
            margin-right: 10px;
            color: white;
            font-size: 15px;
        }

        a {
            color: white;
        }

        .for-all {
            margin: 1.5rem;
        }

        @media (max-width: 600px) {


            .for-all {
                margin: 1rem;
            }

            .edit {
                color: white;
                font-size: 16px;
                width: 4.5em;

            }

            .aksi {
                display: flex;
                gap: 2rem;
            }

            .hapus {
                width: 5em;
                font-size: 16px;
            }

            tbody {
                text-align: left;
            }

            .option-select {
                font-size: 12px;
            }

            .td {
                padding-right: none;
                display: flex;
                justify-content: left;
            }

            .responsive-3 {
                width: 100%;
            }

            th {
                display: none;
            }

            td {
                display: grid;
                gap: 0.5rem;
                grid-template-columns: 15ch auto;
                padding: 0.75em 1rem;
            }

            td:first-child {
                padding-top: 2rem;
            }

            td::before {
                content: attr(data-cell) "  : ";
                font-weight: bold;
            }
        }
    </style>
</head>

<script src="<?php echo base_url('assets/sweetalert2/sweetalert2.min.js'); ?>"></script>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include('navbar.php'); ?>
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>

        </div>
        <div class="app-main">

            <?php include('sidebar.php'); ?>




            <div class="app-main__outer for-all">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">Data Siswa
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <a href="<?php echo base_url('admin/tambah_siswa/') ?>"
                                            class="btn-wide btn btn-success">Create</a>

                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col" class="">Nama Siswa</th>
                                            <th scope="col" class="text-center">Nisn</th>
                                            <th scope="col" class="text-center">Gender</th>
                                            <th scope="col" class="text-center">Tanggal Lahir</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($result as $row):
                                            $no++ ?>
                                            <tr>
                                                <td data-cell="No" class="text-center text-muted">
                                                    <?php echo $no ?>
                                                </td>
                                                <td data-cell="Nama" class="text-center text-muted">
                                                    <?php echo $row->nama_siswa; ?>
                                                </td>

                                                <td data-cell="Nisn" class="text-center">
                                                    <?php echo $row->nisn; ?>
                                                </td>
                                                <td data-cell="Gender" class="text-center">
                                                    <div class="badge badge-warning">
                                                        <?php echo $row->gender; ?>
                                                    </div>
                                                </td>
                                                <td data-cell="Tanggal Lahir" class="text-center">
                                                    <div class="">
                                                        <?php echo $row->tanggal_lahir; ?>
                                                    </div>
                                                </td>
                                                <td data-cell="Aksi" class="text-center aksi">
                                                    <a href="<?php echo base_url('admin/update_siswa/') . $row->id_siswa ?>"
                                                        type="button" id="PopoverCustomT-1"
                                                        class="btn btn-primary btn-sm edit">Update</a>
                                                    <button onclick="hapus(<?php echo $row->id_siswa ?>)" type="button"
                                                        id="PopoverCustomT-1"
                                                        class="btn btn-danger btn-sm hapus">Delete</button>
                                                </td>
                                            </tr>


                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-block text-center card-footer">

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <script>
                function hapus(id) {
                    var yes = confirm('yakin dihapus? ');
                    if (yes == true) {
                        window.location.href = "<?php echo base_url('admin/hapus_siswa/') ?>" + id;
                    }
                }
            </script>
</body>

</html>