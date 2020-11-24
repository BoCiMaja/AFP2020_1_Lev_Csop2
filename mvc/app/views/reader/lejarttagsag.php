        <article>
            <form method="POST" action="AFP_2020_1_Lev_Csop2/mvc/public/reader/expired">
                <div class="container">
                    <table>
                    <tr>
                        <th></th><th class="reader">5 éve lejárt tagságú olvasók</th><th class="readerid">Olvasójegy száma</th><th class="days">Tagság lejárt</th>
                    </tr>
                    <?php foreach ($data['readers'] as $reader) :?>                      
                    <tr>
                        <td><input type="checkbox" name="<?=$reader->olvasojegy_azonosito?>" value="" checked></td>
                        <td class="readerid"><?=$reader->csaladi_nev .' '. $reader->utonev?></td>
                        <td class="reader"><?=$reader->olvasojegy_azonosito?></td>                        
                        <td class="days"><?=$reader->tagsag_ervenyesseg?></td>
                    </tr>     
                    <?php endforeach; ?>
                    </table>					
                    <input type="submit" name="delete" value="Törlés a nyilvántartásból">
                </div>
            </form>
        </article>
    </body>
</html>

