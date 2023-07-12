<?php
// Load the database configuration file
include_once '../assets/includes/conn.php';
include_once '../assets/includes/header.php';

// Get status message
if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!-- Display status message -->
<?php if (!empty($statusMsg)) { ?>
    <section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
        <section id="about" class="section-50 d-flex flex-column align-items-center">
            <div class="col-xs-12">
                <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
            </div>
        <?php } ?>
        <!-- CSV file upload form -->
        <form action="UPLOADEN.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" name="importSubmit" value="IMPORT">
        </form>
        </section>
    </section>
<?php include_once '../assets/includes/header.php'; ?>