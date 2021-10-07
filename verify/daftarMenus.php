<?php 
include'../config.php';
$Qmenu = mysql_query("SELECT * FROM daftarmenu ORDER BY tipe");

$nomorurut=mysql_query("SELECT max(noTransaksi) as maxKode FROM datapesanan where lunas=1");
$nomor=mysql_fetch_array($nomorurut);
$kodeTran = $nomor['maxKode'];

$noUrut = (int) substr($kodeTran, 12, 9);
$noUrut++;
$char = "PSN";
$subthn=date('Y');
$blnhari=date('md');
$newID = $char .$subthn .$blnhari .'-'. sprintf("%03s", $noUrut);
?>
<input type="hidden" id="noTransaksi" value="<?php echo $newID ?>">
<table id="example" class="table table-bordered">
    <thead style="background-color: #0072ff;color: white;text-align: center;">
        <tr>
            <th>GAMBAR</th>
            <th>MENU</th>
            <th>HARGA</th>
            <th>STATUS</th>
            <th>PESAN</th>
        </tr>
    </thead>
    <tbody style="font-weight: bold;">
        <?php while($dataMenu = mysql_fetch_array($Qmenu)){ ?>
        <tr>
            <input type="hidden" id="idMenu_<?php echo $dataMenu['id'] ?>" value="<?php echo $dataMenu['id'] ?>">
            <input type="hidden" id="harga<?php echo $dataMenu['id'] ?>" value="<?php echo $dataMenu['harga'] ?>">
            <td width="10%" align="center"><img width="120" src="<?php echo $dataMenu['gambar'] ?>"><br><?php if($dataMenu['tipe']==1){echo'Makanan';}else{echo'Minuman';} ?></td>
            <td><?php echo $dataMenu['namaMenu'] ?><br>Stock : <?php echo $dataMenu['stock'] ?></td>
            <td align="right">Rp.<?php echo number_format($dataMenu['harga'], 0,",",".") ?>,-</td>
            <td align="center"><?php if($dataMenu['status']==0){echo'<font color="green"><b>Ready</b></font>';}else{echo'<font color="red"><b>Habis</b></font>';} ?></td>
            <td align="center"><button id="pesanMenu<?php echo $dataMenu['id'] ?>" class="btn <?php if($dataMenu['status']==0){echo'btn-success btn-sm shadow-success m-1';}else{echo'btn-danger btn-sm shadow-danger m-1';} ?>" <?php if($dataMenu['status']==1){echo'disabled';}else{} ?>><i class="fa fa-check-square-o"></i>Pesan</button></td>
        </tr>

        <script type="text/javascript">
          $("#pesanMenu<?php echo $dataMenu['id'] ?>").on("click",function(){
            var noTransaksi = document.getElementById("noTransaksi").value;
            var idMeja = document.getElementById("idMeja").value;
            if(idMeja==''){
                alert('Nomor meja harus dipilih terlebih dahulu !');
                return;
            }
            var idMenu = document.getElementById("idMenu_<?php echo $dataMenu['id'] ?>").value;
            var harga = document.getElementById("harga<?php echo $dataMenu['id'] ?>").value;
            var user = document.getElementById("user").value;
              $.ajax({
                url: 'addPesanan.php',
                method: 'POST',
                data: {noTransaksi:noTransaksi,idMeja:idMeja,idMenu:idMenu,harga:harga,user:user},
                success:function(data){
                    //$(document).ready(function(){
                      $('#daftarMenus').load("daftarMenus.php");
                    //});
                }
              });
              $.ajax({
                url: 'allPesanan.php',
                method: 'POST',
                data: {idMeja:idMeja},
                success:function(data){
                    $("#allPesanan").html(data);
                    //$('#allPesanan').load("allPesanan.php");
                }
              });
          });
        </script>
        <?php } ?>
    </tbody>
</table>
<?php include'footer.php';?>