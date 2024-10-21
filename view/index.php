<?php
$content = '<div class="container px-5 py-24 mx-auto">';
$content .= '<div class="flex flex-wrap -m-4">';
if ($books) {
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
}
$content .= '</div>';
$content .= '</div>';
require APP_DIR . '/view/layout/master.php';
