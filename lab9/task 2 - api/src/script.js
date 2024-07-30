let xhr = new XMLHttpRequest();
xhr.open("GET", "https://jsonplaceholder.typicode.com/albums");
// xhr.open("GET", "https://jsonplaceholder.typicode.com/todos");
// xhr.open("GET", "https://jsonplaceholder.typicode.com/comments");

xhr.send("");

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        
        let data = JSON.parse(xhr.responseText)
        // console.log(data);

        let table = document.getElementById('data-table');

        // get keys and add header
        let keys = [];
        for(let key in data[0]){
            // append key to list
            keys.push(key);
            // create table header
            let th = document.createElement('th');
            th.textContent = key;
            table.appendChild(th);
        }

        // console.log(keys)

        // add data in table
        for (let i = 0; i < data.length; i++) {
            // add row
            let tr = document.createElement('tr');

            for(let j = 0; j < keys.length; j++){
                // add cell
                let key = keys[j];
                let td = document.createElement('td');
                td.textContent = data[i][key];
                tr.appendChild(td);
                // console.log(data[i][key]);
            }
            table.appendChild(tr);
        }

    }
}