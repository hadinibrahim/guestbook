<!DOCTYPE html>
<html>

<head>
    <title>Admin - Buku Tamu</title>
    <style>
        body {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Daftar Pesan Buku Tamu</h2>

    <form method="get" action="">
        <label>Dari Tanggal:</label>
        <input type="date" name="start_date" value="<?= $start_date ?>">
        <label>Sampai Tanggal:</label>
        <input type="date" name="end_date" value="<?= $end_date ?>">
        <button type="submit">Filter</button>
        <button type="submit" name="export" value="1">Ekspor CSV</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($guests)): ?>
                <?php foreach ($guests as $guest): ?>
                    <tr>
                        <td><?= htmlspecialchars($guest->name) ?></td>
                        <td><?= htmlspecialchars($guest->email) ?></td>
                        <td><?= nl2br(htmlspecialchars($guest->message)) ?></td>
                        <td><?= $guest->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Belum ada data tamu</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>