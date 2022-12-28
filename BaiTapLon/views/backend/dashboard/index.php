<?php require_once('../views/backend/header.php'); ?>



<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tất cả Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tất cả Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-md-12 text-right">

                        <a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=trash">
                            <i class="fas fa-trash"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php include_once('../views/backend/messageAlert.php');?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="accordion" id="accordionExample">
                            <div class="card possition">
                                <div class="card-body" id="headingPosition">
                                    <label>Vị trí Menu</label>
                                    <select name="position" class="form-control">
                                        <option value="mainmenu">Main Menu</option>
                                        <option value="footermenu">Footer Menu</option>
                                    </select>
                                </div>

                            </div>
                            <!--end card possition-->
                            <div class="card">
                                <div class="card-header" id="headingCategory">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseCategory" aria-expanded="false"
                                            aria-controls="collapseCategory">
                                            Danh mục sản phẩm
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?php foreach ($list_category as $category) :?>
                                        <div class="form-check">
                                            <input name="categoryId[]" class="form-check-input" type="checkbox"
                                                value="<?= $category->id ;?>" id="categoryCheck<?= $category->id ;?>">
                                            <label class="form-check-label" for="categoryCheck<?= $category->id ;?>">
                                                <?= $category->name ;?>
                                            </label>
                                        </div>
                                        <?php endforeach ;?>
                                        <div class="mb-3">
                                            <input name="THEMCATEGORY" type="submit" value="Thêm Menu"
                                                class="btn btn-sm btn-success form-control">

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end card category-->
                            <div class="card">
                                <div class="card-header" id="headingBrand">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseBrand" aria-expanded="false"
                                            aria-controls="collapseBrand">
                                            Thương hiệu
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?php foreach ($list_brand as $brand) :?>
                                        <div class="form-check">
                                            <input name="brandId[]" class="form-check-input" type="checkbox"
                                                value="<?= $brand->id ;?>" id="brandCheck<?= $brand->id ;?>">
                                            <label class="form-check-label" for="brandCheck<?= $brand->id ;?>">
                                                <?= $brand->name ;?>
                                            </label>
                                        </div>
                                        <?php endforeach ;?>
                                        <div class="mb-3">
                                            <input name="THEMBRAND" type="submit" value="Thêm Menu"
                                                class="btn btn-sm btn-success form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card brand-->
                            <div class="card">
                                <div class="card-header" id="headingTopic">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTopic" aria-expanded="false"
                                            aria-controls="collapseTopic">
                                            Chủ đề
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <?php foreach ($list_topic as $topic) :?>
                                            <div class="form-check">
                                                <input name="topicId[]" class="form-check-input" type="checkbox"
                                                    value="<?= $topic->id ;?>" id="topicCheck<?= $topic->id ;?>">
                                                <label class="form-check-label" for="topicCheck<?= $topic->id ;?>">
                                                    <?= $topic->name ;?>
                                                </label>
                                            </div>
                                            <?php endforeach ;?>
                                        </div>
                                        <div class="mb-3">
                                            <input name="THEMTOPIC" type="submit" value="Thêm Menu"
                                                class="btn btn-sm btn-success form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card topic-->
                            <div class="card">
                                <div class="card-header" id="headingPage">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapsePage" aria-expanded="false"
                                            aria-controls="collapsePage">
                                            Trang đơn
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <?php foreach ($list_page as $page) :?>
                                            <div class="form-check">
                                                <input name="pageId[]" class="form-check-input" type="checkbox"
                                                    value="<?= $page->id ;?>" id="pageCheck<?= $page->id ;?>">
                                                <label class="form-check-label" for="pageCheck<?= $page->id ;?>">
                                                    <?= $page->title ;?>
                                                </label>
                                            </div>
                                            <?php endforeach ;?>
                                        </div>
                                        <div class="mb-3">
                                            <input name="THEMPAGE" type="submit" value="Thêm Menu"
                                                class="btn btn-sm btn-success form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card page-->
                            <div class="card">
                                <div class="card-header" id="headingCustom">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseCustom" aria-expanded="false"
                                            aria-controls="collapseCustom">
                                            Tùy chỉnh liên kết
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label>Tên menu</label>
                                            <input type="text" name="name" class="form-control">

                                        </div>
                                        <div class="mb-3">
                                            <label>Liên kết</label>
                                            <input type="text" name="link" class="form-control">

                                        </div>
                                        <div class="mb-3">

                                            <input name="THEMCUSTOM" type="submit" value="Thêm Menu"
                                                class="btn btn-sm btn-success form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card Custommer-->

                        </div>

                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:20px">#</th>
                                    <th>Tên Menu</th>
                                    <th class="text-center" style="width:250px">Liên kết</th>
                                    <th class="text-center" style="width:160px">Ngày tạo</th>
                                    <th class="text-center" style="width:200px">Chức năng</th>
                                    <th class="text-center" style="width:20px">ID</th>
                                </tr>
                            </thead>
                            <tbody <?php foreach($list as $row):?> <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td>
                                    <?=$row['name']?>
                                </td>
                                <td class="text-center">
                                    <?=$row['link']?>
                                </td>
                                <td class="text-center">
                                    <?=$row['created_at']?>
                                </td>
                                <td class="text-center">
                                    <?php if($row['status']==1):?>

                                    <a class="btn btn-sm btn-success"
                                        href="index.php?option=menu&cat=status&id=<?=$row['id']?>">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>

                                    <?php else:?>

                                    <a class="btn btn-sm btn-danger"
                                        href="index.php?option=menu&cat=status&id=<?=$row['id']?>">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>

                                    <?php endif;?>
                                    <a class="btn btn-sm btn-primary"
                                        href="index.php?option=menu&cat=detail&id=<?=$row['id']?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-info"
                                        href="index.php?option=menu&cat=edit&id=<?=$row['id']?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger"
                                        href="index.php?option=menu&cat=delete&id=<?=$row['id']?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <?=$row['id']?>
                                </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</form>
<?php require_once('../views/backend/footer.php'); ?>

<?php require_once('../views/backend/footer.php'); ?>