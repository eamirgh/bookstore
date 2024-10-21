<?php
$content = '<div class="container mx-auto w-full">
<form class="w-full max-w-lg" method="post" action="' . APP_URL . '/admin/books' . '">
<h1>مدیریت کتاب ها</h1>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        نام کتاب
      </label>
      <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="نام کتاب">
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        نام مولف
      </label>
      <input name="author" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="نام مولف">
    </div>


    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        قیمت
      </label>
      <input name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="number" placeholder="قیمت">
    </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        موضوع
      </label>
      <select name="sid">
      ';
foreach ($subs as $s) {
  $content .= '<option value="' . $s->sid . '">' . $s->sname . '</option>';
}
$content .= '</select>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        توضیحات
      </label>
      <input name="des" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="توضیحات">
    </div>
    
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        کاور
      </label>
      <input name="cover" value="http://localhost:8080/bookstore/1.jpg" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="کاور">
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        وضعیت
      </label>

      <select name="status">
      <option value="1">موجود</option>
      <option value="0">ناموجود</option>
      </select>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  ذخیره
</button>

</form>

<table class="table-auto">
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>price</th>
      <th>author</th>
      <th>status</th>
    </tr>
  </thead>
  <tbody>
  </div>
  ';
foreach ($books as $s) {
  $content .= '<tr>
      <td>' . $s->bid . '</td>
      <td>' . $s->bname . '</td>
      <td>' . $s->price . '</td>
      <td>' . $s->author . '</td>
      <td>' . $s->status . '</td>
      <td class="flex">
      <a href="' . APP_URL . '/admin/books/edit?book_id=' . $s->sid . '" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      ویرایش
      </a>

      <form action="' . APP_URL . '/admin/books/delete?book_id=' . $s->sid . '" method="POST">
      
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">حذف</button>
      </form>
      </td>
    </tr>';
}
$content .= ' 
  </tbody>
</table>';
require APP_DIR . '/view/layout/master.php';
