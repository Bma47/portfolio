<section class="section-1">
    <div class="games-container">
        <?php if (!empty($games)): ?>
            <?php foreach ($games as $game): ?>
                <!-- best games -->
                <?php if ($game['best_sold'] == 0): ?>
                    <!-- de soort van de game -->
                    <div class="row">
                        <div class="game-card">
                            <img class="game-image" src="<?= $game['image'] ?>">
                            <h3 class="game-title"><?= $game['name'] ?></h3>
                            <div class="buy-shop">
                                <div>
                                    <a href="details1.php?game_id=<?= $game['id'] ?>" class="buy-button">Bestel<i class="fa-solid fa-cart-shopping"></i></a>
                                    <p class="price"><?= $game['price'] ?><span></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
