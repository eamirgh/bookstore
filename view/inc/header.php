<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="http://localhost:8080/bookstore">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">فروشگاه</span>
    </a>
    <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
      <form action="/bookstore/search" method="get">
        <input type="text" name="q" id="" class="border-solid border-2">
        <input type="submit" value="جستجو">
      </form>
      <div class="relative">
        <input type="checkbox" id="sortbox" class="hidden absolute">
        <label for="sortbox" class="flex items-center space-x-1 cursor-pointer">
          <a class="mr-5 hover:text-gray-900">موضوع ها</a>
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </label>

        <div id="sortboxmenu" class="absolute mt-1 right-1 top-full min-w-max shadow rounded opacity-0 bg-gray-300 border border-gray-400 transition delay-75 ease-in-out z-10">
          <ul class="block text-right text-gray-900">
            <?php
            require_once APP_DIR . '/model/sub.php';
            $cats = sub::all();
            foreach ($cats as $cat) {

              echo '<li><a href="' . $cat->url() . '" class="block px-3 py-2 hover:bg-gray-200">' . $cat->sname . '</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
      <a href="http://localhost:8080/bookstore/cart" class="mr-5 hover:text-gray-900">سبد خرید</a>
      <a href="http://localhost:8080/bookstore/contact" class="mr-5 hover:text-gray-900">تماس با ما</a>
    </nav>
    <a href="http://localhost:8080/bookstore/login" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">ورود/ثبتنام
    </a>
  </div>
</header>