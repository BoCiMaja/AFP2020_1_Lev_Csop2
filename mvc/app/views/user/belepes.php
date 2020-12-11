<?php
if (isset($data['error']))         
    $error_msg = $data['error'];
else 
    $error_msg = '';
?>
        <article>
            <form method="POST" action="<?=BASEURL?>/user/login">
                <div class="container">
                    <?php if ($error_msg) :?>
                    <label><?=$error_msg?></label><br><br>
                    <?php endif?>
                    <label for="username">Felhasználó név:</label>
                    <input type="text" id="username" name="username"><br/>
                    <label for="password">Jelszó:</label>
                    <input type="password" id="password" name="password"><br/>
                    <input type="submit" name="submit" value="Belépés">
                </div>
            </form>
        </article>
    </body>
</html>

