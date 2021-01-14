<?php
    $reader = $data['reader'];
    $books = $data['books'];    
?>
        <article>			
            <div class="container"> 
                <div class="column">                    
                    <label for="azonosito">Olvasójegy azonosító:</label>												
                    <input type="number" id="azonosito" name="azonosito" tabindex="1" value="<?=$reader->Olvasojegy_azonosito?>"><br/>
                </div>
                <div class="column">                    
                    <label for="olvasonev">Olvasó neve:</label>
                    <input type="text" id="olvasonev" name="olvasonev" tabindex="3" value="<?=$reader->Csaladi_nev?> <?=$reader->Utonev?>"><br/>
                </div>                    
            </div>                        
            <div class="container">                    
                <table>                
                <tr>
                    <th class="book">Nem hosszabbítható határidős könyvek</th>
                    <th class="bookid">Azonosító</th>
                    <th class="days">Lejárat</th>
                </tr>                    
                <?php foreach ($books as $book) :?>
                <tr>                    
                    <td class="book"><?=$book->Szerzok?> : <?=$book->Cim?></td>
                    <td class="bookid"><?=$book->Azonosito?></td>
                    <td class="days"><?=$book->Hatarido?></td>
                </tr>
                <?php endforeach; ?>
                </table>                
            </div>            	            
        </article>
    </body>
</html>

