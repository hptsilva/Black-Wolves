<?php

function dicionario() {

    // Dicionario representando todos as chaves possíveis do formulário
    return array(

        //tipos de itens
        'normal' => 'Normal',
        'exotica' => 'Exótica',
        'verde' => 'Gear Set',
        'nomeada' => 'Nomeada',
        'improvisado' => 'Improvisado',
        'exotica-ninjabike' => 'Exótica (Ninjabike)',
        'exotica-lembrancinha' => 'Exótica (Lembrancinha)',

        // tipos de especialização
        'artilheiro' => 'Artilheiro',
        'atirador-de-elite' => 'Atirador de Elite',
        'demolidor' => 'Demolidor',
        'fogareu' => 'Fogaréu',
        'sobrevivencialista' => 'Sobrevivencialista',
        'tecnico' => 'Técnico',

        // atributos centrais
        'dano' => 'Dano de arma (%)',
        'protecao' => 'Proteção balística',
        'tier' => 'Tier de habilidade',

        // atributos
        'dano-rifle-assalto' => 'Dano de rifle de assalto (%)',
        'dano-escopeta' => 'Dano de escopeta (%)',
        'dano-submetralhadora' => 'Dano de submetralhadora (%)',
        'dano-rifle-precisao' => 'Dano de rifle de precisão (%)',
        'dano-rifle' => 'Dano de rifle (%)',
        'dano-metralhadora-leve' => 'Dano de metralhadora leve (%)',
        'dano-de-pistola' => 'Dano de pistola (%)',
        'dano-critico' => 'Dano crítico (%)',
        'dano-vida' => 'Dano à vida (%)',
        'dano-tiro-cabeca' => 'Dano de tiro na cabeça (%)',
        'dano-protecao' => 'Dano à proteção (%)',
        'chance-critico' => 'Chance de crítico (%)',
        'dano-alvo-exposto' => 'Dano ao alvo exposto (%)',
        'aceleracao-habilidade' => 'Aceleração de habilidade (%)',
        'alcance-ideal' => 'Alcance ideal (%)',
        'cadencia-tiro' => 'Cadência de tiro (%)',
        'dano-habilidade' => 'Dano de habilidade (%)',
        'chance-dano-critico' => 'Chance de dano crítico (%)',
        'efeito-status' => 'Efeitos de status (%)',
        'estabilidade' => 'Estabilidade (%)',
        'habilidades-conserto' => 'Habilidades de conserto (%)',
        'manuseio' => 'Manuseio de armas (%)',
        'precisao' => 'Precisão (%)',
        'protecao-contra-efeitos' => 'Proteção contra efeitos (%)',
        'regeneracao' => 'Regeneração de proteção (PV/s)',
        'resistencia-explosivo' => 'Resistência a explosivo (%)',
        'tamanho-pente' => 'Tamanho do pente (%)',
        'velocidade-recarga' => 'Velocidade de recarga (%)',
        'velocidade-troca' => 'Velocidade de troca (%)',
        'vida' => 'Vida',
        'resistencia-combustao' => 'Resistência a combustão (%)',
        'resistencia-desorientacao' => 'Resistência a desorientação (%)',
        'resistencia-desestabilizacao' => 'Resistência a desestabilização (%)',
        'regeneracao2' => 'Regeneração de proteção (%)',

        // talento
        'abelha-operaria' => 'Abelha Operária',
        'acelerador-eletromagnetico' => 'Acelerador Eletromagnético',
        'aceso' => 'Aceso',
        'actum-est' => 'Actum Est',
        'armas-combinadas' => 'Armas Combinadas',
        'aposta-do-agressor' => 'Aposta do Agressor',
        'ataque-da-aguia' => 'Ataque da Águia',
        'atras-de-voce' => 'Atrás de Você',
        'amaciador' => 'Amaciador',
        'bumerangue' => 'Bumerangue',
        'bombardeiro-insano' => 'Bombardeiro Insado',
        'cacador-de-cabecas' => 'Caçador de Cabeças',
        'cacador-de-cabecas-perfeito' => 'Caçador de Cabeças Perfeito',
        'cacador-de-feras' => 'Caçador de Feras',
        'calculado' => 'Calculado',
        'canhao-de-vidro' => 'Canhão de Vidro',
        'capacitancia' => 'Capacitância',
        'cara-a-cara' => 'Cara a Cara',
        'cefaleia' => 'Cefaleia',
        'centelha' => 'Centelha',
        'controle-terrestre' => 'Controle Terrestre',
        'choque-septico' => 'Choque Séptico',
        'comedido' => 'Comedido',
        'companheirismo' => 'Companheirismo',
        'compensador' => 'Compensador',
        'compostura ' => 'Compostura',
        'concusao ' => 'Concussão',
        'controle-tudo' => 'Controle Tudo',
        'descaramento' => "Descaramento",
        'desvario' => 'Desvario',
        'determinacao' => 'Determinação',
        'determinacao-empatica' => 'Determinação Empática',
        'foco' => 'Foco',
        'forca-imparavel' => 'Forca Imparável',
        'eficiencia' => 'Eficiência',
        'energizar' => 'Energizar',
        'entrega-explosiva' => 'Entrega Explosiva',
        'entrincheirar' => 'Entrincheirar',
        'espancar' => 'Espancar',
        'estabilizar' => 'Estabilizar',
        'estaca' => 'Estaca',
        'estado-de-choque' => 'Estado de Choque',
        'estoicismo' => 'Estoicismo',
        'experiente' => 'Experiente',
        'falacao-incessante' => 'Falação Incessante',
        'frenesi' => 'Frenesi',
        'fulminante' => 'Fulminante',
        'fulminante-perfeito' => 'Fulminante Perfeito',
        'futuro-perfeito' => 'Futuro Perfeito',
        'fuzileiro' => 'Fuzileiro',
        'galvanizar' => 'Galvanizar',
        'geri-e-freki' => 'Geri e Freki',
        'homicida' => 'Homicida',
        'hora-h' => 'Hora H',
        'inabalavel' => 'Inabalável',
        'inabalavel-perfeito' => 'Inabalável Perfeito',
        'inferno-das-balas' => 'Inferno das Balas',
        'injecao-de-adrenalina' => 'Injeção de Adrenalina',
        'inpulso-cinetico' => 'Impulso Cinético',
        'inquebrável' => 'Inquebrável',
        'intimidar' => 'Intimidar',
        'intimidar-perfeito' => 'Intimidar Perfeito',
        'inviolavel' => 'Inviolável',
        'instintos-adaptaveis' => 'Instintos Adaptáveis',
        'interface-de-assalto-ortiz' => 'Interface de Assalto Ortiz',
        'leveza-subjetiva' => 'Leveza Subjetiva',
        'liberdade-ou-morte' => 'Liberdade ou Morte',
        'lideranca' => 'Liderança',
        'marreta' => 'Marreta',
        'marreta-perfeita' => 'Marreta Perfeita',
        'maos-firmes' => 'Mãos Firmes',
        'maos-perfeitamente-firmes' => 'Mãos Perfeitamente Firmes',
        'maos-rapidas' => 'Mãos Rápidas',
        'matador' => 'Matador',
        'matador-perfeito' => 'Matador Perfeito',
        'miopia' => 'Miopia',
        'morte-a-espreita' => 'Morte à Espreita',
        'nudez' => 'Nudez',
        'no-limite' => 'No Limite',
        'obliterar' => 'Obliterar',
        'olhar-de-fora' => 'Olhar de Fora',
        'oportunista' => 'Oportunista',
        'otimismo' => 'Otimismo',
        'otimismo-perfeito' => 'Otimismo Perfeito',
        'overclock' => 'Overclock',
        'overclock-de-transferencia' => 'Overclock de Transferência',
        'perfeitamento-atras-de-voce' => 'Perfeitamente Atrás de Você',
        'perfeitamente-extra' => 'Perfeitamente Extra',
        'perfeitamente-imquebrável' => 'Perfeitamente Inquebrável',
        'perfeitamente-sincronizado' => 'Perfeitamente Sincronizado',
        'perpetuacao' => 'Perpetuação',
        'perversidade' => 'Perversidade',
        'pilhadaco' => 'Pilhadaço',
        'pistoleiro' => 'pistoleiro',
        'primeiro-impacto' => 'Primeiro Impacto',
        'preservacao' => 'Preservação',
        'protetor' => 'Protetor',
        'recarga-protegida' => 'Recarga Protegida',
        'redesignado' => 'Redesignado',
        'reforma' => 'Reforma',
        'regicida' => 'Regicida',
        'reparos-improvisados' => 'Reparos Improvisados',
        'respiro-aliviado' => 'Respiro Aliviado',
        'revezamento' => 'Revezamento',
        'sadismo' => 'Sadismo',
        'salvaguarda' => 'Salvaguarda',
        'sanguessuga' => 'Sanguessuga',
        'sem-olhos' => 'Sem Olhos',
        'sentinela' => 'Sentinela',
        'sincronizado' => 'Sincronizado',
        'superpredador' => 'Superpredador',
        'suporte-tecnico' => 'Suporte Técnico',
        'tiro-de-sorte' => 'Tiro de Sorte',
        'transbordante' => 'Transbordante',
        'trauma' => 'Trauma',
        'vanguarda' => 'Vanguarda',
        'vanguarda-perfeita' => 'Vanguarda Perfeita',
        'versatil' => 'Versátil',
        'vigilancia' => 'Vigilancia',
        'vigilante' => 'Vigilante',
        'vingativo' => 'Vingativo',
        'vingativo-perfeito' => 'Vingativo Perfeito',

        // modificação
        'dano-tiro-na-cabeca' => 'Dano de tiro na cabeça (%)',
        'protecao-elites' => 'Proteção contra elites (%)',
        'protecao-matar' => 'Proteção ao matar (%)',
        'resistencia-explosivos' => 'Resistência a explosivos (%)',
        'resistencia-efeitos' => 'Resistência contra efeitos (%)',
        'recebimento-cura' => 'Recebimento de cura extra (%)',
        'duracao-habilidade' => 'Duração de habilidade (%)',

        // habilidades
        'armadilha-choque' => 'Armadilha (Choque)',
        'amradilha-estilhacos' => 'Armadilha (Estilhaços)',
        'armadilha-reparadora' => 'Armadilha (Reparadora)',
        'bomba-pegajosa-combustao' => 'Bomba Pegajosa (Combustão)',
        'bomba-pegajosa-explosivo' => 'Bomba Pegajosa (Explosivo)',
        'bomba-pegajosa-pem' => 'Bomba Pegajosa (PEM)',
        'colmeia-restauradora' => 'Colmeia (Restauradora)',
        'colmeia-vespa' => 'Colmeia (Vespa)',
        'colmeia-reanimadora' => 'Colmeia (Reanimadora)',
        'colmeia-estimulante' => 'Colmeia (Estimulante)',
        'colmeia-artifice' => 'Colmeia (Artífice)',
        'drone-agressor' => 'Drone (Agressor)',
        'drone-defensor' => 'Drone (Defensor)',
        'drone-bombardeiro' => 'Drone (Bombardeiro)',
        'drone-guardiao' => 'Drone (Guardião)',
        'drone-estrategista' => 'Drone (Estrategista)',
        'escudo-balistico-bastiao' => 'Escudo Balístico (Bastião)',
        'escudo-balistico-cruzado' => 'Escudo Balístico (Cruzado)',
        'escudo-balistico-defletor' => 'Escudo Balístico (Defletor)',
        'escudo-balistico-agressor' => 'Escudo Balístico (Agressor)',
        'isca-distracao-holografica' => 'Isca (Distração Holográfica)',
        'lancador-quimico-fortificador' => 'Lançador Químico (Fortificador)',
        'lancador-quimico-inflamavel' => 'Lançador Químico (Inflamável)',
        'lancador-quimico-espuma-antimotim' => 'Lançador Químico (Espuma Antimotim)',
        'lancador-quimico-oxidante' => 'Lançador Químico (Oxidante)',
        'mina-guida-explosiva' => 'Mina Guiada (Explosiva)',
        'mina-guida-explosao-aerea' => 'Mina Guiada (Explosão Aérea)',
        'mina-guida-cluster' => 'Mina Guiada (Cluster)',
        'mina-guida-reparadora' => 'Mina Guiada (Reparadora)',
        'pulso-scanner' => 'Pulso (Scanner)',
        'pulso-remoto' => 'Pulso (Remoto)',
        'pulso-bloqueador' => 'Pulso (Bloqueador)',
        'pulso-banshee' => 'Pulso (Banshee)',
        'pulso-aquiles' => 'Pulso (Aquiles)',
        'torreta-agressora' => 'Toreta (Agressora)',
        'torreta-incendiaria' => 'Torreta (Incendiária)',
        'torreta-franco-atiradora' => 'Torreta (Franco-atiradora)',
        'torreta-artilharia' => 'Torreta (Artilharia)',
        'vagalume-ofuscador' => 'Vagalume (Ofuscador)',
        'vagalume-estilhacador' => 'Vagalume (Estilhaçador)',
        'vagalume-demolidor' => 'Vagalume (Demolidor)',
   );   

}


