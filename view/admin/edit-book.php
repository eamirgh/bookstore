<?php

$content = '<div class="container mx-auto w-full">
<form class="w-full max-w-lg" method="post" action="' . APP_URL . '/admin/books/edit?book_id=' . $book->bid . '">
<h1>مدیریت کتاب</h1>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        نام کتاب
      </label>
      <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" value="' . $book->bname . '" placeholder="نام کتاب">
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        نام مولف
      </label>
      <input name="author" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" value="' . $book->author . '" placeholder="نام مولف">
    </div>


    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        قیمت
      </label>
      <input name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="' . $book->price . '"  type="number" placeholder="قیمت">
    </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        موضوع
      </label>
      <select name="sid">
      ';
foreach ($subs as $s) {
  $selected = $s->sid == $book->sid;
  $content .= '<option value="' . $s->sid . '" ' . ($selected ? 'selected' : '') . ' >' . $s->sname . '</option>';
}
$content .= '</select>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        توضیحات
      </label>
      <input name="des" value="' . $book->des . '" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="توضیحات">
    </div>
    
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        کاور
      </label>
      <input name="cover"  value="' . $book->cover . '"  class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="کاور">
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        وضعیت
      </label>

      <select name="status">
      <option value="1" ' . ($book->status == 1 ? 'selected' : '') . '>موجود</option>
      <option value="0" ' . ($book->status == 0 ? 'selected' : '') . '>ناموجود</option>
      </select>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    ویرایش
</button>

</form>
';
require APP_DIR . '/view/layout/master.php';
