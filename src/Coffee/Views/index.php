<?php
include '../../Shared/Views/View.php';

$coffees = get('select c.current, c.last_cleaning from coffees c', []);

$coffeesUntilCleaning = $coffees['last_cleaning'] + 100 - $coffees['current'];

if ($coffeesUntilCleaning < 0) {
    showWarning('Umyj ekspres.');
} else {
    showInfo("Jeszcze $coffeesUntilCleaning kaw do mycia.");
}

?>

    <form action="../Application/MakeCoffeeController.php" method="post">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Zrób kawę</button>
        </div>
    </form>
    <form>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" disabled>Umyj ekspres</button>
        </div>
    </form>

<?php
include '../../Shared/Views/Footer.php';