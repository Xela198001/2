  <td width="182px" valign="top" class="left">
        <p align="center" class="title" onclick="openBlock(this);">��������</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="new_pages.php">��������</a>
<a href="edit_pages.php">�������������</a>
<a href="del_pages.php">�������</a>

</div>	

<p align="center" class="title" onclick="openBlock(this);">�����������</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="new_gallery.php">�������� �������</a>
<a href="edit_gallery.php">������������� �������</a>
<a href="del_gallery.php">������� �������</a>
<a href="new_foto.php">�������� ����</a>
<a href="del_foto.php">������� ����</a>
<a href="new_comment.php">�������� ����������� � ����</a>

</div>	

<p align="center" class="title">�������</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="new_news.php">��������</a>
<a href="edit_news.php">�������������</a>
<a href="del_news.php">�������</a>

</div>
<p align="center" class="title">�����</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="edit_login.php">��������</a>


</div>

</div>
<p align="center" class="title">����</p>
<div id="coolmenu" class="this_block_is_hidden">
<a href="load.php">��������</a>


</div>

        
        </td>
        <script>
function openBlock(el) {
	// el.parentNode - ����� ������������ �������
	// el.parentNode.childNodes - ����� ��� �������� �������� ��������
	// � �������� �� � ������ kids
	var kids = el.parentNode.childNodes; 

	// ���������� � ����� ��� �������� ������� kids
	for (var k = 0; k < kids.length; k++) {
		var child = kids[k];

		// ���� ��� ������ �������� �������� ����� this_block_is_hidden,
		// �� ��������� ���� ��������� ����������
		if (child && child.className == "this_block_is_hidden") {

			// ���� ���� �� �����, �� �������� ���
			if (child.style.display != 'block') {
				child.style.display = 'block';
			} 

			// ����� ������ ���
			else {
				child.style.display = 'none';
			}
		}
	}
}
</script>