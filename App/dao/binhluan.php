<?php
function addComment($content, $id_user, $id_pro)
{
    $sql = "INSERT INTO binhluan (id, noidung, iduser, idpro, ngaybinhluan) VALUES (Null, '$content', $id_user, $id_pro, NOW())";
    pdo_execute($sql);
}

function adminComment()
{
    $sql = "SELECT users.name, binhluan.id, binhluan.noidung, binhluan.ngaybinhluan, binhluan.trangthai FROM binhluan INNER JOIN users ON binhluan.iduser = users.id";
    return pdo_query($sql);
}

function fullComment($id_pro)
{
    $sql = "SELECT users.name, binhluan.ngaybinhluan, binhluan.noidung, binhluan.trangthai FROM binhluan INNER JOIN users ON binhluan.iduser = users.id WHERE binhluan.idpro = $id_pro";
    return pdo_query($sql);
}

function updateStatus($id_bl)
{
    $sql = "UPDATE binhluan SET trangthai = 1 WHERE id = $id_bl";
    pdo_execute($sql);
}

function delete_binhluan($id_bl){
    $sql = "DELETE FROM binhluan WHERE id=" . $id_bl;
    pdo_execute($sql);
}