<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "conselho";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

echo "<h2> Distribuição de Aula </h2>";

$result_dist = "SELECT d.idDistribuicao, d.data, d.turmaId, d.disciplinaId, d.professorId,
di.nomeDisciplina, p.nomeProfessor,  t.turno
FROM distribuicoes AS d
INNER JOIN  professores AS p ON p.idProfessor = d.professorId
INNER JOIN  turmas AS t ON t.idTurma = d.turmaId  
INNER JOIN  disciplinas AS di ON di.idDisciplinas = d.disciplinaId";


$resultado_dist = mysqli_query($conn, $result_dist);

while($row_usuario = mysqli_fetch_assoc($resultado_dist)){

	echo "ID: " . $row_usuario['idDistribuicao'] . "<br>";
	echo "Data: " . $row_usuario['data']. "<br>";
   
	echo "nome do(a) Professor(a) " . $row_usuario['nomeProfessor'] . "<br>" ;

    echo "nomenclatura " . $row_usuario['turno'] . "<br> " ;

	 echo "disciplina " . $row_usuario['nomeDisciplina'] . "<br>  <hr>" ;

}


echo "<h2> Conselho </h2>";

$result_cons = "SELECT c.idconselhos, c.resposta1, c.resposta2, c.distribuicaoId,
a.nome, d.idDistribuicao, p.nomeProfessor , p.idProfessor, m.nomeDisciplina, t.turno
FROM conselhos AS c 
INNER JOIN  alunos AS a ON a.idAluno = c.alunoId 
INNER JOIN  distribuicoes AS d ON d.idDistribuicao = c.distribuicaoId
INNER JOIN  professores AS p ON p.idProfessor = d.professorId
INNER JOIN  disciplinas AS m ON m.idDisciplinas = d.disciplinaId
INNER JOIN  turmas AS t ON t.idTurma = d.turmaId  
WHERE idProfessor = '3'";


$resultado_cons = mysqli_query($conn, $result_cons);

while($row_conselho = mysqli_fetch_assoc($resultado_cons)){

	echo "IDConselho: " . $row_conselho['idconselhos'] . "<br>";
	echo " Nome do Aluno".$row_conselho['nome']. "<br> "; 
	echo " Id distribuiçaõ ".$row_conselho['idDistribuicao']. "<br> "; 
	echo "nome do(a) Professor(a): " . $row_conselho['nomeProfessor'] . "<br>" ;
	echo "disciplina " . $row_conselho['nomeDisciplina'] . "<br>" ;
	echo "turno " . $row_conselho['turno'] . "<br> <hr> ";

}

// INNER JOIN  professores AS p ON p.idProfessor = d.professorId
// INNER JOIN  turmas AS t ON t.idTurma = d.turmaId  
// INNER JOIN  disciplinas AS di ON di.idDisciplinas = d.disciplinaId;


	//  echo "ID: " . $row_usuario['idDistribuicao'] . "<br>";
	// echo "Data: " . $row_usuario['data']. "<br>";
   
	// echo "nome do(a) Professor(a) " . $row_usuario['nomeProfessor'] . "<br>" ;

    // echo "nomenclatura " . $row_usuario['turno'] . "<br> " ;

	// echo "disciplina " . $row_usuario['nomeDisciplina'] . "<br>  <hr>" ;