function atributoCentral1(){

    // Dicionario representando todas as chaves para os atributos centrais de primeira ordem
    return array(
        'dano-rifle-assalto' => 'Dano de rifle de assalto (%)',
        'dano-escopeta' => 'Dano de escopeta (%)',
        'dano-submetralhadora' => 'Dano de submetralhadora (%)',
        'dano-rifle-precisao' => 'Dano de rifle de precisão (%)',
        'dano-rifle' => 'Dano de rifle (%)',
        'dano-metralhadora-leve' => 'Dano de metralhadora leve (%)',
        'dano-de-pistola' => 'Dano de pistola (%)',
    );

}

function atributoCentral2(){

    // Dicionario representando todas as chaves para os atributos centrais de segunda ordem
    return array(
        'dano-critico' => 'Dano crítico (%)',
        'dano-vida' => 'Dano à vida (%)',
        'dano-tiro-cabeca' => 'Dano de tiro na cabeça (%)',
        'dano-protecao' => 'Dano à proteção (%)',
        'chance-critico' => 'Chance de crítico (%)',
        'dano-alvo-exposto' => 'Dano ao alvo exposto (%)',
    );
}

function dicionarioAtributo(){

    // Dicionario representando todos as chaves dos atributos possíveis
    return array(
        'aceleracao-habilidade' => 'Aceleração de habilidade (%)',
        'alcance-ideal' => 'Alcance ideal (%)',
        'cadencia-tiro' => 'Cadência de tiro (%)',
        'dano-protecao' => 'Dano à proteção (%)',
        'dano-vida' => 'Dano à vida (%)',
        'dano-alvo-exposto' => 'Dano ao alvo exposto (%)',
        'dano-critico' => 'Dano crítico (%)',
        'dano-habilidade' => 'Dano de habilidade (%)',
        'chance-critico' => 'Chance de crítico (%)',
        'chance-dano-critico' => 'Chance de dano crítico (%)',
        'dano-tiro-cabeca' => 'Dano de tiro na cabeça (%)',
        'efeito-status' => 'Efeitos de status (%)',
        'estabilidade' => 'Estabilidade (%)',
        'habilidades-conserto' => 'Habilidades de conserto (%)',
        'manuseio' => 'Manuseio de armas (%)',
        'precisao' => 'Precisão (%)',
        'protecao' => 'Proteção balística',
        'protecao-contra-efeitos' => 'Proteção contra efeitos (%)',
        'recebimento-cura' => 'Recebimento de cura extra (%)',
        'regeneracao' => 'Regeneração de proteção (PV/s)',
        'regeneracao2' => 'Regeneração de proteção (%)',
        'resistencia-desestabilizacao' => 'Resistência a desestabilização (%)',
        'resistencia-desorientacao' => 'Resistência a desorientação (%)',
        'resistencia-explosivo' => 'Resistência a explosivo (%)',
        'tamanho-pente' => 'Tamanho do pente (%)',
        'velocidade-recarga' => 'Velocidade de recarga (%)',
        'velocidade-troca' => 'Velocidade de troca (%)',
        'vida' => 'Vida',
        'tier' => 'Tier de habilidade',
    );
}

