<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container"><br/>
    <h2></h2>
    <hr/>
    <div class="row">
        <div class="col-md-8">
            <h4>Produk</h4>
            <div class="row">
            <?php foreach ($data as $row) : ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4><?php echo $row->nama_barang;?></h4>
                            <div class="row">
                                <div class="col-md-7">
                                    <h4><?php echo 'Rp '.number_format($row->harga_barang);?></h4>
                                </div>
                                <div class="col-md-5">
                                    <input type="number" name="stock_barang" id="<?php echo $row->stock_barang;?>" value="1" class="quantity form-control">
                                </div>
                            </div>
                            <button class="btn btn-success btn-block" data-produkid="<?php echo $row->id_barang;?>" data-produknama="<?php echo $row->nama_barang;?>" data-produkharga="<?php echo $row->harga_barang;?>">Add To Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
                 
            </div>
 
        </div>
        <div class="col-md-4">
            <h4>Shopping Cart</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="detail_cart">
 
                </tbody>
                 
            </table>
        </div>
    </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>      
<script type="text/javascript">
    $(document).ready(function(){
        $('.addcart').click(function(){
            var id_barang    = $(this).data("produkid");
            var nama_barang  = $(this).data("produknama");
            var harga_barang = $(this).data("produkharga");
            var stock_barang = $('#' + id_barang).val();
            $.ajax({
                url : "<?php echo base_url();?>cart/addcart",
                method : "POST",
                data : {id_barang: id_barang, nama_barang: nama_barang, harga_barang: harga_barang, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
 
        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url();?>cart/loadcart");
 
        //Hapus Item Cart
        $(document).on('click','.deletecart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>cart/deletecart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script>
</body>
</html>