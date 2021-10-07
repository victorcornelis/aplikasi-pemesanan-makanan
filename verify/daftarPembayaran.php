<?php 
include'../config.php';
$Qpembayaran = mysql_query("SELECT dp.*, nm.nomor, SUM(dp.harga)AS total, GROUP_CONCAT(dm.namaMenu SEPARATOR ', \n')AS namaMenu FROM datapesanan dp
LEFT JOIN nomeja nm ON dp.idMeja = nm.id
LEFT JOIN daftarmenu dm ON dp.idMenu = dm.id
GROUP BY dp.noTransaksi ORDER BY dp.id");
?>
<table class="table table-bordered">
    <thead style="background-color: #0072ff;color: white;text-align: center;">
        <tr>
            <th>NO</th>
            <th>NO.PESANAN</th>
            <th>NO.MEJA</th>
            <th>MENU</th>
            <th>TOTAL</th>
            <th>BAYAR</th>
        </tr>
    </thead>
    <tbody style="font-weight: bold;">
        <?php $no=1; while($dataPemabyaran = mysql_fetch_array($Qpembayaran)){ ?>
        <tr>
            <input type="hidden" id="noTransaksi_<?php echo $dataPemabyaran['id'] ?>" value="<?php echo $dataPemabyaran['noTransaksi'] ?>">
            <td align="center"><?php echo $no++ ?></td>
            <td align="center"><?php echo $dataPemabyaran['noTransaksi'] ?></td>
            <td align="center"><?php echo $dataPemabyaran['nomor'] ?></td>
            <td><pre style="font-size: 13px;"><?php echo $dataPemabyaran['namaMenu'] ?></pre></td>
            <td align="right">Rp.<?php echo number_format($dataPemabyaran['total'], 0,",",".") ?>,-</td>
            <td align="center"><?php if($dataPemabyaran['lunas']==0){ ?>
                <button id="bayar<?php echo $dataPemabyaran['id'] ?>" class="btn btn-warning btn-sm shadow-warning m-1"><i class="fa fa-check-square-o"></i>Bayar</button>
            <?php }else{ ?>
                <font color="green">LUNAS</font>
            <?php } ?></td>
        </tr>

        <script type="text/javascript">
          $("#bayar<?php echo $dataPemabyaran['id'] ?>").on("click",function(){
            var noTransaksi = document.getElementById("noTransaksi_<?php echo $dataPemabyaran['id'] ?>").value;
            var user = document.getElementById("user").value;
              $.ajax({
                url: 'addPembayaran.php',
                method: 'POST',
                data: {noTransaksi:noTransaksi,user:user},
                success:function(data){
                    swal({
                        icon: 'success',
                        title: 'Pembayaran Berhasil',
                        text: 'Pembayaran Lunas',
                        type: 'success',
                        timer: 3000,
                        button: false,
                      });
                    $(document).ready(function(){
                      $('#daftarPembayaran').load("daftarPembayaran.php");
                    });
                }
              });
          });
        </script>
        <?php } ?>
    </tbody>
</table>
<?php include'footer.php';?>