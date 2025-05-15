<h1>Control Panel</h1>
<div class="row form_noidung">
    <div class="form_dsloai1">
<!-- SẢN PHẨM MỚI -->
<table>
    <tr><th>SẢN PHẨM MỚI</th></tr>
    <?php foreach ($sanpham_moinhat as $sp): ?>
        <tr><td><?= $sp['name'] ?></td></tr>
    <?php endforeach; ?>
</table>

<!-- SẢN PHẨM XEM NHIỀU -->
<table>
    <tr><th>SẢN PHẨM XEM NHIỀU</th></tr>
    <?php foreach ($sanpham_xemnhieu as $sp): ?>
        <tr><td><?= $sp['name'] ?> (<?= $sp['view'] ?> lượt xem)</td></tr>
    <?php endforeach; ?>
</table>

<!-- BÌNH LUẬN MỚI -->
<table>
    <tr><th>BÌNH LUẬN MỚI</th></tr>
    <?php foreach ($binhluan_moinhat as $bl): ?>
        <tr><td><?= $bl['noidung'] ?></td></tr>
    <?php endforeach; ?>
</table>

<!-- ĐƠN HÀNG MỚI -->
<table>
    <tr><th>ĐƠN HÀNG MỚI</th></tr>
    <?php foreach ($donhang_moinhat as $dh): ?>
        <tr><td><?= $dh['bill_name'] ?></td></tr>
    <?php endforeach; ?>
</table>
    </div>
</div>
