<main class="container-md">
    <section class="mb-3">
        <!-- Titre -->
        <h2 class="box-title hr">Building items</h2>

        <form method="post">

            <label for="building_id">Building ID</label>
            <input class="form-control" type="number" name="building_id" id="building_id" placeholder="Building ID" value="<?php if (isset($data)): echo $data[0]; endif; ?>" autofocus required>
            <label for="item_id">Item ID</label>
            <input class="form-control" type="number" name="item_id" id="item_id" placeholder="Item ID" value="<?php if (isset($data)): echo $data[1]; endif; ?>" required>
            <label for="quantity">Quantity</label>
            <input class="form-control" type="number" name="quantity" id="quantity" placeholder="Quantity" value="<?php if (isset($data)): echo $data[2]; endif; ?>" required>
            <hr>
            <?php if (isset($data)): ?>
                <button type="submit" id="update" name="update">Modifier</button>
            <?php else: ?>
                <button type="submit" id="insert" name="insert">Ajouter</button>
            <?php endif; ?>
            <a href="<?= ROOT ?>building/items" class="no-decoration"><button type="button">Retour</button></a>

        </form>

    </section>
</main>