function dicionarioTalento(){
    
    // Dicionario representando todos as chaves possíveis para os talentos
    return array(
        'abelha-operaria' => 'Abelha Operária',
        'acelerador-eletromagnetico' => 'Acelerador Eletromagnético',
        'aceso' => 'Aceso',
        'actum-est' => 'Actum Est',
        'armas-combinadas' => 'Armas Combinadas',
        'aposta-do-agressor' => 'Aposta do Agressor',
        'ataque-da-aguia' => 'Ataque da Águia',
        'atras-de-voce' => 'Atrás de Você',
        'amaciador' => 'Amaciador',
        'bumerangue' => 'Bumerangue',
        'bombardeiro-insano' => 'Bombardeiro Insado',
        'cacador-de-cabecas' => 'Caçador de Cabeças',
        'cacador-de-cabecas-perfeito' => 'Caçador de Cabeças Perfeito',
        'cacador-de-feras' => 'Caçador de Feras',
        'calculado' => 'Calculado',
        'canhao-de-vidro' => 'Canhão de Vidro',
        'capacitancia' => 'Capacitância',
        'cara-a-cara' => 'Cara a Cara',
        'cefaleia' => 'Cefaleia',
        'centelha' => 'Centelha',
        'controle-terrestre' => 'Controle Terrestre',
        'choque-septico' => 'Choque Séptico',
        'comedido' => 'Comedido',
        'companheirismo' => 'Companheirismo',
        'compensador' => 'Compensador',
        'compostura ' => 'Compostura',
        'concusao ' => 'Concussão',
        'controle-tudo' => 'Controle Tudo',
        'descaramento' => "Descaramento",
        'desvario' => 'Desvario',
        'determinacao' => 'Determinação',
        'determinacao-empatica' => 'Determinação Empática',
        'foco' => 'Foco',
        'forca-imparavel' => 'Forca Imparável',
        'eficiencia' => 'Eficiência',
        'energizar' => 'Energizar',
        'entrega-explosiva' => 'Entrega Explosiva',
        'entrincheirar' => 'Entrincheirar',
        'espancar' => 'Espancar',
        'estabilizar' => 'Estabilizar',
        'estaca' => 'Estaca',
        'estado-de-choque' => 'Estado de Choque',
        'estoicismo' => 'Estoicismo',
        'experiente' => 'Experiente',
        'falacao-incessante' => 'Falação Incessante',
        'frenesi' => 'Frenesi',
        'fulminante' => 'Fulminante',
        'fulminante-perfeito' => 'Fulminante Perfeito',
        'futuro-perfeito' => 'Futuro Perfeito',
        'fuzileiro' => 'Fuzileiro',
        'galvanizar' => 'Galvanizar',
        'geri-e-freki' => 'Geri e Freki',
        'homicida' => 'Homicida',
        'hora-h' => 'Hora H',
        'inabalavel' => 'Inabalável',
        'inabalavel-perfeito' => 'Inabalável Perfeito',
        'inferno-das-balas' => 'Inferno das Balas',
        'injecao-de-adrenalina' => 'Injeção de Adrenalina',
        'inpulso-cinetico' => 'Impulso Cinético',
        'inquebrável' => 'Inquebrável',
        'intimidar' => 'Intimidar',
        'intimidar-perfeito' => 'Intimidar Perfeito',
        'inviolavel' => 'Inviolável',
        'instintos-adaptaveis' => 'Instintos Adaptáveis',
        'interface-de-assalto-ortiz' => 'Interface de Assalto Ortiz',
        'leveza-subjetiva' => 'Leveza Subjetiva',
        'liberdade-ou-morte' => 'Liberdade ou Morte',
        'lideranca' => 'Liderança',
        'marreta' => 'Marreta',
        'marreta-perfeita' => 'Marreta Perfeita',
        'maos-firmes' => 'Mãos Firmes',
        'maos-perfeitamente-firmes' => 'Mãos Perfeitamente Firmes',
        'maos-rapidas' => 'Mãos Rápidas',
        'matador' => 'Matador',
        'matador-perfeito' => 'Matador Perfeito',
        'miopia' => 'Miopia',
        'morte-a-espreita' => 'Morte à Espreita',
        'nudez' => 'Nudez',
        'no-limite' => 'No Limite',
        'obliterar' => 'Obliterar',
        'olhar-de-fora' => 'Olhar de Fora',
        'oportunista' => 'Oportunista',
        'otimismo' => 'Otimismo',
        'otimismo-perfeito' => 'Otimismo Perfeito',
        'overclock' => 'Overclock',
        'overclock-de-transferencia' => 'Overclock de Transferência',
        'perfeitamento-atras-de-voce' => 'Perfeitamente Atrás de Você',
        'perfeitamente-extra' => 'Perfeitamente Extra',
        'perfeitamente-imquebrável' => 'Perfeitamente Inquebrável',
        'perfeitamente-sincronizado' => 'Perfeitamente Sincronizado',
        'perpetuacao' => 'Perpetuação',
        'perversidade' => 'Perversidade',
        'pilhadaco' => 'Pilhadaço',
        'pistoleiro' => 'pistoleiro',
        'primeiro-impacto' => 'Primeiro Impacto',
        'preservacao' => 'Preservação',
        'protetor' => 'Protetor',
        'recarga-protegida' => 'Recarga Protegida',
        'redesignado' => 'Redesignado',
        'reforma' => 'Reforma',
        'regicida' => 'Regicida',
        'reparos-improvisados' => 'Reparos Improvisados',
        'respiro-aliviado' => 'Respiro Aliviado',
        'revezamento' => 'Revezamento',
        'sadismo' => 'Sadismo',
        'salvaguarda' => 'Salvaguarda',
        'sanguessuga' => 'Sanguessuga',
        'sem-olhos' => 'Sem Olhos',
        'sentinela' => 'Sentinela',
        'sincronizado' => 'Sincronizado',
        'superpredador' => 'Superpredador',
        'suporte-tecnico' => 'Suporte Técnico',
        'tiro-de-sorte' => 'Tiro de Sorte',
        'transbordante' => 'Transbordante',
        'trauma' => 'Trauma',
        'vanguarda' => 'Vanguarda',
        'vanguarda-perfeita' => 'Vanguarda Perfeita',
        'versatil' => 'Versátil',
        'vigilancia' => 'Vigilancia',
        'vigilante' => 'Vigilante',
        'vingativo' => 'Vingativo',
        'vingativo-perfeito' => 'Vingativo Perfeito',
    );
}

