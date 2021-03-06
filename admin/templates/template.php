<?php
session_start();

// code for retrieve from database
// USERS
include('../../conn.php');

$ID = $_SESSION['id'];
$users = mysqli_query($db, "SELECT * FROM users");
$officers = mysqli_query($db, "SELECT * FROM officers");
// reports
$files = mysqli_query($db, "SELECT * FROM files");
$fReports = mysqli_query($db, "SELECT * FROM financialreport");
$oReports = mysqli_query($db, "SELECT * FROM otherreports");
// end
$userlogs = mysqli_query($db, "SELECT * FROM logs");
$events = mysqli_query($db, "SELECT * FROM events");
// use for modals
$eventsEdit = mysqli_query($db, "SELECT * FROM events");
$viewEvent = mysqli_query($db, "SELECT * FROM events");
$eventlogs = mysqli_query($db, "SELECT * FROM logs");
$toAct = mysqli_query($db, "SELECT * FROM users WHERE id=$ID");
$toActEdit = mysqli_query($db, "SELECT * FROM users WHERE id=$ID");
$showEdit = mysqli_query($db, "SELECT * FROM users WHERE id=$ID");
$record = mysqli_fetch_array($showEdit);
$username = $record['username'];
$viewActivity = mysqli_query($db, "SELECT * FROM logs");
$userActivity = mysqli_query($db, "SELECT * FROM userActivity");
// end

$ID = $_SESSION['id'];
$currentUser = mysqli_query($db, "SELECT * FROM users WHERE id=$ID");

// in user modal
$userEdit = mysqli_query($db, "SELECT * FROM users");
// end

