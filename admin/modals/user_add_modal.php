    <div id="addUser" class="show fade" >
       <div style="max-width: 400px" class="flex px-4 mx-auto overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <!-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>s -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all">
                  <div class="bg-white p-5 mx-3 md:my-5 lg:my-5" style="max-width: 500px">
                        <div class="flex justify-between items-center pb-8">
                            <h1 class="font-semibold text-gray-600 text-xl">Add user</h1>
                            <i class="fas fa-close text-gray-300 cursor-pointer" data-dismiss="modal"></i>
                        </div>
                        <form action="../modals/user_modal_process.php" method="post" class="space-y-2 text-sm md:text-base lg:text-base" enctype="multipart/form-data">
                            <div class="flex justify-center">
                                <div class="space-y-4 relative">
                                    <div class="rounded-full overflow-hidden" style="width: 140px; height: 140px; margin-top: -1rem ">
                                            <img 
                                            style="object-fit: cover; width: 100%; height: 100%"
                                                src="../images/user1.png"
                                                name="picture"
                                                onClick="triggerClick()" 
                                                id="profileDisplay"
                                            >
                                            </div>
                                             <div class="absolute bottom-3 text-xs opacity-0">
                                                <input 
                                                    type="file" 
                                                    name="profileImage" 
                                                    style="opacity: 0"
                                                    onChange="displayImage(this)" 
                                                    id="profileImage" 
                                                >
                                            </div>
                                    </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-sm">Name <span class="text-red-500">*</span></p>
                                <input type="text" value="" autocomplete="off" name="name" class="bg-gray-100 focus:outline-none border-none focus:bg-gray-200 rounded py-2 px-2 text-gray-500 w-full">
                            </div>
                            <div class="flex gap-3">
                                <div class="space-y-2">
                                    <p class="text-sm">Username<span class="text-red-500">*</span></p>
                                    <input type="text" value="" autocomplete="off" name="username" class="bg-gray-100 focus:outline-none border-none focus:bg-gray-200 rounded py-2 px-2 text-gray-500 w-full">
                                </div>
                                <div class="space-y-2">
                                    <p class="text-sm">Password <span class="text-red-500">*</span></p>
                                    <input type="password" value="" autocomplete="off" name="password" class="bg-gray-100 focus:outline-none border-none focus:bg-gray-200 rounded py-2 px-2 text-gray-500 w-full">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <!-- <p class="text-sm">Role <span class="text-red-500">*</span></p>
                                <input type="text" value="" autocomplete="off" name="role" class="bg-gray-100 focus:outline-none border-none focus:bg-gray-200 rounded py-2 px-2 text-gray-500 w-full"> -->
                             <select class="rounded" name="role" style="padding: 9px; width: 100%; background:#F3F4F6 " >
                                <option value="" disabled selected hidden>Role</option>
                                <option value="President">Dean</option>
                                <option value="Associate Dean">Associate Dean</option>
                                <option value="President">Adviser</option>
                                <option value="President">President</option>
                                <option value="Vice Presiden">Vice President</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Treasurer">Treasurer</option>
                                <option value="Auditor">Auditor</option>
                                <option value="Business Manager">Business Manager</option>
                                <option value="P.I.O">P.I.O</option>
                                <option value="Representative">Representative</option>
                                <option value="Adviser">CSC Adviser</option>
                            </select>
                            </div>
                            <div>
                                <small class="text-gray-500">Note: this account can also access this admin page. Thank you!</small>
                            </div>
                            <div class="flex justify-center">
                                <div style="font-size: 14px">
                                    <button type="button" data-dismiss="modal" class="px-6 py-2 bg-gray-100 rounded text-gray-500">
                                        Cancel
                                    </button>
                                     <button class="relative px-6 bg-yellow-500 hover:bg-yellow-400 py-2 text-white rounded ml-3" name="save" type="submit" onclick="this.classList.toggle('button--loading')">
                                       <span class="button-text">Submit</span> 
                                    </button>
                                </div>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        

   