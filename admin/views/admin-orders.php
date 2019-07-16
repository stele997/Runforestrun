<?php
    $upit="SELECT  k.korisnik_id as korisnikId, n.ime as imePrimaoca  , n.prezime as prezimePrimaoca, n.adresa as adresa, n.telefon as telefon, p.ime as proizvod, n.kolicina as kolicina,n.cena as cena, n.vremePorucivanja as vremePorudzbine FROM korisnik k INNER JOIN narudzbina n ON k.korisnik_id=n.korisnik_id
    INNER JOIN proizvod p ON n.proizvod_id=p.proizvod_id";
    $orders=$connection->query($upit)->fetchAll();
?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All orders</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Orders
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Last Name</th>
                                        <th>Address</th>
                                        <th>Phone number</th>
                                        <th>Products</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Time of order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($orders as $order): ?>
                                    <?php $time=date("d-m-Y h:i:s",$order->vremePorudzbine); ?>
                                    <tr class="odd gradeX">
                                        <td><?= $order->imePrimaoca;?></td>
                                        <td><?= $order->prezimePrimaoca;?></td>
                                        <td><?= $order->adresa;?></td>
                                        <td class="center"><?= $order->telefon;?></td>
                                        <td class="center"><?= $order->proizvod;?></td>
                                        <td class="center"><?= $order->kolicina;?></td>
                                        <td class="center"><?= $order->cena;?>$</td>
                                        <td class="center"><?= $time;?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div id="ispisiOvde" class="row">
                                
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