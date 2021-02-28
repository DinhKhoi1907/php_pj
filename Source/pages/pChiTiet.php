<?php
require_once "libData/DataSource.php";
$db_handle = new DataSource();

if (isset($_SESSION["MaTaiKhoan"])) {
    $idUser = $_SESSION["MaTaiKhoan"];
} else {
    $idUser = null;
}
$queryLike = "SELECT * FROM yeuthichsanpham JOIN sanpham ON yeuthichsanpham.id_sanpham = sanpham.MaSanPham and yeuthichsanpham.id_user = '$idUser' ORDER BY yeuthichsanpham.id_sanpham ASC";

$whish_array = $db_handle->select($queryLike);
$whish_array_pid = array();
if (!empty($whish_array)) {
    foreach ($whish_array as $z => $value) {
        $whish_array_pid[] = $whish_array[$z]['id_sanpham'];
    }
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $_SESSION["id_sanpham"] = $id;
} else {
    DataProvider::ChangeURL("index.php?a=404");
}

/* So luot yeu thich */
$querySoLuotLike = "SELECT COUNT(id_user) as soluotyeuthich FROM yeuthichsanpham, sanpham WHERE yeuthichsanpham.id_sanpham = sanpham.MaSanPham and yeuthichsanpham.id_sanpham = '$id'";

$soLuotLike = $db_handle->select($querySoLuotLike);
$soluotthich = 0;
if (!empty($soLuotLike)) {
    foreach ($soLuotLike as $z => $value) {
        $soluotthich =  $soLuotLike[$z]["soluotyeuthich"];
    }
} else {
    $soluotthich = 0;
}

/* Ket thúc */

$sql = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaSanPham = $id";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);

$SoLuocXem = $row["SoLuocXem"] + 1;
$sql = "UPDATE SanPham SET SoLuocXem = $SoLuocXem
            WHERE MaSanPham = $id";
