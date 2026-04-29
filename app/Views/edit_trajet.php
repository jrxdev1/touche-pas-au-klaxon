<form method="POST" action="/touche_pas_au_klaxon/public/update-trajet">

    <input type="hidden" name="id" value="<?= $trajet['id'] ?>">

    <!-- Départ -->
     <label for="">Agence de départ</label>
    <select name="depart">
        <?php foreach ($agences as $agence): ?>
            <option value="<?= $agence['id'] ?>"
                <?= $agence['id'] == $trajet['depart_agence_id'] ? 'selected' : '' ?>
                <?= $agence['nom_ville'] ?>>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Arrivée -->
    <label for="">Agence d'arrivée</label>
    <select name="arrivee" class="form-control" required>
        <?php foreach ($agences as $agence): ?>
            <option value="<?= $agence['id'] ?>"
                <?= $agence['id'] == $trajet['arrivee_agence_id'] ? 'selected' : '' ?>>
                <?= $agence['nom_ville'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="datetime-local" name="date_depart"
        value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_depart'])) ?>">

    <input type="datetime-local" name="date_arrivee"
        value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_arrivee'])) ?>">

    <input type="number" name="places" value="<?= $trajet['places_totales'] ?>">

    <button>Modifier</button>

</form>