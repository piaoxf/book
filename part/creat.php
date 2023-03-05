<?php
    require_once __DIR__ . '/../part/source.php';
    require_once __DIR__ . '/../part/navi.php';
    require_once __DIR__ . '/../part/header.php';
?>

<div class="container-sm">
    <!-- <form class="form-horizontal" method="POST" action="login_check.php"> -->
    <form class="form-horizontal" method="POST" action="part/login_check.php">
        <div class="form-group">

            <div class="row">
                <div class="text-center">
                    <img src="/book/images/title.png" class="rounded" alt="...">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>

            <hr>
            <div class="badge bg-primary text-wrap" style="width: 6rem;">読書の詳細</div>
            <br>
            
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="BookName" class="form-label">書籍名</label>
                    <input type="BookName" class="form-control" id="BookName" name="BookName">
                </div>

                <div class="col-md-4">
                    <label for="author" class="form-label">作者</label>
                    <input type="author" class="form-control" id="author" name="author">
                </div>
                <div class="col-md-2">
                    <label for="dataList" class="form-label">タイプ</label>
                    <!-- <input class="form-control" list="datalistOptions" id="dataList" placeholder="Type to search..."> -->
                    <select class="form-select" aria-label="Default select example">
                        <option value="コンピューター・IT">コンピューター・IT</option>
                        <option value="社会・政治">社会・政治</option>
                        <option value="ビジネス・経済">ビジネス・経済</option>
                        <option value="小説">小説</option>
                        <option value="漫画">漫画</option>
                        <option value="雑誌">雑誌</option>
                    </select>
                </div>
            </div>
            <br>

            <br>
            <div class="col">
                <label for="coment" class="form-label">感想</label>
                <textarea class="form-control" id="coment" rows="3"></textarea>
            </div>

        </div>
    </form>
</div>