DataProvider::ExecuteQuery($sql);
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <img src="images/<?php echo $row["HinhURL"]; ?>.jpg" alt="<?php echo $row["TenSanPham"]; ?>" class="w-100">
        </div>

        <div class="col-6">
            <div>
                <span class="productname"><?php echo $row["TenSanPham"]; ?></span>
            </div>
            <div>
                <span class="label"> Giá: </span>
                <span class="price"><?php echo $row["GiaSanPham"]; ?>đ</span>
            </div>
            <div>
                <span class="label">Loại sản phẩm:</span>
                <?php
                $sql = "SELECT TenChiTietLoaiSanPham FROM chitietloaisanpham WHERE BiXoa = 0 AND MaChiTietLoaiSanPham = " . $row["MaChiTietLoaiSanPham"];
                $result = DataProvider::ExecuteQuery($sql);
                $rowz = mysqli_fetch_array($result);
                ?>
                <span class="data"><?php echo $rowz["TenChiTietLoaiSanPham"]; ?></span>
            </div>
            <div>
                <span class="label">Hãng sản xuất:</span>
                <?php
                $sql = "SELECT TenHangSanXuat FROM hangsanxuat WHERE BiXoa = 0 AND MaHangSanXuat = " . $row["MaHangSanXuat"];
                $result = DataProvider::ExecuteQuery($sql);
                $rowz = mysqli_fetch_array($result);
                ?>
                <span class="data"><?php echo $rowz["TenHangSanXuat"]; ?></span>
            </div>
            <div>
                <span class="label">Số lượng tồn:</span>
                <span class="data"><?php echo $row["SoLuongTon"] ?></span>
            </div>
            <div>
                <span class="label">Số lượt yêu thích:</span>
                <span class="data"><?php echo $soluotthich ?> lượt</span>
            </div>
            <div>
                <span class="info"><?php echo $row["MoTa"]; ?></span>
            </div>
            <div class="giohang">
                <?php
                if (isset($_SESSION["MaTaiKhoan"])) {

                ?>
                    <a href="index.php?a=5&id=<?php echo $row["MaSanPham"]; ?>" class="text-decoration-none text-white">
                        <div class="user-foot text-center">
                            <button type="submit" class="btn-pink" id="btnsignin">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                    </a>
                <?php
                } else {
                ?>
                    <a href="index.php?a=6&sub=1" class="text-decoration-none"><span class="text-danger">ĐĂNG NHẬP ĐỂ CÓ THỂ
                            MUA SẢN PHẨM</span></a>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="col-4">
            <img src="images/<?php echo $row["HinhURL"]; ?>1.jpg" alt="<?php echo $row["TenSanPham"]; ?>" class="w-100">
        </div>
        <div class="col-4">
            <img src="images/<?php echo $row["HinhURL"]; ?>2.jpg" alt="<?php echo $row["TenSanPham"]; ?>" class="w-100">
        </div>
    </div>
</div>
<div class="container">
    <div class="title">
        <a href="#" class="h2">Sản phẩm cùng loại</a>
    </div>
    <div class="row">
        <?php
        $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaChiTietLoaiSanPham = " . $row["MaChiTietLoaiSanPham"] . " ORDER BY SoLuocXem DESC LiMIT 0, 5";
        $product_array = $db_handle->select($sql);
        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
        ?>
                <div class="col-3">
                    <div class="card product-item">
                        <img class="card-img-top" src="images/<?php echo $product_array[$key]["HinhURL"] ?>.jpg" alt="<?php echo $product_array[$key]["MoTa"]; ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $product_array[$key]["TenSanPham"]; ?></h4>
                            <p class="card-text"><b>Giá: <span class="text-danger"><?php echo $product_array[$key]["GiaSanPham"]; ?>đ</span></b></p>
                            <a href="index.php?a=8&id=<?php echo $product_array[$key]["MaSanPham"]; ?>" class="btn btn-primary">CHI TIẾT</a>
                            <?php if (in_array($product_array[$key]["MaSanPham"], $whish_array_pid)) { ?>

                                <span data-pid="<?php echo $product_array[$key]["MaSanPham"]; ?>" class="heart" onclick="removeFromWishlist(this)" title="Remove from wishlist"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart color-filled">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg><img src="images/loading.gif" id="loader">
                                </span>
                                <span style="padding-left: 25px; color:gold; font-weight: bold">Yêu thích</span>
                            <?php } else { ?>

                                <span data-pid="<?php echo $product_array[$key]["MaSanPham"]; ?>" class="heart" onclick="addToWishlist(this)" title="Add to wishlist"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg><img src="images/loading.gif" id="loader">
                                </span>
                                <span style="padding-left: 25px; color:gold; font-weight: bold">Yêu thích</ơ>
                                <?php } ?>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="title">
        <a href="#" class="h2">Bình luận sản phẩm</a>
    </div>
</div>

<!-- AJAX SẢN PHẨM -->
<html>

<head>
    <style>
        .comment-form-container {
            background: #F0F0F0;
            border: #e0dfdf 1px solid;
            padding: 20px;
            border-radius: 2px;
        }

        .input-row {
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            border-radius: 2px;
            padding: 10px;
            border: #e0dfdf 1px solid;
        }

        .btn-submit {
            padding: 10px 20px;
            background: #333;
            border: #1d1d1d 1px solid;
            color: #f0f0f0;
            font-size: 0.9em;
            width: 100px;
            border-radius: 2px;
            cursor: pointer;
        }

        ul {
            list-style-type: none;
        }

        .comment-row {
            border-bottom: #e0dfdf 1px solid;
            margin-bottom: 15px;
            padding: 15px;
        }

        .outer-comment {
            background: #F0F0F0;
            padding: 20px;
            border: #dedddd 1px solid;
        }

        span.commet-row-label {
            font-style: italic;
        }

        span.posted-by {
            color: #09F;
        }

        .comment-info {
            font-size: 0.8em;
        }

        .comment-text {
            margin: 10px 0px;
        }

        .btn-reply {
            font-size: 0.8em;
            text-decoration: underline;
            color: #888787;
            background-color: lightblue;
            cursor: pointer;
        }

        #comment-message {
            margin-left: 20px;
            color: #189a18;
            display: none;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION["MaTaiKhoan"])) { ?>
        <div class="container">
            <div class="comment-form-container">
                <form id="frm-comment">
                    <div class="input-row">
                        <input type="hidden" name="comment_id" id="commentId" placeholder="Name" />
                    </div>
                    <div class="input-row">
                        <textarea class="input-field" type="text" name="comment" id="comment" placeholder="Add a Comment">  </textarea>
                    </div>
                    <div>
                        <input type="button" class="btn-submit" id="submitButton" value="Publish" />
                        <div id="comment-message">Comments Added Successfully!</div>
                    </div>

                </form>
            </div>
            <div id="output"></div>
            <script>
                function postReply(commentId) {
                    $('#commentId').val(commentId);
                    document.getElementById("comment").focus();
                }

                $("#submitButton").click(function() {
                    $("#comment-message").css('display', 'none');
                    var str = $("#frm-comment").serialize();

                    $.ajax({
                        url: "ajax-endpoint/comment-add.php",
                        data: str,
                        type: 'post',
                        success: function(response) {
                            var result = eval('(' + response + ')');
                            if (response) {
                                $("#comment-message").css('display', 'inline-block');
                                $("#comment").val("");
                                $("#commentId").val("");
                                listComment();
                            } else {
                                alert("Failed to add comments !");
                                return false;
                            }
                        }
                    });
                });

                $(document).ready(function() {
                    listComment();
                });

                function listComment() {
                    $.post("ajax-endpoint/comment-list.php",
                        function(data) {
                            var data = JSON.parse(data);
                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-comment'>");
                            var item = $("<li>").html(comments);

                            for (var i = 0;
                                (i < data.length); i++) {
                                var commentId = data[i]['id_comment'];
                                parent = data[i]['id_parent_comment'];

                                if (parent == "0") {
                                    comments = "<div class='comment-row'>" +
                                        "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['name_comment'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +
                                        "<div class='comment-text'>" + data[i]['comment'] + "</div>" +
                                        "<div><a id='favt_edit' class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>" +
                                        "</div>";

                                    var item = $("<li>").html(comments);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
                }

                function listReplies(commentId, data, list) {
                    for (var i = 0;
                        (i < data.length); i++) {
                        if (commentId == data[i].id_parent_comment) {
                            var comments = "<div class='comment-row'>" +
                                " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['name_comment'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +
                                "<div class='comment-text'>" + data[i]['comment'] + "</div>" +
                                "<div><a id='favt_edit' class='btn-reply' onClick='postReply(" + data[i]['id_comment'] + ")'>Reply</a></div>" +
                                "</div>";
                            var item = $("<li>").html(comments);
                            var reply_list = $('<ul>');
                            list.append(item);
                            item.append(reply_list);
                            listReplies(data[i].id_comment, data, reply_list);
                        }
                    }
                }
            </script>
        </div>

    <?php } else { ?>
        <div class="container">
            <div id="output"></div>
            <script>
                function postReply(commentId) {
                    $('#commentId').val(commentId);
                    document.getElementById("comment").focus();
                }

                $("#submitButton").click(function() {
                    $("#comment-message").css('display', 'none');
                    var str = $("#frm-comment").serialize();

                    $.ajax({
                        url: "ajax-endpoint/comment-add.php",
                        data: str,
                        type: 'post',
                        success: function(response) {
                            var result = eval('(' + response + ')');
                            if (response) {
                                $("#comment-message").css('display', 'inline-block');
                                $("#comment").val("");
                                $("#commentId").val("");
                                listComment();
                            } else {
                                alert("Failed to add comments !");
                                return false;
                            }
                        }
                    });
                });

                $(document).ready(function() {
                    listComment();
                });

                function listComment() {
                    $.post("ajax-endpoint/comment-list.php",
                        function(data) {
                            var data = JSON.parse(data);
                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-comment'>");
                            var item = $("<li>").html(comments);

                            for (var i = 0;
                                (i < data.length); i++) {
                                var commentId = data[i]['id_comment'];
                                parent = data[i]['id_parent_comment'];

                                if (parent == "0") {
                                    comments = "<div class='comment-row'>" +
                                        "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['name_comment'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +
                                        "<div class='comment-text'>" + data[i]['comment'] + "</div>" +
                                        "<div><a id='favt_edit' class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>" +
                                        "</div>";

                                    var item = $("<li>").html(comments);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
                }

                function listReplies(commentId, data, list) {
                    for (var i = 0;
                        (i < data.length); i++) {
                        if (commentId == data[i].id_parent_comment) {
                            var comments = "<div class='comment-row'>" +
                                " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['name_comment'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +
                                "<div class='comment-text'>" + data[i]['comment'] + "</div>" +
                                "<div><a id='favt_edit' class='btn-reply' onClick='postReply(" + data[i]['id_comment'] + ")'>Reply</a></div>" +
                                "</div>";
                            var item = $("<li>").html(comments);
                            var reply_list = $('<ul>');
                            list.append(item);
                            item.append(reply_list);
                            listReplies(data[i].id_comment, data, reply_list);
                        }
                    }
                }
            </script>
        </div>
    <?php    } ?>
</body>

</html>