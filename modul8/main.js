var id = 1;
var todo_list = [];

function todoCheck(elem){
    var elemId = parseInt(elem.getAttribute('data-id'));

    var key = todo_list.find(function(data, i) {
        return data.id === elemId;
    });

    key = Object.assign(key, {
        checked: key.checked === 'checked' ? 'unchecked' : 'checked'
    });

    todo_list = Object.assign(todo_list, key);
    renderTodo(todo_list);
}

function todoDelete(elem){
    var elemId = parseInt(elem.getAttribute('data-id'));

    var idFound = null;
    todo_list.find(function (data, i) {
        if (data.id === elemId) {
            idFound = i;

            return true;
        }
    });

    todo_list.splice(idFound, 1);
    renderTodo(todo_list);
}

function todoSearch(){
    var keyword = document.getElementById('search').value.toUpperCase();

    var result = todo_list.filter(function(data){
        return data.title.toUpperCase().indexOf(keyword) > -1;
    });

    renderTodo(result);
}

function renderTodo(todo_list){
    var html = '';
    todo_list.forEach(function (val) {
        html += `
            <div class="clearfix" data-id="${val.id}">
                <div class="left" style="width: 10%">
                    <input type="checkbox" onchange="todoCheck(this)" ${val.checked} data-id="${val.id}">
                </div>
                <div class="left" style="width: 90%">
                    <h4 ${val.checked === 'checked' ? 'style="text-decoration: line-through;"' : ''}>${val.title}</h4>
                    <p ${val.checked === 'checked' ? 'style="text-decoration: line-through;"' : ''}>${val.note}</p>
                    <button data-id="${val.id}" onclick="todoDelete(this)">Hapus</button>
                    <hr>
                </div>
            </div>
        `;
    });

    document.querySelector('#container-todo-list').innerHTML = html;
}
document.addEventListener('DOMContentLoaded', function(){
    renderTodo(todo_list);

    var todo_tambah = document.querySelector('#todo-tambah');
    todo_tambah_toggle = false;
    todo_tambah.addEventListener('click', function(e){
        var container = document.querySelector('#container-todo').style;
        if(todo_tambah_toggle === false){
            container.display = 'block';
        }else{
            container.display = 'none';
        }

        todo_tambah_toggle = !todo_tambah_toggle;
    });

    var todo_simpan = document.querySelector('#todo-simpan');
    todo_simpan.addEventListener('click', function () {
        var title = document.querySelector('#todo-input').value;
        var note = document.querySelector('#todo-note-input').value;

        todo_list.push({
            id: id++,
            title: title,
            note: note,
            checked: 'unchecked'
        })
        renderTodo(todo_list);
    });


});