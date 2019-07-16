<?php
    $upit="SELECT * FROM proizvod p INNER JOIN marka m ON p.marka_id=m.marka_id";
    $upitMarka="SELECT * FROM marka";
    $marka=$connection->query($upitMarka)->fetchAll();
    $product=$connection->query($upit)->fetchAll();
?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Products
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Picture</th>
                                        <th>Brand Id</th>
                                        <th>Brand Name</th>
                                        <th>Quantity</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($product as $prod): ?>
                                    <tr class="odd gradeX">
                                        <td><?= $prod->proizvod_id;?></td>
                                        <td><?= $prod->ime;?></td>
                                        <td><?= $prod->cena;?></td>
                                        <td class="center"><img  width="50px" src="../../images/shop/<?= $prod->slika_naziv;?>" alt="<?= $prod->slika_alt;?>"/></td>
                                        <td class="center"><?= $prod->marka_id;?></td>
                                        <td class="center"><?= $prod->naziv;?></td>
                                        <td class="center"><?= $prod->kolicina;?></td>
                                        <td><input class="btn btn-primary btn-md form-update" data-id="<?= $prod->proizvod_id;?>" type="button" value="update"/> &nbsp;
                                        <input class="btn btn-danger btn-md product-delete" data-id="<?= $prod->proizvod_id;?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 id="naslovForma">Add new Product</h1>
                                    <form id="forma" method="POST" action="../php/admin-insert-product.php"  role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="naziv" id="naziv" class="form-control" placeholder="Enter product name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" name="cena"  id="cena" class="form-control" placeholder="Enter price" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Picture</label>
                                            <input type="file" name="slika"  id="slika" class="form-control" placeholder="Enter picture name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Picture Alt</label>
                                            <input type="text" name="slika_alt" id="slika_alt" class="form-control" placeholder="Enter picture alt" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Brand </label>
                                            <select name="brend" id="brend" class="form-control">
                                            <option value="0">Choose</option>
                                                <?php foreach($marka as $mar): ?>
                                                    <option value="<?=$mar->marka_id;?>"><?=$mar->naziv;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="kolicina" id="kolicina" class="form-control" placeholder="Enter quantity" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="insert-product" id="insert-product" class="btn btn-primary btn-md" value="INSERT">
                                        </div>
                                        <label id="meni-insert-result"> </label>
                                        
                                    </form>
                                </div>
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->