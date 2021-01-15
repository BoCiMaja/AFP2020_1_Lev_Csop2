<?php
    $books = $data;
?>
        <article>
            <form method="POST" action="">
                <div class="container">
                    <table>
                    <tr>
                        <th class="book">Könyv találati lista</th><th class="published">Kiadási év</th><th class="copies">Példány</th>
                    </tr>
                    <?php foreach($books as $book) :?>
                    <tr>						
                        <td class="book"><a href="<?=BASEURL?>/book/details/<?=$book->isbn?>"><?=$book->szerzok?> : <?=$book->cim?></a></td>
                        <td class="published"><?=$book->kiadasi_ev?></td>
                        <td class="copies"><?=$book->peldany?></td>                    
                    </tr>						
                    <?php endforeach; ?>
                    </table>
                </div>
            </form>
        </article>
    </body>
</html>