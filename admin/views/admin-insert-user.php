<?php
    $upit="SELECT * FROM korisnik k INNER JOIN uloga u ON k.uloga_id=u.uloga_id";
    $users=$connection->query($upit)->fetchAll();
    $upitUloga="SELECT * FROM uloga";
    $uloge=$connection->query($upitUloga)->fetchAll();
?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Users
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Last name</th>
                                        <th>Address</th>
                                        <th>Phone number</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Date of registration</th>
                                        <th>Acctive</th>
                                        <th>Uloga</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user): ?>
                                    <?php $datum=date("d-m-Y, h-i-s",$user->datum_registracije); ?>
                                    <tr class="odd gradeX">
                                        <td><?= $user->korisnik_id;?></td>
                                        <td><?= $user->ime;?></td>
                                        <td><?= $user->prezime;?></td>
                                        <td class="center"><?= $user->adresa;?></td>
                                        <td class="center"><?= $user->telefon;?></td>
                                        <td class="center"><?= $user->email;?></td>
                                        <td class="center"><?= $user->username;?></td>
                                        <td class="center"><?= $datum;?></td>
                                        <td class="center"><?= $user->aktivan;?></td>
                                        <td class="center"><?= $user->naziv;?></td>
                                        <td><input class="btn btn-primary btn-md user-update" data-id="<?= $user->korisnik_id;?>" type="button" value="update"/> &nbsp;
                                        <input class="btn btn-danger btn-md user-delete" data-id="<?= $user->korisnik_id;?>" type="button" value="delete"/></td>
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