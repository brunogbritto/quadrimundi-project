<?php include_once __DIR__ . '/../utils/functions.php'; ?>
<?php include 'layout.php'; ?> <!-- Inclua o layout principal -->


<div id="characterDetails" class="tab-pane active">
    <div class="container mt-4">
        <?php if ($character): ?>
            <h2>Detalhes do Personagem: <?php echo htmlspecialchars($character['name']); ?></h2>

            <div class="card mb-4">
            <div class="card-body">

            <div class="flags">
                <?php echo renderFlagBadges($character); ?>
            </div>

                <h5 class="card-title mt-2"><?php echo htmlspecialchars($character['name']); ?></h5>
                <p class="card-text"><strong>Identidade Civil:</strong> <?php echo htmlspecialchars($character['civil_identity']); ?></p>
                <p class="card-text"><strong>Idade:</strong> <?php echo htmlspecialchars($character['age']); ?></p>
                <p class="card-text"><strong>Altura:</strong> <?php echo htmlspecialchars($character['height']); ?></p>
                <p class="card-text"><strong>Peso:</strong> <?php echo htmlspecialchars($character['weight']); ?></p>
                <p class="card-text"><strong>Nacionalidade:</strong> <?php echo htmlspecialchars($character['nationality']); ?></p>
                <p class="card-text"><strong>Etnia:</strong> <?php echo htmlspecialchars($character['ethnicity']); ?></p>
                <p class="card-text"><strong>Identidade Sexual:</strong> <?php echo htmlspecialchars($character['sexual_identity']); ?></p>
                <p class="card-text"><strong>PCD:</strong> <?php echo htmlspecialchars($character['pcd'] == 1 ? 'Sim' : 'Não'); ?></p>
                <p class="card-text"><strong>Outros Detalhes:</strong> <?php echo htmlspecialchars($character['other_details']); ?></p>
                <p class="card-text"><strong>Traje:</strong> <?php echo htmlspecialchars($character['costume']); ?></p>
                <p class="card-text"><strong>Acessórios e Armas:</strong> <?php echo htmlspecialchars($character['accessories']); ?></p>
                <p class="card-text"><strong>Habilidades Especiais:</strong> <?php echo htmlspecialchars($character['special_abilities']); ?></p>
                <p class="card-text"><strong>Primeira Aparição:</strong> <?php echo htmlspecialchars($character['first_appearance']); ?></p>
                <p class="card-text"><strong>Breve Histórico:</strong> <?php echo htmlspecialchars($character['backstory']); ?></p>
                <!-- Inclua mais campos conforme necessário -->
            </div>
        </div>

        <?php else: ?>
            <p>Personagem não encontrado.</p>
        <?php endif; ?>
    </div>
</div>

<script src="public/js/script.js"></script> 