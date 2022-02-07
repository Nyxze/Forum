<h1><?php echo $title; ?></h1>
    <div class="container-fluid mt-100">
    <div class="row">
        <?php foreach ($messageList as $msg): ?>
                <div class="col-md-12">

                <p> Username : <?php echo $msg->getUser()->getUsername(); ?> Date:  <?php echo $msg->getDate(); ?></p>
                <p>Text Content  <?php echo $msg->getText() ?></p>

                    <?php endforeach;?>
                </div>
                <div class="form-group">
    
    </div>
    </div>
    <form method="post">
    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" name ="username" >
    </div>
    <textarea class="form-control" name ="text" id="text" rows="3"></textarea>
    <div>
       <button type="submit" name="submit" >Reply</button> 
    </div>
    </form>
</div>