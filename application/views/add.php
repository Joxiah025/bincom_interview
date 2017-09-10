

    <!-- jumbotron -->
    <div class="container theme-showcase" role="main" style="margin-top:80px">

      <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
        <br/>
        <h4>Add A Result</h4>
        <br/>
            <form class="" method="POST" action="">
                <div class="form-group">
                <?php 
                if(validation_errors()){
                    echo validation_errors('<div class="alert alert-warning">','<button class="close" data-dismiss="alert">&times;</button></div>');
                }else if($this->session->flashdata('success')){
                    echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
                }
                ?>
                </div>
                <div class="form-group">
                <label class="control-label">Select A Polling Unit <sup class="text-danger">*</sup></label>
                    <select name="polls" class="form-control input-lg">
                    <option value=""></option>
                        <?php
                            foreach($query as $rows): 
                        ?>
                        <option value="<?php echo $rows->uniqueid?>" <?php echo  set_select('polls', $rows->uniqueid, FALSE); ?> ><?php echo $rows->polling_unit_number.' - '.$rows->polling_unit_name;?> </option>
                        <?php 
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                <label class="control-label" > Select A political Party <sup class="text-danger">*</sup></label>
                    <select name="party" class="form-control input-lg">
                    <option value=""></option>
                        <?php
                            foreach($party as $part): 
                        ?>
                        <option value="<?php echo $part->partyid;?>" <?php echo  set_select('party', $part->partyid, FALSE); ?> ><?php echo $part->partyname;?> </option>
                        <?php 
                            endforeach;
                        ?>
                    </select>
                </div>                
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" > Party Score <sup class="text-danger">*</sup></label>
                    <input type="number" min="0" <?php echo  set_value('score');?> class="form-control input-lg" name="score" value=""/>
                </div>
                </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Added By Who? <sup class="text-danger">*</sup></label>
                    <input type="text" <?php echo  set_value('username');?>  class="form-control input-lg" name="username" value=""/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="Add Results">
                </div>
            </form>
        </div>
    
    </div>

    