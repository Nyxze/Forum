<body>
    <h1> <?=$title?></h1>
    <?php if ($hasErrors): ?>
        <ul>
            <?php foreach ($errors as $msg): ?>
                <li><?=$msg?></li>
                <?php endforeach?>
        </ul>
        <?php endif?>
<form method="post">
    <div class="mb-3">
            <label class="form-label"> Identifiant</label>
            <input class="form-control" type="text" name="login">
            </div>
    <div class="mb-3">

        <label class="form-label"> Password</label>
        <input  class="form-control" type="password" name="password">
    </div>

        <button class="btn btn-primary mt-2" type="submit" name="submit">Valid</button>
</form>
</body>
</html>