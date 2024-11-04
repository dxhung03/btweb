<h2>Chỉnh sửa Banner</h2>
<form method="POST" action="index.php?action=edit_banner&id=<?= $banner['MaBanner'] ?>">
    <label>Tên Banner</label>
    <input type="text" name="name" value="<?= htmlspecialchars($banner['Name']) ?>" required>
    <label>Avatar</label>
    <input type="text" name="avatar" value="<?= htmlspecialchars($banner['Avatar']) ?>" required>
    <button type="submit">Cập nhật</button>
</form>
