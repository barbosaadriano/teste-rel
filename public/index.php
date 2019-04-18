<?php


require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../template');
$twig = new \Twig\Environment($loader, []);

$mpdf->setFooter('{PAGENO}');

$mpdf->setHeader("Adriano Barbosa");
$mpdf->WriteHTML("<H1>Relatório Teste</H1>");
$template = $twig->load('base.html');
$html = $template->render(['produtos'=>[ 
      ['titulo'=>'produto 1', 'descricao'=>'teste 1'] ,
      ['titulo'=>'produto 2', 'descricao'=>'teste 2'] ,
    ]
  ]);
  
$mpdf->WriteHTML($html);
$mpdf->Output();