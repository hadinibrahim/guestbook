<!DOCTYPE html>
<html>
<head>
    <title>Form Buku Tamu</title>
</head>
<body>
    <h2>Form Buku Tamu</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('guestbook'); ?>
        <p>Nama:<br><input type="text" name="name"></p>
        <p>Email:<br><input type="text" name="email"></p>
        <p>Pesan:<br><textarea name="message"></textarea></p>
        <p><input type="submit" value="Kirim"></p>
    </form>
</body>
</html>
