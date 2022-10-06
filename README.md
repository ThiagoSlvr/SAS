Website para um sistema de plano de saúde, utilizando um banco de dados.

Contendo Cadastro de Médicos, Pacientes, Laboratórios, Cadastros e Exames.
Histórico de Consultas e Exames.
Contas de Administradores, capazes de registrar Pacientes, Laboratórios e Médicos.
Contas de Médicos, capazes de alterar seu próprio cadastro, cadastrar Consultas, e ver histórico de consultas de Pacientes.
Contas de Laboratórios, capazes de alterar seu próprio cadastro, cadastrsar Exames, e ver histório de exames de Pacientes.
Contas de Pacientes, capazes de ver históricos de Consultas com Médicos e Exames nos Laboratórios.
Contadores para Consultas por Médico e Paciente e Exames por Laboratório e Paciente.

O sistema também cuida com que não ocorra cadastros duplicados e do sigilo de dados. Certificando que médicos não tenham acesso a informações de pacientes que não foram consultados com ele, entre outros.

O sistema foi feito inicialmente utilizando XML para armazenamento de dados, e depois foi atualizado para utilizar o MySQL.

Utiliza:

    HTML - Estrutura da Página e Geração de Formulários
    CSS - Interface Gráfica
    JavaScript - Personalização Página e Validação Formulários
    XML - Armazenamento de dados
    PHP - Manipulação Dados e Geracão Resultados
    MySQL - Armazenamento de dados