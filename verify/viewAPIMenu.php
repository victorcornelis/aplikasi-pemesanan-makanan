Method 	: GET
URL 		: http://localhost/primaya/API/menu
Notes 		: Method ini digunakan untuk melihat data menu

<b>Request Parameter :</b>
<table width="100%" border="1">
	<td>No</td>
	<td>Field Name</td>
	<td>Data Type</td>
	<td>Length</td>
	<td>Diskripsi</td><tr>
		<td>1</td>
		<td>modul</td>
		<td>-</td>
		<td>-</td>
		<td>allMenu</td>
</table>

<b>Response Body :</b>
<table width="100%" border="1">
	<td>No</td>
	<td>Field Name</td>
	<td>Data Type</td>
	<td>Length</td>
	<td>Diskripsi</td><tr>
		<td>1</td>
		<td>id</td>
		<td>-</td>
		<td></td>
		<td>ID Menu</td><tr>
		<td>2</td>
		<td>namaMenu</td>
		<td>String</td>
		<td></td>
		<td>Nama menu makanan</td><tr>
		<td>3</td>
		<td>tipe</td>
		<td>String</td>
		<td></td>
		<td>1: Makanan, 2:Minuman</td><tr>
		<td>4</td>
		<td>gambar</td>
		<td>String</td>
		<td></td>
		<td>Gambar menu</td><tr>
		<td>5</td>
		<td>harga</td>
		<td>String</td>
		<td></td>
		<td>Harga menu</td><tr>
		<td>6</td>
		<td>stock</td>
		<td>String</td>
		<td></td>
		<td>Stock menu</td><tr>
		<td>7</td>
		<td>Status</td>
		<td>String</td>
		<td></td>
		<td>0: Aktif<br>1: Block</td><tr>
		<td>8</td>
		<td>createdate</td>
		<td>String</td>
		<td></td>
		<td>Tgl pembuatan menu</td><tr>
</table>

<b>Sample Request :</b>
{
	"modul":"allMenu"
}

<b>Sample Response :</b>
<pre>Array
(
    [0] => Array
        (
            [id] => 1
            [namaMenu] => Menu Makanan 1
            [tipe] => 1
            [gambar] => images/menu1.jpg
            [harga] => 12500
            [stock] => 68
            [status] => 0
            [createdate] => 2021-10-06 19:56:07
        )

    [1] => Array
        (
            [id] => 2
            [namaMenu] => Menu Makanan 2
            [tipe] => 1
            [gambar] => images/menu2.jpg
            [harga] => 23000
            [stock] => 40
            [status] => 0
            [createdate] => 2021-10-06 19:56:13
        )

    [2] => Array
        (
            [id] => 4
            [namaMenu] => Menu Makanan 4
            [tipe] => 1
            [gambar] => images/menu4.jpg
            [harga] => 21500
            [stock] => 55
            [status] => 0
            [createdate] => 2021-10-06 19:56:27
        )

    [3] => Array
        (
            [id] => 6
            [namaMenu] => Menu minuman 1
            [tipe] => 2
            [gambar] => images/minum1.jpg
            [harga] => 13000
            [stock] => 54
            [status] => 0
            [createdate] => 2021-10-06 19:56:41
        )

    [4] => Array
        (
            [id] => 7
            [namaMenu] => Menu minuman 2
            [tipe] => 2
            [gambar] => images/minum2.jpg
            [harga] => 15000
            [stock] => 50
            [status] => 0
            [createdate] => 2021-10-06 19:56:46
        )

)
</pre>