function dicionarioModificacao(){

    // Dicionario para as modificações
    return array(
        'chance-dano-critico' => 'Chance de dano crítico (%)',
        'dano-critico' => 'Dano crítico (%)',
        'dano-tiro-na-cabeca' => 'Dano de tiro na cabeça (%)',
        'protecao-elites' => 'Proteção contra elites (%)',
        'protecao-matar' => 'Proteção ao matar (%)',
        'regeneracao' => 'Regeneração de proteção (%)',
        'resistencia-explosivos' => 'Resistência a explosivos (%)',
        'resistencia-combustao' => 'Resistência a combustão (%)',
        'resistencia-desorientacao' => 'Resistência a desorientação (%)',
        'resistencia-efeitos' => 'Resistência contra efeitos (%) ',
        'resistencia-desestabilizacao' => 'Resistência a desestabilização (%)',
        'recebimento-cura' => 'Recebimento de cura extra (%)',
        'aceleracao-habilidade' => 'Aceleração de habilidade (%)',
        'duracao-habilidade' => 'Duração de habilidade (%)',
        'habilidades-conserto' => 'Habilidades de conserto (%)',
    );

}

function dicionarioSHDTech(){

    // Dicionarioa das habilidades SHD
    return array(
        'armadilha-choque' => 'Armadilha (Choque)',
        'amradilha-estilhacos' => 'Armadilha (Estilhaços)',
        'armadilha-reparadora' => 'Armadilha (Reparadora)',
        'bomba-pegajosa-combustao' => 'Bomba Pegajosa (Combustão)',
        'bomba-pegajosa-explosivo' => 'Bomba Pegajosa (Explosivo)',
        'bomba-pegajosa-pem' => 'Bomba Pegajosa (PEM)',
        'colmeia-restauradora' => 'Colmeia (Restauradora)',
        'colmeia-vespa' => 'Colmeia (Vespa)',
        'colmeia-reanimadora' => 'Colmeia (Reanimadora)',
        'colmeia-estimulante' => 'Colmeia (Estimulante)',
        'colmeia-artifice' => 'Colmeia (Artífice)',
        'drone-agressor' => 'Drone (Agressor)',
        'drone-defensor' => 'Drone (Defensor)',
        'drone-bombardeiro' => 'Drone (Bombardeiro)',
        'drone-guardiao' => 'Drone (Guardião)',
        'drone-estrategista' => 'Drone (Estrategista)',
        'escudo-balistico-bastiao' => 'Escudo Balístico (Bastião)',
        'escudo-balistico-cruzado' => 'Escudo Balístico (Cruzado)',
        'escudo-balistico-defletor' => 'Escudo Balístico (Defletor)',
        'escudo-balistico-agressor' => 'Escudo Balístico (Agressor)',
        'isca-distracao-holografica' => 'Isca (Distração Holográfica)',
        'lancador-quimico-fortificador' => 'Lançador Químico (Fortificador)',
        'lancador-quimico-inflamavel' => 'Lançador Químico (Inflamável)',
        'lancador-quimico-espuma-antimotim' => 'Lançador Químico (Espuma Antimotim)',
        'lancador-quimico-oxidante' => 'Lançador Químico (Oxidante)',
        'mina-guida-explosiva' => 'Mina Guiada (Explosiva)',
        'mina-guida-explosao-aerea' => 'Mina Guiada (Explosão Aérea)',
        'mina-guida-cluster' => 'Mina Guiada (Cluster)',
        'mina-guida-reparadora' => 'Mina Guiada (Reparadora)',
        'pulso-scanner' => 'Pulso (Scanner)',
        'pulso-remoto' => 'Pulso (Remoto)',
        'pulso-bloqueador' => 'Pulso (Bloqueador)',
        'pulso-banshee' => 'Pulso (Banshee)',
        'pulso-aquiles' => 'Pulso (Aquiles)',
        'torreta-agressora' => 'Toreta (Agressora)',
        'torreta-incendiaria' => 'Torreta (Incendiária)',
        'torreta-franco-atiradora' => 'Torreta (Franco-atiradora)',
        'torreta-artilharia' => 'Torreta (Artilharia)',
        'vagalume-ofuscador' => 'Vagalume (Ofuscador)',
        'vagalume-estilhacador' => 'Vagalume (Estilhaçador)',
        'vagalume-demolidor' => 'Vagalume (Demolidor)',
    );
}

