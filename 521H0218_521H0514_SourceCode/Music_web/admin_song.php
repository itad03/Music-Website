<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin_dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="admin_category.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Categories</span></a>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_song.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Songs</span></a>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_comment.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Comments</span></a>
                </a>
            </li>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php
                $condition = '';
                if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
                    $condition .= ' AND id LIKE "%' . $_REQUEST['id'] . '%" ';
                }
                if (isset($_REQUEST['songName']) and $_REQUEST['songName'] != "") {
                    $condition .= ' AND songName LIKE "%' . $_REQUEST['songName'] . '%" ';
                }
                if (isset($_REQUEST['poster']) and $_REQUEST['poster'] != "") {
                    $condition .= ' AND poster LIKE "%' . $_REQUEST['poster'] . '%" ';
                }
                if (isset($_REQUEST['lyric']) and $_REQUEST['lyric'] != "") {
                    $condition .= ' AND lyric LIKE "%' . $_REQUEST['lyric'] . '%" ';
                }
                if (isset($_REQUEST['songDate']) and $_REQUEST['songDate'] != "") {
                    $condition .= ' AND DATE(songDate)<="' . $_REQUEST['songDate'] . '" ';
                }
                $songData = $db->getAllRecords('songs', '*', $condition, 'ORDER BY id DESC');
                ?>
                <div class="card">
                <div class="card-header"><a href="admin_add_song.php" class="float-right btn btn-dark btn-sm"><i
                                class="fa fa-fw fa-plus-circle"></i> Add Song</a></div>
                    <div class="card-body">
                        <?php
                        if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {
                            echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
                        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {
                            echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
                        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {
                            echo '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
                        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {
                            echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
                        }
                        ?>
                        <div class="col-sm-12">
                            <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Song</h5>
                            <form method="get">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>Song ID</label>
                                            <input type="number" name="id" id="id" class="form-control"
                                                value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>"
                                                placeholder="Enter id">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>Song Name</label>
                                            <input type="text" name="songName" id="songName" class="form-control"
                                                value="<?php echo isset($_REQUEST['songName']) ? $_REQUEST['songName'] : '' ?>"
                                                placeholder="Enter name">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>Song Poster</label>
                                            <input type="text" name="poster" id="poster" class="form-control"
                                                value="<?php echo isset($_REQUEST['poster']) ? $_REQUEST['poster'] : '' ?>"
                                                placeholder="Enter poster">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Song Lyric</label>
                                            <input type="text" name="lyric" id="lyric" class="form-control"
                                                value="<?php echo isset($_REQUEST['lyric']) ? $_REQUEST['lyric'] : '' ?>"
                                                placeholder="Enter lyric">
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Song Date</label>
                                            <div class="input-group">
                                                <input type="text" class="fromDate form-control hasDatepicker" name="df"
                                                    id="df" value="" placeholder="Enter from date">
                                                <div class="input-group-prepend"><span class="input-group-text">-</span>
                                                </div>
                                                <input type="text" class="toDate form-control hasDatepicker" name="dt"
                                                    id="dt" value="" placeholder="Enter to date">
                                                <div class="input-group-append"><span class="input-group-text"><a
                                                            href="javascript:;" onclick="$('#df,#dt').val('');"><i
                                                                class="fa fa-fw fa-sync"></i></a></span></div>
                                            </div>

                                        </div>

                                    </div> -->
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <div>
                                                <button type="submit" name="submit" value="search" id="submit"
                                                    class="btn btn-primary"><i class="fa fa-fw fa-search"></i>
                                                    Search</button>
                                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-danger"><i
                                                        class="fa fa-fw fa-sync"></i>
                                                    Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>

                <div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Sr#</th>
                                <th>Song ID</th>
                                <th>Song Name</th>
                                <th>Song Poster</th>
                                <th>Song Lyric</th>
                                <th class="text-center">Song Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($songData) > 0) {
                                $s = '';
                                foreach ($songData as $val) {
                                    $s++;
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $s; ?>
                                        </td>
                                        <td>
                                            <?php echo $val['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $val['songName']; ?>
                                        </td>
                                        <td>
                                        <img src=<?php echo $val['poster']; ?>  alt="" style = "width: 350px; height: 260px;">
                                        </td>
                                        <td>
                                            <?php echo $val['lyric']; ?>
                                        </td>
                                        <td align="center">
                                            <?php echo date('Y-m-d', strtotime($val['songDate'])); ?>
                                        </td>
                                        <td align="center">
                                            <a href="admin_edit_song.php?editId=<?php echo $val['id']; ?>"
                                                class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
                                            <a href="admin_delete_song.php?delId=<?php echo $val['id']; ?>"
                                                class="text-danger"
                                                onClick="return confirm('Are you sure to delete this song?');"><i
                                                    class="fa fa-fw fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" align="center">No Record(s) Found!</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!--/.col-sm-12-->


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
                    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
                    crossorigin="anonymous"></script>

                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
                <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
                <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
                    integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
                <script>
                    $(document).ready(function () {
                        jQuery(function ($) {
                            var input = $('[type=tel]')
                            input.mobilePhoneNumber({ allowPhoneWithoutPrefix: '+1' });
                            input.bind('country.mobilePhoneNumber', function (e, country) {
                                $('.country').text(country || '')
                            })
                        });

                        //From, To date range start
                        var dateFormat = "yy-mm-dd";
                        fromDate = $(".fromDate").datepicker({
                            changeMonth: true,
                            dateFormat: 'yy-mm-dd',
                            numberOfMonths: 2
                        })
                            .on("change", function () {
                                toDate.datepicker("option", "minDate", getDate(this));
                            }),
                            toDate = $(".toDate").datepicker({
                                changeMonth: true,
                                dateFormat: 'yy-mm-dd',
                                numberOfMonths: 2
                            })
                                .on("change", function () {
                                    fromDate.datepicker("option", "maxDate", getDate(this));
                                });


                        function getDate(element) {
                            var date;
                            try {
                                date = $.datepicker.parseDate(dateFormat, element.value);
                            } catch (error) {
                                date = null;
                            }
                            return date;
                        }
                        //From, To date range End here	

                    });
                </script>


            </div>

        </div>

    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>