// end
if (isset($_SESSION['id']) && (isset($_SESSION['username']))) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="../index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
        <title>College Student Council 2021</title>
        <script>
            function display_ct6() {
                var x = new Date()
                var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
                hours = x.getHours() % 12;
                hours = hours ? hours : 12;
                // var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
                x1 = hours + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
                document.getElementById('ct6').innerHTML = x1;
                display_c6();
            }

            function display_c6() {
                var refresh = 1000; // Refresh rate in milli seconds
                mytime = setTimeout('display_ct6()', refresh)
            }
        </script>
        <style>
            .button:active {
                background: #007a63;
            }

            .button-text {
                color: #ffffff;
                transition: all 0.2s;
            }

            .button--loading .button-text {
                visibility: hidden;
                opacity: 0;
            }

            .button--loading::after {
                content: "";
                position: absolute;
                width: 16px;
                height: 16px;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                margin: auto;
                border: 4px solid transparent;
                border-top-color: #ffffff;
                border-radius: 50%;
                animation: button-loading-spinner 1s ease infinite;
            }

            @keyframes button-loading-spinner {
                from {
                    transform: rotate(0turn);
                }

                to {
                    transform: rotate(1turn);
                }
            }
        </style>
    </head>

    <body onload=display_c6();>
        <section class="px-6">
            <div class="flex mx-auto container justify-between items-center">
                <div class="flex items-center gap-3 py-7">
                    <img class="h-8 w-auto sm:h-10" src="../images/index.jpg">
                    <div>
                        <h1 class="font-bold uppercase text-gray-600">College Student Council 2021</h1>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <?php while ($row = mysqli_fetch_array($currentUser)) { ?>
                        <div class="hidden md:flex items-center text-sm text-gray-600">
                            <p> Hello &nbsp; </p>
                            <!-- <img src="../images/wave.gif" alt="" style="width: 30px"> -->
                            <span> <?php echo $row['name'] ?> </span>
                        </div>
                        <div class="flex-shrink-0 h-10 w-10">
                            <?php if ($row['picture'] == NULL) : ?>
                                <img class="h-10 w-10 rounded-full" src="../images/user1.png" alt="">
                            <?php else : ?>
                                <img class="h-10 w-10 rounded-full" src="<?php echo '../modals/upload/' . $row['picture']; ?>" alt="">
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                    <div class="opacity-10">|</div>
                    <div>
                        <form action="../logout.php" method="POST">
                            <?php while ($row = mysqli_fetch_array($userlogs)) { ?>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <?php } ?>
                            <!-- use for status -->
                            <input type="hidden" name="status" value="Offline">
                            <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
                            <!-- end -->
                            <button type="submit" name="logout">
                                <i class="fas fa-sign-out-alt text-gray-400 hover:text-red-300 transition-all"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="opacity-30">
            <div class="flex gap-3 container mx-auto py-4 items-center" style="font-size: 12px">
                <!-- <button class="bg-gray-100 rounded py-3 px-5 text-gray-700">Dashboard</button> -->
                <h1 class="hidden md:flex lg:flex text-xl font-medium text-blue-700">Management</h1>
                <div class="hidden md:flex lg:flex h-4 bg-gray-200" style="width: 1.2px"></div>
                <div class="flex justify-between items-center w-full">
                    <div class="flex gap-5 px-2 items-center ">
                        <a href="../home" class="text-black-400 hover:text-yellow-400 active:text-blue-400 font-medium transition-all">Home</a>
                        <a href="../events" class="text-black-400 hover:text-yellow-400 active:text-blue-400 font-medium transition-all">Events</a>
                        <!-- <a href="../reports" class="text-black-400 hover:text-yellow-400 active:text-blue-400 font-medium transition-all">Reports</a> -->
                        <button class="text-black-400 hover:text-yellow-400 active:text-blue-400 font-medium transition-all" style="font-size: 13px" type="button" onclick="openDropdown(event,'dropdown-example-1')">
                                Reports<i class="fas fa-angle-down ml-1"></i>
                            </button>
                            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1" style="min-width: 12rem" id="dropdown-example-1">
                                <a href="../reports/" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                                    Accomplishment Reports
                                </a>
                                <a href="../financialReport/" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                                    Financial Reports
                                </a>
                                <a href="../otherReport/" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                                    Other Reports
                                </a>
                            </div>
                <a href="../officers" class="text-black-400 active:text-blue-400 hover:text-yellow-400 font-medium transition-all">Organizational Chart</a>
                <a href="../logs" class="text-black-400 active:text-blue-400 hover:text-yellow-400 font-medium transition-all">Logs</a>

             

                  

            </div>

        </section>

        <section class="md:bg-gray-50 lg:bg-gray-50 lg:mx-0 ">
            <div class="container mx-auto h-full flex justify-center items-center">
                <?php require_once $content; ?>
            </div>
        </section>

        <div class="flex justify-center items-end py-5 text-gray-500">
            <small>BUPC College Student Council &copy; 2021 </small>
        </div>

        <div><?php include '../logs/modals/about_modal.php'; ?></div>
        <div><?php include '../logs/modals/view_activity_modal.php'; ?></div>
        <div><?php include '../events/modals/events_modal.php'; ?></div>
        <div><?php include '../events/modals/view_event_modal.php'; ?></div>
        <div><?php include '../events/modals/edit_event_modal.php'; ?></div>

        <div><?php include '../modals/user_edit_modal.php'; ?></div>
        <div><?php include '../modals/user_add_modal.php'; ?></div>
        <div><?php include '../modals/about_modal.php'; ?></div>
        <div><?php include '../officers/add.php'; ?></div>
        <div><?php include '../reports/modal/add_report_modal.php'; ?></div>

        <div><?php include 'alertSession.php'; ?></div>

        <script src="../js/jquery-1.12.4.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="sweetalert2.all.min.js"></script>

        <!-- script for attaching image -->
        <script>
            function triggerClick(e) {
                document.querySelector("#profileImage").click();
            }

            function displayImage(e) {
                if (e.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document
                            .querySelector("#profileDisplay")
                            .setAttribute("src", e.target.result);
                    };
                    reader.readAsDataURL(e.files[0]);
                }
            }
        </script>
        <script>
            function triggerClick1(e) {
                document.querySelector("#profileImage1").click();
            }

            function displayImage1(e) {
                if (e.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document
                            .querySelector("#profileDisplay1")
                            .setAttribute("src", e.target.result);
                    };
                    reader.readAsDataURL(e.files[0]);
                }
            }
        </script>
        <!-- Required popper.js -->
        <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
        <script>
            function openDropdown(event, dropdownID) {
                let element = event.target;
                while (element.nodeName !== "BUTTON") {
                    element = element.parentNode;
                }
                var popper = Popper.createPopper(
                    element,
                    document.getElementById(dropdownID), {
                        placement: "bottom-start",
                    }
                );
                document.getElementById(dropdownID).classList.toggle("hidden");
                document.getElementById(dropdownID).classList.toggle("block");
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("location: index.php");
    exit();
}
?>