function dicionarioRegras(){

    // Dicionario de regras do formulário de builds
    return array(
        'nome-build' => 'required|min:3|max:30',
        'nome-arma-primaria' => 'required',
        'valor1-atributo-central-arma-primaria' => 'required|numeric|min:0',
        'valor2-atributo-central-arma-primaria' => 'required|numeric|min:0',
        'valor-atributo-arma-primaria' => 'required|numeric|min:0',
        'nome-arma-secundaria' => 'required',
        'valor1-atributo-central-arma-secundaria' => 'required|numeric|min:0',
        'valor2-atributo-central-arma-secundaria' => 'required|numeric|min:0',
        'valor-atributo-arma-secundaria' => 'required|numeric|min:0',
        'nome-arma-reserva' => 'required',
        'valor-atributo-central-arma-reserva' => 'required|numeric|min:0',
        'valor-atributo-arma-reserva' => 'required|numeric|min:0',
        'nome-mascara' => 'required',
        'valor-atributo-central-mascara' => 'required|numeric|min:0',
        'valor1-atributo-mascara' => 'required|numeric|min:0',
        'valor-modificacao-mascara' => 'required|numeric|min:0',
        'nome-mochila' => 'required',
        'valor1-atributo-central-mochila' => 'required|numeric|min:0',
        'valor1-atributo-mochila' => 'required|numeric|min:0',
        'valor-modificacao-mochila' => 'required|numeric|min:0',
        'nome-colete' => 'required',
        'valor-atributo-central-colete' => 'required|numeric|min:0',
        'valor1-atributo-colete' => 'required|numeric|min:0',
        'valor-modificacao-colete' => 'required|numeric|min:0',
        'nome-luva' => 'required',
        'valor-atributo-central-luva' => 'required|numeric|min:0',
        'valor1-atributo-luva' => 'required|numeric|min:0',
        'nome-coldre' => 'required',
        'valor-atributo-central-coldre' => 'required|numeric|min:0',
        'valor1-atributo-coldre' => 'required|numeric|min:0',
        'nome-joelheira' => 'required',
        'valor-atributo-central-joelheira' => 'required|numeric|min:0',
        'valor1-atributo-joelheira' => 'required|numeric|min:0',
        'imagem-build' => 'required|mimes:webp|max:2048',
    );
}

