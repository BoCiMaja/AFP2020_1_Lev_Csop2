<?php 
    $books = $data['books'];
?>
        <article>
            <div class="container">
                <table>
                <tr>
                    <th class="book">Jelenleg kikölcsönzött könyveim</th><th class="bookid">Azonosító</th><th class="date">Határidő</th>
                </tr>
                <?php foreach ($books as $book) :?>
                <tr>					
                    <td class="book"><?=$book->Szerzok?> : <?=$book->Cim?></td>
                    <td class="bookid"><?=$book->Azonosito?></td>
                    <td class="date"><?=$book->Hatarido?></td>
                </tr>					
                <?php endforeach; ?>
                </table>
            </div>
        </article>
    </body>
</html>

