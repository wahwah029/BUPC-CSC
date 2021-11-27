
       <div class="mx-3 flex hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="register_modal">
                  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
          <!-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>s -->
                  <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all">
                  <div class="bg-white p-3 md:px-5 lg:px-5 mx-5 my-5 w-72 md:w-96 lg:w-96">
                      <div class="flex justify-between items-center pb-8">
                          <h1 class="font-semibold text-gray-600 text-xl">Register</h1>
                         <i class="fas fa-close text-gray-300 cursor-pointer" onclick="toggleModal('register_modal')" ></i>
                      </div>
                    <form action="register_process.php" method="POST" class="space-y-2">
                     <input type="hidden" autocomplete="false">
                          <div class="space-y-2">
                              <p class="text-sm">Name <span class="text-red-500">*</span></p>
                              <input type="text"  autocomplete="off" name="name" class="bg-gray-100 focus:outline-none border-none focus:bg-gray-200 rounded py-2 px-2 text-gray-500 w-full">
                          </div>
                          <div class="space-y-2">
                              <p class="text-sm">Course <span class="text-red-500">*</span></p>
                              <input type="text"  autocomplete="off" name="course" class="bg-gray-100 focus:outline-none border-none focus:bg-gray-200 rounded py-2 px-2 text-gray-500 w-full">
                          </div>
                          <div class="space-y-2">
                              <p class="text-sm">BU Email <span class="text-red-500">*</span></p>
                              <input type="email"  autocomplete="off" placeholder="Ex. juandelacruz@bicol-u.edu.ph" name="buEmail" class="bg-gray-100 focus:outline-none border-none focus:bg-gray-200 rounded py-2 px-2 text-gray-500 w-full">
                          </div>
                          <div class="space-y-2">
                              <p class="text-sm">StudentID<span class="text-red-500">*</span></p>
                              <input type="text"  autocomplete="off" name="studentId" class="bg-gray-100 focus:outline-none border-none focus:bg-gray-200 rounded py-2 px-2 text-gray-500 w-full">
                          </div>
                          
                          <div class="flex justify-center py-4">
                              <div style="font-size: 14px">
                                 <button type="button"  onclick="toggleModal('register_modal')" class="px-6 py-2 bg-gray-100 rounded text-gray-500">
                                      Cancel
                                  </button>
                                 <button class="relative px-6 bg-yellow-500 hover:bg-yellow-400 py-2 text-white rounded ml-3" name="register" type="submit" onclick="this.classList.toggle('button--loading')">
                                      <span class="button-text">Register</span>
                                  </button>
                              </div>
                          </div>
                  </form>
                  </div>
                  </div>
          </div>
      </div>