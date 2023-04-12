<nav class="px-2 bg-white border-gray-200 sm:px-0 py-8 ">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="http://localhost/isik/index.php" class="flex items-center">
        <img src="http://localhost/isik/public/img\logos\isik\banner.png" class=" h-16 mr-3 sm:max-h-20" alt="isi kef logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap "></span>
    </a>
    <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-multi-level" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">

        <li>
          <button  data-dropdown-toggle="dropdownNavbar" class=" dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Notre Institut <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
          <div  class=" z-50 dropdown-menu absolute hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
              <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="http://localhost/isik/public/views/intro.php" class="block px-4 py-2 hover:bg-gray-100 ">Présentation</a>
                </li>
                <li>
                  <a href="http://localhost/isik/public/views/directeur.php" class="block px-4 py-2 hover:bg-gray-100 ">Mot du Directeur</a>
                </li>
                <li>
                  <a href="http://localhost/isik/public/views/gallery.php" class="block px-4 py-2 hover:bg-gray-100 ">Galerie</a>
                </li>
              </ul>
          </div>
      </li>
      <li>
        <a href="http://localhost/isik/public/views/formation.php"><button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Nos formations <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button></a>
        <!-- Dropdown menu 1 -->
        <div  class="z-50 dropdown-menu hidden absolute  font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
            <ul class="py-2 text-sm text-gray-700 bottom-7" aria-labelledby="dropdownLargeButton">
              <li aria-labelledby="dropdownNavbarLink">
                <a href="http://localhost/isik/public/views/formation.php#Licence"><button data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="subdropdown-btn flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">Licence<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button></a>
                <div  class="subdropdown-menu hidden absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 left-full top-0">
                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="doubleDropdownButton">
                      <li>
                        <a href="http://localhost/isik/public/views/formation.php#Licence" class="block px-4 py-2 hover:bg-gray-100 ">LCS</a>
                      </li>
                      <li>
                        <a href="http://localhost/isik/public/views/formation.php#Licence" class="block px-4 py-2 hover:bg-gray-100 ">LCE</a>
                      </li>

                    </ul>
                </div>
              </li>
              <li aria-labelledby="dropdownNavbarLink" >
                <a href="http://localhost/isik/public/views/formation.php#Mastere"> <button  data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class=" subdropdown-btn flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">Mastère
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button></a>
                  <div class="relative">
                    <div class="z-50 subdropdown-menu hidden absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                      <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                        <li>
                          <a href="http://localhost/isik/public/views/formation.php#Mastere" class="block px-4 py-2 hover:bg-gray-100">SIW</a>
                        </li>
                        <li>
                          <a href="http://localhost/isik/public/views/formation.php#Mastere" class="block px-4 py-2 hover:bg-gray-100">ASRI</a>
                        </li>
                        <li>
                          <a href="http://localhost/isik/public/views/formation.php#Mastere" class="block px-4 py-2 hover:bg-gray-100">AWI</a>
                        </li>
                        <li>
                          <a href="http://localhost/isik/public/views/formation.php#Mastere" class="block px-4 py-2 hover:bg-gray-100">NTICDIA</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  
              </li>
            </ul>
        </div>
    </li>
    <li>
      <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">La vie de l'Institut <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
      <!-- Dropdown menu 0 -->
      <div  class="z-50 dropdown-menu absolute hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
          <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
            <li>
              <a href="http://localhost/isik/public/views/campus/clubs.php" class="block px-4 py-2 hover:bg-gray-100 ">Les Clubs</a>
            </li>
            <li>
              <a href="http://localhost/isik/public/views/campus/4c.php" class="block px-4 py-2 hover:bg-gray-100 ">Centre 4C </a>
            </li>
            <li>
              <a href="http://localhost/isik/public/views/campus/erasmus.php" class="block px-4 py-2 hover:bg-gray-100 ">Projet Erasmus+</a>
            </li>
          </ul>
      </div>
      </li>
        <li>
          <a href="http://localhost/isik/public/views/contact.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Nous Contacter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
