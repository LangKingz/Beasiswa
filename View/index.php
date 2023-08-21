<?php
// mengambil data dari database
require '../koneksi/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM daftar join anggota on daftar.id_anggota = anggota.id_anggota")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Style/table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php
    include '../component/NavbarMain.php';
    ?>
    <main>
        <div class="tables">
            <div class="title">
                <h1>Data Pendaftaran</h1>
            </div>
            <table class="display" id="example" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor Hp</th>
                        <th>Semester</th>
                        <th>Beasiswa</th>
                        <th>Berkas</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- isi -->
                    <!-- perulangan  -->
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($data)) :  ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['nomorhp']; ?></td>
                            <td><?php echo $row['semester']; ?></td>
                            <td><?php echo $row['beasiswa']; ?></td>
                            <td><img src="img/<?php echo $row['uploud']; ?>" width="50" /></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor Hp</th>
                        <th>Semester</th>
                        <th>Beasiswa</th>
                        <th>Berkas</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="grafik">
            <div class="title">
                <h1>Grafik Pendaftar</h1>
            </div>
            <div class="">
                <canvas id="myChart"></canvas>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // grafik
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['akademik', 'non-akademik'],
                datasets: [{
                    label: 'Data',
                    data: [<?php $akademik = mysqli_query($koneksi, "SELECT * FROM daftar WHERE beasiswa = 'akademik'");
                            echo mysqli_num_rows($akademik); ?>,
                        <?php $nonakademik = mysqli_query($koneksi, "SELECT * FROM daftar WHERE beasiswa = 'non-akademik'");
                        echo mysqli_num_rows($nonakademik);
                        ?>

                    ],
                    backGroundColor: [
                        '#094067',
                        '#EF4565',
                        
                    ],
                    borderColor: [
                        '#094067',
                        '#EF4565'

                    ],

                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="../script/datatables.js"></script>
</body>

</html>