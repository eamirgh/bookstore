<?php
$content = '<div class="container mx-auto w-full">
<form class="w-full max-w-lg" method="post" action="' . APP_URL . '/admin/subs' . '">
<h1>مدیریت موضوعات</h1>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        نام موضوع
      </label>
      <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="نام موضوع">
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
      <th>action</th>
    </tr>
  </thead>
  <tbody>
  </div>
  ';
foreach ($subs as $s) {
  $content .= '<tr>
      <td>' . $s->sid . '</td>
      <td>' . $s->sname . '</td>
      <td class="flex">
      <a href="' . APP_URL . '/admin/subs/edit?sub_id=' . $s->sid . '" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      ویرایش
      </a>

      <form action="' . APP_URL . '/admin/subs/delete?sub_id=' . $s->sid . '" method="POST">
      
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">حذف</button>
      </form>
      </td>
    </tr>';
}
$content .= ' 
  </tbody>
</table>';
require APP_DIR . '/view/layout/master.php';
