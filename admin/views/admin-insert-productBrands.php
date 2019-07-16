<?php
    $upit="SELECT * FROM marka";
    $marke=$connection->query($upit)->fetchAll();
?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Brand Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Brands
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Role Id</th>
                                        <th>Name</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($marke as $marka): ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?= $marka->marka_id;?></td>
                                        <td class="center"><?= $marka->naziv;?></td>
                                        <td><input class="btn btn-danger btn-md brand-delete" data-id="<?=  $marka->marka_id;?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div id="ispisiOvde" class="row">
                            <div class="col-lg-12">
                                    <h1 id="naslovForma">Add new brand</h1>
                                    <form id="forma" role="form">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" id="naziv" class="form-control" placeholder="Enter role name">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" id="insert-brand" class="btn btn-primary btn-md" value="INSERT">
                                        </div>
                                        <label id="meni-insert-result"> </label>
                                        
                                    </form>
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