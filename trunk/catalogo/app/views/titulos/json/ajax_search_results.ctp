<?php 

/* @var $paginator PaginatorHelper */
foreach ( $titulos as &$t) {
    $t['Titulo']['name'] = utf8_encode($t['Titulo']['name']);
    $t['Oferta']['name'] = utf8_encode($t['Oferta']['name']);
}

$cant = $paginator->counter(array('format' => '%count%'));

$texto = 'T�tulos encontrados';
if ( $cant == 1) {
    $texto = 'T�tulo encontrado';
}

$numbers = $paginator->numbers() ? $paginator->numbers() : '';

$paginator = array(
    'cant' => $cant,
    'numbers' => $numbers,
    'texto' => utf8_encode($texto),
);

$titulos = array(
    'paginator' => $paginator,
    'data' => $titulos,
);

echo $javascript->object($titulos);
