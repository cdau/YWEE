<?php
// Anpassung und Aufteilung des Layouts: Daniel Tatzel
// Muss in der Reihenfolge bleiben
// Angepasst von Alexander Strobl
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session

$titel = "G&auml;stebuch"; // Name der Seite die im Browser angezeigt werden soll

$_SESSION['sprache'] = "de";

include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header

if (isset($_SESSION['logged-in'])) {
    ?>
    <div style="height:150px;">
        <form name="addguestbookentry" method="post" action="/scripts/WriteGuestbook.php" id="gbform">
            <input type="hidden" name="sprache" value="<?php echo $_SESSION['sprache']; ?>">
            <input type="hidden" name="username" value="<?php echo $_SESSION['user']; ?>">
            <div>
                <label for ="nachrichtentext"></label>
                <p>
                    <textarea name="eintrag" cols="33" rows="5" maxlength="300" id="nachrichtentext" placeholder ="Schreiben Sie hier ihren Gästebucheintrag..." required></textarea>
                </p>
            </div>
            <div class="line submit">
                <input type="submit" value="Absenden">
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#scrollablecontentboxguestebuch_de").height(600);
        });
    </script>

    <?php
} else {
    ?>
    <div style="height:40px;">
        Nur eingeloggte User k&ouml;nnen G&auml;stebucheintr&auml;ge verfassen!
    </div>
    <script>
        $(document).ready(function() {
            $("#scrollablecontentboxguestebuch_de").height(710);
        });
    </script>
    <?php
}
// Inkludiert den Inhalt    
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/gaestebuch.html");

include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
