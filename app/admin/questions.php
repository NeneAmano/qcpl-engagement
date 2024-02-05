<?php
    require_once('../core/init.php');
    ob_start();
    if(($user_role_id_session !== 1)) {
        header('location: login.php?error=accessdenied');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <?php
        require_once 'includes/sidebar.php';
    ?>
    <!-- start of main section container -->
    <div class="container-fluid mt-3">
        <!-- start of card -->
        <div class="card">
            <!-- start of card header -->
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="questions" href="questions.php">Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="question-type" href="question-type.php">Question Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="question-category" href="question-category.php">Question Category</a>
                    </li>
                </ul>
            </div>
            <!-- end of card header -->
            <!-- start of card body -->
            <div class="card-body d-flex flex-column">
                <div class="container-fluid">
                    <!-- start of add service modal button -->
                    <button type="button" class="btn btn-primary mb-3 mt-3 float-start" data-bs-toggle="modal" data-bs-target="#add_service_modal">Add Question</button>
                    <!-- end of add service modal button -->
                </div>
                <!-- start of first row -->
                <div class="row">
                    <!-- start of second container -->
                    <div class="container">
                        <!-- start of second row -->
                        <div class="row">
                            <!-- start of div on center -->
                            <div class="col-md-12">
                                <!-- start of table -->
                                <table class="table table-bordered table-striped" id="datatable">
                                    <!-- start of table header -->
                                    <thead>
                                        <tr>
                                            <th class="table-light text-uppercase text-center">question id</th>
                                            <th class="table-light text-uppercase d-none">question type id</th>
                                            <th class="table-light text-uppercase d-none">question category id</th>
                                            <th class="table-light text-uppercase text-center">question type</th>
                                            <th class="table-light text-uppercase text-center">question category</th>
                                            <th class="table-light text-uppercase text-center">english translation</th>
                                            <th class="table-light text-uppercase text-center">tagalog translation</th>
                                            <th class="table-light text-uppercase text-center">date added</th>
                                            <th class="table-light text-uppercase text-center">last updated</th>
                                            <th class="table-light text-uppercase text-center">action</th>
                                        </tr>
                                    </thead>
                                    <!-- end of table header -->
                                    <!-- start of table body -->
                                    <tbody>
                                    <?php
                                        $sql_select = "SELECT questions.*, question_type.question_type, question_category.question_category FROM question_category INNER JOIN questions USING (qc_id) INNER JOIN question_type USING (qt_id) WHERE questions.is_deleted != 1 ORDER BY questions.question_id DESC;";
                                        $result_select = mysqli_query($conn, $sql_select);
                                        if(mysqli_num_rows($result_select) > 0){
                                            while($row_select = mysqli_fetch_assoc($result_select)){
                                                $question_id = $row_select['question_id'];
                                                $qt_id = $row_select['qt_id'];
                                                $qc_id = $row_select['qc_id'];
                                                $question_type = $row_select['question_type'];
                                                $question_category = $row_select['question_category'];
                                                $english_question = $row_select['english_question'];
                                                $tagalog_question = $row_select['tagalog_question'];
                                                $created_at = $row_select['created_at'];
                                                $updated_at = $row_select['updated_at'];
                                    ?>
                                                <tr>
                                                    <td class="text-center"><?= $question_id ?></td>
                                                    <td class="text-center d-none"><?= $qt_id ?></td>
                                                    <td class="text-center d-none"><?= $qc_id ?></td>
                                                    <td class="text-center"><?= $question_type ?></td>
                                                    <td class="text-center"><?= $question_category ?></td>
                                                    <td class="text-center"><?= $english_question ?></td>
                                                    <td class="text-center"><?= $tagalog_question ?></td>
                                                    <td class="text-center"><?= $created_at ?></td>
                                                    <td class="text-center"><?= $updated_at ?></td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-primary view" href="#" data-bs-toggle="modal" data-bs-target="#view_service_modal"><i class="fa-solid fa-eye"></i></a> 
                                                        <a class="btn btn-sm btn-success edit" href="#" data-bs-toggle="modal" data-bs-target="#edit_service_modal"><i class="fa-solid fa-pen-to-square"></i></a>  
                                                        <a class="btn btn-sm btn-danger delete" href="#" data-bs-toggle="modal" data-bs-target="#delete_service_modal"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <tr>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="" class="text-center d-none"></td>
                                            <td colspan="9" class="text-center">No records found.</td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                    <!-- end of table body -->
                                </table>
                                <!-- end of table -->
                            </div>
                            <!-- end of div on center -->
                        </div>
                        <!-- end of second row -->
                    </div>
                    <!-- end of second container -->
                </div>
                <!-- end of first row -->
            </div>
            <!-- end of card body -->
        </div>
        <!-- end of card -->
    </div>
    <!-- end of main section container -->
</div>
<!-- end of main container -->
<?php
    require_once 'js/scripts.php';
?>
    <script src="js/question-scripts.js"></script>
</body>
</html>