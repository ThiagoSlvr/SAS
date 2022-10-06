// to do:
//         cadastro_lab.html fazer dropdown para selecionar tipos de exame e fazer dinamico para selecionar varios tipos;

function add_drop(){
    console.log('teste');
    var $length = $('#drop')[0].childElementCount;
    var $input = $("<select name='examtype"+String($length)+"' required><option value='Sangue'>Sangue</option><option value='Raio X'>Raio X</option></select>");
    $input.appendTo($('#drop'));

}


function edit() {
    var field = document.getElementById('field')
    var botao_save = document.getElementById('save')
    var botao_edit = document.getElementById('edit')
    field.disabled = !field.disabled
    botao_save.style.display = 'block'
    botao_edit.style.display = 'none'

}

function save() {
    var field = document.getElementById('field')
    var botao_save = document.getElementById('save')
    var botao_edit = document.getElementById('edit')
    field.disabled = !field.disabled
    botao_save.style.display = 'none'
    botao_edit.style.display = 'block'

}

