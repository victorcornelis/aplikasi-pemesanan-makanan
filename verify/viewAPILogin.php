Method 	: POST
URL 		: http://localhost/primaya/API/login
Notes 		: Method ini digunakan untuk login ke aplikasi

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
		<td>login</td><tr>
		<td>2</td>
		<td>username</td>
		<td>String</td>
		<td></td>
		<td>username Login</td><tr>
		<td>3</td>
		<td>password</td>
		<td>String</td>
		<td></td>
		<td>Password Login</td><tr>
</table>

<b>Response Body :</b>
<table width="100%" border="1">
	<td>No</td>
	<td>Field Name</td>
	<td>Data Type</td>
	<td>Length</td>
	<td>Diskripsi</td><tr>
		<td>1</td>
		<td>code</td>
		<td>-</td>
		<td></td>
		<td>200 : Login successfully<br>100 : Login Failed<br>401 : Modul kosong</td><tr>
		<td>2</td>
		<td>username</td>
		<td>String</td>
		<td></td>
		<td>username Login</td><tr>
		<td>3</td>
		<td>password</td>
		<td>String</td>
		<td></td>
		<td>Password Login</td><tr>
		<td>4</td>
		<td>nama</td>
		<td>String</td>
		<td></td>
		<td>Nama User</td><tr>
		<td>5</td>
		<td>role</td>
		<td>String</td>
		<td></td>
		<td>1 : Pelayan<br>2 : Kasir</td><tr>
		<td>6</td>
		<td>Status</td>
		<td>String</td>
		<td></td>
		<td>0: Aktif<br>1: Block</td><tr>
</table>

<b>Sample Request :</b>
{
	"modul":"login",
	"username":"123",
	"password":"123",
}

<b>Sample Response :</b>
{
	"code":200,
	"message":"Login successfully",
	"username":"123",
	"password":"123",
	"nama":"Nama Pelayan",
	"role":"1",
	"status":"0"
}
