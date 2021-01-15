<?php 
?>
        <article>
            <form method="POST" action="">
                <div class="container">
                    <table>
                    <tr>
                        <th></th><th class="book">Határidőn túl kikölcsönzött könyvek</th><th class="bookid">Azonosító</th><th class="days">Lejárt</th>
                    </tr>
                    <?php foreach ($data as $row) :?>
                    <tr>
                        <td><input type="checkbox" name="<?=$row->peldany_id?>" value=""></td>
                        <td class="book"><?=$row->szerzok?> : <?=$row->cim?></td>
                        <td class="bookid"><?=$row->peldany_id?></td>
                        <td class="days"><?=$row->expired?></td>
                    </tr>                        
                    <?php endforeach;?>
                    </table>
                    <input type="submit" name="warn" value="Figyelmeztetendő olvasók">
                    <input type="submit" name="delete" value="Törlés a katalógusból">
                </div>
            </form>
        </article>
    </body>
</html>

