<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Prática PHP</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            background-color: #eaf4e8;
            padding: 25px;
        }
        h1 {
            background-color: #2e7d32;
            color: white;
            padding: 18px;
            text-align: center;
            border-radius: 6px;
        }
        h2 {
            background-color: #1b5e20;
            color: #c8e6c9;
            padding: 8px 14px;
            border-radius: 4px;
            margin-top: 35px;
            font-size: 1em;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .bloco {
            background-color: #ffffff;
            border-left: 5px solid #2e7d32;
            border-radius: 6px;
            padding: 15px 20px;
            margin-top: 12px;
        }
        .bloco h3 {
            color: #2e7d32;
            margin-top: 0;
            font-size: 1em;
        }
        .saida {
            background-color: #f1f8e9;
            border: 1px solid #aed581;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
        .aviso {
            background-color: #fff8e1;
            border: 1px solid #ffcc80;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            color: #e65100;
        }
        input[type="text"],
        input[type="number"] {
            padding: 5px 9px;
            border: 1px solid #a5d6a7;
            border-radius: 4px;
            margin: 4px 2px;
            width: 130px;
        }
        select {
            padding: 5px 9px;
            border: 1px solid #a5d6a7;
            border-radius: 4px;
            margin: 4px 2px;
        }
        .btn {
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 7px 18px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 8px;
        }
        .btn:hover {
            background-color: #1b5e20;
        }
    </style>
</head>
<body>

<h1>Prática de PHP — Formulários</h1>

<h2>Bloco 1 — Operações Básicas</h2>

<!-- Tarefa 1 - Adição -->
<div class="bloco">
    <h3>Tarefa 1 — Adição de dois valores</h3>
    <form method="post">
        <input type="number" name="val_a" placeholder="Valor A">
        <input type="number" name="val_b" placeholder="Valor B">
        <button class="btn" type="submit" name="enviar_t1">Somar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t1"])) {
        if ($_POST["val_a"] !== "" && $_POST["val_b"] !== "") {
            $val_a = $_POST["val_a"];
            $val_b = $_POST["val_b"];
            $total = $val_a + $val_b;
            echo "<div class='saida'>$val_a + $val_b = <strong>$total</strong></div>";
        } else {
            echo "<div class='aviso'>Informe os dois valores.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 2 - Média das notas -->
<div class="bloco">
    <h3>Tarefa 2 — Média das notas do bimestre</h3>
    <form method="post">
        <input type="number" name="p1" placeholder="Prova 1" step="0.1">
        <input type="number" name="p2" placeholder="Prova 2" step="0.1">
        <input type="number" name="p3" placeholder="Prova 3" step="0.1">
        <button class="btn" type="submit" name="enviar_t2">Calcular</button>
    </form>
    <?php
    if (isset($_POST["enviar_t2"])) {
        if (!empty($_POST["p1"]) && !empty($_POST["p2"]) && !empty($_POST["p3"])) {
            $p1 = $_POST["p1"];
            $p2 = $_POST["p2"];
            $p3 = $_POST["p3"];
            $media = ($p1 + $p2 + $p3) / 3;
            echo "<div class='saida'>Média das provas $p1, $p2 e $p3 = <strong>$media</strong></div>";
        } else {
            echo "<div class='aviso'>Preencha as três provas.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 3 - Conversão metros/cm -->
<div class="bloco">
    <h3>Tarefa 3 — Conversão: metros → centímetros</h3>
    <form method="post">
        <input type="number" name="dist_metros" placeholder="Distância (m)" step="0.01">
        <button class="btn" type="submit" name="enviar_t3">Converter</button>
    </form>
    <?php
    if (isset($_POST["enviar_t3"])) {
        if (!empty($_POST["dist_metros"])) {
            $distancia = $_POST["dist_metros"];
            $em_cm = $distancia * 100;
            echo "<div class='saida'>$distancia m = <strong>$em_cm cm</strong></div>";
        } else {
            echo "<div class='aviso'>Informe a distância em metros.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 4 - Área -->
<div class="bloco">
    <h3>Tarefa 4 — Área do retângulo</h3>
    <form method="post">
        <input type="number" name="larg" placeholder="Largura" step="0.1">
        <input type="number" name="comp" placeholder="Comprimento" step="0.1">
        <button class="btn" type="submit" name="enviar_t4">Calcular área</button>
    </form>
    <?php
    if (isset($_POST["enviar_t4"])) {
        if (!empty($_POST["larg"]) && !empty($_POST["comp"])) {
            $larg = $_POST["larg"];
            $comp = $_POST["comp"];
            $area = $larg * $comp;
            echo "<div class='saida'>Área = $larg × $comp = <strong>$area</strong></div>";
        } else {
            echo "<div class='aviso'>Informe largura e comprimento.</div>";
        }
    }
    ?>
</div>

<h2>Bloco 2 — Condicionais If / Else</h2>

<!-- Tarefa 5 - Sinal do número -->
<div class="bloco">
    <h3>Tarefa 5 — Sinal do número</h3>
    <form method="post">
        <input type="number" name="num_sinal" placeholder="Digite um número">
        <button class="btn" type="submit" name="enviar_t5">Verificar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t5"]) && $_POST["num_sinal"] !== "") {
        $num = $_POST["num_sinal"];
        if ($num > 0) {
            $sinal = "Positivo ➕";
        } elseif ($num < 0) {
            $sinal = "Negativo ➖";
        } else {
            $sinal = "Zero";
        }
        echo "<div class='saida'>O número $num é: <strong>$sinal</strong></div>";
    } elseif (isset($_POST["enviar_t5"])) {
        echo "<div class='aviso'>Digite um número.</div>";
    }
    ?>
</div>

<!-- Tarefa 6 - Maior de idade -->
<div class="bloco">
    <h3>Tarefa 6 — Verificar maioridade</h3>
    <form method="post">
        <input type="number" name="anos" placeholder="Quantos anos?">
        <button class="btn" type="submit" name="enviar_t6">Checar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t6"])) {
        if (!empty($_POST["anos"])) {
            $anos = $_POST["anos"];
            if ($anos >= 18) {
                $situacao = "Maior de idade ✅";
            } else {
                $faltam = 18 - $anos;
                $situacao = "Menor de idade — faltam $faltam ano(s) ❌";
            }
            echo "<div class='saida'>Com $anos anos: <strong>$situacao</strong></div>";
        } else {
            echo "<div class='aviso'>Informe a idade.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 7 - Situação do aluno -->
<div class="bloco">
    <h3>Tarefa 7 — Situação do aluno</h3>
    <form method="post">
        <input type="number" name="nota_final" placeholder="Nota final" step="0.1">
        <button class="btn" type="submit" name="enviar_t7">Consultar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t7"])) {
        if (!empty($_POST["nota_final"])) {
            $nota = $_POST["nota_final"];
            if ($nota >= 6) {
                $situacao = "Aprovado ✅";
            } else {
                $situacao = "Reprovado ❌";
            }
            echo "<div class='saida'>Nota $nota: <strong>$situacao</strong></div>";
        } else {
            echo "<div class='aviso'>Informe a nota final.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 8 - Qual é o maior -->
<div class="bloco">
    <h3>Tarefa 8 — Qual é o maior?</h3>
    <form method="post">
        <input type="number" name="num_x" placeholder="Número X">
        <input type="number" name="num_y" placeholder="Número Y">
        <button class="btn" type="submit" name="enviar_t8">Comparar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t8"])) {
        if ($_POST["num_x"] !== "" && $_POST["num_y"] !== "") {
            $x = $_POST["num_x"];
            $y = $_POST["num_y"];
            if ($x > $y) {
                $maior = $x;
            } elseif ($y > $x) {
                $maior = $y;
            } else {
                $maior = "Iguais";
            }
            if ($maior === "Iguais") {
                echo "<div class='saida'>$x e $y são <strong>iguais</strong>.</div>";
            } else {
                echo "<div class='saida'>Entre $x e $y, o maior é: <strong>$maior</strong></div>";
            }
        } else {
            echo "<div class='aviso'>Preencha os dois campos.</div>";
        }
    }
    ?>
</div>

<h2>Bloco 3 — Switch / Case</h2>

<!-- Tarefa 9 - Dia da semana -->
<div class="bloco">
    <h3>Tarefa 9 — Nome do dia da semana</h3>
    <form method="post">
        <select name="num_dia">
            <option value="">-- Escolha --</option>
            <option value="1">1 - Domingo</option>
            <option value="2">2 - Segunda</option>
            <option value="3">3 - Terça</option>
            <option value="4">4 - Quarta</option>
            <option value="5">5 - Quinta</option>
            <option value="6">6 - Sexta</option>
            <option value="7">7 - Sábado</option>
        </select>
        <button class="btn" type="submit" name="enviar_t9">Ver</button>
    </form>
    <?php
    if (isset($_POST["enviar_t9"])) {
        if (!empty($_POST["num_dia"])) {
            $num_dia = $_POST["num_dia"];
            switch ($num_dia) {
                case 1: $dia_nome = "Domingo";  break;
                case 2: $dia_nome = "Segunda-feira"; break;
                case 3: $dia_nome = "Terça-feira";   break;
                case 4: $dia_nome = "Quarta-feira";  break;
                case 5: $dia_nome = "Quinta-feira";  break;
                case 6: $dia_nome = "Sexta-feira";   break;
                case 7: $dia_nome = "Sábado";        break;
            }
            echo "<div class='saida'>Dia $num_dia = <strong>$dia_nome</strong></div>";
        } else {
            echo "<div class='aviso'>Selecione um número.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 10 - Vogal ou consoante -->
<div class="bloco">
    <h3>Tarefa 10 — Vogal ou consoante?</h3>
    <form method="post">
        <input type="text" name="char_digitado" placeholder="Digite uma letra" maxlength="1" style="width:80px">
        <button class="btn" type="submit" name="enviar_t10">Checar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t10"])) {
        if (!empty(trim($_POST["char_digitado"]))) {
            $char = strtolower(trim($_POST["char_digitado"]));
            switch ($char) {
                case "a": case "e": case "i": case "o": case "u":
                    $tipo = "Vogal 🔵";
                    break;
                default:
                    $tipo = "Consoante 🟢";
            }
            echo "<div class='saida'>A letra '$char' é: <strong>$tipo</strong></div>";
        } else {
            echo "<div class='aviso'>Digite uma letra.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 11 - Status do pedido -->
<div class="bloco">
    <h3>Tarefa 11 — Rastreamento do pedido</h3>
    <form method="post">
        <select name="estado_pedido">
            <option value="">-- Selecione o status --</option>
            <option value="aguardando">Aguardando</option>
            <option value="em_preparacao">Em preparação</option>
            <option value="enviado">Enviado</option>
            <option value="concluido">Concluído</option>
        </select>
        <button class="btn" type="submit" name="enviar_t11">Rastrear</button>
    </form>
    <?php
    if (isset($_POST["enviar_t11"])) {
        if (!empty($_POST["estado_pedido"])) {
            $estado = $_POST["estado_pedido"];
            switch ($estado) {
                case "aguardando":    $msg = "⏳ Aguardando confirmação do pagamento."; break;
                case "em_preparacao": $msg = "🔧 Seu pedido está sendo preparado.";     break;
                case "enviado":       $msg = "🚚 Pedido a caminho — aguarde a entrega!"; break;
                case "concluido":     $msg = "✅ Entregue! Obrigado pela compra.";       break;
            }
            echo "<div class='saida'><strong>$msg</strong></div>";
        } else {
            echo "<div class='aviso'>Selecione um status.</div>";
        }
    }
    ?>
</div>

<h2>Bloco 4 — Laço For</h2>

<!-- Tarefa 12 - Contagem -->
<div class="bloco">
    <h3>Tarefa 12 — Contagem de 1 até N</h3>
    <form method="post">
        <input type="number" name="ate_n" placeholder="Contar até...">
        <button class="btn" type="submit" name="enviar_t12">Contar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t12"])) {
        if (!empty($_POST["ate_n"]) && $_POST["ate_n"] > 0) {
            $ate = $_POST["ate_n"];
            echo "<div class='saida'>";
            for ($i = 1; $i <= $ate; $i++) {
                echo "<strong>$i</strong> ";
            }
            echo "</div>";
        } else {
            echo "<div class='aviso'>Informe um número maior que zero.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 13 - Pares -->
<div class="bloco">
    <h3>Tarefa 13 — Somente os números pares até N</h3>
    <form method="post">
        <input type="number" name="ate_pares" placeholder="Até qual número?">
        <button class="btn" type="submit" name="enviar_t13">Filtrar pares</button>
    </form>
    <?php
    if (isset($_POST["enviar_t13"])) {
        if (!empty($_POST["ate_pares"]) && $_POST["ate_pares"] > 0) {
            $limite = $_POST["ate_pares"];
            echo "<div class='saida'>";
            for ($i = 2; $i <= $limite; $i = $i + 2) {
                echo "<strong>$i</strong> ";
            }
            echo "</div>";
        } else {
            echo "<div class='aviso'>Informe um número maior que zero.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 14 - Tabuada -->
<div class="bloco">
    <h3>Tarefa 14 — Tabuada completa</h3>
    <form method="post">
        <input type="number" name="num_tab" placeholder="Tabuada de...">
        <button class="btn" type="submit" name="enviar_t14">Gerar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t14"])) {
        if (!empty($_POST["num_tab"])) {
            $num = $_POST["num_tab"];
            echo "<div class='saida'>";
            for ($i = 1; $i <= 10; $i++) {
                $res = $num * $i;
                echo "$num × $i = <strong>$res</strong><br>";
            }
            echo "</div>";
        } else {
            echo "<div class='aviso'>Informe o número da tabuada.</div>";
        }
    }
    ?>
</div>

<h2>Bloco 5 — Laço While</h2>

<!-- Tarefa 15 - Contagem regressiva -->
<div class="bloco">
    <h3>Tarefa 15 — Contagem regressiva</h3>
    <form method="post">
        <input type="number" name="inicio_reg" placeholder="Começar de...">
        <button class="btn" type="submit" name="enviar_t15">Iniciar</button>
    </form>
    <?php
    if (isset($_POST["enviar_t15"])) {
        if (!empty($_POST["inicio_reg"]) && $_POST["inicio_reg"] > 0) {
            $inicio = $_POST["inicio_reg"];
            echo "<div class='saida'>";
            $cont = $inicio;
            while ($cont >= 1) {
                echo "<strong>$cont</strong> ";
                $cont = $cont - 1;
            }
            echo "🚀</div>";
        } else {
            echo "<div class='aviso'>Informe um número maior que zero.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 16 - Acumulador -->
<div class="bloco">
    <h3>Tarefa 16 — Somatório de 1 até N</h3>
    <form method="post">
        <input type="number" name="soma_ate" placeholder="Somar até...">
        <button class="btn" type="submit" name="enviar_t16">Calcular</button>
    </form>
    <?php
    if (isset($_POST["enviar_t16"])) {
        if (!empty($_POST["soma_ate"]) && $_POST["soma_ate"] > 0) {
            $limite = $_POST["soma_ate"];
            $acumulador = 0;
            $cont = 1;
            while ($cont <= $limite) {
                $acumulador = $acumulador + $cont;
                $cont = $cont + 1;
            }
            echo "<div class='saida'>Soma de 1 até $limite = <strong>$acumulador</strong></div>";
        } else {
            echo "<div class='aviso'>Informe um número maior que zero.</div>";
        }
    }
    ?>
</div>

<h2>Bloco 6 — Laço Do While</h2>

<!-- Tarefa 17 - Sorteio -->
<div class="bloco">
    <h3>Tarefa 17 — Quantas tentativas para sortear o número?</h3>
    <form method="post">
        <input type="number" name="num_alvo" placeholder="Número alvo (1-10)">
        <button class="btn" type="submit" name="enviar_t17">Sortear</button>
    </form>
    <?php
    if (isset($_POST["enviar_t17"])) {
        if (!empty($_POST["num_alvo"]) && $_POST["num_alvo"] >= 1 && $_POST["num_alvo"] <= 10) {
            $alvo = $_POST["num_alvo"];
            $tentativas = 0;
            do {
                $sorteio = rand(1, 10);
                $tentativas = $tentativas + 1;
            } while ($sorteio != $alvo);
            echo "<div class='saida'>🎲 O número <strong>$alvo</strong> saiu em <strong>$tentativas tentativa(s)</strong>!</div>";
        } else {
            echo "<div class='aviso'>Informe um número entre 1 e 10.</div>";
        }
    }
    ?>
</div>

<h2>Bloco 7 — Arrays</h2>

<!-- Tarefa 18 - Lista de itens -->
<div class="bloco">
    <h3>Tarefa 18 — Lista de compras</h3>
    <form method="post">
        <input type="text" name="item1" placeholder="Item 1">
        <input type="text" name="item2" placeholder="Item 2">
        <input type="text" name="item3" placeholder="Item 3">
        <input type="text" name="item4" placeholder="Item 4">
        <input type="text" name="item5" placeholder="Item 5">
        <br>
        <button class="btn" type="submit" name="enviar_t18">Montar lista</button>
    </form>
    <?php
    if (isset($_POST["enviar_t18"])) {
        if (!empty($_POST["item1"]) && !empty($_POST["item2"]) && !empty($_POST["item3"]) && !empty($_POST["item4"]) && !empty($_POST["item5"])) {
            $lista = [$_POST["item1"], $_POST["item2"], $_POST["item3"], $_POST["item4"], $_POST["item5"]];
            echo "<div class='saida'><ul>";
            foreach ($lista as $item) {
                echo "<li>$item</li>";
            }
            echo "</ul></div>";
        } else {
            echo "<div class='aviso'>Preencha todos os 5 itens.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 19 - Soma de valores -->
<div class="bloco">
    <h3>Tarefa 19 — Soma de 5 valores</h3>
    <form method="post">
        <input type="number" name="x1" placeholder="Valor 1">
        <input type="number" name="x2" placeholder="Valor 2">
        <input type="number" name="x3" placeholder="Valor 3">
        <input type="number" name="x4" placeholder="Valor 4">
        <input type="number" name="x5" placeholder="Valor 5">
        <br>
        <button class="btn" type="submit" name="enviar_t19">Somar tudo</button>
    </form>
    <?php
    if (isset($_POST["enviar_t19"])) {
        if (!empty($_POST["x1"]) && !empty($_POST["x2"]) && !empty($_POST["x3"]) && !empty($_POST["x4"]) && !empty($_POST["x5"])) {
            $valores = [$_POST["x1"], $_POST["x2"], $_POST["x3"], $_POST["x4"], $_POST["x5"]];
            $total = 0;
            foreach ($valores as $v) {
                $total = $total + $v;
            }
            echo "<div class='saida'>" . implode(" + ", $valores) . " = <strong>$total</strong></div>";
        } else {
            echo "<div class='aviso'>Preencha todos os 5 valores.</div>";
        }
    }
    ?>
</div>

<!-- Tarefa 20 - Ficha do funcionário -->
<div class="bloco">
    <h3>Tarefa 20 — Ficha do funcionário</h3>
    <form method="post">
        <input type="text" name="func_nome" placeholder="Nome completo">
        <input type="number" name="func_idade" placeholder="Idade">
        <input type="text" name="func_cargo" placeholder="Cargo">
        <br>
        <button class="btn" type="submit" name="enviar_t20">Gerar ficha</button>
    </form>
    <?php
    if (isset($_POST["enviar_t20"])) {
        if (!empty($_POST["func_nome"]) && !empty($_POST["func_idade"]) && !empty($_POST["func_cargo"])) {
            $funcionario = [
                "nome"  => trim($_POST["func_nome"]),
                "idade" => $_POST["func_idade"],
                "cargo" => trim($_POST["func_cargo"])
            ];
            echo "<div class='saida'>";
            echo "👤 Nome: <strong>" . $funcionario["nome"] . "</strong><br>";
            echo "🎂 Idade: <strong>" . $funcionario["idade"] . " anos</strong><br>";
            echo "💼 Cargo: <strong>" . $funcionario["cargo"] . "</strong>";
            echo "</div>";
        } else {
            echo "<div class='aviso'>Preencha todos os campos da ficha.</div>";
        }
    }
    ?>
</div>

</body>
</html>