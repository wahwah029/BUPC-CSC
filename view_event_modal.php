
<!-- Start of modal -->
<?php while ($row = mysqli_fetch_array($viewEvent)) { ?>
    <div id="viewE<?php echo $row['id'] ?>" class="show fade">
        <div class="mx-4 flex overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center transition-all duration-150 ease-in-out" id="view_event">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <!-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>s -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all">
                <div class="bg-white mx-5 mb-5 mt-2 overflow-auto example" style="max-width: 500px">
                    <div class="flex justify-end items-center gap-7 pr-3 pt-4">
                        <a href="#" class="fas fa-close text-gray-300 cursor-pointer hover:text-blue-300 transition-all" style="font-size: 18px" data-dismiss="modal"></a>
                    </div>
                    
                     <div class="overflow-y-auto example space-y-5 px-5 md:px-10 lg:px-10 pt-6 pb-10 w-full text-sm" style="height: 470px">
                        <div>
                            <div class="flex items-center gap-4">
                                <i class="far fa-calendar-check text-gray-300" style="font-size: 25px"></i>
                                <h1 class="text-2xl font-semibold text-gray-800"><?php echo $row['eName']?></h1>
                            </div>
                            <div class="flex gap-2 items-center">
                                <i class="fas fa-question-circle fa-xs text-gray-500 pt-1"></i>
                                <span class="text-gray-800 text-sm"><?php echo $row['eDescription']?></span>
                            </div>
                        </div>
                    
                        <div>
                            <p class="font-bold text-gray-700 text-lg">Information: </p>
                            <p class="text-gray-500"><?php echo $row['eObjectives']?></p>
                            <!-- <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, tenetur et? Vero magnam nobis fuga, eum expedita quis ullam repellat atque deserunt odit fugit dolor, nostrum molestiae quisquam praesentium a.</p> -->
                        </div>
                        <div>
                            <style>
                                .circle {
                                height: 13px;
                                width: 13px;
                                border-radius: 50%;
                                display: inline-block;
                                }
                            </style>
                            <div class="space-y-5">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-tags text-gray-400"></i>
                                    <?php
                                        if ($row['rules'] == 'Required') {
                                        echo '  <span class="px-2 inline-flex leading-5 font-extrabold rounded-full bg-yellow-50 text-yellow-400"  style="font-size: 10px">
                                                    REQUIRED 
                                                </span> ';
                                        }else{
                                            echo '
                                            <span class="px-2 inline-flex leading-5 font-extrabold rounded-full bg-green-50 text-green-400"  style="font-size: 10px">
                                                    NOT REQUIRED 
                                            </span>
                                            ';
                                        }
                                    ?>
                                </div>
                                <div>
                                    <div class="flex gap-3 items-center">
                                            <span class="circle bg-green-400"></span>
                                            <span class="font-extrabold">Starts</span><p class="text-gray-900"> <?php echo $row['startdate']?> - <span><?php echo $row['startime']?></span></p>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                            <span class="circle bg-red-400"></span>
                                            <span class="font-extrabold">Ends</span><p class="text-gray-900"> <?php echo $row['enddate']?> - <span><?php echo $row['endtime']?></span></p>
                                    </div>
                                </div>
                            
                                <div class="flex items-center gap-3">
                            
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                    <p><?php echo $row['eLocation']?></p>
                                </div>
                                <?php 
                                    $fbpost = $row['fbpost'];
                                    if($row['fbpost'] == NULL) {
                                       echo '';
                                    }else{
                                        echo '
                                            <div class="flex items-center gap-3">
                                                <i class="fab fa-facebook text-gray-400"></i>
                                                <a href="'.$fbpost.'" target="blank">
                                                    <p class="text-blue-300 italic">'.$fbpost.'</p>
                                                </a>
                                            </div>
                                        ';
                                    }
                                
                                ?>
                                <!-- <div class="flex items-center gap-3" style="width: 300px"> -->
                                        <!-- <i class="fas fa-star text-gray-300 hover:text-blue-200 text-xl cursor-pointer transition-all"></i> -->
                                      <!-- <i class="far fa-star text-gray-300 hover:text-blue-200 text-xl cursor-pointer transition-all"></i>
                                      <small class="text-xs text-gray-400">Please let us know that your are interested to this event by clicking this star</small> -->
                                <!-- </div> -->
                                 <div class="flex items-center gap-3">
                                    <?php
                                            date_default_timezone_set("Asia/Manila");
                                            $currentDate = date("Y-m-d");
                                            $tommorow = date('Y-m-d', strtotime(' +1 day'));
                                            $upcoming = date('Y-m-d', strtotime(' +2 day'));
                                            if ($row['startdate'] == $currentDate) {
                                                echo '
                                                    <div class="bg-green-300 w-8 h-2"></div>
                                                    <span class="text-gray-700 text-sm font-extrabold">Today</span>
                                                ';
                                            }else if($row['startdate'] == $tommorow){
                                                echo'
                                                    <div class="bg-blue-300 w-8 h-2"></div>
                                                     <span class="text-gray-700 text-sm font-extrabold">Tommorow</span>
                                                ';
                                            }else if($row['startdate'] >= $upcoming){
                                                echo'
                                                    <div class="bg-pink-300 w-8 h-2"></div>
                                                     <span class="text-gray-700 text-sm font-extrabold">Upcoming Event</span>
                                                ';
                                            }else {
                                                echo '
                                                    <div class="bg-yellow-300 w-8 h-2"></div>
                                                     <span class="text-gray-700 text-sm font-extrabold">Past Event</span>
                                                ';
                                            }
                                        ?>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                </div>
                </div>
        </div>
    </div>
    </div>
    <script src="./admin/js/jquery-1.12.4.js"></script>

<?php } ?>
 <!-- end modal -->