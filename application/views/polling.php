

    <!-- jumbotron -->
    <div class="container theme-showcase" role="main" style="margin-top:80px">

      <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
        <br/>
        <h4>Select A polling unit to display results</h4>
        <br/>
            <form class="" method="POST" action="">
                <div class="form-group"></div>
                <div class="form-group">
                <label>Polling Units</label>
                    <select name="polls" class="form-control">
                        <?php
                            foreach($query as $rows): 
                        ?>
                        <option value="<?php echo $rows->uniqueid?>" <?php echo  set_select('polls', $rows->uniqueid, FALSE); ?> ><?php echo $rows->polling_unit_number.' - '.$rows->polling_unit_name;?> </option>
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

    <?php if(isset($results)){
    ?>

    <!-- jumbotron -->
    <div class="container theme-showcase" role="main">

      <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Political Party</th>
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
                <td><?php echo $res->party_abbreviation; ?></td>
                <td><?php echo $res->party_score; ?></td>
              </tr> 
            <?php 
                $i++;
                endforeach;
            ?>             
            </tbody>
          </table>
    
    </div>
    <?php }?>

