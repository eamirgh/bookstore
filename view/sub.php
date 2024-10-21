<?php
$content = '<div class="container px-5 py-24 mx-auto">';
if ($books) {
  $count = count($books);
  $content .= "<h1>محصولات موضوع $sub->sname</h1>";
  $content .= '<div class="flex flex-wrap -m-4">';

  foreach ($books as $p) {
    $content .= '<div class="lg:w-1/4 md:w-1/2 p-4 w-full">
<a class="block relative h-48 rounded overflow-hidden" href="' . $p->url() . '">
  <img alt="' . $p->bname . '" class="object-cover object-center w-full h-full block" src="' . $p->cover . '">
</a>
<div class="mt-4">
  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">نویسنده</h3>
  <h2 class="text-gray-900 title-font text-lg font-medium">' . $p->author . '</h2>
  <p class="mt-1">' . $p->price . '</p>
</div>

</div>';
  }
  $content .= '</div>';
  $content .= '<div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
  <div class="flex flex-1 justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
    <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
  </div>
  <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        نمایش
        <span class="font-medium">' . (($page - 1) * 10 + 1) . '</span>
      تا
        <span class="font-medium">' . min($total, $page * 10) . '</span>
        از
        <span class="font-medium">' . $total . '</span>
        موارد
      </p>
    </div>
    <div>
      <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
      <a href="?sub_id=' . $sub->sid . '&page=' . $prev . '" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span class="sr-only">قبلی</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
          </svg>
        </a>
        <!-- Current: "z-10 bg-blue-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
        <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">1</a>
        
        <a href="?sub_id=' . $sub->sid . '&page=' . $next . '" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span class="sr-only">بعدی</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </div>
</div>
';
}
$content .= '</div>';
require APP_DIR . '/view/layout/master.php';