<?php
$content = '<div class="container mx-auto w-full">
<form class="w-full max-w-lg" method="post" action="' . APP_URL . '/admin/subs/edit?sub_id=' . $sub->sid . '">
<h1>مدیریت موضوعات</h1>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        نام موضوع
      </label>
      <input name=name class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="نام موضوع" value="' . $sub->sname . '">
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  ویرایش
</button>

</form>
';
require APP_DIR . '/view/layout/master.php';