function dicionarioFeedback(){
    
    // Dicionario do feedback do formulário de builds
    return array(
        'nome-build.required' => 'O campo nome da build é obrigatório.',
        'nome-build.min' => 'O campo nome da build deve ter pelo menos 3 caracteres.',
        'nome-build.max' => 'O campo nome da build deve ter no máximo 30 caracteres.',

        'nome-arma-primaria.required' => 'O campo nome da arma primária é obrigatório.',
        'nome-arma-secundaria.required' => 'O campo nome da arma secundaria é obrigatório.',
        'nome-arma-reserva.required' => 'O campo nome da arma reserva é obrigatório.',

        'valor1-atributo-central-arma-primaria.required' => 'O primeiro valor do atributo central da arma primária é obrigatório.',
        'valor1-atributo-central-arma-primaria.numeric' => 'O primeiro valor do atributo central da arma primária deve ser numérico.',
        'valor1-atributo-central-arma-primaria.min' => 'O primeiro valor do atributo central da arma primária deve ser maior que 0.',
        'valor2-atributo-central-arma-primaria.required' => 'O segundo valor do atributo central da arma primária é obrigatório.',
        'valor2-atributo-central-arma-primaria.numeric' => 'O segundo valor do atributo central da arma primária deve ser numérico.',
        'valor2-atributo-central-arma-primaria.min' => 'O segundo valor do atributo central da arma primária deve ser maior que 0.',

        'valor1-atributo-central-arma-secundaria.required' => 'O primeiro valor do atributo central da arma secundária é obrigatório.',
        'valor1-atributo-central-arma-secundaria.numeric' => 'O primeiro valor do atributo central da arma secundária deve ser numérico.',
        'valor1-atributo-central-arma-secundaria.min' => 'O primeiro valor do atributo central da arma secundária deve ser maior que 0.',
        'valor2-atributo-central-arma-secundaria.required' => 'O segundo valor do atributo central da arma secundária é obrigatório.',
        'valor2-atributo-central-arma-secundaria.numeric' => 'O segundo valor do atributo central da arma secundária deve ser numérico.',
        'valor2-atributo-central-arma-secundaria.min' => 'O segundo valor do atributo central da arma secundária deve ser maior que 0.',

        'valor-atributo-arma-primaria.required' => 'O valor do atributo da arma primaria é obrigatório.',
        'valor-atributo-arma-primaria.numeric' => 'O valor do atributo da arma primaria deve ser numérico.',
        'valor-atributo-arma-primaria.min' => 'O valor do atributo da arma primaria deve ser maior que 0.',

        'valor-atributo-arma-secundaria.required' => 'O valor do atributo da arma secundária é obrigatório.',
        'valor-atributo-arma-secundaria.numeric' => 'O valor do atributo da arma secundária deve ser numérico.',
        'valor-atributo-arma-secundaria.min' => 'O valor do atributo da arma secundária deve ser maior que 0.',

        'valor-atributo-central-arma-reserva.required' => 'O valor do atributo central da arma reserva é obrigatório.',
        'valor-atributo-central-arma-reserva.numeric' => 'O valor do atributo central da arma reserva deve ser numérico.',
        'valor-atributo-central-arma-reserva.min' => 'O valor do atributo central da arma reserva deve ser maior que 0.',

        'valor-atributo-arma-reserva.required' => 'O valor do atributo da arma reserva é obrigatório.',
        'valor-atributo-arma-reserva.numeric' => 'O valor do atributo da arma reserva deve ser numérico.',
        'valor-atributo-arma-reserva.min' => 'O valor do atributo da arma reserva deve ser maior que 0.',

        'nome-mascara.required' => 'O campo nome da máscara é obrigatório.',

        'valor-atributo-central-mascara.required' => 'O valor do atributo central da máscara é obrigatório.',
        'valor-atributo-central-mascara.numeric' => 'O valor do atributo central da máscara deve ser numérico.',
        'valor-atributo-central-mascara.min' => 'O valor do atributo central da máscara deve ser maior que 0.',

        'valor1-atributo-mascara.required' => 'O primeiro valor do atributo da máscara é obrigatório.',
        'valor1-atributo-mascara.numeric' => 'O primeiro valor do atributo da máscara deve ser numérico.',
        'valor1-atributo-mascara.min' => 'O primeiro valor do atributo da máscara deve ser maior que 0.',

        'valor-modificacao-mascara.required' => 'O valor da modificação da máscara é obrigatório.',
        'valor-modificacao-mascara.numeric' => 'O valor da modificação da máscara deve ser numérico.',
        'valor-modificacao-mascara.min' => 'O valor da modificação da máscara deve ser maior que 0.',

        'nome-mochila.required' => 'O campo nome da mochila é obrigatório.',

        'valor1-atributo-central-mochila.required' => 'O valor do atributo central da mochila é obrigatório.',
        'valor1-atributo-central-mochila.numeric' => 'O valor do atributo central da mochila deve ser numérico.',
        'valor1-atributo-central-mochila.min' => 'O valor do atributo central da mochila deve ser maior que 0.',

        'valor1-atributo-mochila.required' => 'O primeiro valor do atributo da mochila é obrigatório.',
        'valor1-atributo-mochila.numeric' => 'O primeiro valor do atributo da mochila deve ser numérico.',
        'valor1-atributo-mochila.min' => 'O primeiro valor do atributo da mochila deve ser maior que 0.',

        'valor-modificacao-mochila.required' => 'O valor da modificação da mochila é obrigatório.',
        'valor-modificacao-mochila.numeric' => 'O valor da modificação da mochila deve ser numérico.',
        'valor-modificacao-mochila.min' => 'O valor da modificação da mochila deve ser maior que 0.',

        'nome-colete.required' => 'O campo nome do colete é obrigatório.',

        'valor-atributo-central-colete.required' => 'O valor do atributo central do colete é obrigatório.',
        'valor-atributo-central-colete.numeric' => 'O valor do atributo central do colete deve ser numérico.',
        'valor-atributo-central-colete.min' => 'O valor do atributo central do colete deve ser maior que 0.',

        'valor1-atributo-colete.required' => 'O primeiro valor do atributo do colete é obrigatório.',
        'valor1-atributo-colete.numeric' => 'O primeiro valor do atributo do colete deve ser numérico.',
        'valor1-atributo-colete.min' => 'O primeiro valor do atributo do colete deve ser maior que 0.',

        'valor-modificacao-colete.required' => 'O valor da modificação do colete é obrigatório.',
        'valor-modificacao-colete.numeric' => 'O valor da modificação do colete deve ser numérico.',
        'valor-modificacao-colete.min' => 'O valor da modificação do colete deve ser maior que 0.',

        'nome-luva.required' => 'O campo nome da luva é obrigatório.',

        'valor-atributo-central-luva.required' => 'O valor do atributo central da luva é obrigatório.',
        'valor-atributo-central-luva.numeric' => 'O valor do atributo central da luva deve ser numérico.',
        'valor-atributo-central-luva.min' => 'O valor do atributo central da luva deve ser maior que 0.',

        'valor1-atributo-luva.required' => 'O primeiro atributo da luva é obrigatório.',
        'valor1-atributo-luva.numeric' => 'O primeiro atributo da luva deve ser numérico.',
        'valor1-atributo-luva.min' => 'O primeiro atributo da luva deve ser maior que 0.',

        'nome-coldre.required' => 'O campo nome do coldre é obrigatório.',

        'valor-atributo-central-coldre.required' => 'O valor do atributo central do coldre é obrigatório.',
        'valor-atributo-central-coldre.numeric' => 'O valor do atributo central do coldre deve ser numérico.',
        'valor-atributo-central-coldre.min' => 'O valor do atributo central do coldre deve ser maior que 0.',

        'valor1-atributo-coldre.required' => 'O primeiro valor do atributo do coldre é obrigatório.',
        'valor1-atributo-coldre.numeric' => 'O primeiro valor do atributo do coldre deve ser numérico.',
        'valor1-atributo-coldre.min' => 'O primeiro valor do atributo do coldre deve ser maior que 0.',

        'nome-joelheira.required' => 'O campo nome da joelheira é obrigatório.',

        'valor-atributo-central-joelheira.required' => 'O valor do atributo central da joelheira é obrigatório.',
        'valor-atributo-central-joelheira.numeric' => 'O valor do atributo central da joelheira deve ser numérico.',
        'valor-atributo-central-joelheira.min' => 'O valor do atributo central da joelheira deve ser maior que 0.',

        'valor1-atributo-joelheira.required' => 'O primeiro valor do atributo da joelheira é obrigatório.',
        'valor1-atributo-joelheira.numeric' => 'O primeiro valor do atributo da joelheira deve ser numérico.',
        'valor1-atributo-joelheira.min' => 'O primeiro valor do atributo da joelheira deve ser maior que 0.',

        'imagem-build.required' => 'A inserção de arquivo é obrigatória.',
        'imagem-build.mimes' => 'O arquivo deve ser do formato webp.',
        'imagem-build.max' => 'A imagem deve ter no máximo 2MB.',
    );
}

function dicionarioTipoValorNumerico(){

    return array(
        'vida',
        'protecao',
        'tier',
        'regeneracao',
    );
}


// Verifica se os valores enviados pelo formulário existem, senão um valor nulo é substituido
function get_dicionario($valor) {

   $dicionario_build = dicionario();

   if (isset($dicionario_build[$valor])) {
       return $dicionario_build[$valor];
   } else {
       return "NULL";
   }
}

function getTipoValor($valor){

    $dicionario_Tipo = dicionarioTipoValorNumerico();

    if (isset($dicionario_Tipo[$valor])){
        return TRUE;
    } else {
        return NULL;
    }
}
