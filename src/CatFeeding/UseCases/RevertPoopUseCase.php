<?php
include '../../Shared/UseCases/UseCase.php';

$catId = intval($_REQUEST['CatId']);
$timestamp = $_REQUEST['Timestamp'];

if (notValidId($catId)) {
    showFinalWarning('Nie wybrano kota.');
    return;
}

if (notValidString($timestamp)) {
    showFinalWarning('Nie podano czasu.');
    return;
}

$remove = pdo()->prepare('DELETE FROM poop WHERE cat_id = ? and timestamp = ?');
$removed = $remove->execute([$catId, $timestamp]);

if ($removed) {
    showInfo('Kupa wycofana.');
} else {
    showError('Nie udało się wycofać kupy!');
    showStatementError($remove);
}

include '../../Shared/Views/Footer.php';