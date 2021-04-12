<?php
    namespace petitesAnnonces;
    HtmlDocument::getCurrentInstance()->addHeader("<title>Contact</title>");
?>

<form method="post">
    <input type="text" id="fName" name="firstname" placeholder="prénom">
    <br/><br/>
    <input type="text" id="lName" name="lastname" placeholder="nom">
    <br/><br/>
    <textarea id="comments" name="commentaire" placeholder ="laisser un commentaire"></textarea>
    <br/><br/>
    <input type="submit" value="Envoyer">
</form>