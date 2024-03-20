<?php
function renderFlagBadges($character) {
    $flags = [
        'flg_super_heroi' => ['label' => 'Super-Herói', 'class' => 'badge-primary'],
        'flg_anti_heroi' => ['label' => 'Anti-Herói', 'class' => 'badge-secondary'],
        'flg_super_vilao' => ['label' => 'Super-Vilão', 'class' => 'badge-danger'],
        'flg_adulto' => ['label' => 'Adulto', 'class' => 'badge-warning'],
        'flg_terror' => ['label' => 'Terror', 'class' => 'badge-dark'],
        'flg_infantil' => ['label' => 'Infantil', 'class' => 'badge-info'],
        'flg_ficcao_cientifica' => ['label' => 'Ficção Científica', 'class' => 'badge-success'],
        'flg_manga' => ['label' => 'Manga', 'class' => 'badge-light'],
        'flg_comedia' => ['label' => 'Comédia', 'class' => 'badge-warning']
    ];

    $html = '';
    foreach ($flags as $key => $info) {
        if (!empty($character[$key])) {
            $html .= "<span class=\"badge {$info['class']}\">{$info['label']}</span> ";
        }
    }
    return $html;
}

?>