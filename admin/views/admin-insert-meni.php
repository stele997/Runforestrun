<?php
    $upit="SELECT * FROM navigacija";
    $navigation=$connection->query($upit)->fetchAll();
?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Navigation Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Navigation
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Link Id</th>
                                        <th>Title</th>
                                        <th>Path</th>
                                        <th>Parent</th>
                                        <th>Posiotion</th>
                                        <th>Level</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($navigation as $nav): ?>
                                    <tr class="odd gradeX">
                                        <td><?= $nav->id_link;?></td>
                                        <td><?= $nav->naziv;?></td>
                                        <td><?= $nav->putanja;?></td>
                                        <td class="center"><?= $nav->roditelj;?></td>
                                        <td class="center"><?= $nav->pozicija;?></td>
                                        <td class="center"><?= $nav->nivo;?></td>
                                        <td><input class="btn btn-primary btn-md meni-update" data-id="<?= $nav->id_link;?>" type="button" value="update"/> &nbsp;
                                        <input class="btn btn-danger btn-md meni-delete" data-id="<?= $nav->id_link;?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 id="naslovForma">Add new link</h1>
                                    <form id="forma" role="form">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" id="naziv" class="form-control" placeholder="Enter title">
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" id="putanja" class="form-control" placeholder="Enter path">
                                        </div>
                                        <div class="form-group">
                                            <label>Parent </label>
                                            <select id="roditelj" class="form-control">
                                            <option value="0">First level link</option>
                                                <?php foreach($navigation as $nav): ?>
                                                    <option value="<?=$nav->id_link;?>"><?=$nav->naziv;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Position</label>
                                            <input type="text" id="pozicija" class="form-control" placeholder="Enter position">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input type="text" id="nivo" class="form-control" placeholder="Enter level">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" id="insert-nav" class="btn btn-primary btn-md" value="INSERT">
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