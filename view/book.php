<?php
require_once APP_DIR . '/model/cart.php';
$content = '<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="' . $book->bname . '" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="' . $book->cover . '">
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <a href="' . $book->sub()->url() . '"><h2 class="text-sm title-font text-gray-500 tracking-widest">' . $book->sub()->sname . '</h2></a>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">' . $book->bname . '</h1>
        <p class="leading-relaxed">' . $book->des . '</p>
        <div class="flex">
          <span class="title-font font-medium text-2xl text-gray-900">' . $book->price . '</span>
          <form method="post" action="' . cart::action('add', $book->bid) . '">
          <button type="submit" class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">افزودن به سبد خرید</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>';

require APP_DIR . '/view/layout/master.php';
