<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

    <style>
        .hapus {
            padding: 2px 10px 2px 10px;
            color: white;
            font-size: 15px;
        }

        .edit {
            padding: 2px 10px 2px 10px;
            margin-right: 10px;
            color: white;
            font-size: 15px;
        }

        .create {
            margin-top: 15px;
            margin-left: 15px;
            margin-bottom: 15px;
        }

        .for-all {
            margin: 1.5rem;
        }

        @media (max-width: 600px) {
            .for-all {
                margin: 1rem;
            }

            .edit {
                margin-left: 4.5em;
                color: white;
                font-size: 16px;
                width: 3.5em;

            }

            .hapus {
                width: 4.5em;
                padding: 2px 10px 2px 10px;
                font-size: 16px;

                position: relative;
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                            <div class="card-header">Data Guru
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">

                                        <a href="<?php echo base_url('admin/tambah_guru/') ?>"
                                            class="btn-wide btn btn-success">Create</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col" class="">Nama Guru</th>
                                            <th scope="col" class="text-center">NIK</th>
                                            <th scope="col" class="text-center">Gender</th>
                                            <th scope="col" class="text-center">Nama Mapel</th>

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
                                                    <?php echo $row->nama_guru; ?>
                                                </td>

                                                <td data-cell="NIK" class="text-center">
                                                    <?php echo $row->nik; ?>
                                                </td>
                                                <td data-cell="Gender" class="text-center">
                                                    <div class="badge badge-warning">
                                                        <?php echo $row->gender; ?>
                                                    </div>
                                                </td>
                                                <td data-cell="Mapel" class="text-center">
                                                    <div >
                                                        <?php echo $row->mapel; ?>
                                                    </div>
                                                </td>

                                                <td data-cell="Aksi" class="text-center aksi">
                                                    <a href="<?php echo base_url('admin/update_guru/') . $row->id_guru ?>"
                                                        type="button" id="PopoverCustomT-1"
                                                        class="btn btn-primary btn-sm edit">Update</a>
                                                    <button onclick="hapus(<?php echo $row->id_guru ?>)" type="button"
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
                    Swal.fire({
                        title: 'Confirm delete',
                        text: 'You want to delete?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo base_url(
                                'admin/hapus_guru/'
                            ); ?>" + id;
                        }
                    });
                }
            </script>
</body>

</html>