<?php
include_once '../ClassesDeBusca/TExpressoes.class.php'; 
include_once '../ClassesDeBusca/TFiltro.class.php'; 
include_once '../ClassesDeBusca/TCriterio.class.php'; 
include_once '../../views/LayoutPadrao.php';
include_once '../../models/db.php';

if ( !empty($_POST)) {
$nome_professor=null;
$id_professor=null;

$nome_aluno=$_POST['nome_professor'];
//$id_disciplina=$_POST['id_disciplina'];
}
$buscar='';
//echo $nome_aluno.' - '.$idade_aluno.' - '.$periodo_aluno.' - '.$id_curso;

//$c=" AND NOME_ALUNO LIKE '%$nome_aluno%' ";

$busca=new TCriterio();

if(!empty($nome_professor)){$busca->add(new TFiltro('nome_professor','LIKE',"%$nome_professor%"),TExpressoes::AND_PERERATOR);
$buscar=' WHERE '.$busca->dump();
}
if(!empty($periodo_aluno)){$busca->add(new TFiltro('id_professor','=',(int)$id_professor),TExpressoes::AND_PERERATOR);
$buscar=' WHERE '.$busca->dump();
}

$query='SELECT * FROM professor ';

$desc = array('NOME DO PROFESSOR');
//$desc define a descrição de titolo para a formação da grade ( tabela)
//echo $buscar;

$db1='nome_professor';
$db2=//'nome_disciplina';
$db3=$db4=FALSE;
$db5=0;
$nome='nome';
$texto='texto';
$titulo='aluno';// recebe o nome da tabela no banco de dados
//nome do aluno 
$dados[$titulo][$nome]='nome_professor';
$dados[$titulo][$texto]='Nome do Professor';  
$titulo1=$titulo2=FALSE;
$link='consultarProfessor.php';
// para buscar por periodo
//$dados[$titulo1][$nome]='periodo_aluno';
//$dados[$titulo2][$texto]='Periodo do Aluno';  
////// para buscar por idade
$modo=1;
//$link='consultarAluno.php';
$tabela=FALSE;//'disciplina';   // nome da tabela para exibir na lista do componente select
$id =FALSE; //  'id_disciplina' ;   // id da tabela para exibir no campo select
$campo =FALSE; //  'nome_disciplina';    // noome do campo a ser listado no componente selec  
LayoutPadrao::TopoPagina();
LayoutPadrao::menuDrop();


LayoutPadrao::MenuBusca($modo,$dados,$titulo,$titulo1,$titulo2,$nome,$texto,$link,$tabela,$id,$campo);

LayoutPadrao::GeraGradeConsulta($db1,$db2,$db3,$db4,$db5,$buscar,$desc,$query);
LayoutPadrao::Rodape();

?>