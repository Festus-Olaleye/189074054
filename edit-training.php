<?php session_start() ?>
<?php include "db.php"; ?>
<?php
if (isset($_GET['edit_training'])) {
    $getid = $_GET['edit_training'];
    $edit_query = $pdo->prepare("SELECT * FROM training WHERE id='{$getid}'");
    $edit_query->execute();

    while ($row = $edit_query->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $date = $row['training_date'];
        $time = $row['training_time'];
        $participant = $row['no_of_participant'];
    }
}

if (isset($_POST["edit_training"])) {
    $name = $_POST['name'];
    $training_date = $_POST['training_date'];
    $training_time = $_POST['training_time'];
    $no_of_participant = $_POST['no_of_participant'];

    $addtraining = "UPDATE training SET name=:name, training_date=:training_date, training_time=:training_time, no_of_participant=:no_of_participant";
    $addtraining = $pdo->prepare($addtraining);
    $addtraining->bindValue(':name', $name);
    $addtraining->bindValue(':training_date', $training_date);
    $addtraining->bindValue(':training_time', $training_time);
    $addtraining->bindValue(':no_of_participant', $no_of_participant);
    $addtraining->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="img/logo/logo.png" rel="icon">
    <title>189074054 - Add Training</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Select2 -->
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"><!-- Bootstrap DatePicker -->
    <link href="vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"><!-- Bootstrap Touchspin -->
    <link href="vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet"><!-- ClockPicker -->
    <link href="vendor/clock-picker/clockpicker.css" rel="stylesheet"><!-- RuangAdmin CSS -->
    <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include "bars/sidebar.php"; ?>
        <!-- Sidebar -->
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- TopBar -->
                <?php include "bars/topbar.php"; ?>
                <!-- Topbar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Training</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Manage Trainings</a>
                            </li>
                            <li class="breadcrumb-item active">Add Training</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Add Training -->
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Training</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form method="POST" action=>
                                                <label for="">Name</label>
                                                <input aria-describedby="" value="<?php echo $name; ?>" class="form-control" id="" placeholder="Training Name" name="name" type="text">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Date</label>
                                            <input aria-describedby="" value="<?php echo $date; ?>" class="form-control" id="" placeholder="Date" name="training_date" type="date">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Time</label>
                                            <input aria-describedby="" value="<?php echo $time; ?>" class="form-control" id="" placeholder="Time" name="training_time" type="time">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">No. of Participants</label>
                                            <input aria-describedby="" value="<?php echo $participant; ?>" class="form-control" id="" placeholder="Max. Participants" name="no_of_participant" type="text">
                                        </div>
                                    </div><br>
                                    <button type="submit" name="edit_training" class="btn btn-primary">Add Training</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Row-->
                </div>
                <!---Container Fluid-->
            </div><!-- Footer -->
            <?php include "bars/footer.php"; ?>
            <!-- Footer -->
        </div>
    </div><!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <script src="vendor/jquery/jquery.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="vendor/jquery-easing/jquery.easing.min.js">
    </script> <!-- Select2 -->

    <script src="vendor/select2/dist/js/select2.min.js">
    </script> <!-- Bootstrap Datepicker -->

    <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
    </script> <!-- Bootstrap Touchspin -->

    <script src="vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js">
    </script> <!-- ClockPicker -->

    <script src="vendor/clock-picker/clockpicker.js">
    </script> <!-- RuangAdmin Javascript -->

    <script src="js/ruang-admin.min.js">
    </script> <!-- Javascript for this page -->

    <script>
        $(document).ready(function() {


            $('.select2-single').select2();

            // Select2 Single  with Placeholder
            $('.select2-single-placeholder').select2({
                placeholder: "Select a Province",
                allowClear: true
            });

            // Select2 Multiple
            $('.select2-multiple').select2();

            // Bootstrap Date Picker
            $('#simple-date1 .input-group.date').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: 'linked',
                todayHighlight: true,
                autoclose: true,
            });

            $('#simple-date2 .input-group.date').datepicker({
                startView: 1,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            $('#simple-date3 .input-group.date').datepicker({
                startView: 2,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            $('#simple-date4 .input-daterange').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            // TouchSpin

            $('#touchSpin1').TouchSpin({
                min: 0,
                max: 100,
                boostat: 5,
                maxboostedstep: 10,
                initval: 0
            });

            $('#touchSpin2').TouchSpin({
                min: 0,
                max: 100,
                decimals: 2,
                step: 0.1,
                postfix: '%',
                initval: 0,
                boostat: 5,
                maxboostedstep: 10
            });

            $('#touchSpin3').TouchSpin({
                min: 0,
                max: 100,
                initval: 0,
                boostat: 5,
                maxboostedstep: 10,
                verticalbuttons: true,
            });

            $('#clockPicker1').clockpicker({
                donetext: 'Done'
            });

            $('#clockPicker2').clockpicker({
                autoclose: true
            });

            let input = $('#clockPicker3').clockpicker({
                autoclose: true,
                'default': 'now',
                placement: 'top',
                align: 'left',
            });

            $('#check-minutes').click(function(e) {
                e.stopPropagation();
                input.clockpicker('show').clockpicker('toggleView', 'minutes');
            });

        });
    </script>
</body>

</html>