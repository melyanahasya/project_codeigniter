<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="app-main__outer">
        <?php foreach ($guru as $row): ?>

            <form action="<?php echo base_url('admin/aksi_ubah_guru') ?>" style="margin:25px" method="post" class="row">
                <input name="id_guru" type="hidden" value="<?php echo $row->id_guru ?>">
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label bold">Nama Guru</label>
                    <input value="<?php echo $row->nama_guru ?>" type="text" class="form-control" id="nama" name="nama"
                        aria-describedby="nama">
                </div>
                <div class="mb-3 col-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input value="<?php echo $row->nik ?>" type="text" class="form-control" id="nik" name="nik">
                </div>
                <div class="mb-3 col-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" class="form-select" aria-label="Default select example">
                        <option selected <?php echo $row->gender ?>>
                            <?php echo $row->gender ?>
                        </option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="mapel" class="form-label">Nama Mapel</label>
                    <input value="<?php echo $row->mapel ?>" type="text" class="form-control" id="mapel" name="mapel">
                </div>

                <button name="submit" type="submit" style="width:60px" class="btn btn-sm btn-success"
                    name="submit">Update</button>
            </form>
        <?php endforeach ?>
    </div>
</body>

</html>