<!DOCTYPE html>
<html>

<head>
    <title>Daftar Decision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff;
            /* Fallback color */
            background: linear-gradient(135deg, #6c8dff, #ffffff, #af60ff);
            color: #000;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body,
        html {
            height: 100%;
        }

        .navbar {
            background-color: #001f3f;
            border-bottom: 1px solid #001f3f;
            color: #fff;
            margin-bottom: 20px;
        }

        .navbar-brand,
        .nav-link {
            color: #000 !important;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        #content {
            background: linear-gradient(135deg, #6c8dff, #ffffff, #af60ff);
            color: #000;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .heading-section {
            background: linear-gradient(135deg, #4d94ff 0%, #0066cc 100%);
            color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            color: #000;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid rgba(0, 0, 0, 0.5);
        }

        th {
            background-color: #4d94ff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #e6f7ff;
        }

        .border-primary {
            border-color: #5c3c8b !important;
        }
    </style>
</head>

<body>

    <!-- Navbar Section Start -->
    <?php if (!isset($isPDF)) : ?>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom border-primary">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>
                </div>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?= base_url('/'); ?>" class="nav-link px-2 link-light">Home</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link link-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Fitur
                        </a>
                        <ul class="dropdown-menu carddd">
                            <li><a class="dropdown-item" href="<?= base_url('decision'); ?>">Decition</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('inventarisasi'); ?>">Inventarisasi</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('aparat'); ?>">aparat</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('tanah'); ?>">tanah</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('agendam'); ?>">Agenda Masuk</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('agendak'); ?>">Agenda Keluar</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="col-md-3 text-end">
                    <a href="<?= base_url(); ?>admin" role="button" class="btn btn-outline-primary me-2">Admin</a>
                </div>
            </header>
        </div>
    <?php endif; ?>
    <!-- Navbar Section END -->

    <section class="container mt-5 mb-5" id="content">
        <h1 style="text-align: center;" class="text-dark">Buku Keputusan camat/Lurah</h1>
        <?php if (!isset($isPDF)) : ?>
            <a href="<?= base_url('generate-pdf'); ?>" class="btn btn-primary mb-3">Create PDF</a>
        <?php endif; ?>

        <table>
            <tr>
                <th rowspan="2">No.</th>
                <th colspan="2">Tanggal dan Nomor Keputusan</th>
                <th rowspan="2">Tentang</th>
                <th rowspan="2">Uraian Singkat</th>
                <th colspan="2">Dilaporkan</th>
                <th rowspan="2">Keterangan</th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>Nomor</th>
                <th>Tanggal</th>
                <th>Nomor</th>
            </tr>
            <?php foreach ($decision as $i => $d) : ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <?php if (!isset($isPDF)) : ?>
                        <input type="hidden" <?= $d['No']; ?>>
                    <?php endif; ?>
                    <td><?= $d['Tanggal_Keputusan']; ?></td>
                    <td><?= $d['Nomor_Keputusan']; ?></td>
                    <td><?= $d['Tentang']; ?></td>
                    <td><?= $d['Uraian_Singkat']; ?></td>
                    <td><?= $d['Tanggal_Dilaporkan']; ?></td>
                    <td><?= $d['Nomor_Dilaporkan']; ?></td>
                    <td><?= $d['Keterangan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>