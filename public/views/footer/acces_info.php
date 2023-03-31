<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/output.css">
    <link rel="stylesheet" href="../../fonts/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="/img/logos/isik/logo.png">
    <title>Institut Supérieur de l'Informatique du Kef</title>
</head>
<body>
<!-- Barre de navigation -->

<nav class="px-2 bg-white border-gray-200 sm:px-0 py-8">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="/" class="flex items-center">
        <img src="../../img\logos\isik\banner.png" class=" h-16 mr-3 sm:max-h-20" alt="isi kef logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap "></span>
    </a>
    <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-multi-level" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">

        <li>
          <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Notre Institut <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
          <!-- Dropdown menu 0 -->
          <div  class="dropdown-menu absolute hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
              <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Présentation</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Mot du Directeur</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Galerie</a>
                </li>
              </ul>
          </div>
      </li>
      <li>
        <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Nos formations <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
        <!-- Dropdown menu 1 -->
        <div  class="dropdown-menu hidden absolute  font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
            <ul class="py-2 text-sm text-gray-700 bottom-7" aria-labelledby="dropdownLargeButton">
              <li aria-labelledby="dropdownNavbarLink">
                <button data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="subdropdown-btn flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">Licence<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                <div  class="subdropdown-menu hidden absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 left-full top-0">
                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="doubleDropdownButton">
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">LCS</a>
                      </li>
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">LCE</a>
                      </li>

                    </ul>
                </div>
              </li>
              <li aria-labelledby="dropdownNavbarLink" >
                <button  data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class=" subdropdown-btn flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">Mastère
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                  <div class="relative">
                    <div class="subdropdown-menu hidden absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                      <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">SIW</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">ASRI</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">AWI</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">NTICDIA</a>
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
      <div  class="dropdown-menu absolute hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
          <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Les Clubs</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Centre 4C </a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Projet Erasmus+</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Bibliothèque</a>
            </li>
          </ul>
      </div>
  </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Actualités et Evénements</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Nous Contacter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<main>
  <section class="min-h-screen bg-gray-200">
      <div class="h-16 grid grid-cols-4">
        <div class="">
          
        </div>
        <div class="col-span-3 text-justify">
            <div class="pt-8">       
              <a href="../../../index.html">Home</a>
              <i class="fa-light fa-greater-than" style="color: #000000;"></i>
              <a href="">Droit d'accès aux informations</a>
            </div>
            <div >
              <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                  <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-700 ">Droit d'accès aux informations</h2>
                  <br>
                  <h4 class="text-center mb-8 font-semibold text-gray-700">: حق النفاذ إلى المعلومة بالمعهد العالي للإعلاميّة بالكاف</h4>
      
                  <div class="mb-8 lg:mb-16 font-normal text-right text-gray-500  sm:text-xl ">
                    <div>
                      <ul>
                      <li> <span><strong>سياسة النفاذ إلى المعلومة:</strong></span></li>
                      <span > </span> 
                      </ul>
                      <span > </span>
                      <p ><span >تطبيقا للدستور(الفصل32) و مقتضيات <a class="text-blue-300" title="القانون الأساسي عدد 22 لسنــــــــــة 2016 مـــــــــؤرخ فــــــي 24 مارس 2016.pdf" href="image.php?id=2653" target="_blank">القانون الأساسي عدد 22 لسنــــــــــة 2016 مـــــــــؤرخ فــــــي 24 مارس 2016</a> والمتعلق  بالحق في النفاذ إلى المعلومة .يعمل المعهد العالي للإعلاميّة بالكاف على إرساء علاقات جديدة  مع المواطن من خلال وضع جميع المعلومات و الوثائق الإدارية على ذمة العموم .</span></p>
                      <span > </span>
                      <p ><span >مراجع قانونية منظمة للنفاذ الدستور: الفصل 32 (الفقرة الأولى) تضمن الدولة الحق في الإعلام و الحق في النفاذ إلى المعلومة <a class="text-blue-300" title="القانون الأساسي عدد 22 لسنــــــــــة 2016 مـــــــــؤرخ فــــــي 24 مارس 2016.pdf" href="image.php?id=2653" target="_blank">القانون الأساسي عدد 22 لسنــــــــــة 2016 مـــــــــؤرخ فــــــي 24 مارس 2016</a>.</span></p>
                      <span > </span>
                      <p ><span ><a class="text-blue-300" title="منشور رئيس الحكومة عدد 19 المؤرخ في 18 ماي 2018.pdf" href="image.php?id=2662" target="_blank">منشور رئيس الحكومة عدد 19 المؤرخ في 18 ماي 2018</a> والمتعلق بالحق في  النفاذ إلى المعلومة مطبوعات خاصة بالنفاذ  مطلب نفاذ إلى المعلومة.</span></p>
                      <span > </span>
                      <p ><span > <a class="text-blue-300" title="قائمة المكلّفين بالنّفاذ إلى المعلومة.pdf" href="image.php?id=2665" target="_blank"> . قائمة المكلّفين بالنّفاذ إلى المعلومة </a></span></p>
                      <span > </span> 
                      <ul>
                      <li><span >: وثائق للتحميل</span></li>
                      </ul>
                      <span > </span><ol><span > </span>
                      <li><span ><a class="text-blue-300" title="مطلب نفاذ إلى المعلومة.pdf" href="image.php?id=2633" target="_blank">مطلب نفاذ إلى المعلومة</a></span></li>
                      <span > </span>
                      <li><span ><a class="text-blue-300" title="مطلب تظلم لدى رئيس الهيكل.pdf" href="image.php?id=2657" target="_blank">مطلب تظلم لدى رئيس الهيكل</a></span></li>
                      </ol></div></div>

              </div>
            </div>
      </div>

  </section>
</main>




<footer class="bg-white">
  <div class="mx-auto w-full p-4 sm:p-6 ">
      <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-800">Institut Supérieur d'Informatique du Kef</span>
                <div >5 Rue Saleh Ayech - 7100 Kef <br>
                  Tél.: (216) 78 201 056 - Fax : (216) 78 200 237
                  </div>
        </div>
        <div class="grid grid-cols-2 sm:gap-1 sm:grid-cols-4 text-center">

            <div class="w-24">
                <a href="" class="mb-4 text-sm font-semibold text-gray-900">FAQ</a>
            </div>
            <div class="w-24">
              <a href="" class="mb-4 text-sm font-semibold text-gray-900">Liens Utiles</a>
          </div>
          <div class="w-24">
              <a href="" class="mb-4 text-sm font-semibold text-gray-900">Accés a l'information</a>
          </div>
          <div class="w-24">
              <a href="" class="mb-4 text-sm font-semibold text-gray-900">Nous Contacter</a>
          </div>
        </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
        <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            <a href="https://www.facebook.com/profile.php?id=100057592473413" class="text-gray-500 hover:text-gray-900 ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                <span class="sr-only">Facebook page</span>
            </a>
        </div>
    </div>
  </div>
</footer>
<script src="public\js\app.js"></script>
</body>
</html>
