

    <!-- jumbotron -->
    <div class="container theme-showcase" role="main" style="margin-top:80px">

      <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
        <?php //echo current_url();?>
        <br/>
        <h4>Select A Local Government to display results</h4>
        <br/>
            <form class="" method="POST" action="">
                <div class="form-group"></div>
                <div class="form-group">
                <label>Local Governments</label>
                    <select name="lga" class="form-control">
                        <?php
                            foreach($query as $rows): 
                        ?>
                        <option value="<?php echo $rows->lga_id?>" <?php echo  set_select('lga', $rows->lga_id, FALSE); ?> ><?php echo $rows->lga_name;?> </option>
                        <?php 
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="submit" value="Get Results">
                </div>
            </form>
        </div>
    
    </div>

    <?php 
        if(isset($results)){        
    ?>

    <!-- jumbotron -->
    <div class="container theme-showcase" role="main">

      <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Polling Unit</th>
                <th>Total Votes</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                $i = 1;
                foreach($results as $res):
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo ucwords($res['polling_unit']); ?></td>
                <td><?php echo number_format($res['score']); ?></td>
              </tr> 
            <?php 
                $i++;
                endforeach;
            ?>             
            </tbody>
          </table>
    
    </div>
    <?php }?>

