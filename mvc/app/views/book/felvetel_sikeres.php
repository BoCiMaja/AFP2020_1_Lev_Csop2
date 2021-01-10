<?php
    $isbn = $data;
?>
        <article>
            <form method="POST" action="<?=BASEURL?>/book/register">
                <div class="container">
                    <p>Könyv felvétele a katalógusba sikeres.</p>					
                    <input type="hidden" name="ISBN" value="<?=$isbn?>"><br/>
                    <input type="submit" name="second" value="Másodpéldány felvétele"/>
                </div>
            </form>
        </article>
    </body>
</html>

