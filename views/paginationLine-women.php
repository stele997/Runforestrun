<?php
$nekiUpit=$connection->query("SELECT * FROM proizvod WHERE pol='Z'");
$rezultatUpita=$nekiUpit->fetchAll();
$brojProizvoda=count($rezultatUpita);
$brojStrane=ceil($brojProizvoda/$po_strani);
?>
<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                            </li>
                            <?php for($i=1;$i<=$brojStrane;$i++):?>
                            <li><a href="woman.php?str=<?= $i;?>"><?=$i?></a></li>
                            <?php endfor; ?>
                            <li>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
                </div>
                </div>