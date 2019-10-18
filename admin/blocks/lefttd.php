  <td width="182px" valign="top" class="left">
        <p align="center" class="title" onclick="openBlock(this);">Страницы</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="new_pages.php">Добавить</a>
<a href="edit_pages.php">Редактировать</a>
<a href="del_pages.php">Удалить</a>

</div>	

<p align="center" class="title" onclick="openBlock(this);">Фотогалерея</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="new_gallery.php">Добавить галерею</a>
<a href="edit_gallery.php">Редактировать галерею</a>
<a href="del_gallery.php">Удалить галерею</a>
<a href="new_foto.php">Добавить фото</a>
<a href="del_foto.php">Удалить фото</a>
<a href="new_comment.php">Изменить комментарии к фото</a>

</div>	

<p align="center" class="title">Новости</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="new_news.php">Добавить</a>
<a href="edit_news.php">Редактировать</a>
<a href="del_news.php">Удалить</a>

</div>
<p align="center" class="title">Логин</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="edit_login.php">Изменить</a>


</div>

</div>
<p align="center" class="title">Файл</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="load.php">Добавить</a>


</div>

        
        </td>
        <script>
function openBlock(el) {
	// el.parentNode - взять родительский элемент
	// el.parentNode.childNodes - взять все дочерние элементы родителя
	// и положить их в массив kids
	var kids = el.parentNode.childNodes; 

	// прокрутить в цикле все элементы массива kids
	for (var k = 0; k < kids.length; k++) {
		var child = kids[k];

		// если имя класса текущего элемента равно this_block_is_hidden,
		// то выполнить ниже следующие инструкции
		if (child && child.className == "this_block_is_hidden") {

			// если блок не виден, то показать его
			if (child.style.display != 'block') {
				child.style.display = 'block';
			} 

			// иначе скрыть его
			else {
				child.style.display = 'none';
			}
		}
	}
}
</script>